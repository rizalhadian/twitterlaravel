<?php

namespace App\Http\Controllers;

use App\Users;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ContrAuth extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    
    public function authenticate(Request $req){
        $credentials = $req->only('email', 'password');

        if(Auth::attempt($credentials)){
            
            return redirect('home');
        }
    }
    
    public function logout(){
        Auth::logout();
        return redirect('login');

    }



    
}