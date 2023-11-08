<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function __construct()
    {
        //$this->messageUtil = $messageUtil;

      //  $this->middleware('permission:sysuser-list|sysuser-create|sysuser-edit|sysuser-delete', ['only' => ['index','store']]);
         //$this->middleware('permission:user-create', ['only' => ['create','store']]);
         //$this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         //$this->middleware('permission:sysuser-reset', ['only' => ['resetpasswordsu']]);
         //$this->middleware('permission:sysuser-activate', ['only' => ['destroy']]);
         //$this->middleware('permission:user-delete', ['only' => ['deleteUser']]);
    }

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.users.role', compact('user', 'roles', 'permissions'));
    }

    public function create(){
        
        return view('admin.users.create');
    }

    public function store(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();
        $notification = array(
            'message' => 'User Created Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('admin.users.index')->with($notification);
    }

    public function assignRole(Request $request, User $user)
    {
        if ($user->hasRole($request->role)) {
            $notification = array(
                'message' => 'Role Exists',
                'alert-type' => 'info'
            );

            return redirect()->back()->with($notification);
        }
        $user->assignRole($request->role);
        $notification = array(
            'message' => 'Role Assigned',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function removeRole(User $user, Role $role)
    {
        if ($user->hasRole($role)) {
            $user->removeRole($role);
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

    public function givePermission(Request $request, User $user)
    {
        if ($user->hasPermissionTo($request->permission)) {
            $notification = array(
                'message' => 'Permission Exists',
                'alert-type' => 'danger'
            );

            return redirect()->back()->with($notification);
        }
        $user->givePermissionTo($request->permission);
        $notification = array(
            'message' => 'Permission Added Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function revokePermission(User $user, Permission $permission)
    {
        if ($user->hasPermissionTo($permission)) {
            $user->revokePermissionTo($permission);

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

    public function destroy(User $user){
        if($user->hasRole('admin')){
            $notification = array(
                'message' => 'You are a System Admin',
                'alert-type' => 'info'
            );

            return redirect()->back()->with($notification); 
        }
        $user->delete();

        $notification = array(
            'message' => 'User Deleted',
            'alert-type' => 'danger'
        );

        return redirect()->back()->with($notification); 
    }
}
