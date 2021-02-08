<?php

namespace App\Http\Controllers\SMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\TappSentMsg;
use App\Models\TappTwilioNumber;
use App\Models\GroupNumbers;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\NumbersImport;
use Auth;

class BulkSMSController extends Controller
{
    private $count = 0;
    private $smsList = [];

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

        $groups= Auth::user()->groups;

        return view('bulksms', ['twilionumbers' => $twilionumbers, 'groups' => $groups]);
    }

    public function store(Request $request) {
        $is_file_attached =  !empty(request()->file('select_file'));
        $is_group_selected =  !empty($request->input( 'group' ));

       $validator = Validator::make($request->all(), [
            'select_file'  =>  $is_group_selected ? 'mimes:xls,xlsx': 'required|mimes:xls,xlsx',
            'group'  =>  $is_file_attached? '': 'required',
            'message' => 'required',
            'twilio_num' => 'required',
       ]);   

       if ( $validator->passes() ) {
            $message = $request->input( 'message' );
            $twilio_num = $request->input( 'twilio_num' );

            if ($is_file_attached) {
                $this->addImportedFileNumbersinList($twilio_num, $message);
            }
            if ($is_group_selected) {
                $this->addSelectedGroupNumbersList( $twilio_num, $message, $request->input('group') );
            }

            if(!empty($this->smsList))
            {
                // Validation for checking user balance
                $validator = $this->checkBalance($validator);
                if ( !$validator->passes() ) { return back()->withErrors( $validator ); }

                TappSentMsg::insert($this->smsList);

                // Deducting the balance on sms sent
                Auth::user()->update(array('balance' => Auth::user()->balance - $this->count));
            } else {
                return back()->with( 'message', "Wrong format or empty file!" );
            }
            return back()->with( 'message', $this->count . " messages will be sent!" );
        }
        return back()->withErrors( $validator );
    }

    function addImportedFileNumbersinList ($twilio_num, $message) {
        $rows = Excel::toArray(new NumbersImport, request()->file('select_file'));

        foreach($rows[0] as $row)
        {
            if (empty($row[0])) { break; }

            $this->smsList[] = array(
                'sms_number' => $row[0],
                'twilio_num' => $twilio_num,
                'message' => $message,
                'bulk_name' => '',
                'date_time' => now()
            );
            $this->count++;
        }
    }

    function addSelectedGroupNumbersList ($twilio_num, $message, $group_id) {
        $group_numbers = GroupNumbers::where('group_id', $group_id)->get();
        foreach($group_numbers as $row)
        {
            $this->smsList[] = array(
                'sms_number' => floatval($row->sms_number),
                'twilio_num' => $twilio_num,
                'message' => $message,
                'bulk_name' => '',
                'date_time' => now()
            );
            $this->count++;
        }
    }

    function checkBalance($validator) {
        return $validator->after(function($validator) {
            if (Auth::user()->hasRole('user') && Auth::user()->balance < $this->count) {
                // ['name' => 'The name is required']
                $validator->errors()->add('balance', 'Not Enough Balance to Send SMS');;
                return $validator;
            }
        });
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
           return back()->with( 'message', $count . " messages will be sent!" );

       } else {
           return back()->withErrors( $validator );
       }
    }

}


/*
excel import links:
https://www.webslesson.info/2019/02/import-excel-file-in-laravel.html
https://docs.laravel-excel.com/3.1/imports
*/
