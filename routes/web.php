<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landingpage/landingpage');
});

Auth::routes();
Route::match(['get', 'post'], '/myaccount', 'UserAccountController@index')->name('useraccount');
Route::match(['get', 'post'], '/updateuser', 'UserAccountController@update')->name('updateuser');

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('admin/home', 'HomeController@adminDashboard')->name('admin.route')->middleware('admin');

Route::group(['middleware'=>['auth', 'admin']], function(){
    Route::match(['get', 'post'], '/admin', 'AdminController@adminDashboard')->name('admin.route');
    Route::match(['get', 'post'], '/allcustomers', 'AllCustomersController@index')->name('allcustomers');
    Route::match(['get', 'post'], '/allpayments', 'AllPaymentsController@allpayments')->name('allpayments');

});

Route::group(['middleware'=>['auth', 'user']], function(){
    Route::match(['get', 'post'], '/home', 'CustomerController@index')->name('customers.payment');
    Route::match(['get', 'post'], '/home', 'PaypalController@payWithPaypal')->name('customers.payment');
    Route::match(['get', 'post'], '/store', 'PaypalController@store')->name('store_payment');
    Route::post('paypal', array('as' => 'paypal','uses' => 'PaypalController@postPaymentWithpaypal',));
    Route::get('paypal', array('as' => 'status','uses' => 'PaypalController@getPaymentStatus',));
    
    Route::match(['get', 'post'], '/mypayment', 'MyPaymentController@mypayment')->name('mypayment');
    Route::match(['get','post'], '/contactadmin', 'ContactAdminController@contactadmin')->name('contactadmin');
    Route::match(['get','post'], '/sendemail', 'ContactAdminController@sendemail')->name('sendemail');

});