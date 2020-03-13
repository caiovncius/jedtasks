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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**********************************************************
 * Account routes
 *********************************************************/
Route::prefix('account')->group(function() {

    Route::get('/', 'AccountController@edit')->name('account.edit');
    Route::put('/update-profile', 'AccountController@updateProfile')->name('account.update.profile');
    Route::put('/update-workspace', 'AccountController@updateWorkspace')->name('account.update.workspace');
    Route::put('/update-settings', 'AccountController@updateSettings')->name('account.update.settings');
    Route::put('/update-password', 'AccountController@updatePassword')->name('account.update.password');
});
