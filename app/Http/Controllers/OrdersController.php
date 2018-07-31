<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidRequestException;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\SendReviewRequest;
use App\Models\UserAddress;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\OrderService;
use Carbon\Carbon;
use App\Events\OrderReviewd;
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
    public function received(Order $order,Request $request)
    {
        //校验权限
        $this->authorize('own',$order);

        //判断订单状态
        if ($order->ship_status !== Order::SHIP_STATUS_DELIVERED) {
            throw new InvalidRequestException('订单状态不正确');
        }

        //修改订单状态为已收货
        $order->update(['ship_status' => Order::SHIP_STATUS_RECEIVED]);

        return redirect()->back();
    }
    public function review(Order $order)
    {
        //校验权限
        $this->authorize('own',$order);

        if (!$order->paid_at) {
            throw new InvalidRequestException('该订单未支付，不可评价');
        }
        // 使用 load 方法加载关联数据，避免 N + 1 性能问题
        return view('orders.review', ['order' => $order->load(['items.productSku', 'items.product'])]);

    }
    public function sendReview(Order $order,SendReviewRequest $request)
    {
          //校验权限
        $this->authorize('own',$order);
        //判断订单是否支付
        if (!$order->paid_at) {
            throw new InvalidRequestException('该订单未支付，不可评价');
        }
        //判断订单是否已经被评价过
        if ($order->reviewed) {
            throw new InvalidRequestException('该订单已经评价，不可重复提交');
        }
        $reviews = $request->input('reviews');
        \DB::transaction(function () use ($reviews,$order){
            //遍历用户提交的数据
            foreach ($reviews as $review) {
                $orderItem = $order->items()->find($review['id']);
                // 保存评分和评价
                $orderItem->update([
                    'rating'      => $review['rating'],
                    'review'      => $review['review'],
                    'reviewed_at' => Carbon::now(),
                ]);
            }
            // 将订单标记为已评价
            $order->update(['reviewed' => true]);
            event(new OrderReviewd($order));
    });
        return redirect()->back();
    }
}