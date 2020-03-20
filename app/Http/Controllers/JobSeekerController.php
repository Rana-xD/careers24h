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

class JobSeekerController extends Controller
{

    public function showJobseekerInfo($uuid){
            $candidate = JobseekerProfile::where('uuid',$uuid)->get();
            $social_media = json_decode($candidate[0]->social_media);
            return view('jobseeker.CandidateSingle1',[
                'candidate' => $candidate[0],
                'social_media' => $social_media
            ]);
    }

    public function showAllJobseekerInfo(JobseekerProfile $jobseekers){
        $jobseekers = $jobseekers->orderBy('created_at','desc')->paginate(15);
        return view('jobseeker.CandidateList',[
            'jobseekers' => $jobseekers
        ]);
    }

    public function filterJobseeker(Request $request, JobseekerProfile $jobseekers){
        $jobseekers = $jobseekers->newQuery();
        if($request->has('candidate_name')){
            $jobseekers->whereRaw("MATCH (full_name) AGAINST ( ? IN BOOLEAN MODE)",$request->input('candidate_name'));
        }
        if($request->has('city')){
            $jobseekers->whereIn('city', explode(',', $request->input('city')));
        }
        if($request->has('career_level')){
            $jobseekers->whereIn('career_level', explode(',', $request->input('career_level')));
        }
        if($request->has('gender') && $request->input('gender') != 'Both'){
            $jobseekers->where('gender', $request->input('gender'));
        }
        if($request->has('qualification')){
            $jobseekers->whereIn('qualification', explode(',', $request->input('qualification')));
        }
        if($request->has('industry')){
            $jobseekers->whereIn('industry', explode(',', $request->input('industry')));
        }
        $jobseekers = $jobseekers->orderBy('created_at','desc')->paginate(15);
        return view('jobseeker.CandidateList',[
            'jobseekers' => $jobseekers
        ]);

    }
}
