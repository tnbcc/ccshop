<?php

namespace App\Http\Controllers;

use App\Models\Order;
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
    public function show(Order $order)
    {
        //$items = $order->items()->with(['product'])->get();
           $items = $order->with('items.product')->get();
        echo '<pre>';
        print_r($items);
    }
}
