<x-app-layout>
    <x-slot name="header">
        <span class="inline-block bg-portal-accent text-black px-2.5 py-1 rounded-md text-[0.7rem] font-extrabold uppercase tracking-wider mb-2">{{ __('Technical Catalog') }}</span>
        <h1 class="text-4xl font-extrabold tracking-tight mb-2">{{ __('Material Inventory') }}</h1>
        <p class="text-portal-muted text-lg">{{ __('Browse and procure high-grade construction components.') }}</p>
    </x-slot>

    <div 
        class="flex flex-col lg:grid lg:grid-cols-[280px_1fr] gap-8" 
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
        <div class="lg:hidden flex flex-col gap-4 sticky top-20 z-30 bg-portal-bg/95 backdrop-blur-sm -mx-6 px-6 py-4 border-b border-portal-border/50">
             <div class="bg-portal-sidebar border border-portal-border rounded-xl p-3 flex items-center gap-3 shadow-lg">
                <x-lucide-search class="w-4 h-4 text-portal-muted" />
                <input 
                    type="text" 
                    x-model.debounce.500ms="searchQuery"
                    @input="watchSearch()"
                    placeholder="{{ __('Search...') }}" 
                    class="bg-transparent border-none text-white placeholder-portal-muted w-full focus:ring-0 text-sm"
                >
            </div>
            
            <div class="flex gap-2 overflow-x-auto pb-1 no-scrollbar">
                <button 
                    @click="watchCategory('all')"
                    :class="selectedCategory === 'all' ? 'bg-portal-accent text-black' : 'bg-portal-sidebar border-portal-border text-portal-muted'"
                    class="whitespace-nowrap px-4 py-2 rounded-lg text-xs font-bold border transition-colors shadow-sm"
                >
                    {{ __('All') }}
                </button>
                @foreach($categories as $category)
                    <button 
                        @click="watchCategory('{{ $category->slug }}')"
                        :class="selectedCategory === '{{ $category->slug }}' ? 'bg-portal-accent text-black' : 'bg-portal-sidebar border-portal-border text-portal-muted'"
                        class="whitespace-nowrap px-4 py-2 rounded-lg text-xs font-bold border transition-colors shadow-sm"
                    >
                        {{ $category->name }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Sidebar Filters (hidden on small screens, shown in the grid on large screens) -->
        <div class="hidden lg:block space-y-6">
            <div class="bg-portal-sidebar border border-portal-border rounded-xl p-6">
                <h3 class="font-display font-bold text-lg mb-4">{{ __('Categories') }}</h3>
                <div class="space-y-1">
                    <button 
                        @click="watchCategory('all')"
                        :class="selectedCategory === 'all' ? 'bg-portal-accent/10 text-portal-accent' : 'text-portal-muted hover:text-white'"
                        class="w-full text-start px-4 py-2.5 rounded-lg text-sm font-semibold transition-colors flex items-center justify-between group"
                    >
                        {{ __('All Categories') }}
                        <x-lucide-chevron-right class="w-4 h-4 opacity-0 group-hover:opacity-100 transition-opacity rtl:rotate-180" />
                    </button>
                    @foreach($categories as $category)
                        <button 
                            @click="watchCategory('{{ $category->slug }}')"
                            :class="selectedCategory === '{{ $category->slug }}' ? 'bg-portal-accent/10 text-portal-accent' : 'text-portal-muted hover:text-white'"
                            class="w-full text-start px-4 py-2.5 rounded-lg text-sm font-semibold transition-colors flex items-center justify-between group"
                        >
                            {{ $category->name }}
                            <x-lucide-chevron-right class="w-4 h-4 opacity-0 group-hover:opacity-100 transition-opacity rtl:rotate-180" />
                        </button>
                    @endforeach
                </div>
            </div>

            <div class="bg-portal-sidebar border border-portal-border rounded-xl p-6">
                <h3 class="font-display font-bold text-lg mb-4">{{ __('Quick Filters') }}</h3>
                <label class="flex items-center gap-3 text-sm text-portal-muted cursor-pointer hover:text-white transition-colors">
                    <input type="checkbox" class="rounded border-portal-border bg-white/5 text-portal-accent focus:ring-portal-accent focus:ring-offset-0">
                    {{ __('In Stock Only') }}
                </label>
            </div>
        </div>

        <!-- Product Grid -->
        <div class="space-y-6">
            <!-- Search Bar (Desktop) -->
            <div class="hidden lg:block sticky top-6 z-30 group">
                <div class="bg-portal-sidebar border border-portal-border rounded-xl p-4 flex items-center gap-4 focus-within:border-portal-accent/50 transition-all shadow-xl backdrop-blur-md">
                    <x-lucide-search class="w-5 h-5 text-portal-muted group-focus-within:text-portal-accent transition-colors" />
                    <input 
                        type="text" 
                        x-model.debounce.300ms="searchQuery"
                        @input="watchSearch()"
                        @focus="if(searchQuery.length > 2) showSuggestions = true"
                        @click.away="showSuggestions = false"
                        @keydown.escape="showSuggestions = false"
                        placeholder="{{ __('Search by reference, name, or spec...') }}" 
                        class="bg-transparent border-none text-white placeholder-portal-muted w-full focus:ring-0"
                    >
                    <div x-show="loading" class="animate-spin text-portal-accent">
                        <x-lucide-loader-2 class="w-4 h-4" />
                    </div>
                </div>

                <!-- Search Suggestions Dropdown -->
                <div x-show="showSuggestions && products.length > 0 && searchQuery.length > 2" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="absolute top-full left-0 right-0 mt-2 bg-portal-sidebar border border-portal-border rounded-xl shadow-2xl overflow-hidden z-40 backdrop-blur-xl"
                     x-cloak
                >
                    <div class="p-2 max-h-[400px] overflow-y-auto">
                        <template x-for="product in products.slice(0, 5)" :key="'suggest-'+product.id">
                            <div @click="openQuickView(product); showSuggestions = false" class="flex items-center gap-3 p-3 hover:bg-white/5 rounded-lg cursor-pointer transition-colors border border-transparent hover:border-portal-border/50">
                                <div class="w-12 h-12 rounded-lg bg-white/5 flex items-center justify-center p-2 flex-shrink-0">
                                    <template x-if="product.image_url">
                                        <img :src="product.image_url" class="max-h-full max-w-full object-contain">
                                    </template>
                                    <template x-if="!product.image_url">
                                        <x-lucide-package class="w-6 h-6 text-portal-muted opacity-20" />
                                    </template>
                                </div>
                                <div class="flex-1">
                                    <div class="text-sm font-bold text-white" x-text="product.name"></div>
                                    <div class="text-[0.6rem] font-extrabold text-portal-accent uppercase tracking-wider" x-text="'Ref: ' + String(product.id).padStart(6, '0')"></div>
                                </div>
                                <div class="text-xs font-mono font-bold text-portal-muted" x-text="Number(product.price).toFixed(2) + ' {{ __('DA') }}'"></div>
                            </div>
                        </template>
                        <div @click="showSuggestions = false" class="p-3 text-center border-t border-portal-border mt-1">
                            <span class="text-xs font-bold text-portal-accent uppercase tracking-widest cursor-pointer hover:text-white transition-colors">
                                {{ __('View All Results') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                <template x-for="product in products" :key="product.id">
                    <div 
                        class="portal-card portal-card-interactive !p-0 overflow-hidden group flex flex-col cursor-pointer"
                        @click="openQuickView(product)"
                    >
                        <div class="relative h-48 bg-white/5 p-8 flex items-center justify-center overflow-hidden">
                            <template x-if="product.image_url">
                                <img :src="product.image_url" :alt="product.name" class="max-h-full max-w-full object-contain mix-blend-multiply opacity-80 group-hover:opacity-100 group-hover:scale-110 transition-all duration-500">
                            </template>
                            <template x-if="!product.image_url">
                                <div class="relative">
                                    <x-lucide-package class="w-16 h-16 text-portal-muted opacity-20 group-hover:opacity-40 group-hover:scale-110 transition-all duration-500" />
                                    <div class="absolute inset-0 bg-portal-accent/10 blur-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                </div>
                            </template>

                            <div class="absolute top-4 start-4 flex flex-col gap-2 z-10">
                                <template x-if="product.in_stock">
                                    <span class="inline-flex items-center gap-1.5 px-2 py-1 rounded bg-green-500/10 text-green-500 text-[0.65rem] font-bold uppercase tracking-wider border border-green-500/20 backdrop-blur-md">
                                        <x-lucide-check-circle-2 class="w-3 h-3" /> {{ __('Available') }}
                                    </span>
                                </template>
                                <template x-if="!product.in_stock">
                                    <span class="inline-flex items-center gap-1.5 px-2 py-1 rounded bg-red-500/10 text-red-500 text-[0.65rem] font-bold uppercase tracking-wider border border-red-500/20 backdrop-blur-md">
                                        <x-lucide-x-circle class="w-3 h-3" /> {{ __('Lead Time') }}
                                    </span>
                                </template>

                                <template x-if="product.technical_sheet_url">
                                    <a :href="product.technical_sheet_url" target="_blank" @click.stop="" class="inline-flex items-center gap-1.5 px-2 py-1 rounded bg-portal-accent/10 text-portal-accent text-[0.65rem] font-bold uppercase tracking-wider border border-portal-accent/20 hover:bg-portal-accent hover:text-black transition-colors backdrop-blur-md">
                                        <x-lucide-file-text class="w-3 h-3" /> {{ __('Specs') }}
                                    </a>
                                </template>
                            </div>
                        </div>

                        <div class="p-4 lg:p-6 flex-1 flex flex-col">
                            <div class="text-[0.6rem] font-extrabold text-portal-muted uppercase tracking-[0.2em] mb-2" x-text="'{{ __('REF') }}: ' + String(product.id).padStart(6, '0')"></div>
                            <h3 class="font-display font-bold text-base lg:text-lg mb-2 leading-tight group-hover:text-portal-accent transition-colors" x-text="product.name"></h3>
                            <div class="flex gap-4 mb-4">
                                <template x-if="product.weight_kg">
                                    <div class="flex items-center gap-1.5 text-[0.65rem] font-bold text-portal-muted uppercase">
                                        <x-lucide-weight class="w-3 h-3 text-portal-accent" /> <span x-text="Number(product.weight_kg).toFixed(2) + ' ' + '{{ __('kg') }}'"></span>
                                    </div>
                                </template>
                                <template x-if="product.pieces_per_bundle">
                                    <div class="flex items-center gap-1.5 text-[0.65rem] font-bold text-portal-muted uppercase">
                                        <x-lucide-layers class="w-3 h-3 text-portal-accent" /> <span x-text="product.pieces_per_bundle + ' {{ __('pcs/bndl') }}'"></span>
                                    </div>
                                </template>
                            </div>
                            <p class="text-sm text-portal-muted mb-6 lg:line-clamp-2 flex-1" x-text="product.description"></p>

                            <div class="flex items-center justify-between mt-auto pt-6 border-t border-portal-border/50" x-data="{ localQty: 1 }">
                                <div class="flex flex-col gap-2 flex-1">
                                    <div class="font-mono text-lg lg:text-xl font-bold flex items-baseline gap-1">
                                        <span x-text="Number(product.price).toFixed(2)"></span> <span class="text-[0.6rem] text-portal-muted uppercase">{{ __('DA') }}</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <div class="flex items-center bg-white/5 border border-portal-border rounded-lg overflow-hidden h-9">
                                            <button @click.stop="if(localQty > 1) localQty--" class="px-2 hover:bg-white/10 text-portal-muted">
                                                <x-lucide-minus class="w-3 h-3" />
                                            </button>
                                            <input type="number" x-model.number="localQty" @click.stop="" class="w-12 bg-transparent border-none text-center text-sm text-white font-mono focus:ring-0 p-0">
                                            <button @click.stop="localQty++" class="px-2 hover:bg-white/10 text-portal-muted">
                                                <x-lucide-plus class="w-3 h-3" />
                                            </button>
                                        </div>
                                        <button @click.stop="addToCart(product.id, localQty)" class="portal-btn portal-btn-primary !text-[0.65rem] !px-3 font-bold uppercase tracking-wider flex-1 h-9 justify-center">
                                            {{ __('Add') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Pallet Info if applicable -->
                            <template x-if="product.pieces_per_bundle">
                                <div class="mt-2 text-[0.6rem] text-portal-muted italic flex items-center gap-1">
                                    <x-lucide-info class="w-3 h-3" />
                                    <span x-text="Math.ceil(localQty / product.pieces_per_bundle) + ' ' + '{{ __('Pallets') }}'"></span>
                                </div>
                            </template>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Load More Trigger / Loading State -->
            <div x-ref="loadMoreTrigger" class="py-10 flex justify-center">
                <template x-if="loading">
                    <div class="flex items-center gap-3 text-portal-muted font-bold text-sm">
                        <x-lucide-loader-2 class="w-5 h-5 animate-spin text-portal-accent" />
                        {{ __('Loading more high-grade materials...') }}
                    </div>
                </template>
                <template x-if="!loading && !hasMore && products.length > 0">
                    <div class="text-portal-muted font-bold text-sm italic">
                        {{ __('You have reached the end of the catalog.') }}
                    </div>
                </template>
                <template x-if="!loading && products.length === 0">
                    <div class="text-portal-muted font-bold text-sm py-20 text-center">
                        <x-lucide-search-x class="w-12 h-12 mx-auto mb-4 opacity-20" />
                        {{ __('No materials found matching your search criteria.') }}
                    </div>
                </template>
            </div>
        </div>

        <!-- Quick View Modal -->
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
                     class="fixed inset-0 bg-black/80 backdrop-blur-md" 
                     @click="closeQuickView()"></div>
                
                <!-- Modal Content -->
                <div x-show="showQuickView" 
                     x-transition:enter="transition ease-out duration-300 transform"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-200 transform"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     class="relative bg-[#141415] border border-portal-border w-full max-w-4xl max-h-[90vh] rounded-3xl overflow-hidden shadow-2xl flex flex-col lg:flex-row">
                    
                    <button @click="closeQuickView()" class="absolute top-6 right-6 z-20 p-2 rounded-full bg-white/5 border border-white/10 text-portal-muted hover:text-white hover:bg-white/10 transition-all">
                        <x-lucide-x class="w-6 h-6" />
                    </button>

                    <!-- Left: Image Gallery -->
                    <div class="lg:w-1/2 bg-white/5 p-12 flex items-center justify-center relative min-h-[300px]">
                        <div class="absolute inset-0 bg-gradient-to-br from-portal-accent/5 to-transparent"></div>
                        <template x-if="selectedProduct?.image_url">
                            <img :src="selectedProduct.image_url" class="relative z-10 max-h-full max-w-full object-contain drop-shadow-2xl">
                        </template>
                        <template x-if="!selectedProduct?.image_url">
                            <x-lucide-package class="relative z-10 w-32 h-32 text-portal-muted opacity-20" />
                        </template>
                    </div>

                    <!-- Right: Details -->
                    <div class="lg:w-1/2 p-8 lg:p-12 overflow-y-auto">
                        <div class="text-[0.65rem] font-extrabold text-portal-accent uppercase tracking-[0.2em] mb-4" x-text="selectedProduct?.category?.name"></div>
                        <h2 class="font-display font-bold text-2xl lg:text-3xl mb-4 tracking-tight" x-text="selectedProduct?.name"></h2>
                        
                        <div class="flex items-center gap-6 mb-8 py-4 border-y border-portal-border/50">
                            <div>
                                <div class="text-[0.6rem] font-extrabold text-portal-muted uppercase tracking-wider mb-1">{{ __('Price') }}</div>
                                <div class="text-2xl font-mono font-bold text-white flex items-baseline gap-1">
                                    <span x-text="Number(selectedProduct?.price).toFixed(2)"></span>
                                    <span class="text-xs font-bold text-portal-muted uppercase">{{ __('DA') }}</span>
                                </div>
                            </div>
                            <div class="w-px h-10 bg-portal-border"></div>
                            <div>
                                <div class="text-[0.6rem] font-extrabold text-portal-muted uppercase tracking-wider mb-1">{{ __('Status') }}</div>
                                <template x-if="selectedProduct?.in_stock">
                                    <span class="text-green-500 font-bold text-sm flex items-center gap-2">
                                        <div class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></div> {{ __('In Stock') }}
                                    </span>
                                </template>
                            </div>
                        </div>

                        <div class="space-y-6 mb-10">
                            <p class="text-portal-muted leading-relaxed" x-text="selectedProduct?.description"></p>
                            
                            <div class="grid grid-cols-2 gap-4">
                                <div class="p-4 rounded-2xl bg-white/5 border border-white/5">
                                    <div class="text-[0.6rem] font-extrabold text-portal-muted uppercase tracking-wider mb-2">{{ __('Shipping Weight') }}</div>
                                    <div class="font-bold text-white flex items-center gap-2">
                                        <x-lucide-weight class="w-4 h-4 text-portal-accent" />
                                        <span x-text="selectedProduct?.weight_kg ? Number(selectedProduct.weight_kg).toFixed(2) + ' ' + '{{ __('kg') }}' : 'N/A'"></span>
                                    </div>
                                </div>
                                <div class="p-4 rounded-2xl bg-white/5 border border-white/5">
                                    <div class="text-[0.6rem] font-extrabold text-portal-muted uppercase tracking-wider mb-2">{{ __('Packaging') }}</div>
                                    <div class="font-bold text-white flex items-center gap-2">
                                        <x-lucide-layers class="w-4 h-4 text-portal-accent" />
                                        <span x-text="selectedProduct?.pieces_per_bundle ? selectedProduct.pieces_per_bundle + ' {{ __('pcs/bndl') }}' : 'N/A'"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <button @click="addToCart(selectedProduct.id)" class="portal-btn portal-btn-primary flex-1 justify-center h-14">
                                {{ __('Add to Requisition') }} <x-lucide-shopping-cart class="w-5 h-5 ms-2" />
                            </button>
                            <template x-if="selectedProduct?.technical_sheet_url">
                                <a :href="selectedProduct.technical_sheet_url" target="_blank" class="p-4 lg:p-0 lg:w-14 items-center justify-center rounded-xl bg-white/5 border border-white/10 hover:bg-white/10 transition-all flex group">
                                    <x-lucide-file-text class="w-6 h-6 text-portal-muted group-hover:text-portal-accent" />
                                </a>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
</x-app-layout>
