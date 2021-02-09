<?php

namespace App\Http\Controllers\SMS;

use App\Http\Controllers\Controller;
use App\Models\TappMsgReceive;
use Illuminate\Http\Request;
use Auth;

class RecieveSmsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:send']);
    }

    public function index()
    {
        $recievedMessages = Auth::user()->recievedMessages;
        return view('recievedsms',  ['recievedMessages' => $recievedMessages]);
    }

    public function logSms(Request $request)
    {
        $inputs = [
            'sender' =>  $request->input('From'),
            'body' => $request->input('Body'),
            'twilio_num' => $request->input('To'),
            'mediaUrl' => '',
            'user_id' => Auth::user()->id,
            'date_time' => now()
        ];
        TappMsgReceive::insert($inputs);
        return;
    }
}

/* ___Links___
https://www.twilio.com/blog/log-incoming-sms-messages-airtable-laravel-twilio
*/
