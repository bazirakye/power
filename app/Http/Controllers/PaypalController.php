<?php

namespace App\Http\Controllers;
use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use App\Payments;
use Mail;
class PaypalController extends Controller
{
    private $_api_context;

    public function __construct()
    {

        $paypal_configuration = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_configuration['client_id'], $paypal_configuration['secret']));
        $this->_api_context->setConfig($paypal_configuration['settings']);
    }

    public function payWithPaypal()
    {
        return view('customers.payment');
    }

    public function postPaymentWithpaypal(Request $request)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

    	$item_1 = new Item();

        $item_1->setName($request->get('units').' units')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->get('amount'));

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->get('amount'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('My description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('status'))
            ->setCancelUrl(URL::route('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error','Connection timeout');
                return Redirect::route('customers.payment');
            } else {
                \Session::put('error','Some error occur, sorry for inconvenient');
                return Redirect::route('customers.payment');
            }
        }

        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        Session::put('paypal_payment_id', $payment->getId());

        Session::put('meter_no', $request->get('meter_no'));
        Session::put('uganda_amount', $request->get('uganda_amount'));
        Session::put('token', $request->get('token'));
        Session::put('service_fee', $request->get('service_fee'));
        Session::put('vat', $request->get('vat'));
        Session::put('cost_of_units', $request->get('cost_of_units'));
        Session::put('units', $request->get('units'));
        Session::put('trial', $request->get('amount'));

        if(isset($redirect_url)) {
            return Redirect::away($redirect_url);
        }

        \Session::put('error','Unknown error occurred');
    	return Redirect::route('customers.payment');
    }



    public function getPaymentStatus(Request $request)
    {
        $meter_no=Session::get('meter_no');
        $uganda_amount=Session::get('uganda_amount');
        $token=Session::get('token');
        $service_fee=Session::get('service_fee');
        $vat=Session::get('vat');
        $cost_of_units=Session::get('cost_of_units');
        $units=Session::get('units');

        $payment_id = Session::get('paypal_payment_id');

        Session::forget('paypal_payment_id');
        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            \Session::put('error','Payment failed');
            return Redirect::route('customers.payment');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));
        $result = $payment->execute($execution, $this->_api_context);
        // $list=$item_1;
        if ($result->getState() == 'approved') {

            $id = auth()->user()->id;

            $payments = new Payments();
            $payments->user_id = $id;
            $payments->meter_number = $meter_no;
            $payments->amount = $uganda_amount;
            $payments->cost_of_units = $cost_of_units;
            $payments->vat = $vat;
            $payments->service_fee = $service_fee;
            $payments->token = $token;
            $payments->units = $units;
            $payments->transaction_id = $payment_id;

            $payments->save();

            $data = array('transaction_date'=>date('d.m.Y'),'cost_of_units'=>$cost_of_units,'name'=>auth()->user()->name, 'meter_number'=>$meter_no,'amount'=>$uganda_amount,'token'=>$token,'service_fee'=>$service_fee,'vat'=>$vat,'units'=>$units,'payment_id'=>$payment_id);

            Mail::send(['text'=>'mail'], $data, function($message) {
            $message->to($id = auth()->user()->email, 'Tutorials Point')->subject
              ('Payment successful');
            $message->from('bazirakyetonny15@gmail.com','Units paid successfully');
            });

            return Redirect::route('customers.payment')->with('info','Units paid successfully');


        }
        else{
        \Session::put('error','Payment failed !!');
		// return Redirect::route('customers.payment');
        // echo "failed";
        return Redirect::route('customers.payment')->with('warning','Failed to pay');
        // return redirect()->back();
        }
    }

}
