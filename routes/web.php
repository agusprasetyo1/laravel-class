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

Route::get('orders', 'OrderController@indexUser')->name('orders.indexuser');
Route::get('orders/{id}', 'OrderController@userProducts')->name('orders.userProducts');

// route to show the login form
Route::get('/admin/login', "Admin\AdminController@showLogin")->name("admin.show_login");
// route to process the form
Route::post('/admin/login', "Admin\AdminController@doLogin")->name("admin.login");