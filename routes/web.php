<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\User\IndexUser;
use App\Http\Livewire\Product\IndexProduct;
use App\Http\Livewire\Product\CreateProduct;
use App\Http\Livewire\Product\EditProduct;
use App\Http\Livewire\Category\IndexCategory;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group(['middleware' => 'auth'], function(){
    Route::get('/users', IndexUser::class)->name('users');
    Route::get('/products', IndexProduct::class)->name('products');
    Route::get('/product/create', CreateProduct::class)->name('product.create');
    Route::get('/product/edit/{product?}', EditProduct::class)->name('product.edit');
    Route::get('/categories', IndexCategory::class)->name('categories');
});