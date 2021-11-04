<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\PermissionUser;
use App\Models\Role;
use App\Models\RoleModel;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserStatus;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $permission_user = PermissionUser::all();
        $tAdmin = DB::table('role_user')->where('role_id', 1)->count();
        $tDriver = DB::table('role_user')->where('role_id', 2)->count();
        $tShipper = DB::table('role_user')->where('role_id', 3)->count();
        return view('admin.index', compact('permission_user', 'tAdmin', 'tDriver', 'tShipper'));
    }

    public function daftarDriver(Request $request)
    {
        if($request->has('search')){
            $users = User::where('name', 'LIKE', '%'.$request->search. '%')->simplePaginate(5);
        }else{
            $users = User::orderBy('id', 'ASC')->simplePaginate(5);
        }
        $i = 1;
        $role_user = RoleUser::get();
        $role = Role::all();
        $permission_user = PermissionUser::all();
        $users_status = UserStatus::all();
        return view('admin.table_driver', compact('i','role_user' ,'users', 'role', 'permission_user', 'users_status'));
    }

    public function daftarShipper(Request $request)
    {
        if($request->has('search')){
            $users = User::where('name', 'LIKE', '%'.$request->search. '%')->simplePaginate(5);
        }else{
            $users = User::orderBy('id', 'ASC')->simplePaginate(5);
        }
        $i = 1;
        $role_user = RoleUser::get();
        $role = Role::all();
        $permission_user = PermissionUser::all();
        return view('admin.table_shipper', compact('i','role_user' ,'users', 'role', 'permission_user'));
    }

    public function addUser()
    {
        $permission = Permission::all();
        $roles = RoleModel::all();
        return view('admin.add_user', compact('permission', 'roles'));
    }
    public function editUser(Request $request, $id)
    {
        $users = User::find($id);
        $users->status_id = $request->status_id;
        $users->update();
        return back()->with('success', 'Data berhasil diubah!');
    }
}
