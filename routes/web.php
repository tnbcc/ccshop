<?php


Auth::routes();
Route::get('/','PagesController@root')->name('pages.root');
Route::group(['middleware'=>'auth'],function () {
    Route::get('/email_verify_notice','PagesController@emailVerifyNotice')->name('email_verify_notice');
    Route::get('/email_verification/verify', 'EmailVerificationController@verify')->name('email_verification.verify');
    Route::get('/email_verification/send', 'EmailVerificationController@send')->name('email_verification.send');
    Route::group(['middleware'=>'email_verified'],function () {
           

    });
});

