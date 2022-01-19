<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TestController extends Controller {

   public function index() {
      echo "<br>Test Controller.";
   }

   public function testRequest(Request $request){

    echo $request->url();

   }

}