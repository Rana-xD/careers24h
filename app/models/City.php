<?php

namespace App\Models;
use App\Models\Job;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function popular(){
        return $this->hasMany(Job::class,'city');
    }
}
