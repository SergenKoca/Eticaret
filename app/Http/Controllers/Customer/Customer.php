<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Customer extends Controller
{
    public function register_show(){
        return view('Front.Customer.Register');
    }
    public function register(){
        $customer = \App\Models\Customer\Customer::create([
           'name' => \request('name'),
            'email' =>  \request('email'),
            'password' => \request('password')
        ]);

        return redirect()->route('name_front.home');
    }


}
