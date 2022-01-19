<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Mail;

class TestController extends Controller {

#Initial
   public function index() {
      echo "<br>Test Controller.";
   }
#Request
   public function testRequest(Request $request){

    echo $request->url();

   }
#cookie
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
#redirect
    public function redirectFun(){
        echo "Redirect function test!.";
    }
#localizaion
    public function localization(Request $request,$locale) {
        //set’s application’s locale
        app()->setLocale($locale);
        
        //Gets the translated message and displays it
        echo trans('lang.msg');
     }
#Session
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
#Validation
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
#FIleUP
     public function fileup() {
        return view('fileupload');
     }
     public function showUploadFile(Request $request) {
        $file = $request->file('image');
     
        //Display File Name
        echo 'File Name: '.$file->getClientOriginalName();
        echo '<br>';
     
        //Display File Extension
        echo 'File Extension: '.$file->getClientOriginalExtension();
        echo '<br>';
     
        //Display File Real Path
        echo 'File Real Path: '.$file->getRealPath();
        echo '<br>';
     
        //Display File Size
        echo 'File Size: '.$file->getSize();
        echo '<br>';
     
        //Display File Mime Type
        echo 'File Mime Type: '.$file->getMimeType();
     
        //Move Uploaded File
        $destinationPath = 'uploads';
        $file->move($destinationPath,$file->getClientOriginalName());
     }
#Mail
     public function basic_email() {
        $data = array('name'=>"Ei Thiri Tun");
     
        Mail::send(['text'=>'mail'], $data, function($message) {
           $message->to('xxxxx@gmail.com', 'Mail Testing From Laravel')->subject
              ('Laravel Basic Testing Mail');
           $message->from('xxxxx@gmail.com','Ei Thiriri');
        });
        echo "Basic Email Sent. Check your inbox.";
     }
     public function html_email() {
        $data = array('name'=>"Ei Thiri Tun");
        Mail::send('mail', $data, function($message) {
           $message->to('xxxxx@gmail.com', 'Mail Testing From Laravel1')->subject
              ('Laravel HTML Testing Mail');
           $message->from('xxxxx@gmail.com','Ei Thiriri');
        });
        echo "HTML Email Sent. Check your inbox.";
     }
     public function attachment_email() {
        $data = array('name'=>"Ei Thiri Tun");
        Mail::send('mail', $data, function($message) {
           $message->to('xxxxx@gmail.com', 'Mail Testing From Laravel2')->subject
              ('Laravel Testing Mail with Attachment');
           $message->attach('C:\Users\FAMILY\testLaravel\public\uploads\BTS.jpg');
           $message->attach('C:\Users\FAMILY\testLaravel\public\uploads\BTS-1.jpeg');
           $message->from('xxxxx@gmail.com','Ei Thiriri');
        });
        echo "Email Sent with attachment. Check your inbox.";
     }

}