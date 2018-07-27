<?php

namespace App\Jobs;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

//代表这个类需要被放到队列中执行，而不是触发时立即执行
class CloseOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $order;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Order $order,$delay)
    {
        $this->order = $order;

        //设置延迟的时间，delay() 方法的参数代表多少秒之后执行

        $this->delay($delay);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    //定义这个任务类的具体的执行逻辑
    //当队列处理器从队列中取出任务时，就会调用handle() 方法
    public function handle()
    {
        //判断对应的订单是否已经已经被支付
        //如果订单已经被支付则不需要关闭订单，直接退出

        if ($this->order->paid_at) {
            return;
        }

        //通过事务执行SQL
        \DB::transaction(function () {
           //将订单的close 字段标记为 true 即关闭订单
            $this->order->update(['closed' => true]);
            //循环遍历订单商品中的sku 将订单中的数量加回到SKU的库存中

            foreach ($this->order->items as $item) {
                $item->productSku->addStock($item->amount);
            }

        });
    }
}
