<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'MyFix Pro - Leader en Systèmes Sèches et Isolation')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Unbounded:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [dir="rtl"] { font-family: 'Cairo', sans-serif; }
    </style>
</head>
<body class="bg-[#0a0a0b] text-white font-sans antialiased selection:bg-portal-accent selection:text-black overflow-x-hidden">
    
    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 border-b border-white/5 bg-[#0a0a0b]/80 backdrop-blur-md transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <a href="/" class="flex items-center gap-3 font-display font-bold text-2xl tracking-tight">
                <img src="/images/logo-myfix.png" alt="MyFix Logo" class="h-8 w-auto">
                <span>MYFIX <span class="text-portal-accent">PRO</span></span>
            </a>
            
            <!-- Desktop Links -->
            <div class="hidden md:flex items-center gap-8">
                <a href="/#about" class="text-sm font-medium hover:text-portal-accent transition-colors text-slate-300">{{ __('Qui sommes-nous') }}</a>
                <a href="/#solutions" class="text-sm font-medium hover:text-portal-accent transition-colors text-slate-300">{{ __('Nos Solutions') }}</a>
                <a href="/#expert" class="text-sm font-medium hover:text-portal-accent transition-colors text-slate-300">{{ __('Expertise') }}</a>
                <a href="/#contact" class="text-sm font-medium hover:text-portal-accent transition-colors text-slate-300">{{ __('Contact') }}</a>
            </div>

            <div class="flex items-center gap-4">
                 <!-- Language Switcher -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center gap-1 font-bold text-xs hover:text-portal-accent transition-colors uppercase border border-white/10 px-3 py-1.5 rounded-lg">
                        {{ app()->getLocale() }}
                        <x-lucide-chevron-down class="w-3 h-3" />
                    </button>
                    <div x-show="open" @click.away="open = false" class="absolute end-0 top-full mt-2 w-32 bg-[#18181b] border border-white/10 rounded-lg overflow-hidden shadow-xl z-50" x-cloak>
                        <a href="{{ route('language.switch', 'fr') }}" class="block px-4 py-2 text-xs hover:bg-white/5 text-start">Français</a>
                        <a href="{{ route('language.switch', 'ar') }}" class="block px-4 py-2 text-xs hover:bg-white/5 text-end">العربية</a>
                        <a href="{{ route('language.switch', 'en') }}" class="block px-4 py-2 text-xs hover:bg-white/5 text-start">English</a>
                    </div>
                </div>

                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="hidden md:block font-bold text-sm hover:text-portal-accent transition-colors">{{ __('Tableau de Bord') }}</a>
                    @else
                        <a href="{{ route('login') }}" class="hidden md:block font-bold text-sm hover:text-portal-accent transition-colors">{{ __('Espace Client') }}</a>
                    @endauth
                @endif
                <a href="{{ route('products.index') }}" class="bg-portal-accent text-black px-5 py-2.5 rounded-lg font-bold text-sm hover:bg-white transition-colors flex items-center gap-2">
                    <x-lucide-shopping-bag class="w-4 h-4" /> {{ __('Catalogue') }}
                </a>
            </div>
        </div>
    </nav>

    <main class="pt-20">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="border-t border-white/10 bg-black pt-16 pb-8 mt-20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
                <div class="col-span-1 md:col-span-2 space-y-4">
                    <div class="flex items-center gap-2 font-display font-bold text-xl tracking-tight">
                        <img src="/images/logo-myfix.png" alt="MyFix Logo" class="h-6 w-auto">
                        <span>MYFIX <span class="text-portal-accent">PRO</span></span>
                    </div>
                    <p class="text-slate-500 text-sm max-w-sm">
                        {{ __('Distributeur agréé engagé à fournir à l\'industrie de la construction algérienne des matériaux et des solutions de classe mondiale.') }}
                    </p>
                </div>
                <div>
                    <h4 class="font-bold text-white mb-4">{{ __('Accès Rapide') }}</h4>
                    <ul class="space-y-2 text-sm text-slate-500">
                        <li><a href="{{ route('products.index') }}" class="hover:text-portal-accent transition-colors">{{ __('Catalogue') }}</a></li>
                        <li><a href="{{ route('login') }}" class="hover:text-portal-accent transition-colors">{{ __('Espace Client') }}</a></li>
                        <li><a href="/#contact" class="hover:text-portal-accent transition-colors">{{ __('Contact') }}</a></li>
                    </ul>
                </div>
                <div>
                     <h4 class="font-bold text-white mb-4">{{ __('Légal') }}</h4>
                    <ul class="space-y-2 text-sm text-slate-500">
                        <li><a href="#" class="hover:text-portal-accent transition-colors">{{ __('Mentions Légales') }}</a></li>
                        <li><a href="#" class="hover:text-portal-accent transition-colors">{{ __('CGV') }}</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="pt-8 border-t border-white/10 flex flex-col md:flex-row justify-between items-center gap-4">
                 <p class="text-slate-600 text-xs">{{ __('© ') . date('Y') . __(' SARL MYFIX. Tous droits réservés.') }}</p>
                 <div class="flex gap-4">
                     <!-- Social Placeholders -->
                     <x-lucide-facebook class="w-4 h-4 text-slate-500 hover:text-white cursor-pointer" />
                     <x-lucide-linkedin class="w-4 h-4 text-slate-500 hover:text-white cursor-pointer" />
                     <x-lucide-instagram class="w-4 h-4 text-slate-500 hover:text-white cursor-pointer" />
                 </div>
            </div>
        </div>
    </footer>
</body>
</html>
