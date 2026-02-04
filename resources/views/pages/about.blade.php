<x-public-layout>
    @section('title', 'Qui sommes-nous - MyFix')

    <!-- Hero Section -->
    <div class="relative py-24 md:py-32 overflow-hidden">
        <!-- Background Effects -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-portal-accent/5 rounded-full blur-[120px]"></div>
            <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20 brightness-100"></div>
        </div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <span class="text-portal-accent font-bold uppercase tracking-widest text-xs mb-4 block">{{ __('Notre Entreprise') }}</span>
            <h1 class="text-5xl md:text-7xl font-display font-black tracking-tight mb-8 text-white">
                {{ __('Une Histoire de') }} <br>
                <span class="text-slate-500">{{ __('Partenariat et de Confiance') }}</span>
            </h1>
            <p class="text-xl text-slate-400 max-w-2xl leading-relaxed">
                {{ __('Depuis plus de 10 ans, SARL MYFIX s\'impose comme un acteur incontournable dans la distribution de systèmes de construction sèche et d\'isolation en Algérie.') }}
            </p>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="border-y border-white/5 bg-[#0f0f10]/50 backdrop-blur-sm">
        <div class="max-w-7xl mx-auto px-6 py-12">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div>
                    <div class="text-4xl font-black text-white mb-1">2015</div>
                    <div class="text-xs font-bold text-slate-500 uppercase tracking-widest">{{ __('Année de Création') }}</div>
                </div>
                <div>
                    <div class="text-4xl font-black text-white mb-1">5000+</div>
                    <div class="text-xs font-bold text-slate-500 uppercase tracking-widest">{{ __('Projets Fournis') }}</div>
                </div>
                <div>
                    <div class="text-4xl font-black text-white mb-1">2000<span class="text-lg align-top">m²</span></div>
                    <div class="text-xs font-bold text-slate-500 uppercase tracking-widest">{{ __('Capacité de Stockage') }}</div>
                </div>
                <div>
                    <div class="text-4xl font-black text-white mb-1">100%</div>
                    <div class="text-xs font-bold text-slate-500 uppercase tracking-widest">{{ __('Satisfaction Client') }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <section class="py-24" id="vision">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
                <div class="relative">
                    <div class="absolute inset-0 bg-portal-accent/10 blur-[80px] rounded-full"></div>
                    <!-- Placeholder for Company Image -->
                    <div class="relative rounded-2xl overflow-hidden border border-white/10 aspect-[4/3] bg-[#141415]">
                        <div class="absolute inset-0 flex items-center justify-center text-slate-600">
                             <!-- Ideally a real image goes here -->
                             <span class="flex flex-col items-center gap-4">
                                <x-lucide-building-2 class="w-16 h-16 opacity-50" />
                                <span class="text-xs uppercase font-bold tracking-widest">{{ __('Image: Dépôt MyFix') }}</span>
                             </span>
                        </div>
                    </div>
                </div>
                <div>
                    <h2 class="text-3xl font-display font-bold mb-6 text-white">{{ __('Notre Mission') }}</h2>
                    <div class="space-y-6 text-slate-400 text-lg leading-relaxed">
                        <p>
                            {{ __('Chez MYFIX, nous croyons que la qualité des matériaux définit la longévité d\'un ouvrage. C\'est pourquoi nous ne distribuons que des marques leaders mondiaux comme Knauf, Placo et Isover.') }}
                        </p>
                        <p>
                            {{ __('Notre rôle dépasse la simple distribution. Nous accompagnons les architectes, les entreprises de réalisation et les artisans dans le choix des solutions techniques les plus adaptées à leurs chantiers.') }}
                        </p>
                        <ul class="space-y-4 mt-8">
                            <li class="flex items-center gap-3">
                                <div class="w-6 h-6 rounded-full bg-portal-accent/20 flex items-center justify-center">
                                    <x-lucide-check class="w-3 h-3 text-portal-accent" />
                                </div>
                                <span class="text-white text-base">{{ __('Disponibilité immédiate sur les produits phares') }}</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <div class="w-6 h-6 rounded-full bg-portal-accent/20 flex items-center justify-center">
                                    <x-lucide-check class="w-3 h-3 text-portal-accent" />
                                </div>
                                <span class="text-white text-base">{{ __('Logistique intégrée vers toutes les Wilayas') }}</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <div class="w-6 h-6 rounded-full bg-portal-accent/20 flex items-center justify-center">
                                    <x-lucide-check class="w-3 h-3 text-portal-accent" />
                                </div>
                                <span class="text-white text-base">{{ __('Support technique et devis personnalisés') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Expertise BENTO -->
    <section class="py-24 bg-[#0f0f10]" id="expertise">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-portal-accent font-bold uppercase tracking-widest text-xs mb-2 block">{{ __('Notre Expertise') }}</span>
                <h2 class="text-4xl font-display font-black text-white">{{ __('Au-delà des Produits') }}</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="bg-[#141415] border border-white/5 rounded-2xl p-8 hover:border-portal-accent/20 transition-all">
                    <div class="w-12 h-12 bg-white/5 rounded-xl flex items-center justify-center mb-6">
                        <x-lucide-truck class="w-6 h-6 text-portal-accent" />
                    </div>
                    <h3 class="text-xl font-bold text-white mb-4">{{ __('Logistique Performante') }}</h3>
                    <p class="text-slate-400">
                        {{ __('Notre situation stratégique à Oued Smar nous permet de desservir rapidement Alger et ses environs. Nos camions assurent des livraisons sécurisées.') }}
                    </p>
                </div>

                <!-- Card 2 -->
                <div class="bg-[#141415] border border-white/5 rounded-2xl p-8 hover:border-portal-accent/20 transition-all">
                    <div class="w-12 h-12 bg-white/5 rounded-xl flex items-center justify-center mb-6">
                        <x-lucide-file-text class="w-6 h-6 text-portal-accent" />
                    </div>
                    <h3 class="text-xl font-bold text-white mb-4">{{ __('Bureau d\'Études') }}</h3>
                    <p class="text-slate-400">
                        {{ __('Besoin d\'un quantitatif précis ? Notre équipe technique analyse vos plans et vous fournit une estimation détaillée des matériaux nécessaires.') }}
                    </p>
                </div>

                <!-- Card 3 -->
                <div class="bg-[#141415] border border-white/5 rounded-2xl p-8 hover:border-portal-accent/20 transition-all">
                    <div class="w-12 h-12 bg-white/5 rounded-xl flex items-center justify-center mb-6">
                        <x-lucide-graduation-cap class="w-6 h-6 text-portal-accent" />
                    </div>
                    <h3 class="text-xl font-bold text-white mb-4">{{ __('Formation & Conseil') }}</h3>
                    <p class="text-slate-400">
                        {{ __('Nous organisons régulièrement des sessions de démonstration avec nos partenaires pour former les artisans aux nouvelles techniques de pose.') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Partners -->
    <section class="py-24 border-t border-white/5">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-display font-bold text-white mb-12">{{ __('Ils nous font confiance') }}</h2>
            <div class="flex flex-wrap justify-center items-center gap-12 md:gap-20 opacity-50 grayscale hover:grayscale-0 hover:opacity-100 transition-all duration-500">
                 <!-- Brands (Text for now) -->
                <div class="text-3xl font-black font-display text-white tracking-widest">KNAUF</div>
                <div class="text-3xl font-black font-display text-white tracking-widest">PLACO</div>
                <div class="text-3xl font-black font-display text-white tracking-widest">ISOVER</div>
                <div class="text-3xl font-black font-display text-white tracking-widest">SEMIN</div>
                <div class="text-3xl font-black font-display text-white tracking-widest">MAPEI</div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-24 bg-portal-accent">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-display font-black text-black mb-6">{{ __('Prêt à démarrer votre chantier ?') }}</h2>
            <p class="text-black/80 text-xl mb-10">{{ __('Contactez notre service commercial ou commandez directement en ligne.') }}</p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('contact') }}" class="px-8 py-4 bg-black text-white rounded-lg font-bold text-lg hover:bg-black/80 transition-all">
                    {{ __('Nous Contacter') }}
                </a>
                <a href="{{ route('products.index') }}" class="px-8 py-4 bg-white/20 border border-black/10 text-black rounded-lg font-bold text-lg hover:bg-white/30 transition-all backdrop-blur-md">
                    {{ __('Voir le Catalogue') }}
                </a>
            </div>
        </div>
    </section>
</x-public-layout>
