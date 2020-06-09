<?php

namespace App\Models;
use App\Models\Category;
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
            'is_active',
            'work_day',
            'work_time'

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
            case 'Temporary':
                return 'tp';
            break;
            case 'Volunteer':
                return 'vl';
            break;
            default:
                return 'ft';
        }
    }

    public function getColorCode(){
        switch($this->working_term){
            case 'Full Time':
                return '#8b91dd';
            break;
            case 'Part Time':
                return '#7dc246';
            break;
            case 'Internship':
                return '#ee9c18';
            break;
            case 'Freelance':
                return '#fb236a';
            break;
            case 'Temporary':
                return '#2c3e50';
            break;
            case 'Volunteer':
                return '#8e44ad';
            break;
            default:
                return '#8b91dd';
        }
    }

    public function sourceOfCategory(){
        return $this->belongsTo('App\Models\Category','category');
    }

    public function companyName(){
        return $this->companyProfile->name;
    }
    public function companyLogo(){
        return $this->companyProfile->company_logo;
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
   
  public function onlineInview(){
    return $this->belongsToMany('App\Models\User','job_user','job_id','user_id')
                ->withPivot('id','status', 'interview_date','is_online','room_name')
                ->where('job_user.is_online',1)
                ->withTimestamps();
  }

  public function offlineInview(){
    return $this->belongsToMany('App\Models\User','job_user','job_id','user_id')
                ->withPivot('id','status', 'interview_date','is_online','room_name')
                ->where('job_user.is_online',0)
                ->where('job_user.status','Accept')
                ->where('job_user.interview_date','!=',null)
                ->withTimestamps();
  }
}
