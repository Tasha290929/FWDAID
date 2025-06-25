<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


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

Route::get('/', [MainController::class, 'home']);

Route::get('/about', [MainController::class, 'about']);
Route::get('/review', [MainController::class, 'review'])->name('review');
Route::post('/review/check', [MainController::class, 'review_check']);

Route::get('/singin', [MainController::class, 'singin'])->name('singin');
Route::post('/singin/check/', [MainController::class, 'singin_check']);
Route::get('/register', [MainController::class, 'register']);
Route::post('/register/check', [MainController::class, 'register_check']);


Route::post('/logout', [MainController::class, 'logout'])->name('logout');



Route::get('/categories', [ProductController::class, 'categories'])->name('categories');
Route::get('/categories/{category}', [ProductController::class, 'products'])->name('products');

Route::get('/products/add', [ProductController::class, 'addProduct'])->middleware('auth')->name('products.add');
Route::post('/products/add', [ProductController::class, 'storeProduct'])->middleware('auth')->name('products.store');
Route::get('/products/{product}', [ProductController::class, 'showProduct'])->name('products.show');


Route::get('/cart', [CartController::class, 'index'])->middleware('auth')->name('cart.index');
Route::put('/cart/{productId}', [CartController::class, 'update'])->middleware('auth')->name('cart.update');
Route::delete('/cart/{productId}', [CartController::class, 'destroy'])->middleware('auth')->name('cart.destroy');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::post('/checkout/confirm', [CheckoutController::class, 'confirm'])->middleware('auth')->name('checkout.confirm');

Route::get('/thanks', function(){return view('thanks');})->name('thanks');