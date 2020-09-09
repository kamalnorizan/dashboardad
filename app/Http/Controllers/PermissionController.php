<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::paginate(10);
        // $permissions_checkboxs = Permission::all(10);
        $permission_opts = Permission::pluck('name','id');
        $permission_opts['Semua'] = 'Semua Permission';
        $permission_opts[0] = 'Sila pilih permission';

        return view('permission.index',compact('permissions','roles','permission_opts'));
    }

    public function storepermission(Request $request)
    {
        Permission::create(['name'=> $request->permission]);

        flash('Permission telah berjaya direkodkan')->success()->important();

        return back();
    }

    public function storerole(Request $request)
    {
        Role::create(['name'=> $request->role]);

        flash('Role telah berjaya direkodkan')->success()->important();

        return back();
    }

    public function beripermissiontorole(Request $request)
    {
        $role = Role::find($request->role);
        $permissions= $request->checkbox_permission;
        if (($key = array_search('Semua', $permissions)) !== false) {
            unset($permissions[$key]);
        }
        $role->syncPermissions($permissions);
        flash('Permission telah berjaya diberikan kepada role')->success()->important();

        return back();
    }

    public function assignpermissiontorole(Role $role, $permission)
    {
        if($permission == 'Semua'){
            $permissions = Permission::all();
            foreach ($permissions as $key => $permission) {
                $role->givePermissionTo($permission);
            }
        }else{
            $role->givePermissionTo($permission);
        }

        flash('Permission telah berjaya diberikan kepada role')->success()->important();

        return back();
    }

    public function revokepermissionfromrole (Role $role, Permission $permission)
    {
        $role->revokePermissionTo($permission->id);
        flash('Permission telah berjaya dibuang dari role')->error()->important();
        return back();
    }

    public function checkpermission (Role $role)
    {
        $permissions = $role->permissions;
        return $permissions;
    }

    public function resetrolepermissions(Role $role)
    {
        $role->syncPermissions([]);
        flash('Role Permissions telah berjaya direset.')->success()->important();
        return back();
    }
}
