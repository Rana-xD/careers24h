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
        
        $remember = $request->remember;
        
        if (Auth::attempt(['username' => $request->login,'password' => $request->password],$remember)) {
            // Authentication passed...
            return redirect('/');
        }elseif (Auth::attempt(['email' => $request->login,'password' => $request->password],$remember)){
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
                'role' => $user['role'],
                'phone_number' => $user['phone_number'],
                'email' => $user['email']
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
            $url ='/company/profile';
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
            $url ='/jobseeker/profile';
        }
        Auth::login($user);
        session()->forget('user');
        return response()->json([
            'code' => 200,
            'message' => 'Successfully create user',
            'url' => $url
        ]);
    }

    public function resetPasswordByEmail()
    {
        return view("pages.ResetPassword");
    }

    public function validateEmail(Request $request)
    {
        $user = User::where('email', request()->input('emailAddress'))->first();
        if (empty($user)) {
            return redirect('/reset-password')->with('message', 'Email Does not existed');
        }
        $token = Str::random(8);
        $user->sendPasswordResetNotification($token);
        return redirect('/login')->with('message', 'Email Send Successfully');
    }

    public function showResetForm(Request $request)
    {
        return view("pages.ShowResetPasswordForm", [ "email" => $request->email ]);
    }

    public function submitResetPassword(Request $request)
    {
        $new_password = $request->new_password;
        $confirm_password = $request->confirm_password;
        $email = $request;
        if($new_password != $confirm_password){
            return redirect()->back()->with('message', 'Your confirm password does not match!!');
        }
        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($new_password);
        $user->save();
        return redirect('/login')->with('message', 'Password Update Successfully');
    }
}
