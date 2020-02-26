<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'jobseeker_id',
        'status',
        'feedback',
        'url'
    ];

    
}
