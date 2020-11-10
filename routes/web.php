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


// Profile Routes
Route::put('seller/profile', 'Seller\ProfileController@update')->name('profile.update');
Route::get('seller/profile/edit', 'Seller\ProfileController@edit')->name('profile.edit');
//Shoppingcart Route
Route::post('addToCart', 'Frontend\shoppigCartController@addToCart')->name("addToCart");
Route::post('remove/{index}', 'Frontend\shoppigCartController@remove');
// Checkout Route
Route::get('/checkout', 'Customer\CheckoutController@checkout');
// View shopping Cart
Route::get('/shoppingcart', 'Frontend\ShoppingCart\shoppingCart@viewCart');

// Billing address route
Route::get('/billing-address', 'Frontend\BillingAdress\billingAdress@addBilling')->name('addBilling');

//Route payment Adress
Route::get('/payment-address', 'Frontend\PaymentAddress\paymentAddress@addPaymentAddress')->name('addPayment');
Route::post('/order-confirmation-detail', 'Frontend\PaymentAddress\paymentAddress@store')->name('paymentAddress.store');
//
Route::get('/test-route', 'Frontend\testController\testing@test');
//order storing  routes
Route::post('order', 'Frontend\Orders\order@store')->name('order.store');

// OrderConfirmationDetail Route
Route::get('/order-confirmation-detail', 'Frontend\OrderConfirmationDetail\orderConfirmationDetail@confirmOrder')->name('placeOrder');

//Order Success Message Route
Route::get('/order-success', 'OrderuSuccess\orderSuccess@orderSuccessMsg');


// Product Routes
Route::get('seller/products/create','Seller\ProductsController@create');
Route::post('seller/products', 'Seller\ProductsController@store')->name('products.create');
Route::get('seller/products/all', 'Seller\ProductsController@all')->name('products.all');
Route::get('seller/products/data', 'Seller\ProductsController@data')->name('products.data');
Route::get('seller/products/{id}/edit', 'Seller\ProductsController@edit')->name('products.edit');
Route::put('seller/products/{id}', 'Seller\ProductsController@update')->name('products.update');
Route::get('seller/products/{id}/suspend', 'Seller\ProductsController@suspend')->name('products.suspend');
Route::get('seller/products/{id}/active', 'Seller\ProductsController@active')->name('products.active');

// Frontend Routes
Route::get('/home', 'Frontend\HomeController@index')->name('homePage');
Route::get('/product/{name}', 'Frontend\HomeController@product');

Route::get('/admin', function (){
    return view('admin.index');
});
Route::get('/customer', function (){
    return view('customer.index');
});
Route::get('/seller', function (){
    return view('seller.index');
});
Route::get('/test', function (){

});
