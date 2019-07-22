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

Auth::routes(['verify' => true]);

Route::get('profile/{id}/edit', 'UserController@edit')->middleware('auth');
Route::put('profile/{id}', 'UserController@update')->middleware('auth');

// Route::resources([
//     'activities' => 'ActivityController'
// ]);

Route::get('activities', 'ProviderController@index');
Route::get('activities/{id}', 'ProviderController@show');

Route::group(['middleware' => 'auth'], function() {
	Route::post('providers', 'ProviderController@store');
	Route::get('providers/profile', 'ProviderController@create');
});



Route::get('admin/login', 'AdminController@login')->name('admin.login');
Route::post('admin/login', 'AdminController@login');

Route::group(['middleware' => 'is.admin'], function() {
	Route::get('admin', 'AdminController@index');
	Route::post('admin/logout', 'AdminController@logout');
});