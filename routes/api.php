<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * Buyers
 */
Route::resource('buyers', \App\Http\Controllers\Buyer\BuyerController::class, ['only' => ['index', 'show']]);

/**
 * Categories
 */
Route::resource('categories', \App\Http\Controllers\Category\CategoryController::class, ['except' => ['create', 'edit']]);

/**
 * Products
 */
Route::resource('products', \App\Http\Controllers\Product\ProductController::class, ['only' => ['index', 'show']]);

/**
 * Transactions
 */
Route::resource('transactions', \App\Http\Controllers\Transaction\TransactionController::class, ['only' => ['index', 'show']]);

/**
 * Sellers
 */
Route::resource('sellers', \App\Http\Controllers\Seller\SellerController::class, ['only' => ['index', 'show']]);

/**
 * Users
 */
Route::resource('users', \App\Http\Controllers\User\UserController::class, ['except' => ['create', 'edit']]);
