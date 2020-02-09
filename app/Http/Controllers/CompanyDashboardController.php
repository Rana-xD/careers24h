<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
