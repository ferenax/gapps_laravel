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

Route::get('login', 'AuthController@login');

Route::get('logout', 'AuthController@logout');

Route::get('/', 'MainController@index');

Route::get('dashboard', 'MainController@dashboard');

Route::get('contact_list' , 'ApiController@getContactList');

Route::get('drive_filelist' , 'ApiController@getDriveFileList');

Route::get('sync', 'ApiController@syncDropbox');

Route::get('dropbox', 'ApiController@showDropbox');

Route::get('dropbox_filelist', 'ApiController@listDropboxFiles');