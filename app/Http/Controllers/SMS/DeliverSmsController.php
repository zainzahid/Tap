<?php

namespace App\Http\Controllers\SMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TappSentMsgLog;


class DeliverSmsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $deliveredMessages = TappSentMsgLog::all();

        return view('deliversms', ['deliveredMessages' => $deliveredMessages]);
    }
}