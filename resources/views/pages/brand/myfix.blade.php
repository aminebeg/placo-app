<x-public-layout>
    @section('title', 'MYFIX - La Marque de Référence par Global Accessoires')

    <!-- Subheader (Brand Bar) -->
    <div class="fixed top-20 w-full z-40 border-b border-white/5 bg-[#0a0a0b]/60 backdrop-blur-xl transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 h-12 flex items-center justify-between">
            <div class="flex items-center gap-6">
                <span class="text-[0.6rem] font-black text-portal-accent uppercase tracking-[0.3em] border-r border-white/10 pr-6">{{ __('Brand Space') }}</span>
                <nav class="flex gap-6">
                    <a href="#vision" class="text-[0.6rem] font-bold text-slate-400 hover:text-white uppercase tracking-widest transition-colors">{{ __('Vision') }}</a>
                    <a href="#products" class="text-[0.6rem] font-bold text-slate-400 hover:text-white uppercase tracking-widest transition-colors">{{ __('Produits') }}</a>
                    <a href="#quality" class="text-[0.6rem] font-bold text-slate-400 hover:text-white uppercase tracking-widest transition-colors">{{ __('Qualité') }}</a>
                </nav>
            </div>
            <a href="{{ route('products.index') }}?brand=MYFIX" class="text-[0.6rem] font-black text-black bg-portal-accent px-3 py-1 rounded-sm uppercase tracking-widest hover:bg-white transition-all">
                {{ __('Catalogue MYFIX') }}
            </a>
        </div>
    </div>

    <!-- Hero Section -->
    <header class="relative min-h-[80vh] flex items-center pt-24 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="/images/plaque de platre.png" alt="MyFix Premium" class="absolute inset-0 w-full h-full object-cover opacity-20 scale-110">
            <div class="absolute inset-0 bg-gradient-to-r from-[#0a0a0b] via-[#0a0a0b]/80 to-transparent"></div>
            <div class="absolute bottom-0 left-0 w-full h-1/2 bg-gradient-to-t from-[#0a0a0b] to-transparent"></div>
        </div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="flex flex-col items-start">
                <div class="flex items-center gap-6 mb-12">
                    <img src="/images/logo-myfix.png" alt="MYFIX" class="h-24 w-auto shadow-2xl">
                    <div class="w-1 h-20 bg-portal-accent/30 rounded-full"></div>
                    <h1 class="text-7xl md:text-9xl font-display font-black tracking-tighter leading-none">
                        MYFIX
                    </h1>
                </div>
                
                <p class="text-xl md:text-2xl text-slate-300 max-w-2xl leading-relaxed mb-10 font-light">
                    {{ __('L\'excellence industrielle au service de la construction sèche. Conçu, testé et produit en Algérie par SARL Global Accessoires.') }}
                </p>

                <div class="flex items-center gap-6">
                    <div class="flex flex-col">
                        <span class="text-4xl font-black text-white">100%</span>
                        <span class="text-[0.6rem] font-bold text-slate-500 uppercase tracking-widest">{{ __('Algérien') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Content Sections -->
    <section id="vision" class="py-32 relative">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                <div class="space-y-8">
                    <h2 class="text-4xl md:text-5xl font-display font-black text-white leading-tight">
                        {{ __('L\'Innovation') }} <br>
                        <span class="text-portal-accent">{{ __('au Coeur de la Matière') }}</span>
                    </h2>
                    <p class="text-lg text-slate-400 leading-relaxed">
                        {{ __('Née de la volonté de SARL Global Accessoires de proposer une alternative locale de haute qualité, MYFIX est devenue en quelques années la référence pour les professionnels du plâtre et de l\'isolation en Algérie.') }}
                    </p>
                    <div class="grid grid-cols-2 gap-8">
                        <div class="space-y-2">
                            <h4 class="text-white font-bold">{{ __('R&D Interne') }}</h4>
                            <p class="text-sm text-slate-500">{{ __('Chaque produit est optimisé pour les conditions climatiques locales.') }}</p>
                        </div>
                        <div class="space-y-2">
                            <h4 class="text-white font-bold">{{ __('Contrôle Qualité') }}</h4>
                            <p class="text-sm text-slate-500">{{ __('Des tests de résistance rigoureux avant chaque mise sur le marché.') }}</p>
                        </div>
                    </div>
                </div>
                <div class="relative rounded-[2.5rem] overflow-hidden aspect-video border border-white/10 shadow-2xl skew-y-3">
                    <img src="/images/ossature metalique.png" alt="Vision" class="absolute inset-0 w-full h-full object-cover">
                    <div class="absolute inset-0 bg-portal-accent/20 mix-blend-overlay"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Highlight Grid -->
    <section id="products" class="py-32 bg-white/2">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-20">
                <h2 class="text-4xl md:text-6xl font-display font-black text-white mb-6 uppercase tracking-tight">{{ __('Les Essentiels') }}</h2>
                <p class="text-slate-400 max-w-xl mx-auto">{{ __('Une gamme conçue pour la rapidité de pose et la durabilité des ouvrages.') }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @php
                    $features = [
                        ['title' => 'Accessoires de Fixation', 'desc' => 'Suspentes, Cavaliers, et Attaches conçus pour une rigidité maximale.', 'img' => '/images/accessoires.png'],
                        ['title' => 'Ossatures Optimisées', 'desc' => 'Profilés en acier galvanisé de haute précision pour une planéité parfaite.', 'img' => '/images/ossature metalique.png'],
                        ['title' => 'Solutions d\'Isolation', 'desc' => 'Compléments techniques pour une performance thermique et acoustique accrue.', 'img' => '/images/plaque de platre.png'],
                    ];
                @endphp

                @foreach($features as $f)
                <div class="group relative bg-[#141415] rounded-3xl overflow-hidden border border-white/5 hover:border-portal-accent/30 transition-all duration-500">
                    <div class="aspect-[4/5] relative">
                        <img src="{{ $f['img'] }}" alt="{{ $f['title'] }}" class="absolute inset-0 w-full h-full object-cover opacity-40 group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#141415] via-transparent to-transparent"></div>
                    </div>
                    <div class="p-8 relative -mt-20">
                        <h3 class="text-2xl font-bold text-white mb-3">{{ $f['title'] }}</h3>
                        <p class="text-slate-400 text-sm leading-relaxed mb-6">{{ $f['desc'] }}</p>
                        <a href="{{ route('products.index') }}?brand=MYFIX" class="inline-flex items-center gap-2 text-xs font-bold text-portal-accent uppercase tracking-widest group-hover:gap-4 transition-all">
                            {{ __('Voir la gamme') }} <x-lucide-arrow-right class="w-4 h-4" />
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Quality Section -->
    <section id="quality" class="py-32 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            <div class="bg-portal-accent rounded-[3rem] p-12 md:p-24 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-white/10 rounded-full blur-[120px] -translate-y-1/2 translate-x-1/2"></div>
                
                <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <div>
                        <h2 class="text-4xl md:text-6xl font-display font-black text-black leading-none mb-8">
                            {{ __('La Qualité') }} <br>
                            <span class="text-white">{{ __('Sans Compromis') }}</span>
                        </h2>
                        <ul class="space-y-6">
                            <li class="flex items-start gap-4">
                                <div class="w-10 h-10 bg-black rounded-lg flex items-center justify-center shrink-0">
                                    <x-lucide-shield-check class="w-6 h-6 text-portal-accent" />
                                </div>
                                <div>
                                    <h4 class="text-black font-bold">{{ __('Certifié CE & IANOR') }}</h4>
                                    <p class="text-black/60 text-sm">{{ __('Tous nos produits répondent aux normes de sécurité et de performance en vigueur.') }}</p>
                                </div>
                            </li>
                            <li class="flex items-start gap-4">
                                <div class="w-10 h-10 bg-black rounded-lg flex items-center justify-center shrink-0">
                                    <x-lucide-award class="w-6 h-6 text-portal-accent" />
                                </div>
                                <div>
                                    <h4 class="text-black font-bold">{{ __('Acier Premier Choix') }}</h4>
                                    <p class="text-black/60 text-sm">{{ __('Utilisation exclusive de matières premières certifiées pour une longévité garantie.') }}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="relative">
                        <img src="/images/headquarters.png" alt="Manufacturing" class="rounded-3xl shadow-2xl rotate-2 hover:rotate-0 transition-transform duration-500">
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-public-layout>
