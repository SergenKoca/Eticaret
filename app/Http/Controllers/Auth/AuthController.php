<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function controlAdmin(){
        $user = auth()->user();

        if($user->role == 0 || $user->role == 1){
            return redirect()->route('name_front.home');
        }
        else{
            return view('admin.main');
        }
    }
}
