<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobSeekerDashboardController extends Controller
{
    public function showProfile(){
        return view('jobseeker.dashboard.Profile');
    }

    public function showAppliedJob(){
        return view('jobseeker.dashboard.AppliedJob');
    }

    public function showCoverLetter(){
        return view('jobseeker.dashboard.CVCoverLetter');
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
}

