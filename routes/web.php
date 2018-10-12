<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', 'UsersController', ['except' => ['destroy']]);
Route::get('users/{user}/delete', ['as' => 'users.delete', 'uses' => 'UsersController@destroy']);

Route::resource('products', 'ProductsController', ['except' => ['destroy']]);
Route::get('products/{id}/delete', ['as' => 'products.delete', 'uses' => 'ProductsController@destroy']);

Route::resource('category', 'CategoryController', ['except' => ['destroy']]);
Route::get('category/{id}/delete', ['as' => 'category.delete', 'uses' => 'CategoryController@destroy']);

Route::resource('orders', 'OrderController', ['except' => ['destroy']]);
Route::get('orders/{id}/delete', ['as' => 'orders.delete', 'uses' => 'OrderController@destroy']);