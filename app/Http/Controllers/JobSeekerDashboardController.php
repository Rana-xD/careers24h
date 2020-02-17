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

    public function __construct()
    {
        $this->industry = config('global.categories');
        $this->education_level = config('global.education_level');
        $this->career_level = config('global.career_level');
        $this->city = config('global.city');
    }

    public function showProfile(){
        
        $jobseeker = Auth::user()->JobseekerProfile;

        $education_level = config('global.education_level');
        $career_level = config('global.career_level');
        $city = config('global.city');
        $industry = config('global.industry');
        
        return view('jobseeker.dashboard.Profile',[
            'education_level' => $this->education_level,
            'career_level' => $this->career_level,
            'city' => $this->city,
            'industry' => $this->industry,
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
        $educations = Auth::user()->jobseekerProfile->education;
        $work_experience = Auth::user()->jobseekerProfile->work_experience;
        $skillset = Auth::user()->jobseekerProfile->skillset;
        $achievement = Auth::user()->jobseekerProfile->achievement;
        return view('jobseeker.dashboard.Resume',[
            'educations' => $educations,
            'work_experience' => $work_experience,
            'skillset' => $skillset,
            'achievement' => $achievement
        ]);
    }
    public function showAddResumeForm(){
        return view('jobseeker.dashboard.AddNewResume');
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

    public function addEducation(Request $request){
        $data = $request->all();
        if(empty(Auth::user()->jobseekerProfile->education)){
            $education = array();
            array_push($education,$data['education']);
            $data['education'] = $education;
            Auth::user()->jobseekerProfile()->update($data);
            return response()->json([
                'code' => 200,
                'message' => 'Successfully add education'
            ]);
        }
        $education = Auth::user()->jobseekerProfile->education;
        array_push($education,$data['education']);
        $data['education'] = $education;
        Auth::user()->jobseekerProfile()->update($data);
        return response()->json([
            'code' => 200,
            'message' => 'Successfully add education'
        ]);
        
    }

    public function addWorkExperience(Request $request){
        $data = $request->all();
        if(empty(Auth::user()->jobseekerProfile->work_experience)){
            $work_experience = array();
            array_push($work_experience,$data['work_experience']);
            $data['work_experience'] = $work_experience;
            Auth::user()->jobseekerProfile()->update($data);
            return response()->json([
                'code' => 200,
                'message' => 'Successfully add work experience'
            ]);
        }
        $work_experience = Auth::user()->jobseekerProfile->work_experience;
        array_push($work_experience,$data['work_experience']);
        $data['work_experience'] = $work_experience;
        Auth::user()->jobseekerProfile()->update($data);
        return response()->json([
            'code' => 200,
            'message' => 'Successfully add work experience'
        ]);
    }

    public function addSkillset(Request $request){
        $data = $request->all();
        if(empty(Auth::user()->jobseekerProfile->skillset)){
            $skillset = array();
            array_push($skillset,$data['skillset']);
            $data['skillset'] = $skillset;
            Auth::user()->jobseekerProfile()->update($data);
            return response()->json([
                'code' => 200,
                'message' => 'Successfully add skillset'
            ]);
        }
        $skillset = Auth::user()->jobseekerProfile->skillset;
        array_push($skillset,$data['skillset']);
        $data['skillset'] = $skillset;
        Auth::user()->jobseekerProfile()->update($data);
        return response()->json([
            'code' => 200,
            'message' => 'Successfully add skillset'
        ]);
    }

    public function addAchievement(Request $request){
        $data = $request->all();
        if(empty(Auth::user()->jobseekerProfile->achievement)){
            $achievement = array();
            array_push($achievement,$data['achievement']);
            $data['achievement'] = $achievement;
            Auth::user()->jobseekerProfile()->update($data);
            return response()->json([
                'code' => 200,
                'message' => 'Successfully add achievement'
            ]);
        }
        $achievement = Auth::user()->jobseekerProfile->achievement;
        array_push($achievement,$data['achievement']);
        $data['achievement'] = $achievement;
        Auth::user()->jobseekerProfile()->update($data);
        return response()->json([
            'code' => 200,
            'message' => 'Successfully add achievement'
        ]);
    }
}

