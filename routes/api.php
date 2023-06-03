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
Route::resource('buyers.transactions', \App\Http\Controllers\Buyer\BuyerTransactionController::class, ['only' => ['index']]);
Route::resource('buyers.products', \App\Http\Controllers\Buyer\BuyerProductController::class, ['only' => ['index']]);

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
Route::resource('transactions.categories', \App\Http\Controllers\Transaction\TransactionCategoryController::class, ['only' => ['index']]);
Route::resource('transactions.sellers', \App\Http\Controllers\Transaction\TransactionSellerController::class, ['only' => ['index']]);

/**
 * Sellers
 */
Route::resource('sellers', \App\Http\Controllers\Seller\SellerController::class, ['only' => ['index', 'show']]);

/**
 * Users
 */
Route::resource('users', \App\Http\Controllers\User\UserController::class, ['except' => ['create', 'edit']]);
