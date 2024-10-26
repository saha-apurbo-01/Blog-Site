<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
   function role_manager(){
        $permissions = Permission::all();
        $roles = Role::all();
        $users = User::all();
        return view('admin.role.role_manager', [
         'permissions'=> $permissions,
         'roles'=> $roles,
         'users'=> $users,
        ]);
   }
   function permission_store(Request $request){
        $permission = Permission::create(['name' => $request->permission_name]);
        return back();
   }
   function role_store(Request $request){
      $role = Role::create(['name' => $request->role_name]);
      $role->givePermissionTo($request->permission);
      return back();
   }
   function role_assign(Request $request){
      $user = User::find($request->user_id);
      $user->assignRole($request->role);
      

      return back();
   }
}
