<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\JobseekerProfile;
use App\Models\JobUser;
use App\Models\Video;
use FFMpeg;
use App\Models\Templates;

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
        $applyJobs = Auth::user()->applyJob;
        return view('jobseeker.dashboard.AppliedJob',[
            'applyJobs' => $applyJobs
        ]);
    }

    public function showInterviewRoom(){
        $interview_jobs = Auth::user()->onlineInterview;
        return view('jobseeker.dashboard.InterviewRoom',[
            'interview_jobs' => $interview_jobs
        ]);
    }
    public function showCoverLetter(){
        // $coverLetter = Auth::user()->JobseekerProfile->pluck('cover_letter');
        $videoCV = Auth::user()->JobseekerProfile->video;
        return view('jobseeker.dashboard.CVCoverLetter',[
            'videoCV' => $videoCV
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

    public function showAccountSetting(){
        return view('jobseeker.dashboard.AccountSetting');
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

    public function deleteEducation(Request $request){
        $index = $request->index;
        $education = Auth::user()->jobseekerProfile->education; 
        array_splice($education,$index,1);
        $data['education'] = $education;

        Auth::user()->jobseekerProfile()->update($data);

        return response()->json([
            'code' => 200,
            'message' => 'Successfully delete education'
        ]);
    }

    public function deleteWorkExperience(Request $request){
        $index = $request->index;
        $work_experience = Auth::user()->jobseekerProfile->work_experience;
        array_splice($work_experience,$index,1);
        $data['work_experience'] = $work_experience;

        Auth::user()->jobseekerProfile()->update($data);

        return response()->json([
            'code' => 200,
            'message' => 'Successfully delete work experience'
        ]);
    }

    public function deleteSkillset(Request $request){
        $index = $request->index;
        $skillset = Auth::user()->jobseekerProfile->skillset;
        array_splice($skillset,$index,1);
        $data['skillset'] = $skillset;
        
        Auth::user()->jobseekerProfile()->update($data);

        return response()->json([
            'code' => 200,
            'message' => $skillset
        ]);
    }

    public function deleteAchievement(Request $request){
        $index = $request->index;
        $achievement = Auth::user()->jobseekerProfile->achievement;
        array_splice($achievement,$index,1);
        $data['achievement'] = $achievement;

        Auth::user()->jobseekerProfile()->update($data);
        return response()->json([
            'code' => 200,
            'message' => 'Successfully delete achievement'
        ]);
    }

    public function updateEducation(Request $request){
        $index = $request->index;
        $update_education = array($request->education);
        $education = Auth::user()->jobseekerProfile->education;
        array_splice($education,$index,1,$update_education);
        $data['education'] = $education;

        Auth::user()->jobseekerProfile()->update($data);
        return response()->json([
            'code' => 200,
            'message' => 'Successfully update education'
        ]);
    }

    public function updateWorkExperience(Request $request){
        $index = $request->index;
        $update_work_experience = array($request->work_experience);
        $work_experience = Auth::user()->jobseekerProfile->work_experience;
        array_splice($work_experience,$index,1,$update_work_experience);
        $data['work_experience'] = $work_experience;

        Auth::user()->jobseekerProfile()->update($data);
        return response()->json([
            'code' => 200,
            'message' => 'Successfully update work experience'
        ]);
    }

    public function updateSkillset(Request $request){
        $index = $request->index;
        $update_skillset = array($request->skillset);
        $skillset = Auth::user()->jobseekerProfile->skillset;
        array_splice($skillset,$index,1,$update_skillset);
        $data['skillset'] = $skillset;

        Auth::user()->jobseekerProfile()->update($data);
        return response()->json([
            'code' => 200,
            'message' => 'Successfully update skillset'
        ]);
    }

    public function updateAchievement(Request $request){
        $index = $request->index;
        $update_achievement = array($request->achievement);
        $achievement = Auth::user()->jobseekerProfile->achievement;
        array_splice($achievement,$index,1,$update_achievement);
        $data['achievement'] = $achievement;

        Auth::user()->jobseekerProfile()->update($data);
        return response()->json([
            'code' => 200,
            'message' => 'Successfully update achievement'
        ]);
    }

    public function uploadVideoCV(Request $request){
        if($request->hasFile('file')){

            $validator = Validator::make($request->file(), [
            'file' => 'mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi,,video/qt | max:30000', 
            ]);
            if($validator->fails()){
             return response()->json([
                    'code' => 505,
                    'message' => json_encode($validator->getMessageBag()->toArray())
                ]);
            }

            $ffprobe = FFMpeg\FFProbe::create([
                'ffmpeg.binaries'  => env('FFMPEG_BINARIES','/usr/bin/ffmpeg'),
                'ffprobe.binaries' => env('FFPROBE_BINARIES','/usr/bin/ffprobe') 
            ]);
            $duration = $ffprobe
                ->format($request->file('file')->getRealPath()) // extracts file information
                ->get('duration');
            if(round($duration) > 180){
                return response()->json([
                    'code' => 505,
                    'message' => 'Your video length is longer than 3 minutes'
                ]);
            }

            if(!empty(Auth::user()->jobseekerProfile->video)){
                $path = 'videoCV/'.basename(Auth::user()->jobseekerProfile->video->url);
                if(Storage::disk('s3')->exists($path)){
                    Storage::disk('s3')->delete($path);
                }
                $path = Storage::disk('s3')->put('videoCV', $request->file('file'));
                $url = Storage::disk('s3')->url($path);
                $data['url'] = $url;
                Auth::user()->jobseekerProfile->video()->update($data);
                return response()->json([
                    'code' => 200,
                    'message' => 'Successfully upload video'
                ]);
            }
            $path = Storage::disk('s3')->put('videoCV', $request->file('file'));
            $url = Storage::disk('s3')->url($path);

            $data['url'] = $url;
            Auth::user()->jobseekerProfile->video()->create($data);
        
            return response()->json([
                'code' => 200,
                'message' => 'Successfully upload video'
            ]);
        }
        return response()->json([
            'code' => 505,
            'message' => "No file"
        ]);
        
    }

    public function deleteApplyJob(Request $request){
        $id = $request->id;
        JobUser::destroy($id);
        return response()->json([
            'code' => 200,
            'message' => 'Successfully delete apply job'
        ]);
    }

    public function showTemplatesDetails($id, Request $request)
    {
        $userId = Auth::user()->id;
        $existingTemplate = Templates::find($id);
        $existingJobSeeker = JobseekerProfile::where("user_id", $userId)->first();
        if (empty($existingJobSeeker)) {
            return back()->with('message','Pleased Add More informations ');
        }
        if (empty($existingJobSeeker->skillset)) {
            return back()->with('message','Pleased Add more information with skill set');
        }
        $existingTemplate = "$existingTemplate->templateDir";
        return view($existingTemplate, [
            "fullName" => $existingJobSeeker->full_name,
            "gender" => $existingJobSeeker->gender,
            "age" => $existingJobSeeker->age,
            "educationLevel" => $existingJobSeeker->education_level,
            "phoneNumber" => $existingJobSeeker->phone_number,
            "email" => $existingJobSeeker->email,
            "skillset" => $existingJobSeeker->skillset,
            "summary" => $existingJobSeeker->cover_letter,
            "education" => $existingJobSeeker->education,
            "workExperience" => $existingJobSeeker->work_experience,
            "achievement" => $existingJobSeeker->achievement,
            "profileImageUrl" => $existingJobSeeker->user_profile,
        ]);
    }

    public function showAllTemplates(Request $request)
    {
        $existingTemplates = Templates::all();
        return view("Templates.CardTemplate", [
            "templates" => $existingTemplates
        ]);
    }
}

