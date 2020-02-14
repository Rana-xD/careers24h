<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\JobseekerProfile;

class JobSeekerDashboardController extends Controller
{

    public $defual_profile = 'https://careers24h.s3-ap-southeast-1.amazonaws.com/defaul_profile.png';

    public function showProfile(){
        
        $jobseeker = Auth::user()->JobseekerProfile;

        $education_level = $jobseeker->getEducationLevel();
        $career_level = $jobseeker->getCareerLevel();
        $city = $jobseeker->getCity();
        $industry = $jobseeker->getIndustries();
        
        return view('jobseeker.dashboard.Profile',[
            'education_level' => $education_level,
            'career_level' => $career_level,
            'city' => $city,
            'industry' => $industry,
            'jobseeker_profile' => $jobseeker
        ]);
    }

    public function showAppliedJob(){
        return view('jobseeker.dashboard.AppliedJob');
    }

    public function showCoverLetter(){
        $coverLetter = Auth::user()->JobseekerProfile->pluck('cover_letter');
        return view('jobseeker.dashboard.CVCoverLetter',[
            'coverLetter' => $coverLetter[0]
        ]);
    }

    public function showJobNotify(){
        return view('jobseeker.dashboard.JobAlert');
    }

    public function showResume(){
        return view('jobseeker.dashboard.Resume');
    }

    public function showShortlist(){
        return view('jobseeker.dashboard.Shortlist');
    }

    public function showChangePassoword(){
        return view('jobseeker.dashboard.ChangePassword');
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
            if(Auth::user()->jobseekerProfile->user_profile != $this->defual_profile){
                $path = 'jobseekerProfile/'.basename(Auth::user()->jobseekerProfile->user_profile);
                if(Storage::disk('s3')->exists($path)){
                    Storage::disk('s3')->delete($path);
                }
            }
            $path = Storage::disk('s3')->put('jobseekerProfile', $request->file('file'));
            $url = Storage::disk('s3')->url($path);
            $data['user_profile'] = $url;
        }
        Auth::user()->jobseekerProfile()->update($data);
        return response()->json([
            'code' => 200,
            'message' => "You have updated the profile"
        ]);
    }

    public function updateCoverLetter(Request $request){
        $data = $request->except('_token');
        Auth::user()->jobseekerProfile()->update($data);
        return response()->json([
            'code' => 200,
            'message' => "You have updated the password"
        ]);
    }
}

