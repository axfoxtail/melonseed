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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@index');

Route::get('test', function() {
	return view('test');
});

Auth::routes(['verify' => false]);

Route::get('activities', 'ProviderController@index');
Route::get('activities/{id}', 'ProviderController@show');
Route::get('providers', 'ProviderController@featured');


Route::group(['middleware' => 'auth'], function() {
	Route::get('dashboard', 'BookingController@index');
	Route::post('activity/complete', 'BookingController@complete');
	Route::post('activity/enrolling', 'ProviderController@enrolling');
	Route::get('profile/{id}/edit', 'UserController@edit');
	Route::put('profile/{id}', 'UserController@update');

	Route::group(['middleware' => 'is.provider'], function(){
		Route::get('providers/profile', 'ProviderController@create');
		Route::get('providers/reviews', 'ProviderController@reviews');
		Route::post('providers', 'ProviderController@store');
	});
});



/*******************************************************************
*
*      ========= ADMIN PANEL ROUTES =========
*
********************************************************************/
Route::get('admin/login', 'AdminController@login')->name('admin.login');
Route::post('admin/login', 'AdminController@login');

Route::group(['middleware' => 'is.admin'], function() {
	Route::get('admin', 'AdminController@index');
	Route::post('admin/logout', 'AdminController@logout');
	Route::get('admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
	Route::get('admin/users', 'AdminController@users');
	Route::post('admin/users/permission', 'AdminController@users_permission');
	Route::get('admin/providers', 'AdminController@providers');
	Route::post('admin/providers/permission', 'AdminController@providers_permission');
	Route::get('admin/reviews', 'AdminController@reviews');
	Route::post('admin/reviews/permission', 'AdminController@reviews_permission');
});