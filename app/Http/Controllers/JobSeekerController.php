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
}
