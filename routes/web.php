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

 Route::get('/register',function() {
    return view('register');
 });

 Route::post('/user/register',array('uses'=>'App\Http\Controllers\UserController@UserRegister'));

 Route::get('cookie/set','App\Http\Controllers\TestController@setCookie');

 Route::get('cookie/get','App\Http\Controllers\TestController@getCookie');