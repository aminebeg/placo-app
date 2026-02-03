<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/language/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'fr', 'ar'])) {
        abort(400);
    }
    session()->put('locale', $locale);
    return back();
})->name('language.switch');

Route::get('/', function () {
    return view('welcome');
});

// Temporary Public Access for Testing
Route::get('/test-admin', [AdminDashboardController::class, 'index']);

// Auth Routes (Placeholder - would typically use Breeze/Fortify)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); 
    })->name('dashboard');

    Route::resource('orders', \App\Http\Controllers\OrderController::class);
    Route::resource('products', \App\Http\Controllers\ProductController::class);
    
    // Cart Routes
    Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [\App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/update/{id}', [\App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [\App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/checkout', [\App\Http\Controllers\CartController::class, 'checkout'])->name('cart.checkout');
    
    Route::middleware(['can:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::patch('/orders/{order}/status', [AdminDashboardController::class, 'updateOrderStatus'])->name('orders.updateStatus');
        Route::patch('/users/{user}/role', [AdminDashboardController::class, 'updateUserRole'])->name('users.updateRole');
        Route::delete('/users/{user}', [AdminDashboardController::class, 'destroyUser'])->name('users.destroy');
    });
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Auth routes handled manually for now
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'webLogin']);
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']); // Reusing the JSON one for now or it might work if it redirects? AuthController register returns JSON.
Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'webLogout'])->name('logout');
