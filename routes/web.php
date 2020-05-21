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

Auth::routes();

Route::get('/index', 'HomeController@index')->name('home');
Route::get('/seller/products/create','seller\ProductsController@create');
Route::post('/seller/products', 'seller\productscontroller@store')->name('products.create');

Route::get('/admin', function (){
    return view('admin.index');
});
Route::get('/buyer', function (){
    return view('buyer.index');
});
Route::get('/seller', function (){
    return view('seller.index');
});
