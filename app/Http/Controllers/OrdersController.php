<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\UserAddress;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\OrderService;

class OrdersController extends Controller
{

    public function index(Request $request)
    {
        $orders = Order::query()

            //使用with来进行预加载
            ->with(['items.product','items.productSku'])
            ->where('user_id',$request->user()->id)
            ->latest()
            ->paginate();

        return view('orders.index',compact('orders'));
    }




    public function store(OrderRequest $request, OrderService $orderService)
    {
        $user    = $request->user();
        $address = UserAddress::find($request->input('address_id'));

        return $orderService->store($user, $address, $request->input('remark'), $request->input('items'));
    }

    public function show(Order $order,Request $request)
    {
        $this->authorize('own', $order);
        $order = $order->load(['items.product','items.productSku']);
        return view('orders.show',compact('order'));
    }
}