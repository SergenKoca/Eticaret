<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class roleController extends Controller
{
    public function createRole(){
        return view('admin.Roles.create_role');
    }
    public function createRolePost(Request $request){
        $role = new Roles();
        $role->title = $request->input('title');
        $role->order = $request->input('order');

        $role->save();

        return redirect()->route('role.roleController');
    }
    public function getRoleList(){
        $roles = Roles::all();
        View::share('roles',$roles);
        return view('admin.Roles.roles_list');
    }
    public function getUserRoleList(){
        $users = User::all();
        View::share('users',$users);
        return view('admin.Roles.user_role');
    }


}
