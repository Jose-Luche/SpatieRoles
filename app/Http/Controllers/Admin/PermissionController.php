<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;


class PermissionController extends Controller
{
    public function index()
    {
        $permission = Permission::all();
        return view('admin.permissions.index', compact('permission'));
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        $permission = new Permission;
        $permission->name = $request->name;

        $permission->save();

        return redirect()->route('admin.permissions.index');
    }

    public function edit($id)
    {
        $permissions = Permission::findorFail($id);
        $roles = Role::all();
        return view('admin.permissions.edit', compact('permissions', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $permission = Permission::findorFail($id);
        $permission->name = $request->name;

        $permission->save();

        $notification = array(
            'message' => 'Permission Updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.permissions.index')->with($notification);
    }

    public function assignRole(Request $request, Permission $permission)
    {
        if ($permission->hasRole($request->role)) {
            $notification = array(
                'message' => 'Role Exists',
                'alert-type' => 'info'
            );

            return redirect()->back()->with($notification);
        }
        $permission->assignRole($request->role);
        $notification = array(
            'message' => 'Role Assigned',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function removeRole(Permission $permission, Role $role)
    {
        if ($permission->hasRole($role)) {
            $permission->removeRole($role);
            $notification = array(
                'message' => 'Role Removed',
                'alert-type' => 'danger'
            );

            return redirect()->back()->with($notification);
        }

        $notification = array(
            'message' => 'Role Exists',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
