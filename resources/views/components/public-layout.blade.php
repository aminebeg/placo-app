<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'MyFix - Leader en Systèmes Sèches et Isolation')</title>
    
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
<body class="bg-[#0a0a0b] text-white font-sans antialiased selection:bg-portal-accent selection:text-black overflow-x-hidden"
      x-data="{ 
          commandeCount: {{ count(session('commande', [])) }}
      }"
      @commande-updated.window="commandeCount = $event.detail.count">
    
    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 border-b border-white/5 bg-[#0a0a0b]/80 backdrop-blur-md transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <a href="/" class="flex items-center gap-3 group">
                <div class="w-10 h-10 bg-portal-accent rounded-lg flex items-center justify-center text-black shadow-lg shadow-portal-accent/20 transition-transform group-hover:scale-110">
                    <x-lucide-building-2 class="w-6 h-6" />
                </div>
                <div class="flex flex-col leading-tight">
                    <span class="text-white text-lg font-display font-black tracking-tight uppercase">{{ __('SARL Global') }}</span>
                    <span class="text-portal-accent text-[0.65rem] font-bold uppercase tracking-[0.2em]">{{ __('Accessoires') }}</span>
                </div>
            </a>
            
            <!-- Desktop Links -->
            <div class="hidden lg:flex items-center gap-8">
                <a href="{{ route('about') }}" class="text-[0.7rem] font-bold hover:text-white transition-colors {{ request()->routeIs('about') ? 'text-white border-b border-portal-accent pb-1' : 'text-slate-400' }} uppercase tracking-widest">{{ __('À Propos') }}</a>
                <a href="{{ route('brand.myfix') }}" class="relative px-5 py-2 rounded-full border border-portal-accent/30 bg-portal-accent/5 text-[0.7rem] font-black hover:bg-portal-accent hover:text-black transition-all {{ request()->routeIs('brand.myfix') ? 'bg-portal-accent text-black border-portal-accent' : 'text-portal-accent' }} uppercase tracking-[0.2em]">
                    {{ __('MYFIX') }}
                </a>
                <a href="/#contact" class="text-[0.7rem] font-bold hover:text-white transition-colors text-slate-400 uppercase tracking-widest">{{ __('Contact') }}</a>
            </div>

            <div class="flex items-center gap-4">
                 <!-- Language Switcher -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center gap-1 font-bold text-[0.6rem] hover:text-portal-accent transition-colors uppercase border border-white/10 px-3 py-1.5 rounded-lg text-slate-400">
                        {{ app()->getLocale() }}
                        <x-lucide-chevron-down class="w-3 h-3" />
                    </button>
                    <div x-show="open" @click.away="open = false" class="absolute end-0 top-full mt-2 w-32 bg-[#18181b] border border-white/10 rounded-lg overflow-hidden shadow-xl z-50 text-slate-400" x-cloak>
                        <a href="{{ route('language.switch', 'fr') }}" class="block px-4 py-2 text-xs hover:bg-white/5 text-start">Français</a>
                        <a href="{{ route('language.switch', 'ar') }}" class="block px-4 py-2 text-xs hover:bg-white/5 text-end">العربية</a>
                        <a href="{{ route('language.switch', 'en') }}" class="block px-4 py-2 text-xs hover:bg-white/5 text-start">English</a>
                    </div>
                </div>

                <!-- Selection List Link -->
                <a href="{{ route('commande.index') }}" class="relative p-2 text-slate-400 hover:text-white transition-all group">
                    <x-lucide-list-checks class="w-5 h-5" />
                    <template x-if="commandeCount > 0">
                        <span x-text="commandeCount" class="absolute -top-1 -right-1 bg-portal-accent text-black text-[9px] font-black w-3.5 h-3.5 rounded-full flex items-center justify-center border border-[#0a0a0b]"></span>
                    </template>
                </a>

                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="p-2 text-slate-400 hover:text-white transition-all bg-white/5 rounded-lg border border-white/5" title="{{ __('Tableau de Bord') }}">
                            <x-lucide-user class="w-5 h-5" />
                        </a>
                    @else
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center gap-2 font-bold text-[0.65rem] uppercase tracking-widest text-slate-400 hover:text-white transition-colors border-e border-white/10 pe-4 me-2">
                                <x-lucide-user-circle class="w-4 h-4" />
                                {{ __('Espace Client') }}
                                <x-lucide-chevron-down class="w-3 h-3 pt-0.5" />
                            </button>
                            <div x-show="open" @click.away="open = false" 
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="opacity-0 scale-95"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 class="absolute end-0 top-full mt-4 w-56 bg-[#18181b] border border-white/10 rounded-xl overflow-hidden shadow-2xl z-50 p-2" x-cloak>
                                <a href="{{ route('login') }}" class="flex items-center gap-3 px-4 py-3 text-xs font-bold text-slate-400 hover:text-white hover:bg-white/5 rounded-lg transition-all group">
                                    <div class="w-8 h-8 rounded-lg bg-portal-accent/10 flex items-center justify-center text-portal-accent group-hover:bg-portal-accent group-hover:text-black transition-colors">
                                        <x-lucide-log-in class="w-4 h-4" />
                                    </div>
                                    {{ __('Se Connecter') }}
                                </a>
                                @if (Route::has('register'))
                                    <div class="h-[1px] bg-white/5 my-1 mx-2"></div>
                                    <a href="{{ route('register') }}" class="flex items-center gap-3 px-4 py-3 text-xs font-bold text-slate-400 hover:text-white hover:bg-white/5 rounded-lg transition-all group">
                                        <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center text-white group-hover:bg-white group-hover:text-black transition-colors">
                                            <x-lucide-user-plus class="w-4 h-4" />
                                        </div>
                                        <div class="flex flex-col">
                                            <span>{{ __('Créer un Compte') }}</span>
                                            <span class="text-[0.6rem] opacity-50 font-normal normal-case">{{ __('Devenir partenaire MyFix') }}</span>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endauth
                @endif
                <a href="{{ route('products.index') }}" class="bg-portal-accent text-black px-5 py-2.5 rounded-lg font-bold text-xs uppercase tracking-widest hover:bg-white transition-colors flex items-center gap-2">
                    <x-lucide-package class="w-4 h-4" /> {{ __('Catalogue') }}
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
                        <img src="/images/logo-myfix.png" alt="Global Accessoires Logo" class="h-6 w-auto">
                        <span class="uppercase tracking-widest text-base">SARL <span class="text-portal-accent">GLOBAL</span> ACCESSOIRES</span>
                    </div>
                    <p class="text-slate-500 text-sm max-w-sm">
                        {{ __('SARL Global Accessoires est un fabricant et distributeur multi-marques leader, spécialisé dans les systèmes de construction sèche et d\'isolation de haute performance.') }}
                    </p>
                </div>
                <div>
                    <h4 class="font-bold text-white mb-4">{{ __('Accès Rapide') }}</h4>
                    <ul class="space-y-2 text-sm text-slate-500">
                        <li><a href="{{ route('products.index') }}" class="hover:text-portal-accent transition-colors">{{ __('Catalogue Technique') }}</a></li>
                        <li><a href="{{ route('commande.index') }}" class="hover:text-portal-accent transition-colors">{{ __('Ma Sélection') }}</a></li>
                        <li><a href="{{ route('login') }}" class="hover:text-portal-accent transition-colors">{{ __('Espace Client') }}</a></li>
                    </ul>
                </div>
                <div>
                     <h4 class="font-bold text-white mb-4">{{ __('Légal') }}</h4>
                    <ul class="space-y-2 text-sm text-slate-500">
                        <li><a href="#" class="hover:text-portal-accent transition-colors">{{ __('Mentions Légales') }}</a></li>
                        <li><a href="#" class="hover:text-portal-accent transition-colors">{{ __('Conditions B2B') }}</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="pt-8 border-t border-white/10 flex flex-col md:flex-row justify-between items-center gap-4">
                 <p class="text-slate-600 text-xs">{{ __('© :year SARL Global Accessoires. Tous droits réservés.', ['year' => date('Y')]) }}</p>
                 <div class="flex gap-4 text-slate-500">
                     <x-lucide-facebook class="w-4 h-4 hover:text-white cursor-pointer" />
                     <x-lucide-linkedin class="w-4 h-4 hover:text-white cursor-pointer" />
                     <x-lucide-instagram class="w-4 h-4 hover:text-white cursor-pointer" />
                 </div>
            </div>
        </div>
    </footer>

    <!-- Global Toast Component for Public Pages -->
    <div 
        x-data="{ 
            show: false, 
            message: '', 
            type: 'success',
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
        <div :class="type === 'success' ? 'bg-[#141415] border-green-500/30 shadow-2xl' : 'bg-[#141415] border-red-500/30 shadow-2xl'"
             class="flex items-center gap-4 px-6 py-4 rounded-2xl border backdrop-blur-xl">
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
                <div class="text-sm font-bold text-white uppercase tracking-tight" x-text="message"></div>
            </div>
            <button @click="show = false" class="ms-6 text-slate-500 hover:text-white transition-colors">
                <x-lucide-x class="w-4 h-4" />
            </button>
        </div>
    </div>

    <script>
        window.showToast = (message, type = 'success') => {
            window.dispatchEvent(new CustomEvent('show-toast', { detail: { message, type } }));
        }
    </script>
</body>
</html>
