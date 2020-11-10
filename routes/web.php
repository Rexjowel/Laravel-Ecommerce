<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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


// Route::get('/', function () {
//     return view('welcome');
// });

 //   ===========admin route========

Route::get('/','FontendController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'AdminController@index');
Route::get('admin','Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin','Admin\LoginController@Login');


Route::get('admin/logout','AdminController@logout')->name('admin.logout');

//  ============ category route==========

Route::get('admin/category','Admin\CategoryController@index')->name('admin.category');
Route::post('admin/categories-store','Admin\CategoryController@storeCat')->name('store.category');
Route::get('admin/categories/edit/{cat_id}','Admin\CategoryController@edit');
Route::post('admin/categories-update','Admin\CategoryController@updateCat')->name('update.category');
Route::get('admin/categories/delete/{cat_id}','Admin\CategoryController@delete');
Route::get('admin/categories/inactive/{cat_id}','Admin\CategoryController@inactive');
Route::get('admin/categories/active/{cat_id}','Admin\CategoryController@active');

//  ============ brand route==========

Route::get('admin/brand','Admin\BrandController@index')->name('admin.brand');
Route::post('admin/brand-store','Admin\BrandController@store')->name('store.brand');
Route::get('admin/brand/edit/{brand_id}','Admin\BrandController@edit');
Route::post('admin/brand-update','Admin\BrandController@update')->name('update.brand');
Route::get('admin/brand/delete/{brand_id}','Admin\BrandController@delete');
Route::get('admin/brand/inactive/{brand_id}','Admin\BrandController@inactive');
Route::get('admin/brand/active/{brand_id}','Admin\BrandController@active');

//  ============ products route==========

Route::get('admin/products/add','Admin\ProductController@addproduct')->name('add-products');
Route::post('admin/products/store','Admin\ProductController@storeproduct')->name('store-products');
Route::get('admin/products/manage','Admin\ProductController@manageproduct')->name('manage-products');
Route::get('admin/products/edit/{product_id}','Admin\ProductController@editproduct');
Route::post('admin/products/update','Admin\ProductController@updateproduct')->name('update-products');
Route::post('admin/products/image-update','Admin\ProductController@updateimage')->name('update-image');
Route::get('admin/products/delete/{product_id}','Admin\ProductController@destroy');
Route::get('admin/products/inactive/{product_id}','Admin\ProductController@inactive');
Route::get('admin/products/active/{product_id}','Admin\ProductController@active');


//  ============ Coupon route==========

Route::get('admin/coupon','Admin\CouponController@index')->name('admin.coupon');
Route::post('admin/coupon-store','Admin\CouponController@store')->name('store.coupon');
Route::get('admin/coupon/edit/{coupon_id}','Admin\CouponController@edit');
Route::post('admin/coupon-update','Admin\CouponController@update')->name('update.coupon');
Route::get('admin/coupon/delete/{coupon_id}','Admin\CouponController@delete');
Route::get('admin/coupon/inactive/{coupon_id}','Admin\CouponController@inactive');
Route::get('admin/coupon/active/{coupon_id}','Admin\CouponController@active');

//  ============Fontend Cart route==========

Route::post('add/to-cart/{product_id}','CartController@addToCart');
Route::get('cart','CartController@cartPage');
Route::get('cart/destroy/{cart_id}','CartController@destroy');
Route::post('cart/quantity/update/{cart_id}','CartController@quantityUpdate');
Route::post('coupon/apply','CartController@applyCoupon');
Route::get('coupon/destroy','CartController@couponDestroy');


//  ============Fontend Wishlist route==========
Route::get('add/to-wishlist/{product_id}','WishlistController@addToWishlist');
Route::get('wishlist','WishlistController@wishPage');
Route::get('wishlist/destroy/{wishlist_id}','WishlistController@destroy');

//  ============Fontend product details route==========

Route::get('product/details/{product_id}','FontendController@productDetails');


//======== checkout route ===========

Route::get('checkout','CheckoutController@index');
