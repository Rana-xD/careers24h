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

    protected $education_level = [
        'Associate Degree',
        'Bachelor Degree',
        'Master Degree',
        'Phd Degree',
        'Doctoral Degree'
    ];
    protected $career_level = [
        'Undergraduate',
        'Fresh Graduate',
        'Senior',
        'Supervisor or Manager',
        'Executive'
    ];

    protected $city = [
        'Banteay Meanchey',
        'Battambang',
        'Kampong Cham',
        'Kampong Chhnang',
        'Kampong Speu',
        'Kampong Thom',
        'Kampot',
        'Koh Kong',
        'Kratié',
        'Mondulkiri',
        'Phnom Penh',
        'Preah Vihear',
        'Prey Veng',
        'Pursat',
        'Ratanak Kiri',
        'Siem Reap',
        'Preah Sihanouk',
        'Steung Treng',
        'Svay Rieng',
        'Takéo',
        'Oddar Meanchey',
        'Kep',
        'Pailin',
        'Tboung Khmum'
    ];

    protected $industry = [
        'Aviation',
        'Arts',
        'Business',
        'Law Enforcement',
        'Media',
        'Medical',
        'Service Industry',
        'Teaching',
        'Technology'
    ];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function getEducationLevel(){
        return $this->education_level;
    }

    public function getCareerLevel(){
        return $this->career_level;
    }

    public function getCity(){
        return $this->city;
    }

    public function getIndustries(){
        return $this->industry;
    }
}
