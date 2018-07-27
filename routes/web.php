<?php


Auth::routes();
Route::get('/','PagesController@root')->name('pages.root');
Route::get('products', 'ProductsController@index')->name('products.index');
Route::get('products/{product}', 'ProductsController@show')->name('products.show');
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
        Route::post('products/{product}/favorite', 'ProductsController@favor')->name('products.favor');
        Route::delete('products/{product}/favorite', 'ProductsController@disfavor')->name('products.disfavor');

        //购物车
        Route::get('cart', 'CartController@index')->name('cart.index');
        Route::post('cart','CartController@add')->name('cart.add');
        Route::delete('cart/{sku}', 'CartController@remove')->name('cart.remove');

        Route::post('orders', 'OrdersController@store')->name('orders.store');
    });
});

