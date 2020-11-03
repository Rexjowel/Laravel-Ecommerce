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


