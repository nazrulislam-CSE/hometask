<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\User\BrandController;
use App\Http\Controllers\User\ProductController;


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


/* ============== Login Routes =================*/ 
Route::post('/login',[AuthController::class, 'Login']);

/* ============== Register Routes =================*/
Route::post('/register',[AuthController::class, 'Register']);


/* ==============  Categories Show Routes =================*/
Route::get('/category/view',[CategoryController::class, 'index'])->name('categories.index');
/* ==============  Brand Show Routes =================*/
Route::get('/brand/view',[BrandController::class, 'index'])->name('brand.index');

/* ==============  Proudct Show Routes =================*/
Route::get('/product/view', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });