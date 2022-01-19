<?php

use Illuminate\Support\Facades\Route;

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

Route::get('role',[
    'middleware' => 'Test',
    'uses' => 'App\Http\Controllers\TestController@index',
 ]);

 Route::get('request','App\Http\Controllers\TestController@testRequest');

 ##view and request and response
 Route::get('/register',function() {
    return view('register');
 });

 Route::post('/user/register',array('uses'=>'App\Http\Controllers\UserController@UserRegister'));

 ##cookie
 Route::get('cookie/set','App\Http\Controllers\TestController@setCookie');

 Route::get('cookie/get','App\Http\Controllers\TestController@getCookie');

 ##Redirect
 Route::get('testre','App\Http\Controllers\TestController@redirectFun');

 Route::get('redirect',function() {
    return redirect()->action('App\Http\Controllers\TestController@redirectFun');
 });

 ##form
 Route::get('/form',function() {
    return view('form');
 });

 #localization
 Route::get('localization/{locale}','App\Http\Controllers\TestController@localization');

 ##session
 Route::get('session/get','App\Http\Controllers\TestController@accessSessionData');
Route::get('session/set','App\Http\Controllers\TestController@storeSessionData');
Route::get('session/remove','App\Http\Controllers\TestController@deleteSessionData');

##Validation
Route::get('/validation','App\Http\Controllers\TestController@showform');
Route::post('/validation','App\Http\Controllers\TestController@validateform');


#fileupload
Route::get('/uploadfile','App\Http\Controllers\TestController@fileup');
Route::post('/uploadfile','App\Http\Controllers\TestController@showUploadFile');