<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{


    protected $fillable = [
            'company_id',
            'uuid',
            'job_title',
            'category',
            'working_term',
            'pax',
            'qualification',
            'career_level',
            'years_of_experience',
            'deadline',
            'offer_salary',
            'is_negotiable',
            'gender',
            'is_specific_gender',
            'description',
            'responsibility',
            'required_skill',
            'benefit',
            'city',
            'is_active'

    ];


    public function companyProfile(){
        return $this->belongsTo('App\Models\CompanyProfile','company_id');
    }

    public function getJobTypeCSSClass(){
        switch($this->working_term){
            case 'Full Time':
                return 'ft';
            break;
            case 'Part Time':
                return 'pt';
            break;
            case 'Internship':
                return 'it';
            break;
            case 'Freelance':
                return 'fl';
            break;
            case 'Tempoaray':
                return 'tp';
            break;
            case 'Volunteer':
                return 'vl';
            break;
            default:
                return 'ft';
        }
    }

    public function companyName(){
        return $this->companyProfile->name;
    }

    public function companyAddress(){
        return $this->companyProfile->address;
    }

    public function companyWebsite(){
        return $this->companyProfile->website;
    }

    public function companyPhoneNumber(){
        return $this->companyProfile->phone_number;
    }

    public function companyEmail(){
        return $this->companyProfile->email;
    }

    public function recentJob(){
        return $this->companyProfile->jobs->where('id','!=',$this->id)->where('is_active',1)->take(5)->sortByDesc('created_at');
   }

   public function applicants(){
        return $this->belongsToMany('App\Models\User','job_user','job_id','user_id')
                    ->withPivot('id','status', 'interview_date','is_online','room_name')
                    ->withTimestamps()
                    ->orderBy('job_user.status');
    }
}
