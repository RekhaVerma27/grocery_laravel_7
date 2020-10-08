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
    // return view('welcome');
    // return view('frontend.index');
});

Route::match(['get','post'],'/admin','AdminController@login');

Auth::routes(['verify'=>true]);
Route::match(['get','post'],'/home','IndexController@home');

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>['auth']],function()
{
	Route::match(['get','post'],'/admin/dashboard','AdminController@dashboard');
	//Product2 Route

Route::match(['get','post'],'/addproducts','Product2Controller@addproducts');
Route::get('/viewproducts','Product2Controller@view_products');
Route::match(['get','post'],'/editproducts/{id}','Product2Controller@edit_products');
Route::post('/updateproducts','Product2Controller@update_products');
Route::get('/deleteproducts{id}','Product2Controller@delete_products');
Route::post('update_product_status','Product2Controller@updateStatus');

Route::post('update-featurd-product-status','Product2Controller@updateFeatured');

// Category Route

Route::match(['get','post'],'/addcategory','CategoryController@add_category');
Route::match(['get','post'],'/view-categories','CategoryController@viewCategories');
Route::match(['get','post'],'/editcategory/{id}','CategoryController@editCategory');
Route::match(['get','post'],'/deletecategory/{id}','CategoryController@deleteCategory');
Route::post('update_category_status','CategoryController@updateStatus');

// Banners Route

Route::match(['get','post'],'/banners','Banners2Controller@banners');
Route::match(['get','post'],'/addbanner','Banners2Controller@addbanner');
Route::post('update_banner_status','Banners2Controller@updateStatus');
Route::match(['get','post'],'/edit-banner/{id}','Banners2Controller@editBanner');
Route::match(['get','post'],'/delete-banner/{id}','Banners2Controller@deleteBanner');

//product attributes
Route::match(['get','post'],'/add-attributes/{id}','Product2Controller@addAttributes');
Route::get('/delete-attribute/{id}','Product2Controller@deleteAttribute');
Route::match(['get','post'],'/edit-attributes/{id}','Product2Controller@editAttributes');
Route::match(['get','post'],'/add-images/{id}','Product2Controller@addImages');
Route::get('/delete-alt-image/{id}','Product2Controller@deleteAltImage');


//Coupons Route
Route::match(['get','post'],'/admin/add-coupon','CouponsController@addCoupon');
Route::match(['get','post'],'/admin/view-coupons','CouponsController@viewCoupons');
Route::match(['get','post'],'/admin/edit-coupon/{id}','CouponsController@editCoupon');
Route::get('/admin/delete-coupon/{id}','CouponsController@deleteCoupon');
Route::post('/admin/update-coupon-status','CouponsController@updateStatus');

//Orders Route
Route::get('/admin/orders','Product2Controller@viewOrders');
Route::get('/admin/orders/{id}','Product2Controller@viewOrderDetail');


});
//Route::get('/logout','AdminController@logout');



// frontend Index

Route::match(['get','post'],'/','IndexController@index');
Route::match(['get','post'],'/event','IndexController@event');
Route::match(['get','post'],'/about_us','IndexController@about_us');
Route::match(['get','post'],'/best_deals','IndexController@best_deals');
Route::match(['get','post'],'/services','IndexController@services');
Route::match(['get','post'],'/contact_us','IndexController@contact_us');

Route::get('/categories/{category_id}','IndexController@categories');
Route::get('/get-product-price','Product2Controller@getprice');

Route::get('/single_product/{id}','Product2Controller@singleProduct');
//Route for Add to Cart
Route::match(['get','post'],'add-cart','Product2Controller@addtoCart');
// Route for Cart
Route::match(['get','post'],'/cart','Product2Controller@cart')->middleware('verified');
//Route for Delete cart product
Route::get('/cart/delete-product/{id}','Product2Controller@deleteCartProduct');
//Route for Update Quantity
Route::get('/cart/update-quantity/{id}/{quantity}','Product2Controller@updateCartQuantity');

//Apply Coupon Code
Route::post('/cart/apply-coupon','Product2Controller@applyCoupon');

//Route for login Register
Route::get('/login-register','UsersController@userLoginRegister');
//Route for login-user
Route::post('/user-login','UsersController@login');
//Route for add User-Registration
Route::post('/user-register','UsersController@register');
//Route for add User-Logout
Route::get('/user-logout','UsersController@logout');


//Route for middleware after front login
Route::group(['middleware'=>['frontlogin']],function(){
//Route for User Account
Route::match(['get','post'],'/account','UsersController@account');
Route::match(['get','post'],'/change-password','UsersController@changePassword');
Route::match(['get','post'],'/change-address','UsersController@changeAddress');
Route::match(['get','post'],'/checkout','Product2Controller@checkout');
Route::match(['get','post'],'/order-review','Product2Controller@orderReview');
Route::match(['get','post'],'/place-order','Product2Controller@placeOrder');
Route::get('/thanks','Product2Controller@thanks');
Route::get('/orders','Product2Controller@userOrders');
Route::get('/orders/{id}','Product2Controller@userOrderDetails');
});
