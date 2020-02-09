<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyDashboardController extends Controller
{
    

    public function showProfile(){
        return view('company.dashboard.Profile');
    }

    public function showChangePassword(){
        return view('company.dashboard.ChangePassword');
    }

    public function showJobAlert(){
        return view('company.dashboard.JobAlert');
    }

    public function showManageJob(){
        return view('company.dashboard.ManageJob');
    }

    public function showPackage(){
        return view('company.dashboard.Package');
    }

    public function showJobForm(){
        return view('company.dashboard.PostNew');
    }

    public function showResume(){
        return view('company.dashboard.Resume');
    }

    public function showTransaction(){
        return view('company.dashboard.Transaction');
    }


}
