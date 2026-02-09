<x-public-layout>
    <div class="max-w-7xl mx-auto px-6 py-12">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6 border-b border-white/5 pb-12">
            <div>
                <span
                    class="inline-block bg-portal-accent/10 text-portal-accent border border-portal-accent/20 px-3 py-1 rounded-full text-[0.65rem] font-bold uppercase tracking-widest mb-4">{{ __('Catalogue Officiel') }}</span>
                <h1 class="text-4xl md:text-5xl font-display font-black tracking-tighter mb-4">
                    {{ __('Matériaux de Construction') }}</h1>
                <p class="text-slate-400 text-lg max-w-2xl">
                    {{ __('Explorez notre inventaire complet de produits certifiés pour vos projets.') }}</p>
            </div>

            <div class="flex items-center gap-4">
                <div class="text-right hidden md:block">
                    <div class="text-xs font-bold text-slate-500 uppercase tracking-widest">{{ __('Mise à jour') }}</div>
                    <div class="text-white font-mono text-sm">{{ date('d M Y') }}</div>
                </div>
            </div>
        </div>

        <div class="flex flex-col lg:grid lg:grid-cols-[260px_1fr] gap-12" x-data="{
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
        
            async addToRequisition(productId, quantity = 1) {
                try {
                    const response = await fetch(`/commande/add/${productId}`, {
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
                        this.$dispatch('commande-updated', {
                            count: data.commande_count,
                            message: data.message
                        });
                        window.showToast(data.message || @js(__('Produit ajouté !')), 'success');
                    } else {
                        window.showToast(data.message || @js(__("Erreur lors de l'ajout")), 'error');
                    }
                } catch (error) {
                    console.error('Failed to add to commande:', error);
                    window.showToast(@js(__('Une erreur est survenue.')), 'error');
                }
            },
        
            async toggleFavorite(product) {
                if (!this.isAuthenticated) {
                    window.location.href = '/login';
                    return;
                }
        
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
                        product.is_favorite = data.is_favorite;
                        window.showToast(data.message, 'success');
                    }
                } catch (error) {
                    console.error('Failed to toggle favorite:', error);
                }
            }
        }">
            <!-- Mobile Search & Filter Actions -->
            <div
                class="lg:hidden flex flex-col gap-4 sticky top-20 z-30 bg-[#0a0a0b]/95 backdrop-blur-md -mx-6 px-6 py-4 border-b border-white/10">
                <div class="bg-white/5 border border-white/10 rounded-xl p-3 flex items-center gap-3">
                    <x-lucide-search class="w-4 h-4 text-slate-400" />
                    <input type="text" x-model.debounce.500ms="searchQuery" @input="watchSearch()"
                        placeholder="{{ __('Rechercher...') }}"
                        class="bg-transparent border-none text-white placeholder-slate-500 w-full focus:ring-0 text-sm p-0">
                </div>

                <div class="flex gap-2 overflow-x-auto pb-1 no-scrollbar">
                    <button @click="watchCategory('all')"
                        :class="selectedCategory === 'all' ? 'bg-portal-accent text-black font-bold' :
                            'bg-white/5 border border-white/10 text-slate-400'"
                        class="whitespace-nowrap px-4 py-2 rounded-full text-xs font-semibold transition-all">
                        {{ __('Tout') }}
                    </button>
                    @foreach ($categories as $category)
                        <button @click="watchCategory('{{ $category->slug }}')"
                            :class="selectedCategory === '{{ $category->slug }}' ? 'bg-portal-accent text-black font-bold' :
                                'bg-white/5 border border-white/10 text-slate-400'"
                            class="whitespace-nowrap px-4 py-2 rounded-full text-xs font-semibold transition-all">
                            {{ $category->name }}
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Sidebar Filters (Desktop) -->
            <div class="hidden lg:block space-y-8 sticky top-28 self-start">
                <div class="p-6 bg-[#141415] border border-white/5 rounded-2xl">
                    <h3 class="font-bold text-white text-sm uppercase tracking-wider mb-6 pb-4 border-b border-white/5">
                        {{ __('Catégories') }}</h3>
                    <div class="space-y-1">
                        <button @click="watchCategory('all')"
                            :class="selectedCategory === 'all' ?
                                'bg-portal-accent text-black shadow-[0_0_20px_rgba(250,204,21,0.2)]' :
                                'text-slate-400 hover:bg-white/5 hover:text-white'"
                            class="w-full text-start px-4 py-3 rounded-xl text-sm font-bold transition-all flex items-center justify-between group">
                            {{ __('Tout le catalogue') }}
                            <x-lucide-chevron-right
                                class="w-4 h-4 rtl:rotate-180 transition-transform group-hover:translate-x-1"
                                x-bind:class="selectedCategory === 'all' ? 'opacity-100' : 'opacity-0'" />
                        </button>
                        @foreach ($categories as $category)
                            <button @click="watchCategory('{{ $category->slug }}')"
                                :class="selectedCategory === '{{ $category->slug }}' ?
                                    'bg-portal-accent text-black shadow-[0_0_20px_rgba(250,204,21,0.2)]' :
                                    'text-slate-400 hover:bg-white/5 hover:text-white'"
                                class="w-full text-start px-4 py-3 rounded-xl text-sm font-bold transition-all flex items-center justify-between group">
                                {{ $category->name }}
                                <x-lucide-chevron-right
                                    class="w-4 h-4 rtl:rotate-180 transition-transform group-hover:translate-x-1"
                                    x-bind:class="selectedCategory === '{{ $category->slug }}' ? 'opacity-100' : 'opacity-0'" />
                            </button>
                        @endforeach
                    </div>
                </div>

                <div
                    class="p-6 bg-gradient-to-br from-portal-accent/20 to-transparent border border-portal-accent/10 rounded-2xl text-center">
                    <div
                        class="w-12 h-12 bg-portal-accent rounded-xl flex items-center justify-center mx-auto mb-4 text-black">
                        <x-lucide-phone class="w-6 h-6" />
                    </div>
                    <h4 class="font-bold text-white mb-2">{{ __('Assistance Technique') }}</h4>
                    <p class="text-xs text-slate-400 mb-4">
                        {{ __('Besoin d\'un devis spécifique ou d\'un conseil technique ?') }}</p>
                    <div class="font-mono text-portal-accent font-bold text-lg">+213 550 00 00 00</div>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="space-y-8">
                <!-- Search Bar (Desktop) -->
                <div class="hidden lg:block sticky top-24 z-30 group">
                    <div
                        class="bg-[#141415]/80 backdrop-blur-xl border border-white/10 rounded-2xl p-2 pl-6 flex items-center gap-4 shadow-2xl transition-all focus-within:border-portal-accent/50 focus-within:ring-1 focus-within:ring-portal-accent/50">
                        <x-lucide-search
                            class="w-5 h-5 text-slate-400 group-focus-within:text-portal-accent transition-colors" />
                        <input type="text" x-model.debounce.300ms="searchQuery" @input="watchSearch()"
                            @focus="if(searchQuery.length > 2) showSuggestions = true"
                            @click.away="showSuggestions = false" @keydown.escape="showSuggestions = false"
                            placeholder="{{ __('Rechercher par référence, nom ou spécification...') }}"
                            class="bg-transparent border-none text-white placeholder-slate-500 w-full focus:ring-0 text-sm h-12">
                        <div x-show="loading" class="animate-spin text-portal-accent px-4">
                            <x-lucide-loader-2 class="w-5 h-5" />
                        </div>
                    </div>

                    <div x-show="showSuggestions && products.length > 0 && searchQuery.length > 2"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        class="absolute top-full left-0 right-0 mt-2 bg-[#141415] border border-white/10 rounded-2xl shadow-2xl overflow-hidden z-40"
                        x-cloak>
                        <div class="p-2 max-h-[400px] overflow-y-auto">
                            <template x-for="product in products.slice(0, 5)" :key="'suggest-' + product.id">
                                <div @click="openQuickView(product); showSuggestions = false"
                                    class="flex items-center gap-4 p-4 hover:bg-white/5 rounded-xl cursor-pointer transition-colors border border-transparent hover:border-white/5">
                                    <div
                                        class="w-14 h-14 rounded-lg bg-gradient-to-br from-white/10 to-white/5 flex items-center justify-center p-2 flex-shrink-0 overflow-hidden">
                                        <template x-if="product.image_url">
                                            <img :src="product.image_url" :alt="product.name" loading="lazy"
                                                class="w-full h-full object-contain">
                                        </template>
                                        <template x-if="!product.image_url">
                                            <x-lucide-package class="w-6 h-6 text-slate-500 opacity-50" />
                                        </template>
                                    </div>
                                    <div class="flex-1">
                                        <div class="text-sm font-bold text-white mb-0.5" x-text="product.name"></div>
                                        <div class="text-[0.6rem] font-bold text-portal-accent uppercase tracking-wider bg-portal-accent/5 inline-block px-1.5 py-0.5 rounded"
                                            x-text="'Ref: ' + String(product.id).padStart(6, '0')"></div>
                                    </div>
                                    <template x-if="isAuthenticated">
                                        <div class="text-sm font-mono font-bold text-slate-300"
                                            x-text="Number(product.price).toFixed(2) + ' {{ __('DA') }}'"></div>
                                    </template>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>

                <!-- Grid Items -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <template x-for="product in products" :key="product.id">
                        <a :href="'/products/' + product.id" 
                           class="group relative bg-[#1a1a1a] rounded-xl overflow-hidden border border-white/5 hover:border-portal-accent/30 transition-all duration-500">
                            
                            <!-- Product Image Area - Larger -->
                            <div class="relative h-64 bg-gradient-to-br from-[#252525] to-[#1a1a1a] flex items-center justify-center p-8 overflow-hidden">
                                <!-- Category Badge -->
                                <div class="absolute top-3 left-3 z-10">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded text-[0.65rem] font-bold uppercase tracking-wider bg-portal-accent/10 text-portal-accent border border-portal-accent/20">
                                        <template x-if="product.category">
                                            <span x-text="product.category.name"></span>
                                        </template>
                                        <template x-if="!product.category">
                                            <span>{{ __('MYFIX') }}</span>
                                        </template>
                                    </span>
                                </div>

                                <!-- Favorite Button -->
                                <button @click.stop="toggleFavorite(product)"
                                    class="absolute top-3 right-3 z-10 w-8 h-8 rounded-full flex items-center justify-center transition-all duration-300"
                                    :class="product.is_favorite ? 'bg-red-500 text-white' :
                                        'bg-white/5 text-slate-400 hover:text-red-500 hover:bg-white/10'">
                                    <x-lucide-heart class="w-4 h-4"
                                        x-bind:class="product.is_favorite ? 'fill-current' : ''" />
                                </button>

                                <!-- Product Image - Larger and More Visible -->
                                <template x-if="product.image_url">
                                    <img :src="product.image_url" :alt="product.name" loading="lazy"
                                        class="max-w-full max-h-full object-contain transition-transform duration-700 group-hover:scale-110 filter drop-shadow-xl">
                                </template>
                                <template x-if="!product.image_url">
                                    <div class="flex flex-col items-center justify-center text-slate-500">
                                        <x-lucide-package class="w-20 h-20 stroke-1 mb-2 opacity-50" />
                                        <span class="text-xs font-medium">{{ __('Image non disponible') }}</span>
                                    </div>
                                </template>
                            </div>

                            <!-- Product Info -->
                            <div class="p-4">
                                <!-- Reference -->
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-[0.7rem] font-bold text-slate-500 uppercase tracking-wider bg-white/5 px-2 py-0.5 rounded"
                                        x-text="'REF: ' + String(product.id).padStart(5, '0')"></span>
                                    <template x-if="product.pieces_per_bundle">
                                        <span class="text-[0.7rem] font-semibold text-slate-400 bg-white/5 px-2 py-0.5 rounded"
                                            x-text="product.pieces_per_bundle + ' pcs/lot'"></span>
                                    </template>
                                </div>

                                <!-- Product Name -->
                                <h3 class="font-bold text-white text-sm leading-snug mb-3 line-clamp-2 group-hover:text-portal-accent transition-colors"
                                    x-text="product.name"></h3>

                                <!-- Price -->
                                <template x-if="isAuthenticated">
                                    <div class="flex items-end justify-between mb-3 pb-3 border-t border-white/5">
                                        <div>
                                            <span class="text-xl font-bold text-white" x-text="Number(product.price).toFixed(2)"></span>
                                            <span class="text-sm text-slate-500 ml-1">{{ __('DA') }}</span>
                                        </div>
                                        <span class="text-[0.6rem] font-semibold text-slate-500 uppercase tracking-wider">{{ __('HT') }}</span>
                                    </div>
                                </template>
                                <template x-if="!isAuthenticated">
                                    <div class="flex items-center gap-2 mb-3 pb-3 border-t border-white/5">
                                        <x-lucide-lock class="w-4 h-4 text-slate-500" />
                                        <span class="text-xs font-medium text-slate-500">{{ __('Connectez-vous pour les tarifs') }}</span>
                                    </div>
                                </template>

                                <!-- Actions -->
                                <div @click.stop>
                                    <template x-if="isAuthenticated">
                                        <div class="flex gap-2" x-data="{ localQty: 1 }">
                                            <div class="flex items-center bg-white/5 border border-white/10 rounded-lg h-9 flex-1">
                                                <button @click="if(localQty > 1) localQty--"
                                                    class="flex-1 h-full flex items-center justify-center text-slate-400 hover:text-white transition-colors">
                                                    <x-lucide-minus class="w-3 h-3" />
                                                </button>
                                                <span class="w-10 h-full flex items-center justify-center text-xs font-bold text-white border-x border-white/10"
                                                    x-text="localQty"></span>
                                                <button @click="localQty++"
                                                    class="flex-1 h-full flex items-center justify-center text-slate-400 hover:text-white transition-colors">
                                                    <x-lucide-plus class="w-3 h-3" />
                                                </button>
                                            </div>
                                            <button @click="addToRequisition(product.id, localQty)"
                                                class="flex items-center justify-center gap-1 px-3 bg-portal-accent text-black font-bold text-xs rounded-lg hover:bg-white transition-colors">
                                                <x-lucide-plus class="w-3 h-3" />
                                                {{ __('Ajouter') }}
                                            </button>
                                        </div>
                                    </template>
                                    <template x-if="!isAuthenticated">
                                        <a href="{{ route('login') }}"
                                            class="flex items-center justify-center gap-2 w-full py-2.5 bg-white/5 text-white font-bold text-xs rounded-lg hover:bg-white/10 transition-colors">
                                            <x-lucide-log-in class="w-3 h-3" />
                                            {{ __('Se connecter') }}
                                        </a>
                                    </template>
                                </div>
                            </div>

                            <!-- Hover Border Effect -->
                            <div class="absolute inset-0 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none border-2 border-portal-accent m-[-1px]"></div>
                        </a>
                    </template>
                </div>

                <div x-ref="loadMoreTrigger" class="py-12 flex justify-center">
                    <template x-if="loading">
                        <div
                            class="flex items-center gap-3 text-slate-400 font-bold text-sm bg-white/5 px-6 py-3 rounded-full border border-white/5">
                            <x-lucide-loader-2 class="w-4 h-4 animate-spin text-portal-accent" />
                            {{ __('Chargement...') }}
                        </div>
                    </template>
                    <template x-if="!loading && !hasMore && products.length > 0">
                        <div class="text-slate-500 font-bold text-[0.6rem] uppercase tracking-widest opacity-50">
                            {{ __('Fin du catalogue technique') }}
                        </div>
                    </template>
                    <template x-if="!loading && products.length === 0">
                        <div
                            class="text-slate-400 font-medium text-sm py-20 text-center bg-white/5 rounded-3xl border border-white/5">
                            <x-lucide-search-x class="w-12 h-12 mx-auto mb-4 text-slate-600" />
                            {{ __('Aucun produit correspondant.') }}
                        </div>
                    </template>
                </div>
            </div>

            <!-- Quick View Modal -->
            <template x-teleport="body">
                <div x-show="showQuickView" class="fixed inset-0 z-[100] flex items-center justify-center p-4 lg:p-10"
                    x-cloak>
                    <div x-show="showQuickView" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        class="fixed inset-0 bg-black/90 backdrop-blur-xl" @click="closeQuickView()"></div>

                    <div x-show="showQuickView" x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                        class="relative bg-[#141415] border border-white/10 w-full max-w-5xl max-h-[90vh] rounded-[2rem] overflow-hidden shadow-2xl flex flex-col lg:flex-row">

                        <button @click="closeQuickView()"
                            class="absolute top-6 right-6 z-20 p-2 rounded-full bg-black/20 text-slate-400 hover:text-white hover:bg-white/10 transition-all backdrop-blur-md">
                            <x-lucide-x class="w-6 h-6" />
                        </button>

                        <div class="lg:w-1/2 bg-gradient-to-br from-white via-slate-50 to-slate-100 flex flex-col relative min-h-[500px]"
                            x-data="{
                                currentImageIndex: 0,
                                get allImages() {
                                    let imgs = [];
                                    if (selectedProduct && selectedProduct.image_url) imgs.push(selectedProduct.image_url);
                                    if (selectedProduct && selectedProduct.images && Array.isArray(selectedProduct.images)) {
                                        imgs = imgs.concat(selectedProduct.images);
                                    }
                                    return imgs;
                                },
                                get currentImage() {
                                    return this.allImages[this.currentImageIndex] || null;
                                },
                                nextImage() { if (this.currentImageIndex < this.allImages.length - 1) this.currentImageIndex++; },
                                prevImage() { if (this.currentImageIndex > 0) this.currentImageIndex--; }
                            }">
                            <div class="absolute inset-0 opacity-[0.03]"
                                style="background-image: radial-gradient(circle, #000 1px, transparent 1px); background-size: 20px 20px;">
                            </div>

                            <button @click.stop="toggleFavorite(selectedProduct)"
                                class="absolute top-6 left-6 z-20 w-12 h-12 rounded-full flex items-center justify-center transition-all duration-300 backdrop-blur-md"
                                :class="selectedProduct && selectedProduct.is_favorite ? 'bg-red-500 text-white shadow-xl' :
                                    'bg-black/10 text-slate-500 hover:bg-white hover:text-red-500'">
                                <x-lucide-heart class="w-6 h-6"
                                    x-bind:class="selectedProduct && selectedProduct.is_favorite ? 'fill-current' : ''" />
                            </button>

                            <div class="relative z-10 flex-1 w-full p-12 flex items-center justify-center">
                                <template x-if="currentImage">
                                    <div class="w-full h-full flex items-center justify-center relative">
                                        <img :src="currentImage" :alt="selectedProduct ? selectedProduct.name : ''"
                                            loading="lazy"
                                            class="max-w-full max-h-full w-auto h-auto object-contain filter drop-shadow-[0_20px_50px_rgba(0,0,0,0.2)]"
                                            style="image-rendering: -webkit-optimize-contrast;">
                                    </div>
                                </template>
                                <template x-if="!currentImage">
                                    <x-lucide-package class="w-32 h-32 text-slate-300 stroke-1" />
                                </template>
                            </div>
                        </div>

                        <div class="lg:w-1/2 p-8 lg:p-12 overflow-y-auto bg-[#141415]" x-data="{
                            quantity: 1,
                            get piecesPerBundle() { return (selectedProduct && selectedProduct.pieces_per_bundle) ? selectedProduct.pieces_per_bundle : 1; },
                            get isMultiple() { return this.piecesPerBundle > 1 && this.quantity % this.piecesPerBundle === 0; },
                            get needsSuggestion() { return this.piecesPerBundle > 1 && this.quantity % this.piecesPerBundle !== 0; },
                            get suggestedQuantity() { return Math.ceil(this.quantity / this.piecesPerBundle) * this.piecesPerBundle; }
                        }">
                            <div class="inline-block bg-portal-accent/10 text-portal-accent border border-portal-accent/20 px-2 py-0.5 rounded text-[0.6rem] font-bold uppercase tracking-widest mb-4"
                                x-text="selectedProduct && selectedProduct.category ? selectedProduct.category.name : ''">
                            </div>
                            <h2 class="font-display font-bold text-3xl lg:text-4xl mb-6 tracking-tight text-white leading-[1.1]"
                                x-text="selectedProduct ? selectedProduct.name : ''"></h2>

                            <!-- keep the rest of your modal exactly as-is below this line -->
                            <!-- (I did not change your form logic beyond removing optional chaining) -->

                            <div class="flex items-center gap-6 mb-8 py-6 border-y border-white/5">
                                <div>
                                    <div class="text-[0.6rem] font-bold text-slate-500 uppercase tracking-wider mb-1">
                                        {{ __('Tarif B2B Unitaire') }}</div>
                                    <template x-if="isAuthenticated">
                                        <div
                                            class="text-3xl font-display font-bold text-white flex items-baseline gap-1">
                                            <span
                                                x-text="Number(selectedProduct ? selectedProduct.price : 0).toFixed(2)"></span>
                                            <span class="text-sm font-sans font-normal text-slate-500">DA HT</span>
                                        </div>
                                    </template>
                                    <template x-if="!isAuthenticated">
                                        <div class="text-lg font-bold text-slate-500 italic">
                                            {{ __('Tarification Réservée') }}</div>
                                    </template>
                                </div>

                                <div x-show="selectedProduct && selectedProduct.weight_kg">
                                    <div class="text-[0.6rem] font-bold text-slate-500 uppercase tracking-wider mb-1">
                                        {{ __('Poids/Unité') }}</div>
                                    <div class="text-xl text-white font-mono"
                                        x-text="(selectedProduct ? selectedProduct.weight_kg : '') + 'kg'"></div>
                                </div>

                                <div x-show="selectedProduct && selectedProduct.pieces_per_bundle">
                                    <div class="text-[0.6rem] font-bold text-slate-500 uppercase tracking-wider mb-1">
                                        {{ __('Logistique') }}</div>
                                    <div class="text-xl text-white font-mono"
                                        x-text="(selectedProduct ? selectedProduct.pieces_per_bundle : '') + ' pcs/paquet'">
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-6">
                                <h4 class="text-sm font-bold text-slate-400 uppercase tracking-widest">
                                    {{ __('Approvisionnement') }}</h4>

                                <form :action="'/commande/add/' + (selectedProduct ? selectedProduct.id : '')"
                                    method="POST" class="space-y-6">
                                    @csrf
                                    <div>
                                        <label
                                            class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-3">{{ __('Calculateur de Volume') }}</label>
                                        <div class="grid grid-cols-2 gap-4">
                                            <div class="flex bg-black/40 border border-white/5 rounded-2xl p-1">
                                                <button type="button" @click="if(quantity > 1) quantity--"
                                                    class="w-12 h-12 flex items-center justify-center text-slate-400 hover:text-white hover:bg-white/5 rounded-xl transition-all">-</button>
                                                <input type="number" name="quantity" x-model="quantity"
                                                    class="flex-1 bg-transparent border-none text-center font-mono font-bold text-white focus:ring-0"
                                                    min="1">
                                                <button type="button" @click="quantity++"
                                                    class="w-12 h-12 flex items-center justify-center text-slate-400 hover:text-white hover:bg-white/5 rounded-xl transition-all">+</button>
                                            </div>
                                            <div
                                                class="flex items-center px-6 bg-white/5 border border-white/5 rounded-2xl">
                                                <div class="text-sm text-slate-500 font-medium">
                                                    <span class="text-white font-bold"
                                                        x-text="(quantity * ((selectedProduct && selectedProduct.weight_kg) ? selectedProduct.weight_kg : 0)).toFixed(1)"></span>
                                                    kg {{ __('estimés') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <template x-if="needsSuggestion">
                                        <div x-transition
                                            class="bg-blue-500/10 border border-blue-500/20 rounded-2xl p-4 flex gap-4 items-center">
                                            <div class="p-2 rounded-lg bg-blue-500/20 text-blue-400 flex-shrink-0">
                                                <x-lucide-lightbulb class="w-5 h-5" />
                                            </div>
                                            <div class="flex-1">
                                                <div class="text-sm font-bold text-blue-400 mb-1">
                                                    {{ __('Optimisez votre logistique') }}</div>
                                                <p class="text-xs text-blue-300 leading-relaxed mb-3">
                                                    {{ __('Ce produit est livré en paquets de') }} <span
                                                        class="font-bold text-white" x-text="piecesPerBundle"></span>.
                                                    {{ __('Commandez') }} <span class="font-bold text-white"
                                                        x-text="suggestedQuantity"></span>
                                                    {{ __('pièces pour recevoir des paquets complets.') }}
                                                </p>
                                                <button type="button" @click="quantity = suggestedQuantity"
                                                    class="text-xs font-black uppercase tracking-tighter text-white bg-blue-500 px-3 py-1.5 rounded-lg hover:bg-blue-400 transition-colors">
                                                    {{ __('Ajuster à') }} <span x-text="suggestedQuantity"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </template>

                                    <template x-if="isMultiple">
                                        <div x-transition
                                            class="bg-green-500/10 border border-green-500/20 rounded-2xl p-4 flex gap-4 items-center">
                                            <div class="p-2 rounded-lg bg-green-500/20 text-green-400 flex-shrink-0">
                                                <x-lucide-check-circle class="w-5 h-5" />
                                            </div>
                                            <p class="text-xs text-green-300 font-bold">
                                                {{ __('Parfait ! Votre commande correspond à des paquets complets.') }}
                                            </p>
                                        </div>
                                    </template>

                                    <button type="submit"
                                        class="w-full bg-portal-accent text-black py-5 rounded-2xl font-bold text-lg hover:bg-white transition-all shadow-[0_10px_30px_rgba(var(--portal-accent-rgb),0.3)] flex items-center justify-center gap-3 disabled:opacity-50 group"
                                        :disabled="!isAuthenticated">
                                        <x-lucide-shopping-cart
                                            class="w-6 h-6 group-hover:scale-110 transition-transform" />
                                        {{ __('Ajouter à la Réquisition') }}
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</x-public-layout>
