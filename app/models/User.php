<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    const COMPANY = "COMPANY";
    const JOBSEEKER = "JOBSEEKER";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password','uuid','role','phone_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $default_user_profile = 'https://careers24h.s3-ap-southeast-1.amazonaws.com/default_user.png';

    public function isCompany(){
        return $this->role === self::COMPANY;
    }

    public function isJobSeeker(){
        return $this->role === self::JOBSEEKER;
    }

    public function companyProfile(){
        return $this->hasOne('App\Models\CompanyProfile');
    }

    public function jobseekerProfile(){
        return $this->hasOne('App\Models\JobseekerProfile');
    }

    public function defaultUserProfile(){
        return $this->default_user_profile;
    }

    public function applyJob(){
        return $this->belongsToMany('App\Models\Job','job_user','user_id','job_id')
                    ->withPivot('id','status', 'meeting_date')
                    ->withTimestamps();
    }

}
