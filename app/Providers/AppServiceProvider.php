<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Set application locale based on user preference or session
        $locale = session('locale');
        
        // If user is authenticated and has a preferred locale, use that
        if (auth()->check() && auth()->user()->preferred_locale) {
            $locale = auth()->user()->preferred_locale;
            session()->put('locale', $locale);
        }
        
        // If no locale in session, try to detect from browser
        if (!$locale) {
            $locale = request()->getPreferredLanguage(['en', 'fr', 'ar']) ?? 'fr';
            session()->put('locale', $locale);
        }
        
        // Apply the locale
        app()->setLocale($locale);
        
        // Define admin gate for full control
        \Illuminate\Support\Facades\Gate::define('admin', function ($user) {
            return $user->role === 'admin';
        });

        // Define gate for staff/agents who can only view admin data
        \Illuminate\Support\Facades\Gate::define('view-admin', function ($user) {
            return in_array($user->role, ['admin', 'agent']);
        });

        // Define gate for agents who can create orders
        \Illuminate\Support\Facades\Gate::define('create-order', function ($user) {
            return in_array($user->role, ['admin', 'agent']);
        });

        // Define gate for agents who can update order status
        \Illuminate\Support\Facades\Gate::define('update-order-status', function ($user) {
            return in_array($user->role, ['admin', 'agent']);
        });

        // Define gate for admins only (full write access)
        \Illuminate\Support\Facades\Gate::define('admin-only', function ($user) {
            return $user->role === 'admin';
        });
    }
}
