<?php

namespace App\Http\Controllers\SMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\TappSentMsg;
use App\Models\TappTwilioNumber;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\NumbersImport;
use Auth;

class BulkSMSController extends Controller
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

        return view('bulksms', ['twilionumbers' => $twilionumbers]);
    }

    public function store(Request $request) {

       $validator = Validator::make($request->all(), [
            'select_file'  => 'required|mimes:xls,xlsx',
            'message' => 'required',
            'twilio_num' => 'required',
       ]);
              
       // Validation for checking user balance
       $validator = $this->checkBalance($validator);

       if ( $validator->passes() ) {
            $message = $request->input( 'message' );
            $twilio_num = $request->input( 'twilio_num' );

            $rows = Excel::toArray(new NumbersImport, request()->file('select_file'));

            $count = 0;

            foreach($rows[0] as $row)
            {
                $smsList[] = array(
                    'sms_number' => $row[0],
                    'twilio_num' => $twilio_num,
                    'message' => $message,
                    'bulk_name' => '',
                    'date_time' => now()
                );
                $count++;
            }

            if(!empty($smsList))
            {
                TappSentMsg::insert($smsList);
            }
            return back()->with( 'success', $count . " messages will be sent!" );

        }
        else {
            return back()->withErrors( $validator );
        }

    }


    public function storeWithInput(Request $request) {

       $validator = Validator::make($request->all(), [
           'numbers' => 'required',
           'message' => 'required'
       ]);

       if ( $validator->passes() ) {

           $numbers_in_arrays = explode( ',' , $request->input( 'numbers' ) );

           $message = $request->input( 'message' );
           $count = 0;

           $smsList = [];
           foreach( $numbers_in_arrays as $number )
           {
               $count++;

               array_push($smsList, [
                'sms_number' => $number,
                'twilio_num' => env( 'TWILIO_FROM' ),
                'message' => $message,
                'bulk_name' => '',
                'date_time' => now()
            ]);
           }

           TappSentMsg::insert($smsList);
           return back()->with( 'success', $count . " messages will be sent!" );

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


/*
excel import links:
https://www.webslesson.info/2019/02/import-excel-file-in-laravel.html
https://docs.laravel-excel.com/3.1/imports
*/
