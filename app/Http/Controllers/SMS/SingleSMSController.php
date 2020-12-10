<?php

namespace App\Http\Controllers\SMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Validator;
use App\Models\TappSentMsgLog;


class SingleSMSController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('singlesms');
    }

    public function sendSms(Request $request) {
        // Your Account SID and Auth Token from twilio.com/console
       $sid    = env( 'TWILIO_SID' );
       $token  = env( 'TWILIO_TOKEN' );
       $client = new Client( $sid, $token );

       $validator = Validator::make($request->all(), [
           'number' => 'required',
           'message' => 'required'
       ]);

       if ( $validator->passes() ) {

           $message = $request->input( 'message' );
           $number = $request->input( 'number' );

           $client->messages->create(
            $number,
            [
                'from' => env( 'TWILIO_FROM' ),
                'body' => $message,
            ]);
           $inputs = [
                    'sms_number' => $number,
                    'twilio_num' => env( 'TWILIO_FROM' ),
                    'message' => $message,
                    'bulk_name' => '',
                    'date_time' => now()
            ];

           TappSentMsgLog::insert($inputs);
           return back()->with( 'success', "Message sent successfully!" );

       } else {

           return back()->withErrors( $validator );
       }
    }
}
