<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RoleUser;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
class RegisteredByAdminController extends Controller
{
    public function registerByAdmin(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            
        ]);
        $role = $request->role;
        $user->attachRole($role);
        $permission = json_encode($request->permission);
        foreach(json_decode($permission) as $permis)
        {

            $user->attachPermissions([$permis]);
        }


        event(new Registered($user));
        
        return redirect()->route('admin.index')->with('success', 'Registrasi  berhasil!');;
    }
}
