<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Placo Algerie - Premium Building Materials</title>
    
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
<body class="bg-portal-bg text-white font-sans antialiased selection:bg-portal-accent selection:text-black">
    
    <!-- Navigation -->
    <nav class="absolute top-0 w-full z-50 border-b border-white/5 backdrop-blur-sm">
        <div class="max-w-7xl mx-auto px-6 h-24 flex items-center justify-between">
            <div class="flex items-center gap-3 font-display font-bold text-2xl tracking-tight">
                <x-lucide-building-2 class="text-portal-accent w-8 h-8" />
                <span>PLACO<span class="text-portal-accent">PORTAL</span></span>
            </div>
            
            <div class="flex items-center gap-6">
                 <!-- Language Switcher -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center gap-1 font-bold hover:text-portal-accent transition-colors uppercase">
                        {{ app()->getLocale() }}
                        <x-lucide-chevron-down class="w-4 h-4" />
                    </button>
                    <div x-show="open" @click.away="open = false" class="absolute end-0 top-full mt-2 w-32 bg-[#0f0f10] border border-white/10 rounded-xl overflow-hidden shadow-xl z-50" x-cloak>
                        <a href="{{ route('language.switch', 'fr') }}" class="block px-4 py-2 text-sm hover:bg-white/5 text-start">Français</a>
                        <a href="{{ route('language.switch', 'ar') }}" class="block px-4 py-2 text-sm hover:bg-white/5 text-end">العربية</a>
                        <a href="{{ route('language.switch', 'en') }}" class="block px-4 py-2 text-sm hover:bg-white/5 text-start">English</a>
                    </div>
                </div>

                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-bold hover:text-portal-accent transition-colors">{{ __('Dashboard') }}</a>
                    @else
                        <a href="{{ route('login') }}" class="font-bold hover:text-portal-accent transition-colors">{{ __('Client Login') }}</a>
                    @endauth
                @endif
                <a href="{{ route('products.index') }}" class="bg-portal-accent text-black px-6 py-3 rounded-xl font-bold hover:bg-white transition-colors">
                    {{ __('View Catalog') }}
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <main class="relative min-h-screen flex items-center pt-20">
        <!-- Background Effects -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-0 end-0 w-[800px] h-[800px] bg-portal-accent/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3 ltr:translate-x-1/3 rtl:-translate-x-1/3"></div>
            <div class="absolute bottom-0 start-0 w-[600px] h-[600px] bg-blue-500/5 rounded-full blur-3xl translate-y-1/3 -translate-x-1/4 ltr:-translate-x-1/4 rtl:translate-x-1/4"></div>
        </div>

        <div class="max-w-7xl mx-auto px-6 grid grid-cols-2 gap-12 items-center relative z-10">
            <div class="space-y-8">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/5 border border-white/10 text-sm font-medium text-portal-accent">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-portal-accent opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-portal-accent"></span>
                    </span>
                    {{ __('Professional B2B Portal') }}
                </div>
                
                <h1 class="text-7xl font-display font-extrabold tracking-tight leading-tight">
                    {{ __('Building') }} <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-e from-portal-accent to-yellow-200">{{ __('Excellence') }}</span>
                </h1>
                
                <p class="text-xl text-portal-muted max-w-xl leading-relaxed">
                    {{ __('Premium plaster and insulation solutions for professional contractors. Streamline your material procurement through our secure digital requisition channel.') }}
                </p>

                <div class="flex items-center gap-4">
                    <a href="{{ route('login') }}" class="px-8 py-4 bg-portal-accent text-black rounded-xl font-bold text-lg hover:bg-white transition-all transform hover:scale-105 flex items-center gap-2">
                         {{ __('Digital Requisition') }} <x-lucide-arrow-right class="w-5 h-5 rtl:rotate-180" />
                    </a>
                    <a href="{{ route('products.index') }}" class="px-8 py-4 bg-white/5 text-white border border-white/10 rounded-xl font-bold text-lg hover:bg-white/10 transition-all">
                        {{ __('Browse Catalog') }}
                    </a>
                </div>
                
                <div class="pt-8 border-t border-white/5 flex items-center gap-8 text-portal-muted">
                    <div class="flex items-center gap-2">
                        <x-lucide-check-circle-2 class="w-5 h-5 text-portal-accent" />
                        <span>{{ __('Instant Quotes') }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <x-lucide-check-circle-2 class="w-5 h-5 text-portal-accent" />
                        <span>{{ __('Real-time Stock') }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <x-lucide-check-circle-2 class="w-5 h-5 text-portal-accent" />
                        <span>{{ __('Fast Delivery') }}</span>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="relative z-10 bg-portal-sidebar border border-portal-border rounded-2xl p-2 shadow-2xl transform rotate-3 hover:rotate-0 transition-all duration-500">
                     <div class="bg-portal-bg rounded-xl overflow-hidden aspect-[4/3] relative group">
                        <!-- Abstract/Placeholder visual for app preview -->
                        <div class="absolute inset-0 bg-gradient-to-br from-gray-800 to-black p-8 flex flex-col justify-between">
                            <div class="space-y-4">
                                <div class="w-1/3 h-4 bg-white/10 rounded"></div>
                                <div class="w-1/2 h-8 bg-white/20 rounded"></div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="h-24 bg-portal-accent/10 rounded border border-portal-accent/20"></div>
                                <div class="h-24 bg-white/5 rounded"></div>
                            </div>
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="bg-black/50 backdrop-blur-md px-6 py-3 rounded-xl border border-white/10 flex items-center gap-3">
                                <x-lucide-lock class="w-5 h-5 text-portal-accent" />
                                <span class="font-mono font-bold">{{ __('Secure Client Access') }}</span>
                            </div>
                        </div>
                     </div>
                </div>
                <!-- Decorative element -->
                <div class="absolute -inset-4 bg-gradient-to-e from-portal-accent to-blue-600 opacity-20 blur-xl -z-10 rounded-full"></div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="border-t border-white/5 py-12 bg-[#0a0a0b]">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-2 font-display font-bold text-lg">
                <div class="w-8 h-8 bg-portal-accent text-black rounded-lg flex items-center justify-center">P</div>
                <span>Placo Algerie</span>
            </div>
            <p class="text-portal-muted text-sm">{{ __('Authorized Dealers Only') }}</p>
        </div>
    </footer>
</body>
</html>
