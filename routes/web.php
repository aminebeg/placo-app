<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
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
    
    // Set session locale
    session()->put('locale', $locale);
    
    // Save to user profile if authenticated
    if (auth()->check()) {
        auth()->user()->update(['preferred_locale' => $locale]);
    }
    
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

// Commande Routes (Cart)
Route::get('/commande', [OrderController::class, 'cart'])->name('commande.index');
Route::post('/commande/add/{id}', [OrderController::class, 'addToCart'])->name('commande.add');
Route::patch('/commande/update/{id}', [OrderController::class, 'updateCart'])->name('commande.update');
Route::delete('/commande/remove/{id}', [OrderController::class, 'removeFromCart'])->name('commande.remove');

// Auth Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); 
    })->name('dashboard');

    Route::resource('orders', OrderController::class);
    
// Commande Finalization (Checkout)
    Route::post('/commande/finalize', [OrderController::class, 'finalize'])->name('commande.finalize');
    
    // Print a printable order (bon de commande) - screen view
    // Print a printable order (bon de commande) - screen view
    Route::get('/orders/{order}/print', [OrderController::class, 'print'])->name('orders.print');
    // Print a PDF version of the order
    Route::get('/orders/{order}/print/pdf', [OrderController::class, 'printPdf'])->name('orders.print_pdf');

    // Favorites
    Route::get('/favorites', [\App\Http\Controllers\FavoriteController::class, 'index'])->name('favorites.index');
    Route::post('/favorites/toggle/{product}', [\App\Http\Controllers\FavoriteController::class, 'toggle'])->name('favorites.toggle');
    
    // Comments
    Route::post('/orders/{order}/comments', [\App\Http\Controllers\OrderCommentController::class, 'store'])->name('orders.comments.store');
    
    // Admin Routes
    Route::prefix('admin')->name('admin.')->group(function () {
        // Read-only routes for Admin and Agent
        Route::middleware(['can:view-admin'])->group(function() {
            Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
            Route::get('/orders/export', [AdminDashboardController::class, 'exportOrders'])->name('orders.export');
        });

        // Write routes for Admin only
        Route::middleware(['can:admin'])->group(function() {
            Route::patch('/orders/{order}/status', [AdminDashboardController::class, 'updateOrderStatus'])->name('orders.updateStatus');
            Route::patch('/users/{user}/role', [AdminDashboardController::class, 'updateUserRole'])->name('users.updateRole');
            Route::delete('/users/{user}', [AdminDashboardController::class, 'destroyUser'])->name('users.destroy');
            Route::patch('/orders/bulk-update', [AdminDashboardController::class, 'bulkUpdateOrderStatus'])->name('orders.bulkUpdate');
            Route::delete('/logs/clear', [AdminDashboardController::class, 'clearActivityLogs'])->name('logs.clear');

            // Product Management
            Route::post('/products', [ProductController::class, 'store'])->name('products.store');
            Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
            Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
            Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
        });
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
