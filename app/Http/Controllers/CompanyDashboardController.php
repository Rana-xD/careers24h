<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\CompanyProfile;
use App\Models\JobseekerProfile;
use App\Models\JobUser;
use Twilio\Rest\Client;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VideoGrant;

class CompanyDashboardController extends Controller
{
    protected $sid;
    protected $token;
    protected $key;
    protected $secret;   

    public $default_logo = "https://careers24h.s3-ap-southeast-1.amazonaws.com/defaul_logo.jpg";

    public function __construct()
    {
        $this->team_size = config('global.team_size');
        $this->city = config('global.city');
        $this->industry = config('global.industry');
        $this->sid = config('services.twilio.sid');
        $this->token = config('services.twilio.token');
        $this->key = config('services.twilio.key');
        $this->secret = config('services.twilio.secret');
    }

    public function showProfile(){

        $company = Auth::user()->CompanyProfile;
        
        return view('company.dashboard.Profile',[
            'city' => $this->city,
            'team_size' => $this->team_size,
            'industry' => $this->industry,
            'company_profile' => $company
        ]);
    }

    public function showAccountSetting(){
        return view('company.dashboard.AccountSetting');
    }

    public function showJobAlert(){
        return view('company.dashboard.JobAlert');
    }

    public function showManageJob(){
        $jobs = Auth::user()->CompanyProfile->jobs;
        return view('company.dashboard.ManageJob',[
            'jobs' => $jobs
        ]);
    }

    public function showPackage(){
        return view('company.dashboard.Package');
    }

    public function showJobForm(){
        return view('company.dashboard.NewJob');
    }

    public function showResume(){
        return view('company.dashboard.Resume');
    }

    public function showTransaction(){
        return view('company.dashboard.Transaction');
    }

    public function showApplicant(){
        $jobs = Auth::user()->CompanyProfile->jobs;
        return view('company.dashboard.Applicant',[
            'jobs' => $jobs
        ]);
    }

    public function showInterviewRoom(){
        $jobs = Auth::user()->CompanyProfile->jobs;
        return view('company.dashboard.InterviewRoom',[
            'jobs' => $jobs
        ]);
    }

    // public function getCoverLetter(Request $request){
    //     $cover_letter = JobseekerProfile::find($request->profileId)->pluck('cover_letter')[0];
    //     if(empty($cover_letter)){
    //         return response()->json([
    //             'code' => 500,
    //             'message' => "This applicant does not have Cover Letter",
    //         ]);
    //     }
    //     $html_render = view('layouts.cover_letter_modal',[
    //         'cover_letter' => $cover_letter
    //     ])->render();
    //     return response()->json([
    //         'code' => 200,
    //         'message' => "Success",
    //         'html_render' => $html_render
    //     ]);
    // }

    public function getVideoCV(Request $request){
        if(empty(JobseekerProfile::find($request->profileId)->video)){
            return response()->json([
                'code' => 500,
                'message' => "This applicant does not have Video CV",
            ]);
        }
        $video_cv = JobseekerProfile::find($request->profileId)->video->url;
        
        $html_render = view('layouts.video_cv_modal',[
            'video_cv' => $video_cv
        ])->render();
        return response()->json([
            'code' => 200,
            'message' => "Success",
            'html_render' => $html_render
        ]);
    }

    public function getResume(Request $request){
        $resume = JobseekerProfile::find($request->profileId);
        $html_render = view('layouts.resume_modal',[
            'applicant' => $resume,
            'educations' => $resume->education,
            'work_experience' => $resume->work_experience,
            'skillset' => $resume->skillset,
            'achievement' => $resume->achievement
        ])->render();
        return response()->json([
            'code' => 200,
            'message' => "Success",
            'html_render' => $html_render
        ]);
    }

    public function acceptApplicant(Request $request){
        $id = $request->id;
        JobUser::find($id)->update(['status' => 'Accept','interview_date' => null, 'is_online' => 0, 'room_name' => null]);
        return response()->json([
            'code' => 200,
            'message' => "Success"
        ]);
    }

    public function rejectApplicant(Request $request){
        $id = $request->id;
        JobUser::find($id)->update(['status' => 'Reject','interview_date' => null, 'is_online' => 0, 'room_name' => null]);
        return response()->json([
            'code' => 200,
            'message' => "Success"
        ]);
    }

    public function setInterviewDate(Request $request){
        $data = $request->except('id');
        $room = JobUser::find($request->id);
        if($data['is_online'] && empty($room->room_name)){
            $room_name = "https://meet.jit.si/"."Career24h".Str::random(5);
            $data['room_name'] = $room_name;
        }
        JobUser::find($request->id)->update($data);
        return response()->json([
            'code' => 200,
            'message' => "Success",
            'data' => $room
        ]);
    }
    public function updatePassword(Request $request){

        $old_password = $request->old_password;
        $new_password = $request->new_password;
        $confirm_password = $request->confirm_password;

        if(!Hash::check($old_password,Auth::user()->password)){
            return response()->json([
                'code' => 505,
                'message' => "Your old password is incorrect!!"
            ]);
        }

        if($new_password != $confirm_password){
            return response()->json([
                'code' => 505,
                'message' => "Your confirm password does not match!!"
            ]);
        }
        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($new_password);
        $user->save();
        return response()->json([
            'code' => 200,
            'message' => "You have updated the password"
        ]);
        
    }

    public function updateAccount(Request $request){
        $username = $request->username;
        $email = $request->email;
        $phone_number = $request->phone_number;

        if($username != Auth::user()->username){
            $exist = User::where('username',$username)->get();
            if(count($exist)){
                return response()->json([
                    'code' => 505,
                    'message' => "That username is already taken"
                ]);
            }
        }

        if($email != Auth::user()->email){
            $exist = User::where('email',$email)->get();
            if(count($exist)){
                return response()->json([
                    'code' => 505,
                    'message' => "That email is already taken"
                ]);
            }
        }

        if($phone_number != Auth::user()->phone_number){
            $exist = User::where('phone_number',$phone_number)->get();
            if(count($exist)){
                return response()->json([
                    'code' => 505,
                    'message' => "That phone number is already taken"
                ]);
            }
        }
        User::find(Auth::user()->id)->update(['username' => $username, 'email' => $email,'phone_number' => $phone_number]);
        return response()->json([
            'code' => 200,
            'message' => "You have updated the account Info"
        ]);
    }

    public function updateProfile(Request $request){
        $data = $request->except(['_token','image']);

        if($request->has('image')){
            if(Auth::user()->companyProfile->company_logo != $this->default_logo){
                $path = 'Companylogo/'.basename(Auth::user()->companyProfile->company_logo);
                if(Storage::disk('s3')->exists($path)){
                    Storage::disk('s3')->delete($path);
                }
            }
            $image = $request->image;  // your base64 encoded
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(32) . '.png';
            $path = Storage::disk('s3')->put('Companylogo/'.$imageName, base64_decode($image));
            $url = Storage::disk('s3')->url('Companylogo/'.$imageName);
            $data['company_logo'] = $url;
        }
        
        Auth::user()->companyProfile()->update($data);
        
        return response()->json([
            'code' => 200,
            'message' => "Success"
        ]);
    }



}
