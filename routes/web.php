<?php

use Illuminate\Support\Facades\Route;


// Route::get('/', function () {return view('welcome');});
Route::get('/','StoreController@index')->name('store.index');
Route::get('add-cart/{product}','StoreController@addCart')->name('store.add-cart');
Route::get('product-detail/{product}','StoreController@detail')->name('store.detail');
Route::get('cart', function () {return view('cart');});
Route::get('order','StoreController@order')->name('store.order');
Route::get('shipping-info','StoreController@shippingInfo')->name('store.shipping-info');
Route::patch('insert-shipping-info/{user}','PasarellaController@InsertshippingInfo')->name('pasarella.insert-shipping-info');
Route::get('shipping-response','PasarellaController@ShippingResponse')->name('pasarella.shipping-response');
Route::get('list-products','ProductController@index')->name('products.index');
Route::get('create-products','ProductController@create')->name('products.create');
Route::post('store-products','ProductController@store')->name('products.store');
Route::get('edit-products/{product}','ProductController@edit')->name('products.edit');
Route::get('destroy-products/{product}','ProductController@destroy')->name('products.destroy');
Route::patch('update-products/{product}','ProductController@update')->name('products.update');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
