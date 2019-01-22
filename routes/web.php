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

Route::get('/base', function () {
    return view('welcome');
});

//Mengirim email
Route::middleware("localization")->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard.index');

    Route::resource('users', 'UsersController', ['except' => ['destroy']]);
    Route::get('users/{user}/delete', ['as' => 'users.delete', 'uses' => 'UsersController@destroy']);
    Route::get('download/exportexcel1', 'UsersController@export_excel1')->name('users1.download'); //Export data excel dengan MatWebsite
    Route::get('exportexcel2', 'UsersController@export_excel2')->name('users2.download'); //Export data excel dengan box/spout

    Route::get('/cacheuser', 'UsersController@testCache')->name('users.cache'); //Membuat cache user

    Route::resource('products', 'ProductsController', ['except' => ['destroy']]);
    Route::get('products/{id}/delete', ['as' => 'products.delete', 'uses' => 'ProductsController@destroy']);

    Route::resource('category', 'CategoryController', ['except' => ['destroy']]);
    Route::get('category/{id}/delete', ['as' => 'category.delete', 'uses' => 'CategoryController@destroy']);

    Route::get('orders', 'OrderController@index')->name('orders.index');
    Route::get('orders/add', 'OrderController@addOrder')->name('orders.addOrder');
});
// route to show register admin
Route::get('/admin/register', 'Admin\AdminController@formRegister')->name("admin.form_register");
Route::post('/admin/register', 'Admin\AdminController@register')->name("admin.register");
// route to show the login form
Route::get('/admin/login', "Admin\AdminController@showLogin")->name("admin.show_login");
// route to process the form
Route::post('/admin/login', "Admin\AdminController@doLogin")->name("admin.login");
Route::get('/admin/logout', "Admin\AdminController@logoutData")->name("admin.logout");

Route::get('/mail', 'EmailController@mail')->name('mail.index');
// Route::post('/mail', 'EmailController@mail')->name('mail.send');
