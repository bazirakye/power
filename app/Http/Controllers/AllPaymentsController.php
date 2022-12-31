<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Payments;
Use App\User;

class AllPaymentsController extends Controller
{
    public function allpayments(){

        $data= Payments::join('users', 'users.id','=','payments.user_id')
                ->get(['payments.id','payments.meter_number','payments.amount','payments.cost_of_units','payments.vat','payments.service_fee','payments.token','payments.transaction_id','payments.units','payments.created_at','users.name']);
        return view('admin.allpayments',compact('data'))->with('i');
        
    }
}
