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
}
