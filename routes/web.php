<?php

use Illuminate\Support\Facades\Route;


// /* Welcome Routes */

// Route::get('/', function () {
//     return view('welcome');
// });

/* Laravel Mix  Routes */

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/* My Route */
Route::get('/', 'FrontendController@home')->name('home_page');
Route::get('/user_login', 'FrontendController@user_login')->name('login_page');
Route::get('/user_register', 'FrontendController@user_register')->name('register_page');
Route::resource('/user', 'UserController');

Route::group(['middleware' => ['admin']], function () {
    Route::resource('/songs', 'SongController');
});
