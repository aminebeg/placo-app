<x-public-layout>
    @section('title', 'Contact - MyFix')

    <div class="relative min-h-screen py-24 flex flex-col justify-center">
        <!-- Background -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-1/4 left-1/4 w-[800px] h-[800px] bg-portal-accent/5 rounded-full blur-[120px]"></div>
            <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20 brightness-100"></div>
        </div>

        <div class="max-w-7xl mx-auto px-6 relative z-10 w-full">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 md:gap-24">
                
                <!-- Info Side -->
                <div>
                     <span class="text-portal-accent font-bold uppercase tracking-widest text-xs mb-4 block">{{ __('Parlons de vos projets') }}</span>
                    <h1 class="text-5xl font-display font-black text-white mb-8">{{ __('Contactez-Nous') }}</h1>
                    <p class="text-slate-400 text-xl leading-relaxed mb-12">
                        {{ __('Une question technique ? Une demande de devis ? Notre équipe est à votre écoute.') }}
                    </p>

                    <div class="space-y-10">
                        <div class="flex items-start gap-6">
                            <div class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center shrink-0">
                                <x-lucide-map-pin class="w-6 h-6 text-portal-accent" />
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white mb-2">{{ __('Siège & Dépôt') }}</h3>
                                <p class="text-slate-400 leading-relaxed">
                                    Zone Industrielle Oued Smar<br>
                                    Alger, Algérie
                                </p>
                                <a href="https://maps.google.com" target="_blank" class="inline-flex items-center gap-2 text-sm font-bold text-portal-accent mt-2 hover:underline">
                                    {{ __('Voir sur la carte') }} <x-lucide-arrow-right class="w-3 h-3" />
                                </a>
                            </div>
                        </div>

                        <div class="flex items-start gap-6">
                            <div class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center shrink-0">
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

                        <div class="flex items-start gap-6">
                            <div class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center shrink-0">
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
                <div class="bg-[#141415] border border-white/10 rounded-3xl p-8 md:p-12 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-full h-2 bg-gradient-to-r from-portal-accent to-transparent"></div>
                    
                    <h2 class="text-2xl font-bold text-white mb-8">{{ __('Envoyer un Message') }}</h2>
                    
                    <form class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">{{ __('Votre Nom') }}</label>
                                <input type="text" class="w-full bg-black/50 border border-white/10 rounded-lg px-4 py-3 text-white focus:border-portal-accent focus:ring-0 transition-colors" placeholder="Nom complet">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">{{ __('Téléphone') }}</label>
                                <input type="tel" class="w-full bg-black/50 border border-white/10 rounded-lg px-4 py-3 text-white focus:border-portal-accent focus:ring-0 transition-colors" placeholder="05 XX XX XX XX">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">{{ __('Email Professionnel') }}</label>
                            <input type="email" class="w-full bg-black/50 border border-white/10 rounded-lg px-4 py-3 text-white focus:border-portal-accent focus:ring-0 transition-colors" placeholder="nom@entreprise.com">
                        </div>

                        <div>
                             <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">{{ __('Sujet') }}</label>
                            <select class="w-full bg-black/50 border border-white/10 rounded-lg px-4 py-3 text-white focus:border-portal-accent focus:ring-0 transition-colors">
                                <option class="bg-[#141415]">{{ __('Demande de Devis') }}</option>
                                <option class="bg-[#141415]">{{ __('Renseignement Technique') }}</option>
                                <option class="bg-[#141415]">{{ __('Partenariat') }}</option>
                                <option class="bg-[#141415]">{{ __('Autre') }}</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">{{ __('Message') }}</label>
                            <textarea rows="4" class="w-full bg-black/50 border border-white/10 rounded-lg px-4 py-3 text-white focus:border-portal-accent focus:ring-0 transition-colors" placeholder="Comment pouvons-nous vous aider ?"></textarea>
                        </div>

                        <button type="button" class="w-full bg-portal-accent text-black font-bold py-4 rounded-lg hover:bg-white transition-colors flex items-center justify-center gap-2">
                             {{ __('Envoyer la demande') }} <x-lucide-send class="w-4 h-4 rtl:rotate-180" />
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
