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

/*Category Routes*/
Route::get('/admin/category', 'admin\Categoriescontroller@all')->name('category.all');
Route::get('admin/category/data', 'admin\CategoriesController@data')->name('category.data');

Route::get('/admin/category/create','admin\CategoriesController@create');
Route::post('/admin/category', 'admin\categoriesController@store')->name('category.create');
Route::get('/admin/category/{id}/edit', 'admin\categoriescontroller@edit')->name('category.edit');
Route::put('/admin/category/{id}', 'admin\Categoriescontroller@update')->name('category.update');

Route::get('admin/category/{id}/suspend', 'admin\CategoriesController@suspend')->name('category.suspend');
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
Route::get('/home', 'Frontend\HomeController@index');
Route::get('/product/{name}', 'Frontend\HomeController@product');

//Dashboard routes
Route::get('/admin', 'admin\adminController@adminDashoard');
Route::get('/seller', 'admin\sellerController@sellerDashoard');
Route::get('/customer', 'admin\customerController@customerDashoard');
Route::get('/fulNet', 'admin\fulNetController@fulNetDashoard');
