<?php

namespace App\Http\Controllers\SMS;

use App\Http\Controllers\Controller;
use App\Models\TappMsgReceive;
use Illuminate\Http\Request;

class RecieveSmsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:send']);
    }

    public function index()
    {
        $recievedMessages = TappMsgReceive::all();
        return view('recievedSms',  ['recievedMessages' => $recievedMessages]);
    }

    public function logSms(Request $request)
    {
        $inputs = [
            'sender' =>  $request->input('From'),
            'body' => $request->input('Body'),
            'twilio_num' => $request->input('To'),
            'mediaUrl' => '',
            'date_time' => now()
        ];
        TappMsgReceive::insert($inputs);
        return;
    }
}

/* ___Links___
https://www.twilio.com/blog/log-incoming-sms-messages-airtable-laravel-twilio
*/
