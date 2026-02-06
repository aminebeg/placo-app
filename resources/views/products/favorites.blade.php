<x-app-layout>
    <x-slot name="header">
        <span class="inline-block bg-red-500/20 text-red-500 px-3 py-1 rounded-full text-[0.7rem] font-bold uppercase tracking-wider mb-2 border border-red-500/20">
            <x-lucide-heart class="w-3 h-3 inline-block mr-1 fill-current" /> {{ __('Ma Sélection') }}
        </span>
        <h1 class="text-4xl font-extrabold tracking-tight mb-2 italic">{{ __('Mes Favoris') }}</h1>
        <p class="text-slate-400 text-lg">{{ __('Retrouvez ici les produits que vous avez mis de côté.') }}</p>
    </x-slot>

    <div x-data="{
        products: {{ Js::from($products) }},
        isAuthenticated: {{ auth()->check() ? 'true' : 'false' }},
        
        async toggleFavorite(product) {
            try {
                const response = await fetch(`/favorites/toggle/${product.id}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').getAttribute('content'),
                        'X-Requested-With': 'XMLHttpRequest',
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    }
                });
                const data = await response.json();
                
                if (data.success) {
                    // Remove from list if un-favorited
                    if (!data.is_favorite) {
                        this.products = this.products.filter(p => p.id !== product.id);
                    }
                    window.showToast(data.message, 'success');
                }
            } catch (error) {
                console.error('Failed to toggle favorite:', error);
            }
        }
    }">
        @if($products->isEmpty())
            <div class="flex flex-col items-center justify-center py-20 bg-white/2 border border-white/5 rounded-[2.5rem]">
                <div class="w-24 h-24 rounded-full bg-white/5 flex items-center justify-center mb-6">
                    <x-lucide-heart class="w-10 h-10 text-slate-700 opacity-50" />
                </div>
                <h3 class="text-2xl font-display font-bold text-white mb-2">{{ __('Votre liste est vide') }}</h3>
                <p class="text-slate-500 mb-8 max-w-sm text-center">{{ __('Parcourez notre catalogue et cliquez sur le cœur pour ajouter des produits à vos favoris.') }}</p>
                <a href="{{ route('products.index') }}" class="bg-portal-accent text-black px-8 py-4 rounded-xl font-bold hover:bg-white transition-all shadow-xl flex items-center gap-2">
                    {{ __('Explorer le Catalogue') }} <x-lucide-arrow-right class="w-4 h-4" />
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                <template x-for="product in products" :key="product.id">
                    <div class="group bg-[#141415] rounded-[2.5rem] border border-white/5 overflow-hidden flex flex-col hover:border-red-500/30 transition-all duration-500 hover:shadow-[0_20px_50px_rgba(0,0,0,0.5)]">
                        <!-- Image Area -->
                        <div class="relative h-64 bg-gradient-to-br from-white via-slate-50 to-slate-100 flex items-center justify-center overflow-hidden border-b border-white/5">
                             <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(circle, #000 1px, transparent 1px); background-size: 20px 20px;"></div>
                            
                             <!-- Heart Action Button -->
                             <button 
                                @click.stop="toggleFavorite(product)"
                                class="absolute top-6 right-6 z-20 w-12 h-12 rounded-full flex items-center justify-center bg-red-500 text-white shadow-xl hover:scale-110 transition-all duration-300"
                             >
                                <x-lucide-heart class="w-6 h-6 fill-current" />
                             </button>

                             <a :href="'/products/' + product.id" class="relative z-10 w-full h-full p-8 flex items-center justify-center">
                                <img :src="product.image_url" :alt="product.name" class="max-w-full max-h-full w-auto h-auto object-contain group-hover:scale-110 transition-all duration-700 drop-shadow-2xl">
                             </a>
                        </div>

                        <!-- Content -->
                        <div class="p-8">
                            <div class="flex items-center gap-2 mb-3">
                                <span class="text-[0.6rem] font-black text-portal-accent uppercase tracking-[0.2em] bg-portal-accent/10 px-2 py-0.5 rounded shadow-sm" x-text="product.category?.name"></span>
                            </div>
                            <h3 class="font-display font-bold text-2xl text-white mb-4 group-hover:text-portal-accent transition-colors truncate" x-text="product.name"></h3>
                            
                            <div class="flex items-center justify-between mt-auto">
                                <div class="flex flex-col">
                                    <span class="text-[0.6rem] font-bold text-slate-500 uppercase tracking-widest">{{ __('Prix Promo B2B') }}</span>
                                    <div class="text-2xl font-mono font-black text-white" x-text="Number(product.price).toFixed(2) + ' DA'"></div>
                                </div>
                                <a :href="'/products/' + product.id" class="w-12 h-12 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center text-slate-400 hover:bg-portal-accent hover:text-black hover:border-portal-accent transition-all group/btn">
                                    <x-lucide-arrow-right class="w-6 h-6 group-hover/btn:translate-x-1 transition-transform" />
                                </a>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        @endif
    </div>
</x-app-layout>
