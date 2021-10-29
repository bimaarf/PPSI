<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RoleModel;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        if($request->has('search')){
            $users = User::where('name', 'LIKE', '%'.$request->search. '%')->simplePaginate(5);
        }else{
            $users = User::orderBy('id', 'ASC')->simplePaginate(5);
        }
        $role_user = RoleUser::get();
        $role = Role::all();
        return view('admin.index', compact('role_user' ,'users', 'role'));
    }

    public function addUser()
    {
        $permission = Permission::all();
        $roles = RoleModel::all();
        return view('admin.add_user', compact('permission', 'roles'));
    }
}
