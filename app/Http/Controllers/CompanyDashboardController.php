<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\CompanyProfile;
use App\Models\JobseekerProfile;
use App\Models\JobUser;

class CompanyDashboardController extends Controller
{
    
    public $default_logo = "https://careers24h.s3-ap-southeast-1.amazonaws.com/defaul_logo.jpg";

    public function __construct()
    {
        $this->team_size = config('global.team_size');
        $this->city = config('global.city');
    }

    public function showProfile(){

        $company = Auth::user()->CompanyProfile;
        
        return view('company.dashboard.Profile',[
            'city' => $this->city,
            'team_size' => $this->team_size,
            'company_profile' => $company
        ]);
    }

    public function showChangePassword(){
        return view('company.dashboard.ChangePassword');
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

    public function getCoverLetter(Request $request){
        $cover_letter = JobseekerProfile::find($request->profileId)->pluck('cover_letter')[0];
        if(empty($cover_letter)){
            return response()->json([
                'code' => 500,
                'message' => "This applicant does not have Cover Letter",
            ]);
        }
        $html_render = view('layouts.cover_letter_modal',[
            'cover_letter' => $cover_letter
        ])->render();
        return response()->json([
            'code' => 200,
            'message' => "Success",
            'html_render' => $html_render
        ]);
    }

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
        JobUser::find($id)->update(['status' => 'Accept']);
        return response()->json([
            'code' => 200,
            'message' => "Success"
        ]);
    }

    public function rejectApplicant(Request $request){
        $id = $request->id;
        JobUser::find($id)->update(['status' => 'Reject']);
        return response()->json([
            'code' => 200,
            'message' => "Success"
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

    public function updateProfile(Request $request){
        $data = $request->except(['_token','file']);

        if($request->hasFile('file')){
            $rules = array('file' => 'file|image|mimes:jpeg,png,webp,svg|max:1000');
            $validator = Validator::make( $request->file(), $rules);
            if($validator->fails()){
                return response()->json([
                    'code' => 505,
                    'message' => json_encode($validator->getMessageBag()->toArray())
                ]);
            }
            if(Auth::user()->companyProfile->company_logo != $this->default_logo){
                $path = 'Companylogo/'.basename(Auth::user()->companyProfile->company_logo);
                if(Storage::disk('s3')->exists($path)){
                    Storage::disk('s3')->delete($path);
                }
            }
            $path = Storage::disk('s3')->put('Companylogo', $request->file('file'));
            $url = Storage::disk('s3')->url($path);
            $data['company_logo'] = $url;
        }
        
        Auth::user()->companyProfile()->update($data);
        
        return response()->json([
            'code' => 200,
            'message' => "Success"
        ]);
    }



}
