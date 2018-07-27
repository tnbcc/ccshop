<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCartRequest;
use App\Models\CartItem;
use App\Models\ProductSku;
use Illuminate\Http\Request;
use App\Services\CartService;

class CartController extends Controller
{
   protected $cartService;

   public function __construct(CartService $cartService)
   {
       $this->cartService = $cartService;
   }
    public function index(Request $request)
   {
       //$cartItems =  $request->user()->cartItems()->with(['productSku.product'])->get();
       $cartItems = $this->cartService->get();
       $addresses = $request->user()->addresses()->latest('last_used_at')->get();
       return view('cart.index',compact('cartItems','addresses'));
   }




    public function add(AddCartRequest $request)
    {
        $this->cartService->add($request->input('sku_id'),$request->input('amount'));

        return [];
    }

    public function remove(ProductSku $sku, Request $request)
    {
        $this->cartService->remove($sku->id);

        return [];
    }
}
