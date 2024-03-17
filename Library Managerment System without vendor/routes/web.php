<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
// web.php


// web.php



Route::get('/search/transaction', [TransactionController::class, 'showSearchForm'])->name('search.transaction.form');
Route::post('/search/transaction', [TransactionController::class, 'search'])->name('search.transaction');


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

Route::resource('/',HomeController::class);

Route::resource('user',UserController::class);
Route::match(['get', 'delete'], 'user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::resource('books',BookController::class);
Route::resource('author',AuthorController::class);
Route::resource('genre',GenreController::class);
Route::resource('tran',TransactionController::class);
Route::resource('search',SearchController::class);



// Login Routes
Route::get('/login','App\Http\Controllers\LoginController@index')->name('login');
Route::post('/login_action', 'App\Http\Controllers\LoginController@loginAction')->name('loginAc');
Route::get('/logout_action','App\Http\Controllers\LoginController@logout')->name('logout');



