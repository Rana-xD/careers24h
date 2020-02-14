<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
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

    protected $team_size = [
        '1-10',
        '10-30',
        '30-50',
        '50-70',
        '70-100',
        '100+'
    ];

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

    public function getCity(){
         return $this->city;
    }

    public function getTeamSize(){
        return $this->team_size;
   }

   public function user(){
    return $this->belongsTo('App\Models\User');
   }

   public function jobs(){
       return $this->hasMany('App\Models\Job','company_id');
   }
}
