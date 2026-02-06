<x-public-layout>
    <!-- Hero Section -->
    <header class="relative min-h-[calc(100vh-80px)] flex items-center justify-center overflow-hidden">
        <!-- Background Effects -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <img src="/images/plaque de platre.png" alt="Hero Background" class="absolute inset-0 w-full h-full object-cover opacity-[0.15] scale-110 blur-sm">
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[500px] bg-portal-accent/10 rounded-full blur-[120px] mix-blend-screen"></div>
            <div class="absolute bottom-0 right-0 w-[800px] h-[800px] bg-blue-600/5 rounded-full blur-[128px]"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-[#0a0a0b]/60 to-[#0a0a0b]"></div>
        </div>

        <div class="max-w-7xl mx-auto px-6 relative z-10 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/5 border border-white/10 text-xs font-bold text-portal-accent uppercase tracking-widest mb-8 backdrop-blur-md">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-portal-accent opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-portal-accent"></span>
                </span>
                {{ __('Leaders en Construction Sèche') }}
            </div>
            
            <h1 class="text-6xl md:text-9xl font-display font-black tracking-tighter leading-[0.85] mb-8 bg-clip-text text-transparent bg-gradient-to-b from-white via-white to-white/50 uppercase">
                GLOBAL <br>
                <span class="text-portal-accent">ACCESSOIRES</span>
            </h1>
            
            <p class="text-xl md:text-2xl text-slate-400 max-w-2xl mx-auto leading-relaxed mb-12">
                {{ __('Producteur leader de la marque') }} <span class="text-white font-bold">MYFIX</span>. {{ __('Spécialiste algérien des systèmes de construction sèche et distributeur des plus grandes marques mondiales.') }}
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('products.index') }}" class="min-w-[200px] px-8 py-4 bg-portal-accent text-black rounded-lg font-bold text-lg hover:bg-white transition-all transform hover:-translate-y-1 shadow-[0_0_40px_-10px_rgba(250,204,21,0.3)] flex items-center justify-center gap-2">
                     {{ __('Voir le Catalogue') }} <x-lucide-arrow-right class="w-5 h-5 rtl:rotate-180" />
                </a>
                @guest
                <a href="{{ route('register') }}" class="min-w-[200px] px-8 py-4 bg-white/5 text-white border border-white/10 rounded-lg font-bold text-lg hover:bg-white/10 transition-all backdrop-blur-md flex items-center justify-center gap-2 group">
                    {{ __('Devenir Partenaire') }}
                    <x-lucide-user-plus class="w-5 h-5 opacity-50 group-hover:opacity-100 transition-opacity" />
                </a>
                @else
                <a href="{{ route('dashboard') }}" class="min-w-[200px] px-8 py-4 bg-white/5 text-white border border-white/10 rounded-lg font-bold text-lg hover:bg-white/10 transition-all backdrop-blur-md flex items-center justify-center gap-2">
                    {{ __('Accéder au Portail') }}
                    <x-lucide-layout-dashboard class="w-5 h-5 opacity-50" />
                </a>
                @endguest
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
                    <div class="text-3xl font-black text-white mb-1">PRO</div>
                    <div class="text-[0.6rem] font-bold text-slate-500 uppercase tracking-widest">{{ __('Service B2B Dédié') }}</div>
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

    <!-- About Section (New) -->
    <section id="about" class="py-32 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                <div class="relative order-2 lg:order-1">
                    <div class="absolute -top-10 -left-10 w-40 h-40 bg-portal-accent/10 rounded-full blur-[80px]"></div>
                    <div class="relative rounded-[2.5rem] overflow-hidden border border-white/10 aspect-[4/5] bg-[#141415] shadow-2xl group">
                        <img src="/images/partenariat.png" alt="Global Accessoires Team" class="absolute inset-0 w-full h-full object-cover opacity-60 group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0a0a0b] via-transparent to-transparent"></div>
                        
                        <div class="absolute bottom-8 left-8 right-8 p-6 bg-white/5 backdrop-blur-md rounded-2xl border border-white/10">
                            <div class="text-portal-accent font-bold text-3xl mb-1">2015</div>
                            <div class="text-xs font-bold text-slate-400 uppercase tracking-widest">{{ __('Fondation de SARL Global Accessoires') }}</div>
                        </div>
                    </div>
                </div>

                <div class="order-1 lg:order-2">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-portal-accent/10 border border-portal-accent/20 mb-6">
                        <span class="w-1.5 h-1.5 rounded-full bg-portal-accent animate-pulse"></span>
                        <span class="text-[0.6rem] font-bold text-portal-accent uppercase tracking-[0.2em]">{{ __('Qui sommes-nous') }}</span>
                    </div>
                    
                    <h2 class="text-4xl md:text-6xl font-display font-black text-white mb-8 tracking-tighter leading-[1.1]">
                        {{ __('SARL Global Accessoires,') }} <br>
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-slate-400 via-slate-500 to-slate-600">{{ __('Producteur et Fabricant') }}</span>
                        <span class="text-portal-accent whitespace-nowrap">{{ __('MYFIX.') }}</span>
                    </h2>
                    
                    <div class="space-y-6 text-slate-400 text-lg leading-relaxed mb-10 border-l-2 border-portal-accent/20 pl-6">
                        <p>
                            {{ __('SARL Global Accessoires est une entreprise industrielle et commerciale spécialisée dans la production et la distribution de matériaux de construction de second œuvre. En tant que fabricant de la marque MYFIX, nous produisons localement une large gamme d\'accessoires essentiels aux systèmes de construction sèche.') }}
                        </p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="group/item flex items-center gap-4 p-4 rounded-xl bg-white/[0.03] border border-white/5 hover:border-portal-accent/30 transition-colors">
                            <div class="w-10 h-10 rounded-lg bg-portal-accent/10 flex items-center justify-center shrink-0 border border-portal-accent/20 group-hover/item:bg-portal-accent group-hover/item:text-black transition-all">
                                <x-lucide-award class="w-5 h-5" />
                            </div>
                            <div>
                                <h4 class="text-white font-bold text-xs uppercase tracking-wider mb-0.5">{{ __('Qualité Certifiée') }}</h4>
                                <p class="text-[0.65rem] text-slate-500 leading-tight">{{ __('Normes européennes et nationales garanties.') }}</p>
                            </div>
                        </div>
                        <div class="group/item flex items-center gap-4 p-4 rounded-xl bg-white/[0.03] border border-white/5 hover:border-portal-accent/30 transition-colors">
                            <div class="w-10 h-10 rounded-lg bg-portal-accent/10 flex items-center justify-center shrink-0 border border-portal-accent/20 group-hover/item:bg-portal-accent group-hover/item:text-black transition-all">
                                <x-lucide-timer class="w-5 h-5" />
                            </div>
                            <div>
                                <h4 class="text-white font-bold text-xs uppercase tracking-wider mb-0.5">{{ __('Réactivité Totale') }}</h4>
                                <p class="text-[0.65rem] text-slate-500 leading-tight">{{ __('Livraison sous 24/48h dans toute l\'Algérie.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Expertise Section (Bento Grid) -->
    <section id="expert" class="py-32 relative">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-20">
                <h2 class="text-4xl md:text-5xl font-display font-black mb-6">{{ __('Pourquoi Choisir') }} <span class="text-portal-accent">GLOBAL ACCESSOIRES</span></h2>
                <p class="text-xl text-slate-400 max-w-2xl">{{ __('Producteur de la marque MYFIX et partenaire des leaders mondiaux, nous maîtrisons toute la chaîne de valeur du second œuvre.') }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 h-auto md:h-[600px]">
                <!-- Item 1: Large Left -->
                <div class="md:col-span-2 md:row-span-2 group relative bg-[#141415] rounded-3xl border border-white/5 p-10 flex flex-col justify-end overflow-hidden hover:border-portal-accent/30 transition-all duration-500">
                    <img src="/images/logistics.png" alt="Logistique Global Accessoires" class="absolute inset-0 w-full h-full object-cover opacity-30 group-hover:opacity-50 transition-all duration-700 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent z-10"></div>
                    <div class="relative z-20">
                        <div class="w-16 h-16 bg-portal-accent rounded-xl flex items-center justify-center mb-6 text-black shadow-[0_10px_30px_rgba(197,160,89,0.3)]">
                            <x-lucide-truck class="w-8 h-8" />
                        </div>
                        <h3 class="text-3xl font-bold text-white mb-4">{{ __('Logistique & Distribution') }}</h3>
                        <p class="text-lg text-slate-300 leading-relaxed max-w-lg">
                            {{ __('Notre plateforme logistique de Bordj Bou Arreridj nous permet d\'expédier des commandes volumineuses sous 24h. Nous gérons le transport pour vous, avec une flotte adaptée à tous types de chantiers.') }}
                        </p>
                    </div>
                </div>

                <!-- Item 2: Top Right -->
                <div class="group relative bg-[#141415] rounded-3xl border border-white/5 p-8 flex flex-col justify-between overflow-hidden hover:border-white/10 transition-all">
                    <img src="/images/certification.png" alt="Certifications" class="absolute inset-0 w-full h-full object-cover opacity-20 group-hover:opacity-40 transition-all duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#141415] via-[#141415]/60 to-transparent z-10"></div>
                    <div class="relative z-20">
                        <div class="w-12 h-12 bg-white/5 rounded-lg flex items-center justify-center mb-4 backdrop-blur-md">
                             <x-lucide-shield-check class="w-6 h-6 text-portal-accent" />
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-white mb-2">{{ __('Certifications') }}</h4>
                            <p class="text-sm text-slate-400">{{ __('Produits certifiés conformes aux normes UE et Algériennes.') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Item 3: Bottom Right -->
                <div class="group relative bg-[#141415] rounded-3xl border border-white/5 p-8 flex flex-col justify-between overflow-hidden hover:border-white/10 transition-all">
                    <img src="/images/ossature metalique.png" alt="Production MYFIX" class="absolute inset-0 w-full h-full object-cover opacity-20 group-hover:opacity-40 transition-all duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#141415] via-[#141415]/60 to-transparent z-10"></div>
                    <div class="relative z-20">
                        <div class="w-12 h-12 bg-white/5 rounded-lg flex items-center justify-center mb-4 backdrop-blur-md">
                             <x-lucide-factory class="w-6 h-6 text-portal-accent" />
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-white mb-2">{{ __('Production MYFIX') }}</h4>
                            <p class="text-sm text-slate-400">{{ __('Nous fabriquons localement une large gamme d\'accessoires pour garantir qualité et disponibilité.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-8 text-center">
                <a href="{{ route('about') }}" class="inline-flex items-center gap-2 text-sm font-bold text-portal-accent hover:text-white transition-colors">
                    {{ __('En savoir plus sur notre entreprise') }} <x-lucide-arrow-right class="w-4 h-4 rtl:rotate-180" />
                </a>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section id="solutions" class="py-32 bg-[#0f0f10] relative">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
                <div>
                     <span class="text-portal-accent font-bold uppercase tracking-widest text-xs mb-2 block">{{ __('Distribution') }}</span>
                    <h2 class="text-4xl font-display font-black">{{ __('Matériaux de Construction') }}</h2>
                </div>
                <a href="{{ route('products.index') }}" class="text-white hover:text-portal-accent font-bold flex items-center gap-2 transition-colors">
                    {{ __('Accéder au catalogue') }} <x-lucide-arrow-right class="w-4 h-4" />
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <a href="{{ route('products.index') }}" class="group relative aspect-[3/4] overflow-hidden rounded-2xl bg-[#141415] border border-white/5">
                    <img src="/images/plaque de platre.png" alt="Plaques de Plâtre" class="absolute inset-0 w-full h-full object-cover opacity-50 group-hover:opacity-70 group-hover:scale-110 transition-all duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent z-10"></div>
                    <div class="absolute inset-0 p-8 flex flex-col justify-between z-20">
                        <div class="w-14 h-14 rounded-full border border-white/10 bg-black/50 backdrop-blur-md flex items-center justify-center group-hover:border-portal-accent/50 transition-colors">
                            <x-lucide-layers class="w-6 h-6 text-white group-hover:text-portal-accent transition-colors" />
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-white mb-2">{{ __('Plaques de Plâtre') }}</h3>
                            <p class="text-sm text-slate-200 mb-6">{{ __('BA13, Hydro, Feu, Phonique.') }}</p>
                            <span class="inline-flex items-center text-xs font-bold text-portal-accent uppercase tracking-wider group-hover:underline">
                                {{ __('Découvrir') }} <x-lucide-arrow-up-right class="w-3 h-3 ml-1" />
                            </span>
                        </div>
                    </div>
                </a>

                <!-- Card 2 -->
                <a href="{{ route('products.index') }}" class="group relative aspect-[3/4] overflow-hidden rounded-2xl bg-[#141415] border border-white/5">
                    <img src="/images/ossature metalique.png" alt="Ossature Métallique" class="absolute inset-0 w-full h-full object-cover opacity-50 group-hover:opacity-70 group-hover:scale-110 transition-all duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent z-10"></div>
                     <div class="absolute inset-0 p-8 flex flex-col justify-between z-20">
                        <div class="w-14 h-14 rounded-full border border-white/10 bg-black/50 backdrop-blur-md flex items-center justify-center group-hover:border-portal-accent/50 transition-colors">
                            <x-lucide-grid class="w-6 h-6 text-white group-hover:text-portal-accent transition-colors" />
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-white mb-2">{{ __('Ossature Métallique') }}</h3>
                            <p class="text-sm text-slate-200 mb-6">{{ __('Montants, Rails, Fourrures, Cornières.') }}</p>
                            <span class="inline-flex items-center text-xs font-bold text-portal-accent uppercase tracking-wider group-hover:underline">
                                {{ __('Découvrir') }} <x-lucide-arrow-up-right class="w-3 h-3 ml-1" />
                            </span>
                        </div>
                    </div>
                </a>

                <!-- Card 3 -->
                <a href="{{ route('products.index') }}" class="group relative aspect-[3/4] overflow-hidden rounded-2xl bg-[#141415] border border-white/5">
                    <img src="/images/accessoires.png" alt="Accessoires" class="absolute inset-0 w-full h-full object-cover opacity-50 group-hover:opacity-70 group-hover:scale-110 transition-all duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent z-10"></div>
                     <div class="absolute inset-0 p-8 flex flex-col justify-between z-20">
                        <div class="w-14 h-14 rounded-full border border-white/10 bg-black/50 backdrop-blur-md flex items-center justify-center group-hover:border-portal-accent/50 transition-colors">
                            <x-lucide-wrench class="w-6 h-6 text-white group-hover:text-portal-accent transition-colors" />
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-white mb-2">{{ __('Accessoires') }}</h3>
                            <p class="text-sm text-slate-200 mb-6">{{ __('Vis, Bandes, Enduits, Trappes.') }}</p>
                            <span class="inline-flex items-center text-xs font-bold text-portal-accent uppercase tracking-wider group-hover:underline">
                                {{ __('Découvrir') }} <x-lucide-arrow-up-right class="w-3 h-3 ml-1" />
                            </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-32 relative overflow-hidden" id="contact">
        <!-- Background Effects -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute bottom-1/4 right-1/4 w-[800px] h-[800px] bg-portal-accent/5 rounded-full blur-[120px]"></div>
        </div>

        <div class="max-w-7xl mx-auto px-6 relative z-10 w-full">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 md:gap-24">
                
                <!-- Info Side -->
                <div class="flex flex-col justify-center">
                     <span class="text-portal-accent font-bold uppercase tracking-widest text-xs mb-4 block">{{ __('Parlons de vos projets') }}</span>
                    <h2 class="text-5xl font-display font-black text-white mb-8">{{ __('Contactez-Nous') }}</h2>
                    <p class="text-slate-400 text-xl leading-relaxed mb-12">
                        {{ __('Une question technique ? Une demande de devis ? Notre équipe est à votre écoute pour accompagner vos chantiers.') }}
                    </p>

                    <div class="space-y-10">
                        <div class="flex items-start gap-6 group">
                            <div class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center shrink-0 group-hover:border-portal-accent/50 transition-colors">
                                <x-lucide-map-pin class="w-6 h-6 text-portal-accent" />
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white mb-2">{{ __('Siège & Dépôt') }}</h3>
                                <p class="text-slate-400 leading-relaxed">
                                    Zone Industrielle Bordj Bou Arreridj<br>
                                    Bordj Bou Arreridj, Algérie
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-6 group">
                            <div class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center shrink-0 group-hover:border-portal-accent/50 transition-colors">
                                <x-lucide-phone class="w-6 h-6 text-portal-accent" />
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white mb-2">{{ __('Téléphone') }}</h3>
                                <p class="text-slate-400 mb-2">{{ __('Du Dimanche au Jeudi, 8h00 - 17h00') }}</p>
                                <a href="tel:+213550000000" class="text-xl font-display font-bold text-white hover:text-portal-accent transition-colors">
                                    +213 550 00 00 00
                                </a>
                            </div>
                        </div>

                        <div class="flex items-start gap-6 group">
                            <div class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center shrink-0 group-hover:border-portal-accent/50 transition-colors">
                                <x-lucide-mail class="w-6 h-6 text-portal-accent" />
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white mb-2">{{ __('Email') }}</h3>
                                <p class="text-slate-400 mb-2">{{ __('Réponse sous 24h ouvrées') }}</p>
                                <a href="mailto:commercial@myfix-dz.com" class="text-lg text-white hover:text-portal-accent transition-colors">
                                    commercial@myfix-dz.com
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Side -->
                <div class="bg-[#141415] border border-white/10 rounded-[2.5rem] p-8 md:p-12 relative overflow-hidden shadow-2xl">
                    <div class="absolute top-0 right-0 w-full h-2 bg-gradient-to-r from-portal-accent to-transparent"></div>
                    
                    <h3 class="text-2xl font-bold text-white mb-8">{{ __('Envoyer un Message') }}</h3>
                    
                    <form class="space-y-6">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">{{ __('Votre Nom') }}</label>
                                <input type="text" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-4 text-white focus:border-portal-accent focus:ring-0 transition-colors" placeholder="{{ __('Nom complet') }}">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">{{ __('Téléphone') }}</label>
                                <input type="tel" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-4 text-white focus:border-portal-accent focus:ring-0 transition-colors" placeholder="05 XX XX XX XX">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">{{ __('Email Professionnel') }}</label>
                            <input type="email" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-4 text-white focus:border-portal-accent focus:ring-0 transition-colors" placeholder="nom@entreprise.com">
                        </div>

                        <div>
                             <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">{{ __('Sujet') }}</label>
                            <select class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-4 text-white focus:border-portal-accent focus:ring-0 transition-colors appearance-none">
                                <option class="bg-[#141415]">{{ __('Demande de Devis') }}</option>
                                <option class="bg-[#141415]">{{ __('Renseignement Technique') }}</option>
                                <option class="bg-[#141415]">{{ __('Partenariat') }}</option>
                                <option class="bg-[#141415]">{{ __('Autre') }}</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">{{ __('Message') }}</label>
                            <textarea rows="4" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-4 text-white focus:border-portal-accent focus:ring-0 transition-colors" placeholder="{{ __('Comment pouvons-nous vous aider ?') }}"></textarea>
                        </div>

                        <button type="button" class="w-full bg-portal-accent text-black font-black py-5 rounded-xl hover:bg-white transition-all transform hover:-translate-y-1 flex items-center justify-center gap-3 shadow-xl shadow-portal-accent/10">
                             {{ __('Envoyer la demande') }} <x-lucide-send class="w-5 h-5 rtl:rotate-180" />
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-public-layout>
