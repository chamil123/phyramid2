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

Route::get('/', 'webController@index');
Route::get('/test', function () {
    Cart::add('293ad', 'Product 1', 1, 9.99);
    // return view('Admin.test');
});
Route::get('/cart', function () {

    return Cart::content();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('member', 'MemberController');
    Route::resource('product', 'ProductController');
    Route::post('product/{id}', 'ProductController@update');

    Route::get('cart', 'cartController@index');
    Route::get('cart/add/{id}', 'cartController@addItem');
    Route::get('cart/remove/{id}', 'cartController@removeItem');
    Route::get('cart/update', 'cartController@update');

    Route::post('checkout', 'cartController@checkout');

    Route::get('orders', 'cartController@viewOrders');
    Route::post('checkout', 'cartController@checkout');
    Route::get('orders/{id}', 'cartController@viewOrdersById');
});
Route::post('/dummey_pv', 'cartController@storeDummeyPv');
Route::get('viewdummey_pv/{id}', 'cartController@viewDummeyPv');
Route::get('dummey_pv_delete/{id}', 'cartController@delete_pv');
Route::get('/product-details/{id}', 'ProductController@productDetails');
//https://github.com/bumbummen99/LaravelShoppingcart#usage