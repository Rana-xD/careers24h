<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyProfile;

class CompanyController extends Controller
{
    public function showAllCompany(CompanyProfile $companies){
        $companies = $companies->orderBy('created_at','desc')->paginate(15);
        return view('company.CompanyList',[
            'companies' =>  $companies
        ]);
    }

    public function showSingleCompany($uuid){
        $company = CompanyProfile::where('uuid',$uuid)->firstOrFail();
        $company->increment('view_count');
        $social_media = json_decode($company->social_media);
        
        return view('company.CompanySingle',[
            'company' =>  $company,
            'social_media' => $social_media
        ]);
    }

    public function filterCompany(Request $request, CompanyProfile $companies){
        $companies = $companies->newQuery();
        if($request->has('company_name')){
            $companies->whereRaw("MATCH (name) AGAINST ( ? IN BOOLEAN MODE)",$request->input('company_name'));
        }
        if($request->has('city')){
            $companies->whereIn('city', explode(',', $request->input('city')));
        }
        if($request->has('industry')){
            $companies->whereIn('industry', explode(',', $request->input('industry')));
        }
        if($request->has('team_size')){
            $companies->whereIn('team_size', explode(',', $request->input('team_size')));
        }
        $companies = $companies->orderBy('created_at','desc')->paginate(15);
        return view('company.CompanyList',[
            'companies' =>  $companies
        ]);
    }
}
