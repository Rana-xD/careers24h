<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
}

