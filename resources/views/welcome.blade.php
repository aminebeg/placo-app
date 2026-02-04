<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyFix Pro - Leader en Systèmes Sèches et Isolation</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Unbounded:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [dir="rtl"] { font-family: 'Cairo', sans-serif; }
        .clip-diagonal { clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%); }
    </style>
</head>
<body class="bg-[#0a0a0b] text-white font-sans antialiased selection:bg-portal-accent selection:text-black overflow-x-hidden">
    
    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 border-b border-white/5 bg-[#0a0a0b]/80 backdrop-blur-md transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <div class="flex items-center gap-3 font-display font-bold text-2xl tracking-tight">
                <img src="/images/logo-myfix.png" alt="MyFix Logo" class="h-8 w-auto">
                <span>MYFIX <span class="text-portal-accent">PRO</span></span>
            </div>
            
            <!-- Desktop Links -->
            <div class="hidden md:flex items-center gap-8">
                <a href="#about" class="text-sm font-medium hover:text-portal-accent transition-colors text-slate-300">{{ __('Qui sommes-nous') }}</a>
                <a href="#solutions" class="text-sm font-medium hover:text-portal-accent transition-colors text-slate-300">{{ __('Nos Solutions') }}</a>
                <a href="#expert" class="text-sm font-medium hover:text-portal-accent transition-colors text-slate-300">{{ __('Expertise') }}</a>
                <a href="#contact" class="text-sm font-medium hover:text-portal-accent transition-colors text-slate-300">{{ __('Contact') }}</a>
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

    <!-- Hero Section -->
    <header class="relative min-h-screen flex items-center justify-center pt-20 overflow-hidden">
        <!-- Background Effects -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[500px] bg-portal-accent/10 rounded-full blur-[120px] mix-blend-screen"></div>
            <div class="absolute bottom-0 right-0 w-[800px] h-[800px] bg-blue-600/5 rounded-full blur-[128px]"></div>
            <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20 brightness-100"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-[#0a0a0b]/50 to-[#0a0a0b]"></div>
        </div>

        <div class="max-w-7xl mx-auto px-6 relative z-10 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/5 border border-white/10 text-xs font-bold text-portal-accent uppercase tracking-widest mb-8 backdrop-blur-md">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-portal-accent opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-portal-accent"></span>
                </span>
                {{ __('Leaders en Construction Sèche') }}
            </div>
            
            <h1 class="text-6xl md:text-8xl font-display font-black tracking-tighter leading-[0.9] mb-8 bg-clip-text text-transparent bg-gradient-to-b from-white via-white to-white/50">
                MYFIX <span class="text-portal-accent">PRO</span>
            </h1>
            
            <p class="text-xl md:text-2xl text-slate-400 max-w-2xl mx-auto leading-relaxed mb-12">
                {{ __('La plateforme de référence pour les professionnels du bâtiment. Distribution officielle de matériaux de construction et solutions techniques.') }}
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('products.index') }}" class="min-w-[200px] px-8 py-4 bg-portal-accent text-black rounded-lg font-bold text-lg hover:bg-white transition-all transform hover:-translate-y-1 shadow-[0_0_40px_-10px_rgba(250,204,21,0.3)] flex items-center justify-center gap-2">
                     {{ __('Consulter le Catalogue') }} <x-lucide-arrow-right class="w-5 h-5 rtl:rotate-180" />
                </a>
                <a href="#contact" class="min-w-[200px] px-8 py-4 bg-white/5 text-white border border-white/10 rounded-lg font-bold text-lg hover:bg-white/10 transition-all backdrop-blur-md flex items-center justify-center">
                    {{ __('Demander un Devis') }}
                </a>
            </div>
            
            <!-- Stats -->
            <div class="mt-24 pt-8 border-t border-white/5 grid grid-cols-2 md:grid-cols-4 gap-8 max-w-4xl mx-auto">
                <div class="text-center">
                    <div class="text-3xl font-black text-white mb-1">15+</div>
                    <div class="text-[0.6rem] font-bold text-slate-500 uppercase tracking-widest">{{ __('Années d\'Expérience') }}</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-black text-white mb-1">58</div>
                    <div class="text-[0.6rem] font-bold text-slate-500 uppercase tracking-widest">{{ __('Wilayas Couvertes') }}</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-black text-white mb-1">24h</div>
                    <div class="text-[0.6rem] font-bold text-slate-500 uppercase tracking-widest">{{ __('Expédition Rapide') }}</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-black text-white mb-1">B2B</div>
                    <div class="text-[0.6rem] font-bold text-slate-500 uppercase tracking-widest">{{ __('Service Pro Dédié') }}</div>
                </div>
            </div>
        </div>
    </header>

    <!-- Brands Scroll -->
    <div class="border-y border-white/5 bg-[#0f0f10]/50 backdrop-blur-sm py-12 overflow-hidden relative">
        <div class="max-w-7xl mx-auto px-6">
            <p class="text-center text-xs font-bold text-slate-600 uppercase tracking-[0.3em] mb-8">{{ __('Partenaires Officiels') }}</p>
            <div class="flex justify-between items-center gap-12 md:gap-24 opacity-30 grayscale hover:grayscale-0 hover:opacity-100 transition-all duration-500">
                <div class="text-2xl font-black font-display text-white tracking-widest">KNAUF</div>
                <div class="text-2xl font-black font-display text-white tracking-widest">PLACO</div>
                <div class="text-2xl font-black font-display text-white tracking-widest">ISOVER</div>
                <div class="hidden md:block text-2xl font-black font-display text-white tracking-widest">SEMIN</div>
                <div class="hidden md:block text-2xl font-black font-display text-white tracking-widest">MAPEI</div>
            </div>
        </div>
    </div>

    <!-- Expertise Section (Bento Grid) -->
    <section id="expert" class="py-32 relative">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-20">
                <h2 class="text-4xl md:text-5xl font-display font-black mb-6">{{ __('Pourquoi Choisir') }} <span class="text-portal-accent">MYFIX</span></h2>
                <p class="text-xl text-slate-400 max-w-2xl">{{ __('Une approche industrielle de la distribution, alliant puissance logistique et expertise technique.') }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 h-auto md:h-[600px]">
                <!-- Item 1: Large Left -->
                <div class="md:col-span-2 md:row-span-2 group relative bg-[#141415] rounded-3xl border border-white/5 p-10 flex flex-col justify-end overflow-hidden hover:border-portal-accent/30 transition-all duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent z-10"></div>
                    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-portal-accent/5 rounded-full blur-[100px]"></div>
                    <div class="relative z-20">
                        <div class="w-16 h-16 bg-portal-accent rounded-xl flex items-center justify-center mb-6 text-black">
                            <x-lucide-truck class="w-8 h-8" />
                        </div>
                        <h3 class="text-3xl font-bold text-white mb-4">{{ __('Logistique & Distribution') }}</h3>
                        <p class="text-lg text-slate-400 leading-relaxed max-w-lg">
                            {{ __('Notre plateforme logistique de Oued Smar nous permet d\'expédier des commandes volumineuses sous 24h. Nous gérons le transport pour vous, avec une flotte adaptée à tous types de chantiers.') }}
                        </p>
                    </div>
                </div>

                <!-- Item 2: Top Right -->
                <div class="group bg-[#141415] rounded-3xl border border-white/5 p-8 flex flex-col justify-between hover:border-white/10 transition-all">
                    <div class="w-12 h-12 bg-white/5 rounded-lg flex items-center justify-center mb-4">
                         <x-lucide-shield-check class="w-6 h-6 text-portal-accent" />
                    </div>
                    <div>
                        <h4 class="text-xl font-bold text-white mb-2">{{ __('Certifications') }}</h4>
                        <p class="text-sm text-slate-400">{{ __('Produits certifiés conformes aux normes UE et Algériennes.') }}</p>
                    </div>
                </div>

                <!-- Item 3: Bottom Right -->
                <div class="group bg-[#141415] rounded-3xl border border-white/5 p-8 flex flex-col justify-between hover:border-white/10 transition-all">
                    <div class="w-12 h-12 bg-white/5 rounded-lg flex items-center justify-center mb-4">
                         <x-lucide-users class="w-6 h-6 text-portal-accent" />
                    </div>
                    <div>
                        <h4 class="text-xl font-bold text-white mb-2">{{ __('Partenariat Pro') }}</h4>
                        <p class="text-sm text-slate-400">{{ __('Comptes pro avec tarifs préférentiels et délais de paiement.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section id="solutions" class="py-32 bg-[#0f0f10] relative">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
                <div>
                     <span class="text-portal-accent font-bold uppercase tracking-widest text-xs mb-2 block">{{ __('Notre Catalogue') }}</span>
                    <h2 class="text-4xl font-display font-black">{{ __('Solutions Constructives') }}</h2>
                </div>
                <a href="{{ route('products.index') }}" class="text-white hover:text-portal-accent font-bold flex items-center gap-2 transition-colors">
                    {{ __('Tout le catalogue') }} <x-lucide-arrow-right class="w-4 h-4" />
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <a href="{{ route('products.index', ['category' => 'plaster']) }}" class="group relative aspect-[3/4] overflow-hidden rounded-2xl bg-[#141415] border border-white/5">
                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-white/10 via-[#141415] to-[#141415] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="absolute inset-0 p-8 flex flex-col justify-between z-10">
                        <div class="w-14 h-14 rounded-full border border-white/10 bg-black/50 backdrop-blur-md flex items-center justify-center group-hover:border-portal-accent/50 transition-colors">
                            <x-lucide-layers class="w-6 h-6 text-white group-hover:text-portal-accent transition-colors" />
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-white mb-2">{{ __('Plaques de Plâtre') }}</h3>
                            <p class="text-sm text-slate-400 mb-6">{{ __('BA13, Hydro, Feu, Phonique.') }}</p>
                            <span class="inline-flex items-center text-xs font-bold text-portal-accent uppercase tracking-wider group-hover:underline">
                                {{ __('Découvrir') }} <x-lucide-arrow-up-right class="w-3 h-3 ml-1" />
                            </span>
                        </div>
                    </div>
                </a>

                <!-- Card 2 -->
                <a href="{{ route('products.index', ['category' => 'metal']) }}" class="group relative aspect-[3/4] overflow-hidden rounded-2xl bg-[#141415] border border-white/5">
                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-white/10 via-[#141415] to-[#141415] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                     <div class="absolute inset-0 p-8 flex flex-col justify-between z-10">
                        <div class="w-14 h-14 rounded-full border border-white/10 bg-black/50 backdrop-blur-md flex items-center justify-center group-hover:border-portal-accent/50 transition-colors">
                            <x-lucide-grid class="w-6 h-6 text-white group-hover:text-portal-accent transition-colors" />
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-white mb-2">{{ __('Ossature Métallique') }}</h3>
                            <p class="text-sm text-slate-400 mb-6">{{ __('Montants, Rails, Fourrures, Cornières.') }}</p>
                            <span class="inline-flex items-center text-xs font-bold text-portal-accent uppercase tracking-wider group-hover:underline">
                                {{ __('Découvrir') }} <x-lucide-arrow-up-right class="w-3 h-3 ml-1" />
                            </span>
                        </div>
                    </div>
                </a>

                <!-- Card 3 -->
                <a href="{{ route('products.index', ['category' => 'accessories']) }}" class="group relative aspect-[3/4] overflow-hidden rounded-2xl bg-[#141415] border border-white/5">
                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-white/10 via-[#141415] to-[#141415] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                     <div class="absolute inset-0 p-8 flex flex-col justify-between z-10">
                        <div class="w-14 h-14 rounded-full border border-white/10 bg-black/50 backdrop-blur-md flex items-center justify-center group-hover:border-portal-accent/50 transition-colors">
                            <x-lucide-wrench class="w-6 h-6 text-white group-hover:text-portal-accent transition-colors" />
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-white mb-2">{{ __('Accessoires') }}</h3>
                            <p class="text-sm text-slate-400 mb-6">{{ __('Vis, Bandes, Enduits, Trappes.') }}</p>
                            <span class="inline-flex items-center text-xs font-bold text-portal-accent uppercase tracking-wider group-hover:underline">
                                {{ __('Découvrir') }} <x-lucide-arrow-up-right class="w-3 h-3 ml-1" />
                            </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Contact / Map Section -->
    <section id="contact" class="py-32">
        <div class="max-w-7xl mx-auto px-6">
            <div class="bg-[#141415] border border-white/5 rounded-3xl overflow-hidden p-8 md:p-12 relative flex flex-col md:flex-row gap-16">
                 <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-gradient-to-b from-portal-accent/5 via-transparent to-transparent rounded-full blur-[100px] -translate-y-1/2 translate-x-1/2"></div>
                
                 <div class="md:w-1/2 relative z-10">
                    <h2 class="text-4xl font-display font-black mb-8">{{ __('Contactez-nous') }}</h2>
                    <p class="text-slate-400 mb-12 text-lg">{{ __('Notre équipe commerciale est à votre disposition pour vos demandes de devis et conseils techniques.') }}</p>
                    
                    <div class="space-y-8">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-lg bg-white/5 flex items-center justify-center mt-1">
                                <x-lucide-map-pin class="w-5 h-5 text-portal-accent" />
                            </div>
                            <div>
                                <h4 class="font-bold text-white mb-1">{{ __('Siège & Dépôt') }}</h4>
                                <p class="text-sm text-slate-400">Zone Industrielle Oued Smar<br>Alger, Algérie</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-lg bg-white/5 flex items-center justify-center mt-1">
                                <x-lucide-phone class="w-5 h-5 text-portal-accent" />
                            </div>
                            <div>
                                <h4 class="font-bold text-white mb-1">{{ __('Téléphone') }}</h4>
                                <p class="text-sm text-slate-400">+213 550 00 00 00</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-lg bg-white/5 flex items-center justify-center mt-1">
                                <x-lucide-mail class="w-5 h-5 text-portal-accent" />
                            </div>
                            <div>
                                <h4 class="font-bold text-white mb-1">{{ __('Email') }}</h4>
                                <p class="text-sm text-slate-400">commercial@myfix-dz.com</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="md:w-1/2 relative z-10">
                    <div class="bg-black/50 backdrop-blur-xl border border-white/10 rounded-2xl p-6 md:p-8">
                        <form class="space-y-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">{{ __('Votre Nom') }}</label>
                                <input type="text" class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white focus:border-portal-accent focus:ring-0 transition-colors">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">{{ __('Entreprise') }}</label>
                                <input type="text" class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white focus:border-portal-accent focus:ring-0 transition-colors">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">{{ __('Email') }}</label>
                                <input type="email" class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white focus:border-portal-accent focus:ring-0 transition-colors">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">{{ __('Message / Demande') }}</label>
                                <textarea rows="3" class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white focus:border-portal-accent focus:ring-0 transition-colors"></textarea>
                            </div>
                            <button type="button" class="w-full bg-portal-accent text-black font-bold py-4 rounded-lg hover:bg-white transition-colors">
                                {{ __('Envoyer le Message') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="border-t border-white/10 bg-black pt-16 pb-8">
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
                        <li><a href="#contact" class="hover:text-portal-accent transition-colors">{{ __('Contact') }}</a></li>
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
