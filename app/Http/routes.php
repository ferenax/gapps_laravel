<?php


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'MainController@index');

Route::get('google_login', 'MainController@first');

Route::get('login', 'AuthController@login');

Route::get('logout', 'AuthController@logout');

Route::get('google_welcome', 'MainController@back');

Route::get('contact_list' , 'AuthController@getContactList');

