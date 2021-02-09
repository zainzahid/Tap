<?php

namespace App\Http\Controllers\SMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TappSentMsg;
use Auth;

class PendingSmsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:send']);
    }

    public function index()
    {
        $pendingMessages = Auth::user()->pendingMessages;

        return view('pendingsms', ['pendingMessages' => $pendingMessages]);
    }
}
