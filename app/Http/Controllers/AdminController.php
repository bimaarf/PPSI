<?php

namespace App\Http\Controllers;

use App\Models\AdminActivity;
use App\Models\Kategori;
use App\Models\Permission;
use App\Models\PermissionUser;
use App\Models\Role;
use App\Models\RoleModel;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class AdminController extends Controller
{
    public function dashboard()
    {
        $permission_user = PermissionUser::all();
        $tAdmin   = User::whereRoleIs(['admin'])
                        ->count();
        $tDriver  = User::whereRoleIs(['driver'])
                        ->count();  
        $tShipper = User::whereRoleIs(['shipper'])
                        ->count();
        $tChecker = User::whereRoleIs(['feed-manager'])
                        ->count();
        $activity = AdminActivity::orderBy('id', 'DESC')->get();
      
        return view('admin.index', compact('permission_user', 'tAdmin', 'tDriver', 'tShipper', 'tChecker', 'activity'));
    }
    public function akunSaya()
    {
        $permission_user = PermissionUser::all();
       
        return view('admin.akun_saya', compact('permission_user'));
    }

    public function daftarAdmin(Request $request)
    {
        
        if($request->has('search')){
            $users = User::where('name', 'LIKE', '%'.$request->search. '%')->whereRoleIs([$request->role])->simplePaginate(10);
        }else{
            $users = User::whereRoleIs(['admin'])->simplePaginate(10);
        }

        
        $i = 1;
        $role_user = RoleUser::get();
        $role = Role::all();
        $permission_user = PermissionUser::all();
        $users_status = UserStatus::all();
        $permissions = Permission::all();
        $roles = Role::all();
        return view('admin.table_admin', compact('i','role_user' ,'users', 'role', 'permission_user', 'users_status', 'permissions', 'roles'));
    }

    public function daftarDriver(Request $request)
    {
        
        if($request->has('search')){
            $users = User::where('name', 'LIKE', '%'.$request->search. '%')->whereRoleIs(['driver'])->simplePaginate(10);
        }else{
            $users = User::orderBy('id', 'ASC')->whereRoleIs(['driver'])->simplePaginate();
        }
        $role_user = RoleUser::where('role_id', 3)->get();
        $i = 1;
        $role = Role::all();
        $permission_user = PermissionUser::all();
        $users_status = UserStatus::all();
        return view('admin.table_driver', compact('i','role_user' ,'users', 'role', 'permission_user', 'users_status'));
    }

    public function daftarShipper(Request $request)
    {
        if($request->has('search')){
            $users = User::where('name', 'LIKE', '%'.$request->search. '%')->whereRoleIs(['shipper'])->simplePaginate(10);
        }else{
            $users = User::orderBy('id', 'ASC')->whereRoleIs(['shipper'])->simplePaginate();
        }
        $i = 1;
        $role_user = RoleUser::get();
        $role = Role::all();
        $permission_user = PermissionUser::all();
        $users_status = UserStatus::all();
        return view('admin.table_shipper', compact('i','role_user' ,'users', 'role', 'permission_user', 'users_status'));
    }

    public function addUser()
    {
        $permission = Permission::all();
        return view('admin.add_user', compact('permission'));
    }
    public function editAdmin(Request $request, $id)
    {
        $users = User::find($id);
        $users->status_id = $request->status_id;
        
        if(!empty($request->permissions))
        {
            $users->update();
            $permission = PermissionUser::all();
    
            foreach($permission->where('user_id', $users->id) as $permis)
            {
                $users->detachPermissions([$permis]);
            }
    
            $permissions = json_encode($request->permissions);
            foreach(json_decode($permissions) as $permission)
            {
                $users->attachPermissions([$permission]);
            }
        }else{
            $users->update();
            $permission = PermissionUser::all();
    
            foreach($permission->where('user_id', $users->id) as $permis)
            {
                $users->detachPermissions([$permis]);
            }
        }
        
        return back()->with('success', 'Data admin berhasil diubah!');
    }
    public function editDriver(Request $request, $id)
    {
        $users = User::find($id);
        $users->status_id = $request->status_id;
        $users->update();
        return back()->with('success', 'Data berhasil diubah!');
    }
    public function editShipper(Request $request, $id)
    {
        $users = User::find($id);
        $users->status_id = $request->status_id;
        $users->update();
        return back()->with('success', 'Data berhasil diubah!');
    }
  
}
