<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Mail;

class ContactAdminController extends Controller
{
    public function contactadmin(){
        return view('customers.contactadmin');
    }

    public function sendemail(Request $request){
        
        $data = array('body'=>$request->get('body'),'subject'=>$request->get('subject'));
     
        Mail::send(['text'=>'customers.adminmail'], $data, function($message) {

        $message->to('bazirakyetonny15@gmail.com', 'Wenreco')->subject("Customer complaints");
        $message->from(auth()->user()->email,auth()->user()->name);
        });
      
        return back()->with('success', 'Thanks for contacting us!'); 
    }
}
