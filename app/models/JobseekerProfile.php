<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobseekerProfile extends Model
{
    

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
        'city'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
