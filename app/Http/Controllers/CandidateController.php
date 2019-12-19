<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function candidate1() {
       return view("Candidate.CandidateList1");
    }
    
    public function candidate2() {
       return view("Candidate.CandidateList2");
    }

    public function candidate3() {
       return view("Candidate.CandidateList3");
    }

    public function candidateSingle1() {
       return view("Candidate.CandidateSingle1");
    }

    public function candidateSingle2() {
       return view("Candidate.CandidateSingle2");
    }


   /* 
     
    Dashboard 
   
   */


    public function appliedJob() {
       return view("Candidate.Dashboard.CandidateAppliedJob");
    }

    public function addNewResume() {
       return view("Candidate.Dashboard.CandidateAddNewResume");
    }
   
    public function myResume() {
       return view("Candidate.Dashboard.CadidateMyResume");
    }
   
    public function changePassword() {
       return view("Candidate.Dashboard.CandidateChangePassword");
    }
   
    public function coverLetter() {
       return view("Candidate.Dashboard.CandidateCVCoverLetter");
    }
   
    public function dashboard() {
       return view("Candidate.Dashboard.CandidateDashboard");
    }
   
    public function jobAlert() {
       return view("Candidate.Dashboard.CandidateJobAlert");
    }
   
    public function profile() {
       return view("Candidate.Dashboard.CandidateProfile");
    }
   
    public function shortList() {
       return view("Candidate.Dashboard.CandidateShortlist");
    }
}
