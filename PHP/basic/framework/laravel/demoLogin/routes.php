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

Route::get('/', function () {
    return view('welcome');
});

/*DEMO LOGIN LOGOUT ---------------------------------------------------------------*/
/*---------------------------------------------------------------------------------*/

Route::get('SportNews', 'SportNews\SportNewsController@show');

Route::get('SportNews/LogIn', function() {
    return view('SportNews.login');
});
Route::post('SportNews/CheckLogIn', 'SportNews\SportNewsController@checkLogIn');
Route::get('SportNews/LogOut', 'SportNews\SportNewsController@logOut');
Route::get('SportNews/SignUp', function() {
    return view('SportNews.signup');
});


















