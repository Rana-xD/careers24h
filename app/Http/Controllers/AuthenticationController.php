<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use \App\Utils\Utils;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\signUpRequest;
use App\Models\User;


class AuthenticationController extends Controller
{
    
    public function showSignUpForm(Request $request){
        return view('pages.signup');
    }

    public function signUp(signUpRequest $request){
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        $validated['uuid'] = Str::random(8);
        User::create($validated);
        return "DONE";
    }

    public function showloginForm(Request $request){
        return view('pages.login');
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect('/');
        }
        return "NOT";
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }
}
