<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetDataController extends Controller
{
    function Data(Request $request)  {
        // print_r($request->all());
        foreach($request->all() as $key=>$data)
      {  
        echo "the value of $key: is $data <br>";
      }
   
        
    }
}
