<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;


// Khách hàng
Route::get('/', [ProductController::class, 'home'])->name('home');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products');
Route::get('/search', [ProductController::class, 'search'])->name('search');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/login/facebook', [AuthController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('/auth/facebook/callback', [AuthController::class, 'handleFacebookCallback']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');
Route::post('/register/send-otp', [AuthController::class, 'sendOtp'])->name('register.sendOtp');
Route::post('/register/verify-otp', [AuthController::class, 'verifyOtp'])->name('register.verifyOtp');
Route::get('/register/reset', [AuthController::class, 'resetOtp'])->name('register.resetOtp');
Route::get('/register/resend-otp', [AuthController::class, 'resendOtp'])->name('register.resendOtp');


Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::put('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::get('/cart/update/{itemId}/{action}', [CartController::class, 'updateCartQuantity'])->name('cart.updateQuantity');
Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::get('/minicart', [CartController::class, 'getMiniCart'])->name('minicart');
Route::post('/minicart/add', [CartController::class, 'addToCart']);
Route::delete('/minicart/remove/{id}', [CartController::class, 'removeFromMiniCart']);



// Admin
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', [AdminProductController::class, 'index'])->name('index');
        Route::get('/create', [AdminProductController::class, 'create'])->name('create');
        Route::post('/store', [AdminProductController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AdminProductController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [AdminProductController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [AdminProductController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/', [AdminCategoryController::class, 'index'])->name('index');
        Route::get('/create', [AdminCategoryController::class, 'create'])->name('create');
        Route::post('/store', [AdminCategoryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AdminCategoryController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [AdminCategoryController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [AdminCategoryController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('index');
        Route::get('/create', [AdminUserController::class, 'create'])->name('create');
        Route::post('/store', [AdminUserController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AdminUserController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [AdminUserController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [AdminUserController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('orders')->name('orders.')->group(function () {
        Route::get('/', [AdminOrderController::class, 'index'])->name('index');
        Route::get('/{order}', [AdminOrderController::class, 'show'])->name('show');
        Route::post('/{order}/update-status', [AdminOrderController::class, 'updateStatus'])->name('updateStatus');
        Route::get('/{order}/export', [AdminOrderController::class, 'exportOrder'])->name('export');
    });


});
