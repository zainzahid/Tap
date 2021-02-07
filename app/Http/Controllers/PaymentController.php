<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use Auth;

class PaymentController extends Controller
{
    public function __construct() {
        $this->middleware(['role:user']);
    }

    public function index() {
        return view('payment');
    }
    
    public function payment($amount)
    {
        $data = [];
        $data['items'] = [
            [
                'name' => 'Balance',
                'price' => intval($amount),
                'desc'  => 'Balance Bundle for 10 Sms',
                'qty' => 1
            ]
        ];
  
        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('payment.success');
        $data['cancel_url'] = route('payment.cancel');
        
        $total = 0;
        foreach($data['items'] as $item) {
            $total += $item['price']*$item['qty'];
        }
        $data['total'] = $total;
  
        $provider = new ExpressCheckout;

        $response = $provider->setExpressCheckout($data);
    
        // $response = $provider->setExpressCheckout($data, true);
  
        return redirect($response['paypal_link']);
    }
   
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel()
    {
        dd('Your payment is canceled. You can create cancel page here.');
    }
  
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function success(Request $request)
    {
        $provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->token);
  
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            // Updating the User balance according to purchase
            Auth::user()->update(array('balance' => $response['AMT']));
            
            session()->flash('message', 'Your payment of $'.$response['AMT'].' was successfull.');
            return view('payment');
            
            dd($response);
        }
  
        dd('Something is wrong.');
    }
}
