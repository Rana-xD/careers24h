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
    protected $job_type = [
        'Full Time',
        'Part Time',
        'Internship',
        'Freelance',
        'Temporary',
        'Volunteer'
    ];

    protected $categories = [
        'Accounting', 
        'Administration', 
        'Architecture / Engineering',    
        'Assistant / Secretary',
        'Audit / Taxation',
        'Call Center', 
        'Cashier / Service / Barista',
        'Consultancy', 
        'Cook / Clean / Housekeeping',
        'Credit Administration', 
        'Credit Officer / Lending', 
        'Customer Service/Receptionist',
        'Design / Interior / Exterior',
        'Driver / Secrurity', 
        'Electrician / Mechanism', 
        'Finance', 
        'Fresh Graduated',
        'Front Office / Hospitality', 
        'Hight School',
        'HSEQ',
        'Human Resource', 
        'Information Technology / Networking / Infrastructure', 
        'Legal & Compliance', 
        'Logistic / Shipping', 
        'Management', 
        'Marketing', 
        'Medical / Health / Nurse',
        'Operation', 
        'Others',
        'Procurement / Purchasing', 
        'Programmer / Coding / Developer',
        'Project Management',
        'Property Valuator', 
        'QA / QC',
        'Resturant / Captain',
        'Risk & Compliance', 
        'Sale',
        'Sale & Marketing', 
        'Sale Engineer',
        'Security Operation / Safety',
        'Site Engineer', 
        'Stock Controller / Warehouse', 
        'Technician / Maintenance', 
        'Ticketing / Tour / Travel',
        'Traing / Education', 
        'Translation', 
        'Undergraduation', 
        'Video Editor' 
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
        'Junior',
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

    public function getJobType(){
        return $this->job_type;
    }

    public function getCategories(){
        return $this->categories;
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
}
