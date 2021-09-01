<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\TappSentMsgLog;
use App\Models\TappSentMsg;
use App\Models\TappMsgReceive;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware(['auth','verified']); // auth+email verification required to access this route
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_data_array = $this->userReport();   

        $dbStats = [
            'delivered_messages' => Auth::user()->sentMessages->count(),
            'pending_messages' => Auth::user()->pendingMessages->count(),
            'recieved_messages' => Auth::user()->recievedMessages->count()
        ];
        if (Auth::user()->hasRole('user')) {
            $dbStats += ['balance' => Auth::user()->balance];
        }
        if (Auth::user()->hasRole('admin')) {
            $dbStats += ['total_users' => User::role('user')->count()];
        }
        return view('home', ['dbStats' => $dbStats,
         'user_data' => $user_data_array,
         'userData' => json_encode($user_data_array,JSON_NUMERIC_CHECK)]);
    }

    public function userReport() {
        $received_messages = DB::select('select distinct count(id) as received_messages, DATE(date_time) as Date
            FROM tapp_msg_receive
            WHERE user_id='.Auth::user()->id.
            ' GROUP BY Date');

        $pending_messages = DB::select('select distinct count(id) as pending_messages, DATE(date_time) as Date
        FROM tapp_sent_msg
        WHERE user_id='.Auth::user()->id.
        ' GROUP BY Date');
        $sent_messages = DB::select('select distinct count(id) as sent_messages, DATE(date_time) as Date
        FROM tapp_sent_msg_log
        WHERE user_id='.Auth::user()->id.
        ' GROUP BY Date');
        
        $combine_result = array_merge($received_messages,$pending_messages, $sent_messages); 
        $all_dates = array_map(function($item) { return $item->Date; }, $combine_result); 
        $unique_dates = array_unique($all_dates); 
        
        $new_array = [];

        $default_item = array(
            'received_messages' => 0,
            'pending_messages' => 0,
            'sent_messages' => 0,
        );
        
        for($i=0 ; $i< count($unique_dates) ; $i++) {
            array_push($new_array,$default_item);
            $new_array[$i] += ['Date' => $unique_dates[$i]];
            
            for($j=0 ; $j< count($combine_result) ; $j++) {
                
                if($combine_result[$j]->Date == $unique_dates[$i]) {
                    if (property_exists($combine_result[$j], 'received_messages') && isset($combine_result[$j]->received_messages)) {
                        $new_array[$i]['received_messages'] += $combine_result[$j]->received_messages;
                    }

                    if (property_exists($combine_result[$j], 'pending_messages') && isset($combine_result[$j]->pending_messages)) {
                        $new_array[$i]['pending_messages'] += $combine_result[$j]->pending_messages;
                    }

                    if (property_exists($combine_result[$j], 'sent_messages') && isset($combine_result[$j]->sent_messages)) {
                        $new_array[$i]['sent_messages'] += $combine_result[$j]->sent_messages;
                    }

                }
            }
        }

        //dd($new_array);
        return $new_array;
    }
    
}
