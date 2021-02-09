<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\TappSentMsgLog;
use App\Models\TappSentMsg;
use App\Models\TappMsgReceive;



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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {        
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
        return view('home', ['dbStats' => $dbStats]);
    }
}
