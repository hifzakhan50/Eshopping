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
Route::post('/storeorder', 'Frontend\Orders\order@store');

// OrderConfirmationDetail Route
Route::get('/order-confirmation-detail', 'Frontend\OrderConfirmationDetail\orderConfirmationDetail@confirmOrder')->name('placeOrder');

//Order Success Message Route
Route::get('/order-success', 'OrderuSuccess\orderSuccess@orderSuccessMsg');
                                    /*new routes starts*/
Route::put('/customer/profile', 'Customer\profileController@update')->name('profile.update');
Route::get('/customer/profile/edit', 'Customer\profileController@edit')->name('profile.edit');

Route::put('/admin/profile', 'Admin\profileController@update')->name('profile.update');
Route::get('/admin/profile/edit', 'Admin\profileController@edit')->name('profile.edit');

Route::put('/fulNet/profile', 'fulNet\profileController@update')->name('profile.update');
Route::get('/fulNet/profile/edit', 'fulNet\profileController@edit')->name('profile.edit');
                                    /*new routes ends*/

// Product Routes
Route::get('seller/products/create','Seller\ProductsController@create');
Route::post('seller/products', 'Seller\ProductsController@store')->name('products.create');
Route::get('seller/products/all', 'Seller\ProductsController@all')->name('products.all');
Route::get('seller/products/data', 'Seller\ProductsController@data')->name('products.data');
Route::get('seller/products/{id}/edit', 'Seller\ProductsController@edit')->name('products.edit');
Route::put('seller/products/{id}', 'Seller\ProductsController@update')->name('products.update');
Route::get('seller/products/{id}/suspend', 'Seller\ProductsController@suspend')->name('products.suspend');
Route::get('seller/products/{id}/active', 'Seller\ProductsController@active')->name('products.active');

//Ad-management Routes
Route::get('seller/adMan/create','Seller\CampaignsController@create');
Route::post('seller/adMan', 'Seller\CampaignsController@store')->name('adManCreate');
Route::post('seller/adMan/fetch', 'Seller\CampaignsController@fetch')->name('adMan.fetch');


Route::get('seller/adMan/all', 'Seller\sellerController@sellerAds')->name('adManAll');
Route::post('/addnewad', 'Seller\sellerController@saveAd');
Route::get('seller/adMan/data', 'Seller\CampaignsController@data')->name('adManData');

Route::get('/seller/adMan/{id}/edit', 'Seller\CampaignsController@edit')->name('adManEdit');
Route::put('/seller/adMan/{id}/update', 'Seller\CampaignsController@update')->name('adManUpdate');

Route::get('seller/adMan/{id}/suspend', 'Seller\CampaignsController@suspend')->name('adManSuspend');
Route::get('seller/adMan/{id}/active', 'Seller\CampaignsController@active')->name('adManActive');

/*Category Routes*/
Route::get('/admin/category/all', 'admin\Categoriescontroller@all')->name('category.all')->middleware('auth');
Route::get('admin/category/data', 'admin\CategoriesController@data')->name('category.data');

Route::get('/admin/category/create','admin\CategoriesController@create');
Route::post('/admin/category', 'admin\categoriesController@store')->name('category.create');
Route::get('/admin/category/{id}/edit', 'admin\categoriescontroller@edit')->name('category.edit');
Route::put('/admin/category/{id}', 'admin\Categoriescontroller@update')->name('category.update');

Route::get('admin/category/{id}/suspend', 'admin\CategoriesController@suspend')->name('categorySuspend');
Route::get('admin/category/{id}/active', 'admin\categoriesController@active')->name('category.active');

Route::get('admin/displayData/customer', 'admin\customersController@all');
Route::get('admin/displayData/seller', 'admin\sellersController@all');

/*Shipping Routes*/
Route::get('/admin/shipping-management/create','admin\shipMans@create');
Route::post('/admin/shipping-management/store', 'admin\shipMans@store')->name('storeShipping');
Route::post('/admin/shipping-management', 'admin\shipMans@index');

Route::get('/admin/shipping-management/all', 'admin\shipMans@all')->name('shipManAll');
Route::get('/admin/shipping-management/data', 'admin\shipMans@data')->name('shipManData');

Route::get('/admin/shipping-management/{id}/edit', 'admin\shipMans@edit')->name('shipMAnEdit');
Route::put('/admin/shipping-management/{id}/update', 'admin\shipMans@update')->name('shipManUpdate');

Route::get('admin/shipping-management/{id}/suspend', 'admin\shipMans@suspend')->name('shipManSuspend');
Route::get('admin/shipping-management/{id}/active', 'admin\shipMans@active')->name('shipManActive');

// Frontend Routes
Route::get('/home', 'Frontend\HomeController@index')->name('homePage');
Route::get('/product/{name}', 'Frontend\HomeController@product');

//Dashboard routes
Route::get('/admin', 'admin\adminController@adminDashboard')->name('admin.dashboard')->middleware('auth');
Route::get('/seller', 'Seller\sellerController@sellerDashboard')->name('seller.dashboard')->middleware('auth');
Route::get('/customer', 'Customer\customerController@customerDashboard');
Route::get('/customerads', 'Customer\customerController@customerAds');
Route::get('/fulNet', 'fulNet\fulNetController@fulNetDashboard');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

