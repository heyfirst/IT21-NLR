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

Route::get('/','HomeController@index');
Route::get('/redirect', 'Auth\RegisterController@redirectToProvider');
Route::get('/callback', 'Auth\RegisterController@handleProviderCallback');

Auth::routes();

Route::get('/reservation', 'ReserveController@index');
Route::get('/booking/{id}', 'BookingController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
