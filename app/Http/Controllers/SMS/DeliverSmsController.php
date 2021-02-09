<?php

namespace App\Http\Controllers\SMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TappSentMsgLog;
use Auth;

class DeliverSmsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:send']);
    }

    public function index()
    {
        $deliveredMessages = Auth::user()->sentMessages;

        return view('deliversms', ['deliveredMessages' => $deliveredMessages]);
    }
}
