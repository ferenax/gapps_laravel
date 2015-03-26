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

Route::get('/', function() {

    // dd(Auth::getUser());
  //  if (Auth::check()) return 'Welcome back ' . Auth::user()->username;
    if (Auth::check()) return redirect('google_welcome');
    return redirect('google_login');

});


Route::get('google_login', 'MainController@index');

Route::get('login', 'AuthController@login');

Route::get('logout', 'AuthController@logout');

Route::get('google_welcome', function(){

    $user = Auth::user();
    return View::make('google_welcomeback',['user' => $user]);

});
