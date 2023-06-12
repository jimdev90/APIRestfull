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
Route::resource('buyers.sellers', \App\Http\Controllers\Buyer\BuyerSellerController::class, ['only' => ['index']]);
Route::resource('buyers.transactions', \App\Http\Controllers\Buyer\BuyerTransactionController::class, ['only' => ['index']]);
Route::resource('buyers.products', \App\Http\Controllers\Buyer\BuyerProductController::class, ['only' => ['index']]);
Route::resource('buyers.categories', \App\Http\Controllers\Buyer\BuyerCategoryController::class, ['only' => ['index']]);

/**
 * Categories
 */
Route::resource('categories', \App\Http\Controllers\Category\CategoryController::class, ['except' => ['create', 'edit']]);
Route::resource('categories.products', \App\Http\Controllers\Category\CategoryProductController::class, ['only' => ['index']]);
Route::resource('categories.sellers', \App\Http\Controllers\Category\CategorySellerController::class, ['only' => ['index']]);
Route::resource('categories.buyers', \App\Http\Controllers\Category\CategoryBuyerController::class, ['only' => ['index']]);
Route::resource('categories.transactions', \App\Http\Controllers\Category\CategoryTransactionController::class, ['only' => ['index']]);

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
Route::resource('sellers.transactions', \App\Http\Controllers\Seller\SellerTransactionController::class, ['only' => ['index']]);
Route::resource('sellers.categories', \App\Http\Controllers\Seller\SellerCategoryController::class, ['only' => ['index']]);
Route::resource('sellers.buyers', \App\Http\Controllers\Seller\SellerBuyerController::class, ['only' => ['index']]);
Route::resource('sellers.products', \App\Http\Controllers\Seller\SellerProductController::class, ['except' => ['create', 'show', 'edit']]);

/**
 * Users
 */
Route::resource('users', \App\Http\Controllers\User\UserController::class, ['except' => ['create', 'edit']]);
