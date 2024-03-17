<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartlistController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/category', 'App\Http\Controllers\CategoryController@index')->name('category');
Route::get('/product', 'App\Http\Controllers\ProductController@index')->name('product');
Route::get('/contact', 'App\Http\Controllers\ContactController@index')->name('contact');
Route::get('/about-us', 'App\Http\Controllers\AboutController@index')->name('about-us');
Route::get('/item','App\Http\Controllers\ItemController@index')->name('item');
Route::get('/carlist','App\Http\Controllers\CartlistController@index')->name('carlist');

Route::get('/product/item/{id}', 'App\Http\Controllers\ProductController@productDetail');

Route::get('/product/{CategoryName}', 'App\Http\Controllers\ProductController@productByCategoryNo');



Route::get('/add-to-cart/{productId}', [CartlistController::class, 'addToCart']);
Route::get('/view-cart', [CartlistController::class, 'viewCart'])->name('viewCart');
Route::delete('/remove-from-cart/{productId}', [CartlistController::class, 'removeFromCart'])->name('remove-from-cart');
#admin
Route::get('/admin/login','App\Http\Controllers\admin\LoginController@index')->name('login');

Route::get('/admin/dashboard','App\Http\Controllers\admin\DashboardController@index')->name('dashboard');
Route::get('/admin/category', 'App\Http\Controllers\admin\CategoryController@index')->name('adminCategory');
Route::get('/admin/users', 'App\Http\Controllers\admin\UserController@index')->name('adminUser');
Route::get('/admin/product', 'App\Http\Controllers\admin\ProductController@index');

Route::post('/admin/login_action', 'App\Http\Controllers\admin\LoginController@loginAction')->name('loginAc');
Route::get('/admin/logout_action','App\Http\Controllers\admin\LoginController@logoutAction')->name('logout');




#admin CRUD
Route::get('/admin/category/add', 'App\Http\Controllers\admin\CategoryController@add')->name('add.category');
Route::post('/admin/category/add_action','App\Http\Controllers\admin\CategoryController@addAction')->name('addcartegory.action');
Route::get('/admin/users/add', 'App\Http\Controllers\admin\UserController@add')->name('add.user');
Route::post('/admin/users/add_action','App\Http\Controllers\admin\UserController@addAction')->name('adduser.action');
Route::get('/admin/product/add', 'App\Http\Controllers\admin\ProductController@add')->name('add.product');
Route::post('/admin/product/add_action','App\Http\Controllers\admin\ProductController@addAction')->name('addproduct.action');

Route::get('/admin/users/edit/{id}','App\Http\Controllers\admin\UserController@edit')->name('edit.user');
Route::post('/admin/users/update_action','App\Http\Controllers\admin\UserController@updateAction')->name('user.update');
Route::get('/admin/category/edit/{id}','App\Http\Controllers\admin\CategoryController@edit')->name('edit.category');
Route::post('/admin/category/update_action','App\Http\Controllers\admin\CategoryController@updateAction')->name('category.update');
Route::get('/admin/product/edit/{id}','App\Http\Controllers\admin\ProductController@edit')->name('edit.product');
Route::post('/admin/product/update_action','App\Http\Controllers\admin\ProductController@updateAction')->name('product.update');

Route::get('/admin/product/delete/{id}/{img}', 'App\Http\Controllers\admin\ProductController@delete')->name('delete.product');
Route::get('/admin/users/delete/{id}/{img}','App\Http\Controllers\admin\UserController@delete')->name('deleteUser');
Route::get('/admin/category/delete/{id}/{img}','App\Http\Controllers\admin\CategoryController@delete')->name('delete.category');

Route::group(['middleware' => 'check_username'], function () {
    // Routes that should be restricted for 'demo' user go here
    Route::get('/restricted-route', 'RestrictedController@index');
    // Add, edit, delete routes...
});
