<?php

use Illuminate\Support\Facades\Route;
use App\Test\TestFacades;

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

#mail
Route::get('sendbasicemail','App\Http\Controllers\TestController@basic_email');
Route::get('sendhtmlemail','App\Http\Controllers\TestController@html_email');
Route::get('sendattachmentemail','App\Http\Controllers\TestController@attachment_email');

#ajax
Route::get('ajax',function() {
   return view('message');
});
Route::post('/getmsg','App\Http\Controllers\TestController@Ajax');

#Provider
Route::get('/facadeex', function() {
   return TestFacades::testingFacades();
});

#DB
#Create
Route::get('insert','App\Http\Controllers\TestController@insertform');
Route::post('create','App\Http\Controllers\TestController@insert');

#Delete
Route::get('delete-records','App\Http\Controllers\TestController@delete');
Route::get('delete/{id}','App\Http\Controllers\TestController@destroy');

#Get
Route::get('view-records','App\Http\Controllers\TestController@getData');

#Update
Route::get('edit-records','App\Http\Controllers\TestController@updatedata');
Route::get('edit/{id}','App\Http\Controllers\TestController@show');
Route::post('edit/{id}','App\Http\Controllers\TestController@edit');

