<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\City;
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
        'uuid',
        'is_private',
        'is_single'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function sourceOfCity(){
        return $this->belongsTo(City::class,'city');
    }
    public function video(){
        return $this->hasOne('App\Models\Video','jobseeker_id');
    }
}
