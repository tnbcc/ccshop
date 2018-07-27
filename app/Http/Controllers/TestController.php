<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(Request $request)
    {
        //$request->session()->put('sex',1);
       echo $request->session()->get('sex');
        //$request->session()->forget('sex');
        //echo \Cache::get('sex');
    }
}
