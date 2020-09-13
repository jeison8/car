<?php

use Illuminate\Support\Facades\Route;


// Route::get('/', function () {return view('welcome');});
Route::get('/','StoreController@index')->name('store.index');
Route::get('add-cart/{product}','StoreController@addCart')->name('store.add-cart');
Route::get('product-detail/{product}','StoreController@detail')->name('store.detail');
Route::get('cart', function () {return view('cart');});
Route::get('order', function () {return view('order');});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
