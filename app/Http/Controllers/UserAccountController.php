<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\user;
use Illuminate\Support\Facades\Hash;

class UserAccountController extends Controller
{
   
    public function index()
    {
        if(Auth::user()){
            $user = user::find(Auth::user()->id);
            if($user){
    
            return view('account.myaccount')->withUser($user);
        }else{
            return redirect()->back();
        }

        }else{
            return redirect()->back();
        }
       
    }

   
   
    public function update(Request $request)
    {
        $validate = $request->validate([
    		 'name' => 'required',
    		 'email' =>' required|email',
    	  ]);

          $user = user::find(Auth::user()->id);

          if($user){
                $user->name=$request['name'];
                $user->email=$request['email'];
                $user->save();
                
                return redirect()->back()->with('success','updated successfully');

            }else
            {
               return redirect()->back();
            }
    }
}
