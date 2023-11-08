<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::whereNotIn('name', ['admin'])->get(); //Helps to hide the admin role from the list
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3']
        ]);
        Role::create($validated);

        return redirect()->route('admin.roles.index');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3']
        ]);
        $role->update($validated);

        $notification = array(
            'message' => 'Role Updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.roles.index')->with($notification);
    }

    public function destroy(Role $role)
    {
        $role->delete();

        $notification = array(
            'message' => 'Role Deleted successfully',
            'alert-type' => 'danger'
        );

        return redirect()->route('admin.roles.index')->with($notification);
    }

    public function givePermission(Request $request, Role $role)
    {
        if ($role->hasPermissionTo($request->permission)) {
            $notification = array(
                'message' => 'Permission Exists',
                'alert-type' => 'danger'
            );

            return redirect()->back()->with($notification);
        }
        $role->givePermissionTo($request->permission);
        $notification = array(
            'message' => 'Permission Added Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function revokePermission(Role $role, Permission $permission){
        if($role->hasPermissionTo($permission)){
            $role->revokePermissionTo($permission);

            $notification = array(
                'message' => 'Permission Revoked',
                'alert-type' => 'danger'
            );

            return redirect()->back()->with($notification);
        }
        $notification = array(
            'message' => 'Permission Does Not Exist',
            'alert-type' => 'danger'
        );

        return redirect()->back()->with($notification);
    }
}
