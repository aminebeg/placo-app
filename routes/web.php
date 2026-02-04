<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RequisitionController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;

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

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/qui-sommes-nous', [PageController::class, 'about'])->name('about');
Route::get('/myfix', [PageController::class, 'myfix'])->name('brand.myfix');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Catalog Routes (Public)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create'); // Must be before {product}
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{id}/technical-sheet', [ProductController::class, 'technicalSheet'])->name('products.technical_sheet');

// Requisition Routes (Formerly Cart)
Route::get('/requisition', [RequisitionController::class, 'index'])->name('requisition.index');
Route::post('/requisition/add/{id}', [RequisitionController::class, 'add'])->name('requisition.add');
Route::patch('/requisition/update/{id}', [RequisitionController::class, 'update'])->name('requisition.update');
Route::delete('/requisition/remove/{id}', [RequisitionController::class, 'remove'])->name('requisition.remove');

// Auth Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); 
    })->name('dashboard');

    Route::resource('orders', OrderController::class);
    
    // Product Management (Protected)
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    
    // Requisition Finalization (Checkout)
    Route::post('/requisition/finalize', [RequisitionController::class, 'store'])->name('requisition.finalize');
    
    // Admin Routes
    Route::middleware(['can:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::patch('/orders/{order}/status', [AdminDashboardController::class, 'updateOrderStatus'])->name('orders.updateStatus');
        Route::patch('/users/{user}/role', [AdminDashboardController::class, 'updateUserRole'])->name('users.updateRole');
        Route::delete('/users/{user}', [AdminDashboardController::class, 'destroyUser'])->name('users.destroy');
    });
});

// Login/Register
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/login', [AuthController::class, 'webLogin']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'webLogout'])->name('logout');

// Temporary Public Access for Testing
Route::get('/test-admin', [AdminDashboardController::class, 'index']);
