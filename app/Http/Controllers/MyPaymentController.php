<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Auth;
use App\Payments;

class MyPaymentController extends Controller
{
    public function mypayment(){
        $userid= Auth::id();   
        // $payment=DB::table('payments')->where('user_id',$userid )->value('id');
        $payments = Payments::where('user_id',$userid)->orderBy('created_at', 'desc')->paginate(8);
        return view('customers.mypayment',compact('payments'));
    }
}
