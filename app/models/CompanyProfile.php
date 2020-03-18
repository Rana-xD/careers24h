<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
     
    protected $fillable = [
        'company_logo',
        'name',
        'email',
        'website',
        'social_media',
        'address',
        'location',
        'start_year',
        'team_size',
        'categories',
        'phone_number',
        'info',
        'city',
        'user_id',
        'uuid',
        'industry'
    ];

   public function user(){
    return $this->belongsTo('App\Models\User');
   }

   public function jobs(){
       return $this->hasMany('App\Models\Job','company_id');
   }

   public function activeJobs(){
    return $this->hasMany('App\Models\Job','company_id')->where('is_active',1);
   }

   
}
