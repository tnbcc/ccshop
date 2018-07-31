<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidRequestException;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        //创建一个查询构造器
        $builder = Product::query()->where('on_sale',true);
        //判断是否有search参数,有就赋值给$search变量
        //search 用来迷糊搜索商品
        if ($search = $request->input('search','')) {
            $like = '%'.$search.'%';
            $builder->where(function ($query) use ($like) {
               $query->where('title','like',$like)
                    ->orWhere('description','like',$like)
                   ->orWhereHas('skus',function ($query) use ($like){
                        $query->where('title','like',$like)
                              ->orWhere('description','like',$like);
                   });
            });
        }
        //是否提交order参数 有就提交给$order变量
        //order 参数用来控制商品的排序规则
        if ($order = $request->input('order', '')) {
            // 是否是以 _asc 或者 _desc 结尾
            if (preg_match('/^(.+)_(asc|desc)$/', $order, $m)) {
                // 如果字符串的开头是这 3 个字符串之一，说明是一个合法的排序值
                if (in_array($m[1], ['price', 'sold_count', 'rating'])) {
                    // 根据传入的排序值来构造排序参数
                    $builder->orderBy($m[1], $m[2]);
                }
            }
        }
        $products = $builder->paginate(16);
        $filters  = [
        'search' => $search,
        'order'  => $order,
    ];

        return view('products.index',compact('products','filters'));
    }
    public function show(Product $product,Request $request)
    {
        //判断商品是否上架,如果没有上架抛出异常
        if (!$product->on_sale) {
            throw new InvalidRequestException('该商品未上架');
        }
        $favored = false;
        if ($user = $request->user()) {
            // 从当前用户已收藏的商品中搜索 id 为当前商品 id 的商品
            // boolval() 函数用于把值转为布尔值
            $favored = boolval($user->favoriteProducts()->find($product->id));
        }
        $reviews = OrderItem::query()
                     ->with('order.user','productSku')
                     ->whereNotNull('reviewed_at')
                     ->latest('reviewed_at')
                     ->limit(10)
                     ->get();
        return view('products.show',compact('product','favored','reviews'));
    }
    //收藏
    public function favor(Product $product, Request $request)
    {
        $user = $request->user();
        //dd(111);
        if ($user->favoriteProducts()->find($product->id)) {
            return [];
        }

        $user->favoriteProducts()->attach($product);

        return [];
    }
    //取消收藏
    public function disfavor(Product $product, Request $request)
    {
        $user = $request->user();
        $user->favoriteProducts()->detach($product);

        return [];
    }
    public function favorites(Request $request)
    {
        $products = $request->user()->favoriteProducts()->paginate(16);

        return view('products.favorites', ['products' => $products]);
    }
}
