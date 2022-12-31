<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        $users = DB::table('users')->where('is_admin', '0')->get();
        $payments = DB::table('payments')->get();
        $totalmoney = DB::table('payments')->sum('amount');

        return view('admin.dashboard', compact(['users','payments','totalmoney']));
    }    
}
