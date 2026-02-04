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

// Public Catalog Routes
Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [\App\Http\Controllers\ProductController::class, 'show'])->name('products.show');
Route::get('/products/{id}/technical-sheet', [\App\Http\Controllers\ProductController::class, 'technicalSheet'])->name('products.technical_sheet');

// Public Cart Routes
Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [\App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::patch('/cart/update/{id}', [\App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [\App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');

// Auth Routes (Placeholder - would typically use Breeze/Fortify)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); 
    })->name('dashboard');

    Route::resource('orders', \App\Http\Controllers\OrderController::class);
    
    // Protected Product Management
    Route::get('/products/create', [\App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [\App\Http\Controllers\ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [\App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [\App\Http\Controllers\ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('products.destroy');
    
    // Cart Checkout (Requires Login)
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
