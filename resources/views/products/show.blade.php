<x-public-layout>
    <div class="max-w-7xl mx-auto px-6 py-12">
        <div class="mb-8">
            <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-slate-400 hover:text-white transition-colors mb-6 group">
                <x-lucide-arrow-left class="w-4 h-4 transition-transform group-hover:-translate-x-1" />
                {{ __('Retour au Catalogue') }}
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20">
            <!-- Left Column: Image -->
            <div class="relative">
                <div class="sticky top-28 bg-[#141415] rounded-3xl border border-white/5 p-12 lg:p-20 flex items-center justify-center overflow-hidden min-h-[500px] shadow-2xl">
                     <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-white/5 via-[#141415] to-[#141415]"></div>
                     
                     <!-- Decorative elements -->
                     <div class="absolute top-8 left-8">
                        <div class="text-[0.6rem] font-bold text-slate-500 uppercase tracking-widest border border-white/10 px-3 py-1 rounded-full bg-black/20 backdrop-blur-md">
                            {{ __('Spécification Pro') }}
                        </div>
                     </div>

                    @if($product->image_url)
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="relative z-10 max-h-full max-w-full object-contain drop-shadow-2xl hover:scale-105 transition-transform duration-700">
                    @else
                        <x-lucide-package class="relative z-10 w-32 h-32 text-slate-700 stroke-1 opacity-50" />
                    @endif

                    <!-- Zoom Hint -->
                    <div class="absolute bottom-8 right-8">
                        <button class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-portal-accent hover:text-black transition-all backdrop-blur-md">
                            <x-lucide-maximize-2 class="w-5 h-5" />
                        </button>
                    </div>
                </div>
            </div>

            <!-- Right Column: Details -->
            <div class="flex flex-col">
                <div class="mb-8 border-b border-white/5 pb-8">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="inline-block bg-portal-accent/10 text-portal-accent border border-portal-accent/20 px-3 py-1 rounded-full text-[0.65rem] font-bold uppercase tracking-widest">{{ $product->category->name ?? __('Non classé') }}</span>
                        <span class="inline-block bg-white/5 text-slate-400 border border-white/10 px-3 py-1 rounded-full text-[0.65rem] font-bold uppercase tracking-widest">{{ __('Ref: ') . str_pad($product->id, 6, '0', STR_PAD_LEFT) }}</span>
                    </div>

                    <h1 class="font-display font-black text-4xl lg:text-5xl text-white mb-6 leading-[1.1]">{{ $product->name }}</h1>
                    
                    <div class="flex items-end gap-2">
                        @auth
                            <div class="font-display font-bold text-4xl text-white tracking-tight">
                                {{ number_format($product->price, 2) }} <span class="text-lg text-slate-500 font-sans font-normal">DA</span>
                            </div>
                            <div class="mb-1.5 text-xs font-bold text-slate-500 uppercase tracking-wider">{{ __('HT / Unité') }}</div>
                        @else
                            <div class="text-xl font-medium text-slate-500 italic">{{ __('Accès Client Requis pour Tarification') }}</div>
                        @endauth
                    </div>
                </div>

                <div class="space-y-8 mb-12">
                    <div>
                        <h3 class="text-sm font-bold text-white mb-3 flex items-center gap-2">
                            <x-lucide-align-left class="w-4 h-4 text-portal-accent" /> {{ __('Description du Produit') }}
                        </h3>
                        <p class="text-slate-400 leading-relaxed text-sm lg:text-base">
                            {{ $product->description_fr ?? $product->description_en ?? __('Aucune description disponible pour ce produit.') }}
                        </p>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="p-5 rounded-2xl bg-[#141415] border border-white/5">
                            <div class="text-[0.6rem] font-bold text-slate-500 uppercase tracking-wider mb-2">{{ __('Poids Unitaire') }}</div>
                            <div class="font-bold text-white flex items-center gap-2 text-lg">
                                <x-lucide-weight class="w-5 h-5 text-portal-accent" />
                                <span>{{ $product->weight_kg ? number_format($product->weight_kg, 2) . ' kg' : 'N/A' }}</span>
                            </div>
                        </div>
                        <div class="p-5 rounded-2xl bg-[#141415] border border-white/5">
                            <div class="text-[0.6rem] font-bold text-slate-500 uppercase tracking-wider mb-2">{{ __('Logistique / Colisage') }}</div>
                            <div class="font-bold text-white flex items-center gap-2 text-lg">
                                <x-lucide-layers class="w-5 h-5 text-portal-accent" />
                                <span>{{ $product->pieces_per_bundle ? $product->pieces_per_bundle . ' pcs/lot' : 'N/A' }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                @auth
                <div class="mt-auto bg-[#141415] border border-white/5 rounded-2xl p-6 lg:p-8" 
                    x-data="{ 
                        quantity: 1,
                        piecesPerBundle: {{ $product->pieces_per_bundle ?? 1 }},
                        get isMultiple() { return this.piecesPerBundle > 1 && this.quantity % this.piecesPerBundle === 0; },
                        get needsSuggestion() { return this.piecesPerBundle > 1 && this.quantity % this.piecesPerBundle !== 0; },
                        get suggestedQuantity() {
                            return Math.ceil(this.quantity / this.piecesPerBundle) * this.piecesPerBundle;
                        }
                    }">
                    <h3 class="text-sm font-bold text-white mb-6 uppercase tracking-widest">{{ __('Ma Commande') }}</h3>
                    
                    <div class="flex flex-col gap-6">
                        <div class="flex flex-col md:flex-row gap-4">
                            <div class="flex items-center bg-black border border-white/10 rounded-xl h-14 w-full md:w-40 relative">
                                <button @click="if(quantity > 1) quantity--" class="w-12 h-full flex items-center justify-center text-slate-400 hover:text-white hover:bg-white/5 rounded-l-xl transition-colors">
                                    <x-lucide-minus class="w-5 h-5" />
                                </button>
                                <input type="number" x-model.number="quantity" class="w-full bg-transparent border-none text-center text-white font-bold text-xl focus:ring-0 p-0 h-full appearance-none">
                                <button @click="quantity++" class="w-12 h-full flex items-center justify-center text-slate-400 hover:text-white hover:bg-white/5 rounded-r-xl transition-colors">
                                    <x-lucide-plus class="w-5 h-5" />
                                </button>
                            </div>
                            
                            <button 
                                @click="$dispatch('add-to-requisition', { productId: {{ $product->id }}, quantity: quantity })"
                                class="flex-1 bg-portal-accent text-black font-bold text-sm uppercase tracking-wider rounded-xl hover:bg-white transition-all h-14 flex items-center justify-center gap-2 shadow-[0_10px_20px_rgba(var(--portal-accent-rgb),0.3)] group"
                            >
                                <x-lucide-shopping-cart class="w-5 h-5 group-hover:scale-110 transition-transform" />
                                {{ __('Ajouter à ma Liste') }}
                            </button>
                        </div>

                        <!-- Smart Suggestion Alert -->
                        <div x-show="needsSuggestion" x-transition class="bg-blue-500/10 border border-blue-500/20 rounded-2xl p-4 flex gap-4 items-center">
                            <div class="p-2 rounded-lg bg-blue-500/20 text-blue-400 flex-shrink-0">
                                <x-lucide-lightbulb class="w-5 h-5" />
                            </div>
                            <div class="flex-1">
                                <div class="text-sm font-bold text-blue-400 mb-1">{{ __('Optimisation Logistique') }}</div>
                                <p class="text-xs text-blue-300 leading-relaxed mb-3">
                                    {{ __('Ce produit est conditionné en paquets de') }} <span class="font-bold text-white">{{ $product->pieces_per_bundle }}</span>. 
                                    {{ __('Commandez-en') }} <span class="font-bold text-white" x-text="suggestedQuantity"></span> {{ __('pour un transport optimal.') }}
                                </p>
                                <button type="button" @click="quantity = suggestedQuantity" class="text-xs font-black uppercase tracking-tighter text-white bg-blue-500 px-3 py-1.5 rounded-lg hover:bg-blue-400 transition-colors">
                                    {{ __('Ajuster à') }} <span x-text="suggestedQuantity"></span>
                                </button>
                            </div>
                        </div>

                        <div x-show="isMultiple" x-transition class="bg-green-500/10 border border-green-500/20 rounded-2xl p-4 flex gap-4 items-center">
                            <div class="p-2 rounded-lg bg-green-500/20 text-green-400 flex-shrink-0">
                                <x-lucide-check-circle class="w-5 h-5" />
                            </div>
                            <p class="text-xs text-green-300 font-bold">
                                {{ __('Votre commande correspond parfaitement au conditionnement standard.') }}
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Helper script for requisition dispatch -->
                <script>
                    document.addEventListener('alpine:init', () => {
                        window.addEventListener('add-to-requisition', async (e) => {
                            const { productId, quantity } = e.detail;
                            try {
                                const response = await fetch(`/requisition/add/${productId}`, {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').getAttribute('content'),
                                        'Content-Type': 'application/json',
                                        'Accept': 'application/json'
                                    },
                                    body: JSON.stringify({ quantity })
                                });
                                const data = await response.json();
                                if (data.success) {
                                    window.showToast(data.message, 'success');
                                    window.dispatchEvent(new CustomEvent('requisition-updated', { detail: { count: data.requisition_count } }));
                                } else {
                                    window.showToast(data.message, 'error');
                                }
                            } catch (error) {
                                console.error('Error adding to requisition:', error);
                                window.showToast('Erreur lors de l\'ajout à votre liste', 'error');
                            }
                        });
                    });
                </script>
                @else
                <div class="mt-auto p-6 rounded-2xl bg-white/5 border border-white/5 text-center">
                    <x-lucide-lock class="w-8 h-8 text-slate-500 mx-auto mb-3" />
                    <p class="text-slate-400 mb-4 font-medium">{{ __('Veuillez vous connecter pour commander.') }}</p>
                    <a href="{{ route('login') }}" class="portal-btn portal-btn-primary inline-flex">
                        {{ __('Se connecter') }}
                    </a>
                </div>
                @endauth

                <div class="mt-8 flex gap-4">
                     <a href="{{ route('products.technical_sheet', $product->id) }}" target="_blank" class="flex-1 p-4 rounded-xl border border-white/10 hover:bg-white/5 transition-colors flex items-center justify-center gap-2 text-slate-400 hover:text-white group">
                        <x-lucide-file-text class="w-5 h-5 text-portal-accent group-hover:text-white transition-colors" />
                        <span class="text-sm font-bold">{{ __('Fiche Technique PDF') }}</span>
                    </a>
                    @if(auth()->check() && auth()->user()->role === 'admin')
                        <a href="{{ route('products.edit', $product->id) }}" class="flex-1 p-4 rounded-xl border border-white/10 hover:bg-white/5 transition-colors flex items-center justify-center gap-2 text-slate-400 hover:text-white group">
                            <x-lucide-edit-2 class="w-5 h-5 text-blue-400" />
                            <span class="text-sm font-bold">{{ __('Modifier') }}</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
