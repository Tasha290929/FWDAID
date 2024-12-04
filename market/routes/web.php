<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

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
//Route::get('/user/{id}/{name}', function($id, $name){
//  return 'ID:'.$id.'Name:'.$name;
//});

Route::get('/singin', [MainController::class, 'singin']);
Route::post('/singin/check/', [MainController::class, 'singin_check']);
Route::get('/register', [MainController::class, 'register']);
Route::post('/register/check/', [MainController::class, 'register_check']);
Route::post('/logout', [MainController::class, 'logout'])->name('logout');