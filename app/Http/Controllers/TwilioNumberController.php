<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TappTwilioNumber;

class TwilioNumberController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index() {
        $twilionumbers = TappTwilioNumber::all();

        return view('twilionumber', ['twilionumbers' => $twilionumbers]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'number' => 'required'
        ]);

        $inputs = [
            'number' => $request->input( 'number' ),
            'date_time' => now(),
            'client_name' => '',
            'is_default' => 'no'
        ];

        TappTwilioNumber::insert($inputs);

        return back();
    }


}
