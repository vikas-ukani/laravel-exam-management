<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController as FrontProductController;
use Illuminate\Support\Facades\Route;



Route::view('login', 'login')->name('login');
Route::view('register', 'register')->name('register');

Route::post('register', [AuthController::class, 'registerUser', 'registerUser']);
Route::post('login', [AuthController::class, 'loginUser', 'loginUser']);

Route::get('all-products', [FrontProductController::class, 'index'])->name('all-products');
Route::get('all-categories', [FrontProductController::class, 'categories'])->name('all-categories');

Route::group(['middleware' => ['auth',]], function () {
    Route::group(
        ['prefix' => 'admin', 'name' => 'admin'],
        function () {
            Route::resource('products', ProductController::class);
            Route::resource('category', CategoryController::class);
        }
    );

    Route::get('logout', [AuthController::class, 'logout']);
});
