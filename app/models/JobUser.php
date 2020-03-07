<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobUser extends Model
{

    protected $table = 'job_user';
    
    protected $fillable = [
        'user_id',
        'job_id',
        'status',
        'interview_date',
        'is_online',
        'room_name'
    ];

    public function getCSS(){
        switch($this->status){
            case 'Pending':
                return 'deeppink';
            break;
            case 'Reject':
                return 'Red';
            break;
            case 'Accept':
                return 'limegreen';
            break;
            default:
                return 'deeppink';
        }
    }
}
