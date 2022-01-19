<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class TestController extends Controller {

   public function index() {
      echo "<br>Test Controller.";
   }

   public function testRequest(Request $request){

    echo $request->url();

   }

    public function setCookie(Request $request) {
        $minutes = 1;
        $response = new Response('Hello World');
        $response->withCookie(cookie('name', 'EiThiri', $minutes));
        return $response;
    }
    public function getCookie(Request $request) {
        $value = $request->cookie('name');
        echo $value;
    }

    public function redirectFun(){
        echo "Redirect function test!.";
    }

    public function localization(Request $request,$locale) {
        //set’s application’s locale
        app()->setLocale($locale);
        
        //Gets the translated message and displays it
        echo trans('lang.msg');
     }

     public function accessSessionData(Request $request) {
        if($request->session()->has('my_name'))
           echo $request->session()->get('my_name');
        else
           echo 'No data in the session';
     }
     public function storeSessionData(Request $request) {
        $request->session()->put('my_name','Ei Thiri Tun');
        echo "Data has been added to session";
     }
     public function deleteSessionData(Request $request) {
        $request->session()->forget('my_name');
        echo "Data has been removed from session.";
     }

     public function showform() {
        return view('login');
     }
     public function validateform(Request $request) {
        print_r($request->all());
        echo "eithiri";
        $this->validate($request,[
           'username'=>'required|max:8',
           'password'=>'required'
        ]);
     }

}