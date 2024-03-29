<?php

namespace App\Http\Controllers\SMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Validator;
use App\Models\TappSentMsgLog;
use App\Models\TappTwilioNumber;
use Illuminate\Http\RedirectResponse;
use Auth;


class SingleSMSController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:send']);
    }

    public function index()
    {
        $numbersObjectCollection = TappTwilioNumber::all('number');

        // Mapping Eloquent Collection containing Objects into the the simple collection with only numbers
        $twilionumbers = $numbersObjectCollection->map(function ($val) {
            return $val->number;
        }) ;

        return view('singlesms', ['twilionumbers' => $twilionumbers]);
    }

    public function sendSms(Request $request) {
        // Your Account SID and Auth Token from twilio.com/console
       $sid    = env( 'TWILIO_SID' );
       $token  = env( 'TWILIO_TOKEN' );
       $client = new Client( $sid, $token );

       $validator = Validator::make($request->all(), [
           'twilio_num' => 'required',
           'number' => 'required',
           'message' => 'required',
       ]);
       
       // Validation for checking user balance
       $validator = $this->checkBalance($validator);

       if ( $validator->passes() ) {

           $message = $request->input( 'message' );
           $number = $request->input( 'number' );
           $twilio_num = $request->input( 'twilio_num' );

           $client->messages->create(
            $number,
            [
                'from' => $twilio_num,
                'body' => $message,
            ]);
           $inputs = [
                    'sms_number' => $number,
                    'twilio_num' => $twilio_num,
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

    function checkBalance($validator) {
        return $validator->after(function($validator) {
            if (Auth::user()->hasRole('user') && Auth::user()->balance < 1) {
                // ['name' => 'The name is required']
                $validator->errors()->add('balance', 'Not Enough Balance to Send SMS');;
                return $validator;
            }
        });
    }
}
