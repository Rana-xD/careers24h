<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\CompanyProfile;
use App\Models\JobseekerProfile;
use App\Models\JobUser;
use Twilio\Rest\Client;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VideoGrant;

class InterviewRoomController extends Controller
{
    //
    protected $sid;
    protected $token;
    protected $key;
    protected $secret; 

    public function __construct()
    {
        $this->sid = config('services.twilio.sid');
        $this->token = config('services.twilio.token');
        $this->key = config('services.twilio.key');
        $this->secret = config('services.twilio.secret');
    }

    public function joinRoom($room_name){
        $identity = Auth::user()->isCompany() ? Auth::user()->CompanyProfile->name : Auth::user()->jobseekerProfile->full_name;
        // \Log::debug("joined with identity: $identity");
        $token = new AccessToken($this->sid, $this->key, $this->secret, 3600, $identity);
        $role = Auth::user()->isCompany() ? 'Company' : 'Jobseeker';
        $videoGrant = new VideoGrant();
        $videoGrant->setRoom($room_name);

        $token->addGrant($videoGrant);
        return view('pages.room', [ 'accessToken' => $token->toJWT(), 'roomName' => $room_name, 'role' =>  $role]);
    }
}
