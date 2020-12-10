<?php

namespace App\Http\Controllers\SMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\TappSentMsg;
use Excel;


class BulkSMSController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('bulksms');
    }

    public function store(Request $request) {

       $validator = Validator::make($request->all(), [
            'select_file'  => 'required|mimes:xls,xlsx',
            'message' => 'required'
       ]);

       if ( $validator->passes() ) {

        $message = $request->input( 'message' );

        $path = $request->file('select_file')->getRealPath();

        $count = 0;

        $data = Excel::load($path)->get();

        if($data->count() > 0)
        {
         foreach($data->toArray() as $key => $value)
         {
          foreach($value as $row)
          {
           $smsList[] = array(
            'sms_number' => $row[0],
            'twilio_num' => env( 'TWILIO_FROM' ),
            'message' => $message,
            'bulk_name' => '',
            'date_time' => now()
           );
           $count++;
          }
         }

         if(!empty($smsList))
         {
            TappSentMsg::insert($smsList);
         }
        }

        return back()->with( 'success', $count . " messages will be sent!" );

       } else {
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
}


/*
excel import links:
https://www.webslesson.info/2019/02/import-excel-file-in-laravel.html
*/
