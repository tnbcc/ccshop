<?php


Auth::routes();
Route::get('/','PagesController@root')->name('pages.root');
Route::get('products', 'ProductsController@index')->name('products.index');

Route::get('test','TestController@index');

Route::group(['middleware'=>'auth'],function () {
    Route::get('/email_verify_notice','PagesController@emailVerifyNotice')->name('email_verify_notice');
    Route::get('/email_verification/verify', 'EmailVerificationController@verify')->name('email_verification.verify');
    Route::get('/email_verification/send', 'EmailVerificationController@send')->name('email_verification.send');
    Route::group(['middleware'=>'email_verified'],function () {
      Route::get('user_addresses','UserAddressesController@index')->name('user_addresses.index');
      Route::get('user_addresses/create', 'UserAddressesController@create')->name('user_addresses.create');
      Route::post('user_addresses', 'UserAddressesController@store')->name('user_addresses.store');
        Route::get('user_addresses/{address}', 'UserAddressesController@edit')->name('user_addresses.edit');
        Route::put('user_addresses/{address}', 'UserAddressesController@update')->name('user_addresses.update');
        Route::delete('user_addresses/{address}', 'UserAddressesController@destory')->name('user_addresses.destroy');

        //收藏
        Route::get('products/favorites', 'ProductsController@favorites')->name('products.favorites');
        Route::post('products/{product}/favorite', 'ProductsController@favor')->name('products.favor');
        Route::delete('products/{product}/favorite', 'ProductsController@disfavor')->name('products.disfavor');

        //购物车
        Route::get('cart', 'CartController@index')->name('cart.index');
        Route::post('cart','CartController@add')->name('cart.add');
        Route::delete('cart/{sku}', 'CartController@remove')->name('cart.remove');


        //订单
        Route::get('orders','OrdersController@index')->name('orders.index');
        Route::post('orders', 'OrdersController@store')->name('orders.store');
        Route::get('orders/{order}', 'OrdersController@show')->name('orders.show');
        Route::post('orders/{order}/received','OrdersController@received')->name('orders.received');
        Route::get('orders/{order}/review', 'OrdersController@review')->name('orders.review.show');
        Route::post('orders/{order}/review', 'OrdersController@sendReview')->name('orders.review.store');
        Route::post('orders/{order}/apply_refund', 'OrdersController@applyRefund')->name('orders.apply_refund');

        //支付
        Route::get('payment/{order}/alipay','PaymentController@payByAlipay')->name('payment.alipay');
        Route::get('payment/{order}/wechat', 'PaymentController@payByWechat')->name('payment.wechat');
        //前端回调
        Route::get('payment/alipay/return','PaymentController@alipayReturn')->name('payment.alipay.return');
    });
});
//服务器端回调
Route::post('payment/alipay/notify','PaymentController@alipayNotify')->name('payment.alipay.notify');
Route::post('payment/wechat/notify', 'PaymentController@wechatNotify')->name('payment.wechat.notify');
//微信退款回调
Route::post('payment/wechat/refund_notify', 'PaymentController@wechatRefundNotify')->name('payment.wechat.refund_notify');

Route::get('products/{product}', 'ProductsController@show')->name('products.show');

Route::get('showorder/{order}','TestController@show');
