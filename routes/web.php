<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Route::get('/',[PageController::class,'home']);

Route::get('/shop',[PageController::class,'shop']);

Route::get('/checkout',[PageController::class,'checkout']);

Route::get('/product_detail/{id}',[PageController::class,'product_detail']);


Route::post('/cart',[PageController::class,'cart']);
Route::get('/cart',[PageController::class,'cartItems']);

Route::get('/backend/home', function () {
    return view ('backend.home');
})->middleware(['admin']);

// Route::get('/category/{id}',[PageController::class,'category']);
Route::get('/category/{id}',[CategoryController::class,'show'])->name('show');


Route::resource('/backend/category',CategoryController::class);





// Route::resource('/frontend/cart',CartController::class);
Route::resource('/backend/products',ProductController::class);
Route::get('/product/{id}/edit',[ProductController::class,'edit']);
Route::get('/product/{id}/update',[ProductController::class,'update']);
Route::delete('/backend/products/{id}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');

Route::resource('/backend/upload',ImageController::class);
Route::get('/frontend/dashboard', [HomeController::class,'dashboard'])->name('frontend.dashboard');

Route::get('/frontend/edit',[PageController::class,'edit']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
