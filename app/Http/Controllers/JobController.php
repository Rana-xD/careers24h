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
use App\Models\CompanyProfile;
use App\Models\Category;

class JobController extends Controller
{

    public function __construct()
    {
        $this->job_types = config('global.job_type');
        $this->categories = Category::all();
        $this->qualification = config('global.education_level');
        $this->city = config('global.city');
    }
    public function showJobs(Job $job){
        $jobs = $job->where('is_active',1)->orderBy('created_at','desc')->paginate(15);
        return view('Job.JobList',[
            'jobs' => $jobs,
            'categories' => $this->categories,
        ]);
    }

    public function filterJob(Request $request, Job $job){
        $job = $job->newQuery();
        if($request->has('job_title')){
            $job->whereRaw("MATCH (job_title) AGAINST ( ? IN BOOLEAN MODE)",$request->input('job_title'));
        }
        if($request->has('city')){
            $job->where('city', $request->input('city'));
        }
        if($request->has('job_type')){
            $job->whereIn('working_term', explode(',', $request->input('job_type')));
        }
        if($request->has('categories')){
            $job->whereIn('category', explode(',', $request->input('categories')));
        }
        if($request->has('gender') && $request->input('gender') != 'Both'){
            $job->where('gender', $request->input('gender'));
        }
        if($request->has('qualification')){
            $job->whereIn('qualification', explode(',', $request->input('qualification')));
        }

        $jobs = $job->where('is_active',1)->orderBy('created_at','desc')->paginate(15);
        return view('Job.JobList',[
            'jobs' => $jobs,
            'categories' => $this->categories,
        ]);

    }
    public function showCreateJobForm(){
        
        
        return view('company.dashboard.NewJob',[
            'job_types' => $this->job_types,
            'categories' => $this->categories,
            'qualification' => $this->qualification,
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
        $work_day = json_decode($job->work_day);
        $work_time = json_decode($job->work_time);
        
        return view('company.dashboard.JobPreview',[
            'job' => $job,
            'work_day' => $work_day,
            'work_time' => $work_time
        ]);
    }

    public function showSingleJob($uuid){
        $job = Job::where('uuid',$uuid)->firstOrFail();
        $job->increment('view_count');
        $work_day = json_decode($job->work_day);
        $work_time = json_decode($job->work_time);

        return view('Job.JobSingle',[
            'job' => $job,
            'work_day' => $work_day,
            'work_time' => $work_time
        ]);
    }

    public function showAllCompanyJob($uuid){
        $company = CompanyProfile::where('uuid',$uuid)->get();
        if(count($company) == 0){
            abort (404);
        }
        $jobs = $company[0]->activeJobs;
        return view('Job.JobListCompany',[
            'jobs' => $jobs
        ]);
    }

    public function applyJob(Request $request){
        $jobId = $request->jobId;

        if(Auth::check()){
            if(Auth::user()->isJobseeker()){
                
                $gender = Job::find($jobId)->pluck('gender')[0];

                if($gender == null || $gender === Auth::user()->jobseekerProfile->gender ){

                    if(!empty(Auth::user()->jobseekerProfile->education) && !empty(Auth::user()->jobseekerProfile->work_experience)){

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
                        'message' => "You haven't completed resume yet"
                    ]);
            }
                return response()->json([
                    'code' => 501,
                    'message' => "Your gender cannot apply for this job"
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
