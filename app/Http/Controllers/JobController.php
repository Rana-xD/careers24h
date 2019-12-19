<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function jobListClassic() {
        return view("Job.JobListClassic");
    }
    
    public function jobListGrid() {
        return view("Job.JobListGrid");
    }
    
    public function jobListModern() {
        return view("Job.JobListModern");
    }
    
    public function jobListSingle1() {
        return view("Job.JobListSingle1");
    }
    
    public function jobListSingle2() {
        return view("Job.JobListSingle2");
    }
    
    public function jobListSingele3() {
        return view("Job.JobListSingle3");
    }
}
