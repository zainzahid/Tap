<?php

namespace App\Http\Controllers\SMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TappSentMsg;

class PendingSmsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pendingMessages = TappSentMsg::all();

        return view('pendingsms', ['pendingMessages' => $pendingMessages]);
    }
}
