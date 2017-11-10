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
Route::post('/application', 'LoanController@apply');
Route::get('/myapplications', 'LoanController@showUserApplications');
Route::resource('loan', 'LoanController');

Route::get('advanced_search', 'LoanController@advancedSeach')->name('loan.advanced_search');

Auth::routes();

Route::get('/home', 'HomeController@index');
