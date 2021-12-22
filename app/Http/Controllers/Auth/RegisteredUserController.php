<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\DriverArmada;
use App\Models\DriverJalur;
use App\Models\DriverKendaraan;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Permission;
use App\Models\Role;
use App\Models\RoleModel;
use App\Models\Zone;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $zone = Zone::get();
        $roles = RoleModel::all();
        return view('akun.register', compact('roles', 'zone'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'telp'      => ['required',  'integer'],
            'alamat'    => ['required', 'string', 'max:255'],
        ]);
        if($request->role == 'driver')
        {
            $status_id  =   2;
        }else{
            $status_id  =   1;
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telp'    => $request->telp,
            'alamat'    => $request->alamat,
            'status_id' => $status_id,
            'avatar'    => 'Shipper.svg',
        ]);
        
        $role = $request->role;
        $user->attachRole($role);
        event(new Registered($user));
        if($user->hasRole('driver'))
        {
            DriverJalur::insert([
                'user_id' =>  $user->id,
            ]);
            DriverArmada::insert([
                'user_id' =>  $user->id,
            ]);
            DriverKendaraan::insert([
                'driver_id' => $user->id,
            ]);
        }
        Auth::login($user);
        if ($user->hasRole('admin|super-admin')) {
            return redirect()->route('admin.index');
        }
        if ($user->hasRole('driver')) {
            return redirect()->route('driver.index');
        }
        if ($user->hasRole('shipper')) {
            return redirect()->route('user.index');
        }
    }
}
