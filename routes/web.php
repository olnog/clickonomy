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
	if (auth()){
		return redirect()->action('HomeController@index'); 
	} else {
		return view('auth/login');
	}
});
Route::resources([
	'land'=>'LandController',
	'capital'=>'CapitalController',
	'labor'=>'LaborController'
]);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
