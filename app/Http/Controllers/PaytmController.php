<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Standard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PaytmWallet;

class PaytmController extends Controller
{
    public function paytmPayment(Request $request)
    {
        try {

            $amount = Standard::where('class_id', $request->select_class)->first()->class_price;
            $payment = PaytmWallet::with('receive');
            $payment->prepare([
                'order' => $request->ORDER_ID,
                'user' => $request->CUST_ID, //customer id
                'mobile_number' => $request->mobile,
                'email' => $request->email,
                'amount' => $amount,
                'callback_url' => route('paytm.callback'),
            ]);
            Order::create($request->all());
            return $payment->receive();

        } catch (\Exception $e) {

            return $e->getMessage();
        }

    }

    /**
     * Obtain the payment information.
     *
     * @return Object
     */
    public function paytmCallback()
    {

        try {

            $transaction = PaytmWallet::with('receive');

            $order_id = $transaction->getOrderId();

            $response = $transaction->response(); // To get raw response as array
            //Check out response parameters sent by paytm here -> http://paywithpaytm.com/developer/paytm_api_doc?target=interpreting-response-sent-by-paytm

            if ($transaction->isSuccessful()) {
                //Transaction Successful
                $order = tap(Order::where('ORDER_ID', $order_id))->update(['paymentstatus' => 'TXN_SUCCESS', 'transaction_id' => $transaction->getTransactionId()])->first();
                Session::flash('redirect', true);
                return view('paytm.paytm-response', compact('order'));
            } else if ($transaction->isFailed()) {
                //Transaction Failed
                $order = tap(Order::where('ORDER_ID', $order_id))->update(['paymentstatus' => 'TXN_FAILURE', 'transaction_id' => $transaction->getTransactionId()])->first();
                Session::flash('redirect', true);
                return view('paytm.paytm-response', compact('order'));
            } else if ($transaction->isOpen()) {
                //Transaction Open/Processing
                $order = tap(Order::where('ORDER_ID', $order_id))->update(['paymentstatus' => 'TXN_FAILURE', 'transaction_id' => $transaction->getTransactionId()])->first();
                Session::flash('redirect', true);
                return view('paytm.paytm-response', compact('order'));
            }
            $transaction->getResponseMessage(); //Get Response Message If Available
            //get important parameters via public methods
            $transaction->getOrderId(); // Get order id
            $transaction->getTransactionId(); // Get transaction id

        } catch (\Exception $e) {

            return redirect('/subscribe');
        }

    }

    /**
     * Paytm Payment Page
     *
     * @return Object
     */
}
