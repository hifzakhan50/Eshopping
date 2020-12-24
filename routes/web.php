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
Route::post('/sellerprofileupdate', 'Seller\ProfileController@update');
Route::get('seller/profile/edit', 'Seller\ProfileController@edit')->name('profile.edit');
/*new routes starts*/
Route::post('/customerprofileupdate', 'Customer\profileController@update');
Route::get('/customer/profile/edit', 'Customer\profileController@edit')->name('profile.customeredit');
Route::get('customer/orders/allorders', 'Customer\customerController@allorders')->name('orders.allorders');
//Route::put('/admin/profile', 'Admin\profileController@update')->name('profile.update');
//Route::get('/admin/profile/edit', 'Admin\profileController@edit')->name('profile.edit');
//
//Route::put('/fulNet/profile', 'fulNet\profileController@update')->name('profile.update');
//Route::get('/fulNet/profile/edit', 'fulNet\profileController@edit')->name('profile.edit');
/*new routes ends*/

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
Route::post('/order-confirmation-detail', 'Frontend\OrderConfirmationDetail\orderConfirmationDetail@confirmOrder');
Route::post('/savefinalorderdetails', 'Frontend\OrderConfirmationDetail\orderConfirmationDetail@placeFinalOrder');
//
Route::get('/test-route', 'Frontend\testController\testing@test');
//order storing  routes
Route::post('/storeorder', 'Frontend\Orders\order@store');

// OrderConfirmationDetail Route
//Route::get('/order-confirmation-detail', 'Frontend\OrderConfirmationDetail\orderConfirmationDetail@confirmOrder')->name('placeOrder');

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

//Seller Orders
Route::get('seller/orders/active', 'Seller\sellerController@activeOrders')->name('active.activeOrders');
Route::get('seller/orders/activeorders', 'Seller\sellerController@data1')->name('active.data1');
Route::get('seller/orders/{id}/delivered', 'Seller\sellerController@delivered')->name('activeorder.delivered');
Route::get('seller/orders/{id}/suspend', 'Seller\sellerController@suspend')->name('activeorder.suspend');

Route::get('seller/orders/all', 'Seller\sellerController@allOrders')->name('active.allOrders');
Route::get('seller/orders/allorders', 'Seller\sellerController@data2')->name('active.data2');

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

/*Admin lists*/
Route::get('admin/displayData/prods', 'admin\productsController@all');
Route::get('admin/displayProductsData/data', 'admin\productsController@data');
Route::get('admin/products/{id}/suspend', 'admin\productsController@suspend');

Route::get('admin/displayData/clist', 'admin\customersController@all');
Route::get('admin/displayDataforcustomers/data', 'admin\customersController@data');
Route::get('admin/customer/{id}/suspend', 'admin\customersController@suspend');

Route::get('admin/displayData/slist', 'admin\sellersController@all');
Route::get('admin/displayDataforsellers/data', 'admin\sellersController@data');
Route::get('admin/seller/{id}/suspend', 'admin\sellersController@suspend');

/*Admin Orders*/
Route::get('admin/displayData/orderlist', 'admin\ordersController@all');
Route::get('admin/displayData/data', 'admin\ordersController@allorders');
Route::get('admin/displayOrderlist/data', 'admin\customersController@data');
Route::get('admin/orders/{id}/suspend', 'admin\customersController@suspend');

//Route::get('admin/displayData/data', 'admin\CategoriesController@data')->name('displayData.data');

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

//Auth::routes();

// Report routes
Route::get('/salestax', 'DynamicPDFController@index');
Route::get('/allusersreports', 'DynamicPDFController@all_users');
Route::get('/reports/all_users/report', 'DynamicPDFController@get_all_users');
Route::get('/reports/salestax/report', 'DynamicPDFController@salestax');

Route::get('/Inventory', 'DynamicPDFController@Inventory');
Route::get('/reports/allProducts/report', 'DynamicPDFController@get_all_products');

Route::get('/Delivered', 'DynamicPDFController@delivered_orders');
Route::get('/reports/allDeliveredOrders/report', 'DynamicPDFController@get_all_delivered_orders');

Route::get('/Suspended-orders-report', 'DynamicPDFController@suspended_orders');
Route::get('/reports/allSuspendedOrders/report', 'DynamicPDFController@get_all_suspended_orders');

/*Fulfillment Routes*/
Route::get('/fulNet/requestManagement/all', 'fulNet\fulNetcontroller@all')->name('requestManagement.all');
Route::get('fulNet/requestManagement/data', 'fulNet\fulNetController@data')->name('requestManagement.data');

Route::get('/fulNet/requestManagement/create','fulNet\fulNetController@create');
Route::post('/fulNet/requestManagement', 'fulNet\fulNetController@store')->name('requestManagement.create');
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/newrequests','fulNet\fulNetController@newRequests');
Route::get('/newrequestsall','fulNet\fulNetController@newRequestsAll');
Route::get('/fulnet/{id}/accept','fulNet\fulNetController@accept')->name('fulnet.accepted');
Route::get('/fulnet/{id}/reject','fulNet\fulNetController@reject')->name('fulnet.rejected');
Route::get('/fulfilledrequests','fulNet\fulNetController@fulfilledrequests');
Route::get('/fulfilledrequestsget','fulNet\fulNetController@fulfilledrequestsget');

Route::post('/searchproductbyname', 'Frontend\HomeCOntroller@productByName');