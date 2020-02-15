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
        'city'
    ];

   public function user(){
    return $this->belongsTo('App\Models\User');
   }

   public function jobs(){
       return $this->hasMany('App\Models\Job','company_id');
   }
}
