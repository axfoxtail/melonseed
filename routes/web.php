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

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('profile/{id}/edit', 'UserController@edit')->middleware('auth');
Route::put('profile/{id}', 'UserController@update')->middleware('auth');

Route::resources([
    'activities' => 'ActivityController',
    'providers' => 'ProviderController'
]);

