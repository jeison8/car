<?php

use Illuminate\Support\Facades\Route;


Route::get('/','StoreController@index')->name('store.index');
Route::post('store-search','StoreController@search')->name('store.search');


Route::get('list-cars','CartController@index')->name('cars.index');
Route::get('cars-create','CartController@create')->name('cars.create');
Route::post('store-cars','CartController@store')->name('cars.store');
Route::get('edit-cars/{car}','CartController@edit')->name('cars.edit');
Route::patch('update-cars/{car}','CartController@update')->name('cars.update');
Route::get('destroy-cars/{car}','CartController@destroy')->name('cars.destroy');
Route::get('car-detail/{car}','CartController@show')->name('cars.show');
Route::get('add-cart/{car}','CartController@addCart')->name('cars.add-cart');


Route::get('list-users','UserController@index')->name('users.index');
Route::get('users-create','UserController@create')->name('users.create');
Route::post('store-users','UserController@store')->name('users.store');
Route::get('edit-users/{user}','UserController@edit')->name('users.edit');
Route::patch('update-users/{user}','UserController@update')->name('users.update');
Route::get('destroy-users/{user}','UserController@destroy')->name('users.destroy');
Route::get('users-detail/{user}','UserController@show')->name('users.show');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
