<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AdminActivity;
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
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'confirmed', Rules\Password::defaults()],
            'telp'      => ['required',  'integer'],
            'alamat'    => ['required', 'string', 'max:255'],
        ]);

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'telp'      => '62' . $request->telp,
            'alamat'    => $request->alamat,
            'status_id' => 1,
            'avatar'    => 'Driver.svg',
            
        ]);

        if($request->has(['permission'])){

            $role = $request->role;
            $user->attachRole($role);
            $permission = json_encode($request->permission);
            foreach(json_decode($permission) as $permis)
            {
    
                $user->attachPermissions([$permis]);
            }
        }else{
            $role = $request->role;
            $user->attachRole($role);
        }

        event(new Registered($user));
        $activity               = new AdminActivity();
        $activity->author       = Auth::id();
        $activity->title        = Auth::user()->name;
        $activity->message      = 'Menambahkan ' . $user->name ;
        $activity->member_id    = $user->id;
        $activity->save(); 
            return redirect()->route('admin.add_user')->with('error', 'Berhasil ditambahkan!');
    }
}
