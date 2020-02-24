<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use \App\Utils\Utils;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\signUpRequest;
use App\Models\User;
use App\Models\CompanyProfile;
use App\Models\JobseekerProfile;


class AuthenticationController extends Controller
{
    
    public function showSignUpForm(Request $request){
        return view('pages.signup');
    }

    public function signUp(signUpRequest $request){
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        $validated['uuid'] = Str::random(8);
        session(['user' => $validated]);
        return redirect('/profile');
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
        return back()->with('message','Incorrect Credentials ');
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }

    public function showProfile(){

        $user = session('user',0);
        if($user){
            $profile = $user['role'] === 'COMPANY' ?  'https://careers24h.s3-ap-southeast-1.amazonaws.com/defaul_logo.jpg' : 'https://careers24h.s3-ap-southeast-1.amazonaws.com/defaul_profile.png';
            return view('pages.Profile',[
                'profile' => $profile,
                'role' => $user['role']
            ]);
        }
        return redirect('/signup');
        
    }

    public function signupWithoutProfile(){
        $user = session('user',0);
        session()->forget('user');
        $user = User::create($user);
        if($user->role == "COMPANY"){
            $company_profile = new CompanyProfile;
            $company_profile->user_id = $user->id;
            $company_profile->uuid =  Str::random(8);
            $company_profile->save();
        }else{
            $company_profile = new JobseekerProfile;
            $company_profile->user_id = $user->id;
            $company_profile->uuid =  Str::random(8);
            $company_profile->save();
        }
        Auth::login($user);
        $url = env('APP_URL');
        return response()->json([
            'code' => 200,
            'message' => 'Successfully create user',
            'url' => $url
        ]);
    }

    public function signupWithProfile(Request $request){

        $data = $request->except(['_token','file']);
        $session_user = session('user',0);

        if($session_user['role'] == "COMPANY"){
            if($request->hasFile('file')){
                $rules = array('file' => 'file|image|mimes:jpeg,png,webp,svg|max:1000');
                $validator = Validator::make( $request->file(), $rules);
                if($validator->fails()){
                    return response()->json([
                        'code' => 505,
                        'message' => json_encode($validator->getMessageBag()->toArray())
                    ]);
                }
                $path = Storage::disk('s3')->put('Companylogo', $request->file('file'));
                $url = Storage::disk('s3')->url($path);
                $data['company_logo'] = $url;
            }
            $user = User::create($session_user);
            $data['user_id'] = $user->id;
            $data['uuid'] = Str::random(8);
            CompanyProfile::create($data);
        }else{
            if($request->hasFile('file')){
                $rules = array('file' => 'file|image|mimes:jpeg,png,webp,svg|max:1000');
                $validator = Validator::make( $request->file(), $rules);
                if($validator->fails()){
                    return response()->json([
                        'code' => 505,
                        'message' => json_encode($validator->getMessageBag()->toArray())
                    ]);
                }
                $path = Storage::disk('s3')->put('jobseekerProfile', $request->file('file'));
                $url = Storage::disk('s3')->url($path);
                $data['user_profile'] = $url;
            }
            $user = User::create($session_user);
            $data['user_id'] = $user->id;
            $data['uuid'] = Str::random(8);
            JobseekerProfile::create($data);
        }
        Auth::login($user);
        session()->forget('user');
        $url = env('APP_URL');
        return response()->json([
            'code' => 200,
            'message' => 'Successfully create user',
            'url' => $url
        ]);
    }
}
