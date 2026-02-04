<x-public-layout>
    <div class="max-w-7xl mx-auto px-6 py-12">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6 border-b border-white/5 pb-12">
            <div>
                <span class="inline-block bg-portal-accent/10 text-portal-accent border border-portal-accent/20 px-3 py-1 rounded-full text-[0.65rem] font-bold uppercase tracking-widest mb-4">{{ __('Catalogue Officiel') }}</span>
                <h1 class="text-4xl md:text-5xl font-display font-black tracking-tighter mb-4">{{ __('Matériaux de Construction') }}</h1>
                <p class="text-slate-400 text-lg max-w-2xl">{{ __('Explorez notre inventaire complet de produits certifiés pour vos projets.') }}</p>
            </div>
            
            <div class="flex items-center gap-4">
                 <div class="text-right hidden md:block">
                    <div class="text-xs font-bold text-slate-500 uppercase tracking-widest">{{ __('Mise à jour') }}</div>
                    <div class="text-white font-mono text-sm">{{ date('d M Y') }}</div>
                 </div>
            </div>
        </div>

    <div 
        class="flex flex-col lg:grid lg:grid-cols-[260px_1fr] gap-12" 
        x-data="{ 
            products: [],
            page: 1,
            loading: false,
            hasMore: true,
            searchQuery: '',
            selectedCategory: 'all',
            showQuickView: false,
            selectedProduct: null,
            showSuggestions: false,
            isAuthenticated: {{ auth()->check() ? 'true' : 'false' }},
            
            async loadProducts(reset = false) {
                if (this.loading) return;
                if (reset) {
                    this.page = 1;
                    this.products = [];
                    this.hasMore = true;
                }
                if (!this.hasMore) return;
                
                this.loading = true;
                try {
                    const params = new URLSearchParams({
                        page: this.page,
                        search: this.searchQuery,
                        category: this.selectedCategory
                    });
                    
                    const response = await fetch(`${window.location.pathname}?${params.toString()}`, {
                        headers: { 'X-Requested-With': 'XMLHttpRequest' }
                    });
                    const data = await response.json();
                    
                    this.products = [...this.products, ...data.data];
                    this.hasMore = data.next_page_url !== null;
                    this.page++;
                } catch (error) {
                    console.error('Failed to load products:', error);
                } finally {
                    this.loading = false;
                }
            },
            
            init() {
                this.loadProducts();
                
                // Intersection Observer for Infinite Scroll
                const observer = new IntersectionObserver((entries) => {
                    if (entries[0].isIntersecting && !this.loading && this.hasMore) {
                        this.loadProducts();
                    }
                }, { threshold: 0.1 });
                
                this.$nextTick(() => {
                    observer.observe(this.$refs.loadMoreTrigger);
                });
            },
            
            watchSearch() {
                this.loadProducts(true);
                this.showSuggestions = this.searchQuery.length > 2;
            },
            
            watchCategory(cat) {
                this.selectedCategory = cat;
                this.loadProducts(true);
            },

            openQuickView(product) {
                this.selectedProduct = product;
                this.showQuickView = true;
                document.body.classList.add('overflow-hidden');
            },

            closeQuickView() {
                this.showQuickView = false;
                document.body.classList.remove('overflow-hidden');
            },

            async addToCart(productId, quantity = 1) {
                try {
                    const response = await fetch(`/cart/add/${productId}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').getAttribute('content'),
                            'X-Requested-With': 'XMLHttpRequest',
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({ quantity: quantity })
                    });
                    const data = await response.json();
                    
                    if (data.success) {
                        this.$dispatch('cart-updated', { 
                            count: data.cart_count,
                            message: data.message
                        });
                        window.showToast(data.message || @js(__("Item added to cart successfully!")), 'success');
                    } else {
                        window.showToast(data.message || @js(__("Failed to add item to cart")), 'error');
                    }
                } catch (error) {
                    console.error('Failed to add to cart:', error);
                    window.showToast(@js(__("An error occurred. Please try again.")), 'error');
                }
            }
        }"
    >
        <!-- Mobile Search & Filter Actions (visible only on mobile) -->
        <div class="lg:hidden flex flex-col gap-4 sticky top-20 z-30 bg-[#0a0a0b]/95 backdrop-blur-md -mx-6 px-6 py-4 border-b border-white/10">
             <div class="bg-white/5 border border-white/10 rounded-xl p-3 flex items-center gap-3">
                <x-lucide-search class="w-4 h-4 text-slate-400" />
                <input 
                    type="text" 
                    x-model.debounce.500ms="searchQuery"
                    @input="watchSearch()"
                    placeholder="{{ __('Rechercher...') }}" 
                    class="bg-transparent border-none text-white placeholder-slate-500 w-full focus:ring-0 text-sm p-0"
                >
            </div>
            
            <div class="flex gap-2 overflow-x-auto pb-1 no-scrollbar">
                <button 
                    @click="watchCategory('all')"
                    :class="selectedCategory === 'all' ? 'bg-portal-accent text-black font-bold' : 'bg-white/5 border border-white/10 text-slate-400'"
                    class="whitespace-nowrap px-4 py-2 rounded-full text-xs font-semibold transition-all"
                >
                    {{ __('Tout') }}
                </button>
                @foreach($categories as $category)
                    <button 
                        @click="watchCategory('{{ $category->slug }}')"
                        :class="selectedCategory === '{{ $category->slug }}' ? 'bg-portal-accent text-black font-bold' : 'bg-white/5 border border-white/10 text-slate-400'"
                        class="whitespace-nowrap px-4 py-2 rounded-full text-xs font-semibold transition-all"
                    >
                        {{ $category->name }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Sidebar Filters (Desktop) -->
        <div class="hidden lg:block space-y-8 sticky top-28 self-start">
            <div class="p-6 bg-[#141415] border border-white/5 rounded-2xl">
                <h3 class="font-bold text-white text-sm uppercase tracking-wider mb-6 pb-4 border-b border-white/5">{{ __('Catégories') }}</h3>
                <div class="space-y-1">
                    <button 
                        @click="watchCategory('all')"
                        :class="selectedCategory === 'all' ? 'bg-portal-accent text-black shadow-[0_0_20px_rgba(250,204,21,0.2)]' : 'text-slate-400 hover:bg-white/5 hover:text-white'"
                        class="w-full text-start px-4 py-3 rounded-xl text-sm font-bold transition-all flex items-center justify-between group"
                    >
                        {{ __('Tout le catalogue') }}
                        <x-lucide-chevron-right class="w-4 h-4 rtl:rotate-180 transition-transform group-hover:translate-x-1" x-bind:class="selectedCategory === 'all' ? 'opacity-100' : 'opacity-0'" />
                    </button>
                    @foreach($categories as $category)
                        <button 
                            @click="watchCategory('{{ $category->slug }}')"
                            :class="selectedCategory === '{{ $category->slug }}' ? 'bg-portal-accent text-black shadow-[0_0_20px_rgba(250,204,21,0.2)]' : 'text-slate-400 hover:bg-white/5 hover:text-white'"
                            class="w-full text-start px-4 py-3 rounded-xl text-sm font-bold transition-all flex items-center justify-between group"
                        >
                            {{ $category->name }}
                            <x-lucide-chevron-right class="w-4 h-4 rtl:rotate-180 transition-transform group-hover:translate-x-1" x-bind:class="selectedCategory === '{{ $category->slug }}' ? 'opacity-100' : 'opacity-0'" />
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Promo Box -->
            <div class="p-6 bg-gradient-to-br from-portal-accent/20 to-transparent border border-portal-accent/10 rounded-2xl text-center">
                <div class="w-12 h-12 bg-portal-accent rounded-xl flex items-center justify-center mx-auto mb-4 text-black">
                    <x-lucide-phone class="w-6 h-6" />
                </div>
                <h4 class="font-bold text-white mb-2">{{ __('Besoin d\'aide ?') }}</h4>
                <p class="text-xs text-slate-400 mb-4">{{ __('Nos experts sont disponibles pour vous conseiller.') }}</p>
                <div class="font-mono text-portal-accent font-bold text-lg">+213 550 00 00 00</div>
            </div>
        </div>

        <!-- Product Grid -->
        <div class="space-y-8">
            <!-- Search Bar (Desktop) -->
            <div class="hidden lg:block sticky top-24 z-30 group">
                <div class="bg-[#141415]/80 backdrop-blur-xl border border-white/10 rounded-2xl p-2 pl-6 flex items-center gap-4 shadow-2xl transition-all focus-within:border-portal-accent/50 focus-within:ring-1 focus-within:ring-portal-accent/50">
                    <x-lucide-search class="w-5 h-5 text-slate-400 group-focus-within:text-portal-accent transition-colors" />
                    <input 
                        type="text" 
                        x-model.debounce.300ms="searchQuery"
                        @input="watchSearch()"
                        @focus="if(searchQuery.length > 2) showSuggestions = true"
                        @click.away="showSuggestions = false"
                        @keydown.escape="showSuggestions = false"
                        placeholder="{{ __('Rechercher par référence, nom ou spécification...') }}" 
                        class="bg-transparent border-none text-white placeholder-slate-500 w-full focus:ring-0 text-sm h-12"
                    >
                    <div x-show="loading" class="animate-spin text-portal-accent px-4">
                        <x-lucide-loader-2 class="w-5 h-5" />
                    </div>
                </div>

                <!-- Search Suggestions Dropdown -->
                <div x-show="showSuggestions && products.length > 0 && searchQuery.length > 2" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="absolute top-full left-0 right-0 mt-2 bg-[#141415] border border-white/10 rounded-2xl shadow-2xl overflow-hidden z-40"
                     x-cloak
                >
                    <div class="p-2 max-h-[400px] overflow-y-auto">
                        <template x-for="product in products.slice(0, 5)" :key="'suggest-'+product.id">
                            <div @click="openQuickView(product); showSuggestions = false" class="flex items-center gap-4 p-4 hover:bg-white/5 rounded-xl cursor-pointer transition-colors border border-transparent hover:border-white/5">
                                <div class="w-12 h-12 rounded-lg bg-white/5 flex items-center justify-center p-2 flex-shrink-0">
                                    <template x-if="product.image_url">
                                        <img :src="product.image_url" class="max-h-full max-w-full object-contain">
                                    </template>
                                    <template x-if="!product.image_url">
                                        <x-lucide-package class="w-6 h-6 text-slate-500 opacity-50" />
                                    </template>
                                </div>
                                <div class="flex-1">
                                    <div class="text-sm font-bold text-white mb-0.5" x-text="product.name"></div>
                                    <div class="text-[0.6rem] font-bold text-portal-accent uppercase tracking-wider bg-portal-accent/5 inline-block px-1.5 py-0.5 rounded" x-text="'Ref: ' + String(product.id).padStart(6, '0')"></div>
                                </div>
                                <template x-if="isAuthenticated">
                                    <div class="text-sm font-mono font-bold text-slate-300" x-text="Number(product.price).toFixed(2) + ' {{ __('DA') }}'"></div>
                                </template>
                            </div>
                        </template>
                    </div>
                </div>
            </div>

            <!-- Grid Items -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                <template x-for="product in products" :key="product.id">
                    <div 
                        class="group bg-[#141415] rounded-3xl border border-white/5 overflow-hidden flex flex-col hover:border-portal-accent/30 transition-all duration-300 hover:shadow-[0_0_30px_-10px_rgba(0,0,0,0.5)]"
                        @click="openQuickView(product)"
                    >
                        <!-- Image Area -->
                        <div class="relative h-56 bg-[#0a0a0b] p-8 flex items-center justify-center overflow-hidden border-b border-white/5">
                             <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-white/5 via-[#0a0a0b] to-[#0a0a0b]"></div>
                            
                            <template x-if="product.image_url">
                                <img :src="product.image_url" :alt="product.name" class="relative z-10 max-h-full max-w-full object-contain mix-blend-normal hover:scale-110 transition-transform duration-500 drop-shadow-2xl">
                            </template>
                            <template x-if="!product.image_url">
                                <div class="relative z-10">
                                    <x-lucide-package class="w-16 h-16 text-slate-700 stroke-1" />
                                </div>
                            </template>

                            <div class="absolute top-4 right-4 z-20 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button class="w-8 h-8 rounded-full bg-white/10 backdrop-blur-md flex items-center justify-center text-white hover:bg-portal-accent hover:text-black transition-colors">
                                    <x-lucide-maximize-2 class="w-4 h-4" />
                                </button>
                            </div>
                        </div>

                        <!-- Content Area -->
                        <div class="p-6 flex-1 flex flex-col">
                            <div class="flex items-start justify-between mb-2">
                                <div class="text-[0.6rem] font-bold text-slate-500 uppercase tracking-widest" x-text="'REF: ' + String(product.id).padStart(6, '0')"></div>
                                <div x-show="product.pieces_per_bundle" class="text-[0.6rem] font-bold text-slate-500 bg-white/5 px-2 py-0.5 rounded" x-text="product.pieces_per_bundle + ' pcs/lot'"></div>
                            </div>
                            
                            <h3 class="font-bold text-white text-lg leading-tight mb-4 line-clamp-2 group-hover:text-portal-accent transition-colors" x-text="product.name"></h3>
                            
                            <div class="mt-auto pt-6 border-t border-white/5" x-data="{ localQty: 1 }">
                                <div class="flex flex-col gap-3">
                                    
                                    <template x-if="isAuthenticated">
                                        <div class="flex items-end justify-between mb-2">
                                            <div class="text-2xl font-display font-bold text-white tracking-tight">
                                                <span x-text="Number(product.price).toFixed(2)"></span> 
                                                <span class="text-sm text-slate-500 font-sans tracking-normal font-normal">DA</span>
                                            </div>
                                            <div class="text-xs text-slate-500 font-bold uppercase tracking-wider">{{ __('HT') }}</div>
                                        </div>
                                    </template>
                                    <template x-if="!isAuthenticated">
                                        <div class="text-sm font-medium text-slate-500 italic mb-2">{{ __('Connectez-vous pour le prix') }}</div>
                                    </template>

                                    <div class="flex items-center gap-2" @click.stop>
                                        <template x-if="isAuthenticated">
                                            <div class="flex w-full gap-2">
                                                <div class="flex items-center bg-[#0a0a0b] border border-white/10 rounded-lg h-10 w-24 relative">
                                                    <button @click="if(localQty > 1) localQty--" class="w-8 h-full flex items-center justify-center text-slate-400 hover:text-white hover:bg-white/5 rounded-l-lg transition-colors">
                                                        <x-lucide-minus class="w-3 h-3" />
                                                    </button>
                                                    <input type="number" x-model.number="localQty" class="w-full bg-transparent border-none text-center text-white font-bold text-sm focus:ring-0 p-0 h-full appearance-none">
                                                    <button @click="localQty++" class="w-8 h-full flex items-center justify-center text-slate-400 hover:text-white hover:bg-white/5 rounded-r-lg transition-colors">
                                                        <x-lucide-plus class="w-3 h-3" />
                                                    </button>
                                                </div>
                                                <button @click="addToCart(product.id, localQty)" class="flex-1 bg-portal-accent text-black font-bold text-xs uppercase tracking-wider rounded-lg hover:bg-white transition-colors flex items-center justify-center gap-2">
                                                    {{ __('Ajouter') }} <x-lucide-shopping-cart class="w-3 h-3" />
                                                </button>
                                            </div>
                                        </template>
                                        <template x-if="!isAuthenticated">
                                            <a href="{{ route('login') }}" class="w-full bg-white/5 border border-white/10 text-white text-xs font-bold uppercase tracking-wider py-3 rounded-lg text-center hover:bg-white/10 transition-colors">
                                                {{ __('Se connecter pour commander') }}
                                            </a>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Load More Trigger / Loading State -->
            <div x-ref="loadMoreTrigger" class="py-12 flex justify-center">
                <template x-if="loading">
                    <div class="flex items-center gap-3 text-slate-400 font-bold text-sm bg-white/5 px-6 py-3 rounded-full border border-white/5">
                        <x-lucide-loader-2 class="w-4 h-4 animate-spin text-portal-accent" />
                        {{ __('Chargement des produits...') }}
                    </div>
                </template>
                <template x-if="!loading && !hasMore && products.length > 0">
                    <div class="text-slate-500 font-bold text-xs uppercase tracking-widest opacity-50">
                        {{ __('Fin du catalogue') }}
                    </div>
                </template>
                <template x-if="!loading && products.length === 0">
                    <div class="text-slate-400 font-medium text-sm py-20 text-center bg-white/5 rounded-3xl border border-white/5">
                        <x-lucide-search-x class="w-12 h-12 mx-auto mb-4 text-slate-600" />
                        {{ __('Aucun produit ne correspond à votre recherche.') }}
                    </div>
                </template>
            </div>
        </div>

        <!-- Quick View Modal (Updated Design) -->
        <template x-teleport="body">
            <div x-show="showQuickView" 
                 class="fixed inset-0 z-[100] flex items-center justify-center p-4 lg:p-10"
                 x-cloak>
                <!-- Backdrop -->
                <div x-show="showQuickView" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     class="fixed inset-0 bg-black/90 backdrop-blur-xl" 
                     @click="closeQuickView()"></div>
                
                <!-- Modal Content -->
                <div x-show="showQuickView" 
                     x-transition:enter="transition ease-out duration-300 transform"
                     x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                     x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-200 transform"
                     x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                     x-transition:leave-end="opacity-0 scale-95 translate-y-4"
                     class="relative bg-[#141415] border border-white/10 w-full max-w-5xl max-h-[90vh] rounded-[2rem] overflow-hidden shadow-2xl flex flex-col lg:flex-row">
                    
                    <button @click="closeQuickView()" class="absolute top-6 right-6 z-20 p-2 rounded-full bg-black/20 text-slate-400 hover:text-white hover:bg-white/10 transition-all backdrop-blur-md">
                        <x-lucide-x class="w-6 h-6" />
                    </button>

                    <!-- Left: Image Gallery -->
                    <div class="lg:w-1/2 bg-[#0a0a0b] p-12 flex items-center justify-center relative min-h-[300px]">
                        <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-white/5 via-[#0a0a0b] to-[#0a0a0b]"></div>
                        <template x-if="selectedProduct?.image_url">
                            <img :src="selectedProduct.image_url" class="relative z-10 max-h-full max-w-full object-contain drop-shadow-2xl">
                        </template>
                        <template x-if="!selectedProduct?.image_url">
                            <x-lucide-package class="relative z-10 w-32 h-32 text-slate-700 stroke-1" />
                        </template>
                    </div>

                    <!-- Right: Details -->
                    <div class="lg:w-1/2 p-8 lg:p-12 overflow-y-auto bg-[#141415]">
                        <div class="inline-block bg-portal-accent/10 text-portal-accent border border-portal-accent/20 px-2 py-0.5 rounded text-[0.6rem] font-bold uppercase tracking-widest mb-4" x-text="selectedProduct?.category?.name"></div>
                        <h2 class="font-display font-bold text-3xl lg:text-4xl mb-6 tracking-tight text-white leading-[1.1]" x-text="selectedProduct?.name"></h2>
                        
                        <div class="flex items-center gap-6 mb-8 py-6 border-y border-white/5">
                            <div>
                                <div class="text-[0.6rem] font-bold text-slate-500 uppercase tracking-wider mb-1">{{ __('Prix Unitaire') }}</div>
                                <template x-if="isAuthenticated">
                                    <div class="text-3xl font-display font-bold text-white flex items-baseline gap-1">
                                        <span x-text="Number(selectedProduct?.price).toFixed(2)"></span>
                                        <span class="text-sm font-sans font-normal text-slate-500">DA</span>
                                    </div>
                                </template>
                                <template x-if="!isAuthenticated">
                                    <div class="text-lg font-bold text-slate-500 italic">{{ __('Prix masqué') }}</div>
                                </template>
                            </div>
                            <!-- Add stock status if exists -->
                            <div class="ml-auto">
                                <div class="flex items-center gap-2 text-green-500 bg-green-500/10 px-3 py-1.5 rounded-full border border-green-500/20">
                                    <span class="relative flex h-2 w-2">
                                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-500 opacity-75"></span>
                                      <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                                    </span>
                                    <span class="text-xs font-bold uppercase tracking-wider">{{ __('En Stock') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-8 mb-10">
                            <div>
                                    <h4 class="text-sm font-bold text-white mb-2">{{ __('Description') }}</h4>
                                    <p class="text-slate-400 leading-relaxed text-sm" x-text="selectedProduct?.description"></p>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4">
                                <div class="p-4 rounded-2xl bg-[#0a0a0b] border border-white/5">
                                    <div class="text-[0.6rem] font-bold text-slate-500 uppercase tracking-wider mb-2">{{ __('Poids') }}</div>
                                    <div class="font-bold text-white flex items-center gap-2">
                                        <x-lucide-weight class="w-4 h-4 text-portal-accent" />
                                        <span x-text="selectedProduct?.weight_kg ? Number(selectedProduct.weight_kg).toFixed(2) + ' ' + '{{ __('kg') }}' : 'N/A'"></span>
                                    </div>
                                </div>
                                <div class="p-4 rounded-2xl bg-[#0a0a0b] border border-white/5">
                                    <div class="text-[0.6rem] font-bold text-slate-500 uppercase tracking-wider mb-2">{{ __('Conditionnement') }}</div>
                                    <div class="font-bold text-white flex items-center gap-2">
                                        <x-lucide-layers class="w-4 h-4 text-portal-accent" />
                                        <span x-text="selectedProduct?.pieces_per_bundle ? selectedProduct.pieces_per_bundle + ' {{ __('pcs/lot') }}' : 'N/A'"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <template x-if="isAuthenticated">
                                <button @click="addToCart(selectedProduct.id)" class="bg-portal-accent text-black font-bold text-sm uppercase tracking-wider rounded-xl hover:bg-white transition-colors flex-1 h-14 flex items-center justify-center gap-2 shadow-[0_0_20px_rgba(250,204,21,0.2)]">
                                    {{ __('Ajouter au Panier') }} <x-lucide-shopping-cart class="w-5 h-5 ml-1" />
                                </button>
                            </template>
                            <template x-if="!isAuthenticated">
                                <a href="{{ route('login') }}" class="bg-white/10 border border-white/10 text-white font-bold text-sm uppercase tracking-wider flex-1 rounded-xl hover:bg-white/20 transition-colors flex items-center justify-center gap-2">
                                    <x-lucide-log-in class="w-5 h-5" /> {{ __('Se connecter') }}
                                </a>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
    </div>
    </div>
    </div>
</x-public-layout>
