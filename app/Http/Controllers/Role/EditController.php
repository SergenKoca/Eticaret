<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class EditController extends Controller
{
    public function editRole(Request $request){
        $role = Roles::find($request->role_id);
        View::share('role',$role);
        return view('admin.Roles.edit_role');
    }
    public function editRolePost(Request $request){
        $role = Roles::find($request->role_id);
        $role->title = $request->input('title');
        $role->order = $request->input('order');

        $role->save();

        return redirect()->route('role.roleController');
    }

    public function editUserRole(Request $request){
        $roles = Roles::all();
        $userRole = User::find($request->user_id);
        View::share('roles',$roles);
        View::share('userRole',$userRole);
        return view('admin.Roles.edit_user_role');
    }

    public function editUserRolePost(Request $request){
        $userRole = User::find($request->user_id);
        $userRole->role = $request->input('role_id');
        $userRole->save();
        return redirect()->route('role.roleController.getUserRoleList');
    }
}
