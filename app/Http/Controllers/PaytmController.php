<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use PaytmWallet;

class PaytmController extends Controller
{
    public function paytmPayment(Request $request)
    {

        $payment = PaytmWallet::with('receive');
        $payment->prepare([
            'order' => $request->ORDER_ID,
            'user' => $request->CUST_ID, //customer id
            'mobile_number' => $request->mobile,
            'email' => $request->email,
            'amount' => $request->TXN_AMOUNT,
            'callback_url' => route('paytm.callback'),
        ]);
        Order::create($request->all());
        return $payment->receive();
    }

    /**
     * Obtain the payment information.
     *
     * @return Object
     */
    public function paytmCallback()
    {
        $transaction = PaytmWallet::with('receive');

        $order_id = $transaction->getOrderId();

        $response = $transaction->response(); // To get raw response as array
        //Check out response parameters sent by paytm here -> http://paywithpaytm.com/developer/paytm_api_doc?target=interpreting-response-sent-by-paytm

        if ($transaction->isSuccessful()) {
            //Transaction Successful
            $order = tap(Order::where('ORDER_ID', $order_id))->update(['paymentstatus' => 'TXN_SUCCESS', 'transaction_id' => $transaction->getTransactionId()])->first();
            return view('paytm.paytm-response', compact('order'));
        } else if ($transaction->isFailed()) {
            //Transaction Failed
            $order = tap(Order::where('ORDER_ID', $order_id))->update(['paymentstatus' => 'TXN_FAILURE', 'transaction_id' => $transaction->getTransactionId()])->first();
            return view('paytm.paytm-response', compact('order'));
        } else if ($transaction->isOpen()) {
            //Transaction Open/Processing
            $order = tap(Order::where('ORDER_ID', $order_id))->update(['paymentstatus' => 'TXN_FAILURE', 'transaction_id' => $transaction->getTransactionId()])->first();
            return view('paytm.paytm-response', compact('order'));
        }
        $transaction->getResponseMessage(); //Get Response Message If Available
        //get important parameters via public methods
        $transaction->getOrderId(); // Get order id
        $transaction->getTransactionId(); // Get transaction id
    }

    /**
     * Paytm Payment Page
     *
     * @return Object
     */
}
