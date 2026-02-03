<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Unbounded:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [dir="rtl"] { font-family: 'Cairo', sans-serif; }
    </style>
</head>
<body class="font-sans antialiased bg-portal-bg text-portal-text">
    <div class="flex min-h-screen relative" x-data="{ sidebarOpen: false }">
        <!-- Sidebar Overlay (Mobile) -->
        <div x-show="sidebarOpen" 
             @click="sidebarOpen = false" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-black/60 backdrop-blur-sm z-40 lg:hidden" 
             x-cloak></div>

        <!-- Sidebar -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
               class="fixed lg:sticky top-0 left-0 w-[280px] bg-portal-sidebar border-e border-portal-border flex flex-col h-screen z-50 transition-transform duration-300 ease-in-out">
            <div class="p-8 flex items-center justify-between font-display font-bold text-lg tracking-tight">
                <div class="flex items-center gap-3">
                    <img src="/images/logo-myfix.png" alt="MyFix Logo" class="h-8 w-auto">
                    <span>MYFIX <small class="bg-portal-accent text-white px-1.5 py-0.5 rounded text-[0.6rem] align-middle ms-1 font-bold">PRO</small></span>
                </div>
                <button @click="sidebarOpen = false" class="lg:hidden p-2 text-portal-muted hover:text-white">
                    <x-lucide-x class="w-6 h-6" />
                </button>
            </div>

            <nav class="flex-1 px-4 flex flex-col gap-1 overflow-y-auto">
                <div class="px-6 py-2 text-[0.65rem] font-extrabold uppercase tracking-widest text-portal-muted mt-4">{{ __('Operations') }}</div>
                
                <a href="{{ route('dashboard') }}" @click="sidebarOpen = false" class="flex items-center gap-3 px-4 py-3.5 rounded-xl font-semibold text-sm transition-all {{ request()->routeIs('dashboard') ? 'bg-portal-accent/10 text-portal-accent' : 'text-portal-muted hover:bg-white/5 hover:text-white' }}">
                    <x-lucide-layout-dashboard class="w-5 h-5 me-3" />
                    {{ __('Dashboard') }}
                </a>
                
                <a href="{{ route('orders.index') }}" @click="sidebarOpen = false" class="flex items-center gap-3 px-4 py-3.5 rounded-xl font-semibold text-sm transition-all {{ request()->routeIs('orders.*') ? 'bg-portal-accent/10 text-portal-accent' : 'text-portal-muted hover:bg-white/5 hover:text-white' }}">
                    <x-lucide-file-text class="w-5 h-5 me-3" />
                    {{ __('Purchase Orders') }}
                </a>

                <a href="{{ route('products.index') }}" @click="sidebarOpen = false" class="flex items-center gap-3 px-4 py-3.5 rounded-xl font-semibold text-sm transition-all {{ request()->routeIs('products.*') ? 'bg-portal-accent/10 text-portal-accent' : 'text-portal-muted hover:bg-white/5 hover:text-white' }}">
                    <x-lucide-package class="w-5 h-5 me-3" />
                    {{ __('Technical Catalog') }}
                </a>

                <a href="{{ route('cart.index') }}" @click="sidebarOpen = false" class="flex items-center gap-3 px-4 py-3.5 rounded-xl font-semibold text-sm transition-all {{ request()->routeIs('cart.*') ? 'bg-portal-accent/10 text-portal-accent' : 'text-portal-muted hover:bg-white/5 hover:text-white' }}">
                    <x-lucide-clipboard-list class="w-5 h-5 me-3" />
                    {{ __('Procurement List') }}
                    @if(count(session('cart', [])) > 0)
                        <span class="ms-auto bg-portal-accent text-black text-[0.6rem] font-extrabold px-1.5 py-0.5 rounded">{{ count(session('cart', [])) }}</span>
                    @endif
                </a>

                @if(auth()->user() && auth()->user()->role === 'admin')
                    <div class="px-6 py-2 text-[0.65rem] font-extrabold uppercase tracking-widest text-portal-muted mt-4">{{ __('Management') }}</div>
                    
                    <a href="{{ route('admin.dashboard') }}" @click="sidebarOpen = false" class="flex items-center gap-3 px-4 py-3.5 rounded-xl font-semibold text-sm transition-all {{ request()->routeIs('admin.*') ? 'bg-portal-accent/10 text-portal-accent' : 'text-portal-muted hover:bg-white/5 hover:text-white' }}">
                        <x-lucide-shield-check class="w-5 h-5 text-portal-accent me-3" />
                        {{ __('System Control') }}
                    </a>
                @endif
            </nav>

            <div class="p-6 border-t border-portal-border bg-portal-sidebar">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-10 h-10 shrink-0 rounded-xl bg-gradient-to-br from-[#2c2c2e] to-[#1c1c1e] border border-portal-border flex items-center justify-center font-bold text-portal-accent">
                        {{ substr(auth()->user()->first_name ?? 'U', 0, 1) }}
                    </div>
                    <div class="overflow-hidden">
                        <div class="font-bold text-sm truncate">{{ auth()->user()->first_name ?? 'User' }} {{ auth()->user()->last_name ?? '' }}</div>
                        <div class="text-xs text-portal-muted truncate">{{ auth()->user()->company ?? __('Independent') }}</div>
                    </div>
                </div>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full p-3 bg-red-500/5 border border-red-500/10 text-red-400 rounded-xl font-bold text-sm flex items-center justify-center gap-2 hover:bg-red-500/10 hover:border-red-400 transition-all">
                        <x-lucide-log-out class="w-4 h-4 me-2" />
                        {{ __('Terminate Session') }}
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 flex flex-col min-w-0 h-screen overflow-y-auto">
            <header 
                class="h-20 border-b border-portal-border px-4 lg:px-10 flex items-center justify-between bg-[#0f0f10]/80 backdrop-blur-xl sticky top-0 z-40"
                x-data="{ 
                    cartCount: {{ count(session('cart', [])) }},
                    showNotify(msg, type) {
                        this.$dispatch('show-toast', { message: msg, type: type });
                    }
                }"
                @cart-updated.window="cartCount = $event.detail.count; showNotify($event.detail.message, 'success')"
            >
                <div class="flex items-center gap-4">
                    <button @click="sidebarOpen = true" class="lg:hidden p-2 text-portal-muted hover:text-white">
                        <x-lucide-menu class="w-6 h-6" />
                    </button>
                    
                    <div class="hidden sm:flex items-center gap-3 bg-white/5 border border-portal-border px-4 py-2 rounded-xl w-48 xl:w-80">
                        <x-lucide-search class="w-4 h-4 text-portal-muted me-2" />
                        <input type="text" placeholder="{{ __('Search...') }}" class="bg-transparent border-none text-sm text-white focus:ring-0 w-full placeholder-portal-muted">
                    </div>
                </div>

                <div class="flex items-center gap-3 lg:gap-6">
                    <a href="{{ route('cart.index') }}" class="relative p-2 text-portal-muted hover:text-white transition-all group" title="{{ __('Procurement List') }}">
                        <x-lucide-clipboard-list class="w-5 h-5 group-hover:scale-110 transition-transform" />
                        <template x-if="cartCount > 0">
                            <span 
                                x-text="cartCount"
                                class="absolute -top-1 -right-1 bg-portal-accent text-black text-[10px] font-black w-4 h-4 rounded-full flex items-center justify-center shadow-[0_0_10px_rgba(197,160,89,0.5)] border border-portal-bg"
                            ></span>
                        </template>
                    </a>

                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="text-[0.65rem] lg:text-xs font-bold text-portal-muted hover:text-white transition-colors flex items-center gap-2 uppercase">
                            {{ app()->getLocale() }} <x-lucide-chevron-down class="w-3 h-3" />
                        </button>
                        <div x-show="open" @click.away="open = false" class="absolute end-0 mt-2 w-32 bg-portal-sidebar border border-portal-border rounded-lg shadow-xl overflow-hidden py-1 z-50" x-cloak>
                            <a href="{{ route('language.switch', 'fr') }}" class="block px-4 py-2 text-sm text-portal-muted hover:text-white hover:bg-white/5">Français</a>
                            <a href="{{ route('language.switch', 'ar') }}" class="block px-4 py-2 text-sm text-portal-muted hover:text-white hover:bg-white/5 text-end">العربية</a>
                            <a href="{{ route('language.switch', 'en') }}" class="block px-4 py-2 text-sm text-portal-muted hover:text-white hover:bg-white/5">English</a>
                        </div>
                    </div>

                    <button class="text-portal-muted hover:text-white transition-colors hidden sm:block">
                        <x-lucide-bell class="w-5 h-5" />
                    </button>
                    <div class="hidden lg:block w-px h-6 bg-portal-border"></div>
                    <span class="hidden lg:block text-xs font-bold text-portal-muted uppercase tracking-wider">{{ now()->format('F j, Y') }}</span>
                </div>
            </header>

            <div class="p-6 lg:p-10 max-w-[1600px] w-full mx-auto">
                @if (isset($header))
                    <div class="mb-6 lg:mb-10">
                        {{ $header }}
                    </div>
                @endif

                {{ $slot }}
            </div>
        </main>

        <!-- Mobile Bottom Navigation -->
        <nav class="lg:hidden fixed bottom-0 left-0 right-0 bg-[#0f0f10]/90 backdrop-blur-xl border-t border-portal-border flex items-center justify-around px-4 py-3 z-40 pb-safe">
            <a href="{{ route('dashboard') }}" class="flex flex-col items-center gap-1 {{ request()->routeIs('dashboard') ? 'text-portal-accent' : 'text-portal-muted' }}">
                <x-lucide-layout-dashboard class="w-5 h-5" />
                <span class="text-[0.65rem] font-bold">{{ __('Home') }}</span>
            </a>
            <a href="{{ route('products.index') }}" class="flex flex-col items-center gap-1 {{ request()->routeIs('products.*') ? 'text-portal-accent' : 'text-portal-muted' }}">
                <x-lucide-package class="w-5 h-5" />
                <span class="text-[0.65rem] font-bold">{{ __('Catalog') }}</span>
            </a>
            <a href="{{ route('cart.index') }}" class="relative flex flex-col items-center gap-1 {{ request()->routeIs('cart.*') ? 'text-portal-accent' : 'text-portal-muted' }}">
                <x-lucide-clipboard-list class="w-5 h-5" />
                <span class="text-[0.65rem] font-bold">{{ __('Procurement') }}</span>
                <template x-if="cartCount > 0">
                    <span x-text="cartCount" class="absolute -top-1 -right-1 bg-portal-accent text-black text-[8px] font-black w-3.5 h-3.5 rounded-full flex items-center justify-center border border-[#0f0f10]"></span>
                </template>
            </a>
            <a href="{{ route('orders.index') }}" class="flex flex-col items-center gap-1 {{ request()->routeIs('orders.*') ? 'text-portal-accent' : 'text-portal-muted' }}">
                <x-lucide-file-text class="w-5 h-5" />
                <span class="text-[0.65rem] font-bold">{{ __('Orders') }}</span>
            </a>
            <button @click="sidebarOpen = true" class="flex flex-col items-center gap-1 text-portal-muted">
                <x-lucide-menu class="w-5 h-5" />
                <span class="text-[0.65rem] font-bold">{{ __('More') }}</span>
            </button>
        </nav>

        <!-- Toast Notifications -->
        <div 
            x-data="{ 
                show: false, 
                message: '', 
                type: 'success',
                init() {
                    @if(session()->has('success'))
                        this.showToast('{{ session('success') }}', 'success');
                    @elseif(session()->has('error'))
                        this.showToast('{{ session('error') }}', 'error');
                    @endif
                },
                showToast(msg, type) {
                    this.message = msg;
                    this.type = type;
                    this.show = true;
                    setTimeout(() => this.show = false, 5000);
                }
            }"
            @show-toast.window="showToast($event.detail.message, $event.detail.type)"
            x-show="show"
            x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="translate-y-10 opacity-0"
            x-transition:enter-end="translate-y-0 opacity-100"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="translate-y-0 opacity-100"
            x-transition:leave-end="translate-y-10 opacity-0"
            class="fixed bottom-10 right-10 z-[100]"
            x-cloak
        >
            <div :class="type === 'success' ? 'bg-[#141415] border-green-500/30' : 'bg-[#141415] border-red-500/30'"
                 class="flex items-center gap-4 px-6 py-4 rounded-2xl border shadow-2xl backdrop-blur-xl">
                <template x-if="type === 'success'">
                    <div class="w-8 h-8 rounded-full bg-green-500/10 flex items-center justify-center text-green-500">
                        <x-lucide-check-circle-2 class="w-5 h-5" />
                    </div>
                </template>
                <template x-if="type === 'error'">
                    <div class="w-8 h-8 rounded-full bg-red-500/10 flex items-center justify-center text-red-500">
                        <x-lucide-alert-circle class="w-5 h-5" />
                    </div>
                </template>
                <div>
                    <div class="text-[0.6rem] font-extrabold text-portal-muted uppercase tracking-[0.2em] mb-0.5" x-text="type === 'success' ? '{{ __('Success') }}' : '{{ __('Attention') }}'"></div>
                    <div class="text-sm font-bold text-white" x-text="message"></div>
                </div>
                <button @click="show = false" class="ms-6 text-portal-muted hover:text-white transition-colors">
                    <x-lucide-x class="w-4 h-4" />
                </button>
            </div>
        </div>
    </div>
</body>
</html>
