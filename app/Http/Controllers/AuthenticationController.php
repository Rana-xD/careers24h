<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use \App\Utils\Utils;
use Illuminate\Support\Facades\DB;

class AuthenticationController extends Controller
{
    
    public function showSignUpForm(Request $request){
        return view('pages.signup');
    }

    public function signUp(Request $request){
        
        return $request->all();
    }

    public function showloginForm(Request $request){
        return view('pages.login');
    }

    public function login(Request $request){

    }

    public function logout(Request $request){

    }
}
