<?php
Route::get('/','PagesController@root')->name('pages.root');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
