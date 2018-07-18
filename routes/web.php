<?php


Auth::routes();
Route::get('/','PagesController@root')->name('pages.root');
Route::group(['middleware'=>'auth'],function () {
    Route::get('/email_verify_notice','PagesController@emailVerifyNotice')->name('email_verify_notice');
    Route::group(['middleware'=>'email_verified'],function () {
              Route::get('/test',function () {
                  return '邮箱已经认证';
              });

    });
});

