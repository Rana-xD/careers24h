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

class JobController extends Controller
{
    public function showCreateJobForm(){
        $job = new Job();
        $job_types = $job->getJobType();
        $categories = $job->getCategories();
        $qualification = $job->getEducationLevel();
        $career_level = $job->getCareerLevel();
        $city = $job->getCity();
        return view('company.dashboard.NewJob',[
            'job_types' => $job_types,
            'categories' => $categories,
            'qualification' => $qualification,
            'career_level' => $career_level,
            'city' => $city
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
        $job = new Job();
        $job_types = $job->getJobType();
        $categories = $job->getCategories();
        $qualification = $job->getEducationLevel();
        $career_level = $job->getCareerLevel();
        $city = $job->getCity();
        $job = Job::where('uuid',$uuid)->firstOrFail();
        return view('company.dashboard.EditJob',[
            'job' => $job,
            'job_types' => $job_types,
            'categories' => $categories,
            'qualification' => $qualification,
            'career_level' => $career_level,
            'city' => $city
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

}
