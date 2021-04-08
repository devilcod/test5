<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\User\IndexUser;
use App\Http\Livewire\Product\IndexProduct;
use App\Http\Livewire\Product\CreateProduct;
use App\Http\Livewire\Product\EditProduct;
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
    Route::get('/index-user', IndexUser::class)->name('index-user');
    Route::get('/products/index', IndexProduct::class)->name('index-product');
    Route::get('/products/create', CreateProduct::class)->name('create-product');
    Route::get('/products/edit/{id}', EditProduct::class)->name('edit-product');
});
