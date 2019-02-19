<?php

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
    return view('welcome');
});

Route::get('/admin', function () {
	return view('layout.admin');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
	// 'prefix'=>'/master',
	'middleware'=>'auth',
], function(){
	Route::post('user/delete', ['as'=>'user.delete', 'uses'=>'UserController@delete']);
	Route::resource('user','UserController');

	Route::post('hotspot/delete', ['as'=>'hotspot.delete', 'uses'=>'HotspotController@delete']);
	Route::resource('hotspot', 'HotspotController');
});

Route::group([
	'middleware'=>'auth'
], function(){
	Route::post('customer/delete', ['as'=>'customer.delete', 'uses'=>'CustomerController@delete']);
	Route::resource('customer', 'CustomerController');

	Route::post('voucher/delete', ['as'=>'voucher.delete', 'uses'=>'VoucherController@delete']);
	Route::resource('voucher', 'VoucherController');

	Route::get('sales/print/{id}', ['as'=>'sales.print', 'uses'=>'SalesController@printAccount']);
	Route::post('sales/delete', ['as'=>'sales.delete', 'uses'=>'SalesController@delete']);
	Route::resource('sales', 'SalesController');


	Route::post('radius/check/delete', ['as'=>'radius.check.delete', 'uses'=>'RadiusCheckController@delete']);


	Route::resource('radius/setting','RadiusSettingController',['as'=>'radius']);
	Route::resource('radius/accounting', 'RadiusAccountingController',['as'=>'radius']);
	Route::resource('radius/check', 'RadiusCheckController',['as'=>'radius']);
});