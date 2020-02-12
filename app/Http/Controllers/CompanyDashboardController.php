<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\CompanyProfile;

class CompanyDashboardController extends Controller
{
    
    public $default_logo = "https://careers24h.s3-ap-southeast-1.amazonaws.com/defaul_logo.jpg";

    public function showProfile(){

        $company = Auth::user()->CompanyProfile;
        $city = $company->getCity();
        $team_size = $company->getTeamSize();
        
        return view('company.dashboard.Profile',[
            'city' => $city,
            'team_size' => $team_size,
            'company_profile' => $company
        ]);
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

    public function updateProfile(Request $request){
        $data = $request->except(['_token','file']);

        if($request->hasFile('file')){
            $rules = array('file' => 'file|image|mimes:jpeg,png,webp,svg|max:1000');
            $validator = Validator::make( $request->file(), $rules);
            if($validator->fails()){
                return response()->json([
                    'code' => 505,
                    'message' => json_encode($validator->getMessageBag()->toArray())
                ]);
            }
            if(Auth::user()->companyProfile->company_logo != $this->default_logo){
                $path = 'Companylogo/'.basename(Auth::user()->companyProfile->company_logo);
                if(Storage::disk('s3')->exists($path)){
                    Storage::disk('s3')->delete($path);
                }
            }
            $path = Storage::disk('s3')->put('Companylogo', $request->file('file'));
            $url = Storage::disk('s3')->url($path);
            $data['company_logo'] = $url;
        }
        
        Auth::user()->companyProfile()->update($data);
        
        return response()->json([
            'code' => 200,
            'message' => "Success"
        ]);
    }



}
