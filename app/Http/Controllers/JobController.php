<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Job;
use App\Models\JobUser;

class JobController extends Controller
{

    public function __construct()
    {
        $this->job_types = config('global.job_type');
        $this->categories = config('global.categories');
        $this->qualification = config('global.education_level');
        $this->career_level = config('global.career_level');
        $this->city = config('global.city');
    }

    public function showCreateJobForm(){
        
        
        return view('company.dashboard.NewJob',[
            'job_types' => $this->job_types,
            'categories' => $this->categories,
            'qualification' => $this->qualification,
            'career_level' => $this->career_level,
            'city' => $this->city
        ]);
    }

    public function createJob(Request $request){
        $data = $request->except('_token');
        $data['company_id'] = Auth::user()->companyProfile->id;
        $data['uuid'] = Str::random(8);
        Job::create($data);
        return response()->json([
            'code' => 200,
            'message' => "Successfully create job"
        ]);

    }

    public function showEditJobForm($uuid){
        $job = Job::where('uuid',$uuid)->firstOrFail();
        return view('company.dashboard.EditJob',[
            'job' => $job,
            'job_types' => $this->job_types,
            'categories' => $this->categories,
            'qualification' => $this->qualification,
            'career_level' => $this->career_level,
            'city' => $this->city
        ]);
    }

    public function updateJob(Request $request){
        $data = $request->except('_token','id');
        $job_id = $request->id;
        $job = Job::find($job_id);

        $job->update($data);
        return response()->json([
            'code' => 200,
            'message' => "Successfully update job"
        ]);
    }

    public function deleteJob(Request $request){
        $uuid = $request->uuid;
        Job::where('uuid',$uuid)->delete();
        return response()->json([
            'code' => 200,
            'message' => "Successfully delete job"
        ]);
    }

    public function showJobPreview($uuid){
        $job = Job::where('uuid',$uuid)->firstOrFail();
        return view('company.dashboard.JobPreview',[
            'job' => $job
        ]);
    }

    public function showSingleJob($uuid){
        $job = Job::where('uuid',$uuid)->firstOrFail();
        return view('Job.JobSingle',[
            'job' => $job
        ]);
    }

    public function applyJob(Request $request){
        $jobId = $request->jobId;

        if(Auth::check()){
            if(Auth::user()->isJobseeker()){
                if(count(Auth::user()->applyJob->where('id',$jobId)) == 0){
                    $data['user_id'] = Auth::id();
                    $data['job_id'] = $jobId;
                    $data['status'] = 'Pending';
                    JobUser::create($data);
                    return response()->json([
                        'code' => 200,
                        'message' => "You successfully apply for this job"
                    ]);
                }
                return response()->json([
                    'code' => 501,
                    'message' => "You already apply that job"
                ]);
            }
            return response()->json([
                'code' => 501,
                'message' => "You can't apply job with company account"
            ]);
            
        }
        return response()->json([
            'code' => 500,
            'message' => "Unauthentication"
        ]);
    }

}
