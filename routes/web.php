<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index');
Route::get('/dashboard', 'LoanController@dashboard');
Route::get('/application', 'LoanController@application');
Route::get('/applications', 'LoanController@applications');
Route::get('/userloans', 'LoanController@userloans');
Route::get('/payments', 'LoanController@showPayments');
Route::get('/add_payment', 'LoanController@add_payment');
Route::get('/editpayment/{id}', 'LoanController@editPayment');
Route::post('/payments', 'LoanController@addPayment');
Route::get('/paybacks', 'LoanController@paybacks');
Route::get('/monitors', 'LoanController@monitoring');
Route::get('/delete/{model}/{id}', 'LoanController@delete');
Route::get('/approve/{id}', 'LoanController@approvePayback');
Route::get('/disapprove/{id}', 'LoanController@disapprovePayback');
Route::post('/application', 'LoanController@apply');
Route::get('/myapplications', 'LoanController@showUserApplications');
Route::resource('loan', 'LoanController');

Route::get('advanced_search', 'LoanController@advancedSeach')->name('loan.advanced_search');

Auth::routes();

Route::get('/home', 'HomeController@index');
