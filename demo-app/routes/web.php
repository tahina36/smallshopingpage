<?php

use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\ProductController::class, 'index'])->name('welcome');

Route::get('/image/{filename}', [FileController::class,'getPubliclyStorgeFileImage'])->name('file.display_uploaded_image');

Route::get('/dashboard', [\App\Http\Controllers\ProductController::class, 'listAdmin'])->name('products.index');
Route::get('/dashboard/products/create', [\App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
Route::post('/dashboard/products/store', [\App\Http\Controllers\ProductController::class, 'store'])->name('products.store');
Route::get('/dashboard/products/edit/{product}', [\App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');
Route::post('/dashboard/products/update/{product}', [\App\Http\Controllers\ProductController::class, 'update'])->name('products.update');
Route::get('/products/show/{product}', [\App\Http\Controllers\ProductController::class, 'show'])->name('products.show');
Route::get('/dashboard/products/remove/{id}', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('products.remove');
