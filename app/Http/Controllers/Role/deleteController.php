<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class deleteController extends Controller
{
    public function delete(Request $request){
        $userRole = User::find($request->user_id);
        $userRole->delete();
        return redirect()->route('role.roleController.getUserRoleList');
    }
}
