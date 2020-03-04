<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobseekerProfile extends Model
{
    
    protected $casts = [
        'education' => 'array',
        'skillset' => 'array',
        'achievement' => 'array',
        'work_experience' => 'array',
    ];
    protected $fillable = [
        'user_profile',
        'full_name',
        'age',
        'gender',
        'experience',
        'career_level',
        'education_level',
        'industry',
        'social_media',
        'phone_number',
        'email',
        'city',
        'education',
        'skillset',
        'achievement',
        'work_experience',
        'user_id',
        'uuid'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function video(){
        return $this->hasOne('App\Models\Video','jobseeker_id');
    }
}
