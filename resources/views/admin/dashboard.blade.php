<x-app-layout>
    <x-slot name="header">
        @php
            $tab = request()->query('tab', 'overview');
            $titles = [
                'overview' => [
                    'label' => 'Administration Système',
                    'title' => 'Vue d\'Ensemble',
                    'desc' => 'Tableau de bord et indicateurs de performance clés.',
                ],
                'products' => [
                    'label' => 'Gestion des Stocks',
                    'title' => 'Inventaire Global',
                    'desc' => 'Catalogue technique, état des stocks et gestion des actifs.',
                ],
                'orders' => [
                    'label' => 'Flux Logistique',
                    'title' => 'Transactions & Commandes',
                    'desc' => 'Suivi des commandes, livraisons et historique.',
                ],
                'users' => [
                    'label' => 'Ressources Humaines',
                    'title' => 'Annuaire Utilisateurs',
                    'desc' => 'Gestion des comptes, rôles et permissions.',
                ],
            ];
            $current = $titles[$tab] ?? $titles['overview'];
        @endphp

        <span class="inline-block bg-portal-accent text-black px-2.5 py-1 rounded-md text-[0.7rem] font-extrabold uppercase tracking-wider mb-2">{{ __($current['label']) }}</span>
        <h1 class="text-4xl font-extrabold tracking-tight mb-2 uppercase italic">{{ __($current['title']) }}</h1>
        <p class="text-portal-muted text-lg">{{ __($current['desc']) }}</p>
    </x-slot>

    <div x-data="{ activeTab: '{{ request()->query('tab', 'overview') }}' }">
        <!-- Tab Navigation -->


        <!-- Overview Tab -->
        <div x-show="activeTab === 'overview'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-8">
            
            <!-- KPI Grid -->
            <div class="grid grid-cols-3 gap-6">
                <div class="bg-portal-sidebar border border-portal-border rounded-xl p-6 relative overflow-hidden group hover:border-portal-accent/50 transition-all duration-500 hover:scale-[1.02] hover:shadow-[0_20px_40px_-15px_rgba(var(--portal-accent-rgb),0.1)]">
                    <div class="absolute top-0 end-0 p-6 opacity-10 group-hover:opacity-20 group-hover:scale-110 transition-all duration-700">
                        <x-lucide-trending-up class="w-16 h-16 text-portal-accent" />
                    </div>
                    <div class="flex items-center gap-4 mb-4">
                        <div class="p-3 rounded-lg bg-portal-accent/10 text-portal-accent">
                            <x-lucide-trending-up class="w-6 h-6" />
                        </div>
                    </div>
                    <div>
                        <div class="text-xs font-bold text-portal-muted uppercase tracking-wider mb-1">{{ __('Gross Revenue') }}</div>
                        <div class="text-2xl font-mono font-bold text-white">{{ number_format($stats['revenue'], 2) }} {{ __('DA') }}</div>
                        <div class="text-xs font-medium mt-2 flex items-center gap-1 {{ $stats['revenue_change'] >= 0 ? 'text-green-500' : 'text-red-500' }}">
                            @if($stats['revenue_change'] >= 0)
                                <x-lucide-arrow-up-right class="w-3 h-3 rtl:rotate-180" />
                            @else
                                <x-lucide-arrow-down-right class="w-3 h-3 rtl:rotate-180" />
                            @endif
                            {{ $stats['revenue_change'] }}% {{ __('vs semaine dernière') }}
                        </div>
                    </div>
                </div>

                <div class="bg-portal-sidebar border border-portal-border rounded-xl p-6 relative overflow-hidden group hover:border-portal-accent/50 transition-colors">
                    <div class="absolute top-0 end-0 p-6 opacity-10 group-hover:opacity-20 transition-opacity">
                        <x-lucide-clock class="w-16 h-16 text-portal-accent" />
                    </div>
                    <div class="flex items-center gap-4 mb-4">
                        <div class="p-3 rounded-lg bg-portal-accent/10 text-portal-accent">
                            <x-lucide-clock class="w-6 h-6" />
                        </div>
                    </div>
                    <div>
                        <div class="text-xs font-bold text-portal-muted uppercase tracking-wider mb-1">{{ __('Active Transmissions') }}</div>
                        <div class="text-2xl font-mono font-bold text-white">{{ $stats['active_orders'] }}</div>
                        <div class="text-xs font-medium text-portal-muted mt-2">{{ __('Pending Logistics') }}</div>
                    </div>
                </div>

                <div class="bg-portal-sidebar border border-portal-border rounded-xl p-6 relative overflow-hidden group hover:border-portal-accent/50 transition-colors">
                    <div class="absolute top-0 end-0 p-6 opacity-10 group-hover:opacity-20 transition-opacity">
                        <x-lucide-users class="w-16 h-16 text-blue-500" />
                    </div>
                    <div class="flex items-center gap-4 mb-4">
                        <div class="p-3 rounded-lg bg-blue-500/10 text-blue-500">
                            <x-lucide-users class="w-6 h-6" />
                        </div>
                    </div>
                    <div>
                        <div class="text-xs font-bold text-portal-muted uppercase tracking-wider mb-1">{{ __('Stakeholders') }}</div>
                        <div class="text-2xl font-mono font-bold text-white">{{ $stats['total_users'] }}</div>
                        <div class="text-xs font-medium text-blue-500 mt-2 flex items-center gap-1">
                            <x-lucide-plus class="w-3 h-3" /> {{ __('Database Growth') }}
                        </div>
                    </div>
                </div>


            </div>

            <!-- Recent Activity Block -->
            <div class="grid grid-cols-3 gap-8">
                <div class="col-span-2 bg-portal-sidebar border border-portal-border rounded-xl flex flex-col overflow-hidden">
                    <div class="p-6 border-b border-portal-border flex items-center justify-between">
                        <h2 class="font-display font-bold text-lg">{{ __('Commandes Récentes') }}</h2>
                        <button @click="activeTab = 'orders'" class="text-xs font-bold text-portal-muted hover:text-white transition-colors flex items-center gap-1">
                            {{ __('VOIR TOUT') }} <x-lucide-arrow-up-right class="w-3 h-3 rtl:rotate-180" />
                        </button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-start whitespace-nowrap">
                            <thead class="bg-white/2 text-xs font-bold text-portal-muted uppercase tracking-wider">
                                <tr>
                                    <th class="px-6 py-3 text-start">{{ __('Réf. Commande') }}</th>
                                    <th class="px-6 py-3 text-start">{{ __('Client') }}</th>
                                    <th class="px-6 py-3 text-start">{{ __('Statut') }}</th>
                                    <th class="px-6 py-3 text-end">{{ __('Montant') }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-portal-border">
                                @foreach($recent_orders as $order)
                                    <tr class="hover:bg-white/5 transition-all cursor-pointer group" onclick="window.location='{{ route('orders.show', $order->id) }}'">
                                        <td class="px-6 py-4 font-mono text-portal-accent font-medium">#{{ $order->order_number }}</td>
                                        <td class="px-6 py-4 text-sm font-medium">{{ $order->user->first_name }} {{ $order->user->last_name }}</td>
                                        <td class="px-6 py-4">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold uppercase tracking-wider
                                                {{ $order->status === 'pending' ? 'bg-amber-500/10 text-amber-500' : '' }}
                                                {{ $order->status === 'confirmed' ? 'bg-blue-500/10 text-blue-500' : '' }}
                                                {{ $order->status === 'in_delivery' ? 'bg-indigo-500/10 text-indigo-400' : '' }}
                                                {{ $order->status === 'delivered' ? 'bg-emerald-500/10 text-emerald-500' : '' }}
                                                {{ $order->status === 'cancelled' ? 'bg-rose-500/10 text-rose-500' : '' }}
                                            ">
                                                {{ [
                                                    'pending' => 'En attente',
                                                    'confirmed' => 'Confirmer',
                                                    'in_delivery' => 'En livraison',
                                                    'delivered' => 'Livrer',
                                                    'cancelled' => 'Annule'
                                                ][$order->status] ?? $order->status }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-end font-mono font-bold flex items-center justify-end gap-2">
                                            {{ number_format($order->total, 2) }} {{ __('DA') }}
                                            <x-lucide-chevron-right class="w-4 h-4 text-portal-muted opacity-0 group-hover:opacity-100 transition-opacity rtl:rotate-180" />
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bg-portal-sidebar border border-portal-border rounded-xl p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-display font-bold text-sm">{{ __('Audit Trail') }}</h3>
                        @can('admin')
                        <form action="{{ route('admin.logs.clear') }}" method="POST" onsubmit="return confirm('{{ __('Effacer tout l\'historique d\'activitÃ© ?') }}');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-[10px] font-bold text-red-500/50 hover:text-red-500 transition-colors uppercase tracking-widest px-2 py-1 rounded border border-red-500/20 hover:bg-red-500/10">
                                {{ __('Effacer') }}
                            </button>
                        </form>
                        @endcan
                    </div>
                    <div class="space-y-4 max-h-[400px] overflow-y-auto pr-2 custom-scrollbar">
                        @foreach($activity_logs as $log)
                            <div class="flex items-start gap-3 text-xs bg-white/5 p-3 rounded-lg border border-portal-border group hover:border-portal-accent/30 transition-colors">
                                <div class="p-1.5 rounded bg-portal-accent/10 text-portal-accent">
                                    @if($log->action === 'order_update' || $log->action === 'bulk_order_update')
                                        <x-lucide-shopping-cart class="w-3 h-3" />
                                    @elseif($log->action === 'user_role_update' || $log->action === 'user_deletion')
                                        <x-lucide-user class="w-3 h-3" />
                                    @else
                                        <x-lucide-activity class="w-3 h-3" />
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <div class="text-white font-semibold mb-1">{{ $log->description }}</div>
                                    <div class="flex items-center justify-between text-[10px] text-portal-muted">
                                        <span>{{ $log->user->first_name }} {{ $log->user->last_name }}</span>
                                        <span>{{ $log->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                        @if($activity_logs->isEmpty())
                            <div class="text-center py-8 text-portal-muted italic text-xs">
                                {{ __('Aucune activité récente enregistrée.') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Other tabs placeholders (to be expanded) -->
        <!-- Products Tab -->
        <div x-show="activeTab === 'products'" 
             x-transition:enter="transition ease-out duration-200" 
             x-transition:enter-start="opacity-0 translate-y-2" 
             x-transition:enter-end="opacity-100 translate-y-0" 
             x-cloak x-data="{
            categoryFilter: 'all',
            statusFilter: 'all',
            searchQuery: '',
            sortField: 'name',
            sortDirection: 'asc',
            currentPage: 1,
            itemsPerPage: 10,
            
            get filteredProducts() {
                let products = {{ Js::from($stat_products) }};
                
                // Filter by category
                if (this.categoryFilter !== 'all') {
                    products = products.filter(p => p.category_id == this.categoryFilter);
                }
                
                // Filter by status
                if (this.statusFilter !== 'all') {
                    products = products.filter(p => p.status === this.statusFilter);
                }
                
                // Filter by search query
                if (this.searchQuery.length > 0) {
                    const query = this.searchQuery.toLowerCase();
                    products = products.filter(p => 
                        p.name.toLowerCase().includes(query) ||
                        p.id.toString().includes(query) ||
                        (p.category && p.category.name_en.toLowerCase().includes(query))
                    );
                }

                // Sorting
                products.sort((a, b) => {
                    let valA = a[this.sortField];
                    let valB = b[this.sortField];
                    
                    if (this.sortField === 'price') {
                        valA = Number(valA);
                        valB = Number(valB);
                    } else if (typeof valA === 'string') {
                        valA = valA.toLowerCase();
                        valB = valB.toLowerCase();
                    }

                    if (valA < valB) return this.sortDirection === 'asc' ? -1 : 1;
                    if (valA > valB) return this.sortDirection === 'asc' ? 1 : -1;
                    return 0;
                });
                
                return products;
            },

            get paginatedProducts() {
                const start = (this.currentPage - 1) * this.itemsPerPage;
                const end = start + this.itemsPerPage;
                return this.filteredProducts.slice(start, end);
            },

            get totalPages() {
                return Math.ceil(this.filteredProducts.length / this.itemsPerPage) || 1;
            },

            nextPage() {
                if (this.currentPage < this.totalPages) this.currentPage++;
            },

            prevPage() {
                if (this.currentPage > 1) this.currentPage--;
            },
            
            goToPage(page) {
                this.currentPage = page;
            },

            sortBy(field) {
                if (this.sortField === field) {
                    this.sortDirection = this.sortDirection === 'asc' ? 'desc' : 'asc';
                } else {
                    this.sortField = field;
                    this.sortDirection = 'asc';
                }
            },
            
            // Watch filters to reset page
            init() {
                this.$watch('categoryFilter', () => this.currentPage = 1);
                this.$watch('statusFilter', () => this.currentPage = 1);
                this.$watch('searchQuery', () => this.currentPage = 1);
            }
        }">
            <div class="bg-portal-sidebar border border-portal-border rounded-xl flex flex-col">
                <div class="p-6 border-b border-portal-border">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="font-display font-bold text-lg">{{ __('Inventory Overview') }}</h2>
                        <div class="flex items-center gap-3">
                            <span class="text-xs font-bold text-portal-muted uppercase tracking-wider" x-text="filteredProducts.length + ' {{ __('Assets') }}'"></span>
                            @can('admin')
                            <a href="{{ route('admin.products.create') }}" class="bg-portal-accent text-black px-4 py-2 rounded-lg font-bold text-sm hover:bg-white transition-colors flex items-center gap-2">
                                <x-lucide-plus class="w-4 h-4" /> {{ __('Add Asset') }}
                            </a>
                            @endcan
                        </div>
                    </div>

                    <!-- Filter Bar -->
                    <div class="flex flex-wrap gap-3">
                        <!-- Category Filter -->
                        <select x-model="categoryFilter" class="bg-white/5 border border-portal-border text-white text-sm font-bold rounded-lg px-4 py-2 focus:ring-portal-accent focus:border-portal-accent">
                            <option value="all" class="bg-[#141415] text-white">{{ __('Toutes les catégories') }}</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" class="bg-[#141415] text-white">{{ $category->name_en }}</option>
                            @endforeach
                        </select>
                        
                        <!-- Status Filter -->
                        <select x-model="statusFilter" class="bg-white/5 border border-portal-border text-white text-sm font-bold rounded-lg px-4 py-2 focus:ring-portal-accent focus:border-portal-accent">
                            <option value="all" class="bg-[#141415] text-white">{{ __('Tous les statuts') }}</option>
                            <option value="active" class="bg-[#141415] text-white">{{ __('Actif') }}</option>
                            <option value="draft" class="bg-[#141415] text-white">{{ __('Brouillon') }}</option>
                            <option value="archived" class="bg-[#141415] text-white">{{ __('Archivé') }}</option>
                        </select>
                        
                        <!-- Search Input -->
                        <div class="flex-1 min-w-[200px]">
                            <div class="relative">
                                <x-lucide-search class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-portal-muted" />
                                <input 
                                    type="text" 
                                    x-model="searchQuery" 
                                    placeholder="{{ __('Rechercher produit, REF...') }}"
                                    class="w-full bg-white/5 border border-portal-border text-white placeholder-portal-muted text-sm rounded-lg pl-10 pr-4 py-2 focus:ring-portal-accent focus:border-portal-accent"
                                >
                            </div>
                        </div>
                        
                        <!-- Clear Filters -->
                        <button 
                            @click="categoryFilter = 'all'; statusFilter = 'all'; searchQuery = ''"
                            class="px-4 py-2 bg-white/5 border border-portal-border text-portal-muted hover:text-white hover:bg-white/10 rounded-lg text-sm font-bold transition-colors flex items-center gap-2"
                        >
                            <x-lucide-x class="w-4 h-4" /> {{ __('Réinitialiser') }}
                        </button>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-start whitespace-nowrap">
                        <thead class="bg-white/2 text-xs font-bold text-portal-muted uppercase tracking-wider">
                            <tr>
                                <th @click="sortBy('name')" class="px-6 py-4 text-start rounded-tl-xl cursor-pointer hover:text-white transition-colors group">
                                    <div class="flex items-center gap-1">
                                        {{ __('Produit') }}
                                        <x-lucide-arrow-up-down class="w-3 h-3 opacity-50 group-hover:opacity-100" />
                                    </div>
                                </th>
                                <th class="px-6 py-4 text-start">{{ __('Catégorie') }}</th>
                                <th class="px-6 py-4 text-start">{{ __('Spécifications') }}</th>
                                <th @click="sortBy('price')" class="px-6 py-4 text-start cursor-pointer hover:text-white transition-colors group">
                                    <div class="flex items-center gap-1">
                                        {{ __('Prix Unit.') }}
                                        <x-lucide-arrow-up-down class="w-3 h-3 opacity-50 group-hover:opacity-100" />
                                    </div>
                                </th>
                                <th class="px-6 py-4 text-start">{{ __('Statut') }}</th>
                                @can('admin')
                                <th class="px-6 py-4 text-end rounded-tr-xl">{{ __('Actions') }}</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-portal-border">
                            <template x-for="product in paginatedProducts" :key="product.id">
                                <tr class="hover:bg-white/5 transition-all duration-200 group">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-4">
                                            <div class="p-3 bg-white/5 rounded-xl text-portal-muted border border-portal-border group-hover:border-portal-accent/30 group-hover:text-portal-accent transition-colors">
                                                <x-lucide-package class="w-5 h-5" />
                                            </div>
                                            <div>
                                                <div class="font-bold text-sm text-white group-hover:text-portal-accent transition-colors" x-text="product.name"></div>
                                                <div class="text-[10px] uppercase tracking-wider font-bold text-portal-muted mt-0.5" x-text="'REF: ' + product.id"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-white/5 text-portal-muted border border-portal-border" x-text="product.category ? product.category.name_en : 'N/A'"></span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex flex-col gap-1">
                                            <div class="flex items-center gap-2 text-xs text-white">
                                                <x-lucide-weight class="w-3 h-3 text-portal-muted" />
                                                <span x-text="(product.weight_kg || '0') + 'kg'"></span>
                                            </div>
                                            <div class="flex items-center gap-2 text-xs text-white">
                                                <x-lucide-layers class="w-3 h-3 text-portal-muted" />
                                                <span x-text="(product.pieces_per_bundle || '0') + ' pcs/bundle'"></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="font-mono font-bold text-portal-accent text-sm bg-portal-accent/5 px-3 py-1.5 rounded-lg inline-block border border-portal-accent/10">
                                            <span x-text="Number(product.price).toFixed(2)"></span> <span class="text-xs ml-0.5">DA</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <template x-if="product.status === 'active'">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-500/10 text-emerald-500 border border-emerald-500/20">
                                                {{ __('Actif') }}
                                            </span>
                                        </template>
                                        <template x-if="product.status === 'draft'">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-yellow-500/10 text-yellow-500 border border-yellow-500/20">
                                                {{ __('Brouillon') }}
                                            </span>
                                        </template>
                                        <template x-if="product.status === 'archived'">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-white/5 text-portal-muted border border-portal-border">
                                                {{ __('Archivé') }}
                                            </span>
                                        </template>
                                    </td>
                                    @can('admin')
                                    <td class="px-6 py-4 text-end">
                                        <div class="flex justify-end gap-2 opacity-60 group-hover:opacity-100 transition-opacity">
                                            <a :href="'/admin/products/' + product.id + '/edit'" class="p-2 rounded-lg hover:bg-portal-accent hover:text-black text-portal-muted transition-all" title="{{ __('Modifier') }}">
                                                <x-lucide-edit-3 class="w-4 h-4" />
                                            </a>
                                            <form :action="'/admin/products/' + product.id" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to delete this asset?') }}');" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 rounded-lg hover:bg-rose-500 hover:text-white text-portal-muted transition-all" title="{{ __('Supprimer') }}">
                                                    <x-lucide-trash-2 class="w-4 h-4" />
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    @endcan
                                </tr>
                            </template>
                            
                            <!-- Empty State -->
                            <tr x-show="filteredProducts.length === 0">
                                <td colspan="6" class="px-6 py-12 text-center text-portal-muted italic">
                                    {{ __('Aucun produit trouvé.') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Controls -->
                <div class="px-6 py-4 border-t border-portal-border bg-white/5 flex items-center justify-between" x-show="totalPages > 1">
                    <span class="text-xs text-portal-muted font-mono">{{ __('Page') }} <span x-text="currentPage"></span> / <span x-text="totalPages"></span></span>
                    <div class="flex items-center gap-2">
                        <button @click="prevPage()" :disabled="currentPage === 1" class="p-2 rounded-lg border border-portal-border hover:bg-white/10 disabled:opacity-50 disabled:cursor-not-allowed text-white transition-colors">
                            <x-lucide-chevron-left class="w-4 h-4 rtl:rotate-180" />
                        </button>
                        <div class="flex items-center gap-1">
                            <template x-for="page in totalPages">
                                <button @click="goToPage(page)" 
                                    class="w-8 h-8 rounded-lg text-xs font-bold transition-colors"
                                    :class="currentPage === page ? 'bg-portal-accent text-black' : 'hover:bg-white/10 text-portal-muted hover:text-white'"
                                    x-text="page"
                                    x-show="page === 1 || page === totalPages || (page >= currentPage - 1 && page <= currentPage + 1)"
                                ></button>
                            </template>
                        </div>
                        <button @click="nextPage()" :disabled="currentPage === totalPages" class="p-2 rounded-lg border border-portal-border hover:bg-white/10 disabled:opacity-50 disabled:cursor-not-allowed text-white transition-colors">
                             <x-lucide-chevron-right class="w-4 h-4 rtl:rotate-180" />
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Orders Tab -->
        <div x-show="activeTab === 'orders'" 
             x-transition:enter="transition ease-out duration-200" 
             x-transition:enter-start="opacity-0 translate-y-2" 
             x-transition:enter-end="opacity-100 translate-y-0"
             x-cloak x-data="{
            statusFilter: 'all',
            dateFilter: 'all',
            searchQuery: '',
            selectedOrders: [],
            currentPage: 1,
            itemsPerPage: 10,
            
            get filteredOrders() {
                let orders = {{ Js::from($all_orders) }};
                
                // Filter by status
                if (this.statusFilter !== 'all') {
                    orders = orders.filter(order => order.status === this.statusFilter);
                }
                
                // Filter by date
                const now = new Date();
                if (this.dateFilter === 'today') {
                    orders = orders.filter(order => {
                        const orderDate = new Date(order.created_at);
                        return orderDate.toDateString() === now.toDateString();
                    });
                } else if (this.dateFilter === 'week') {
                    const weekAgo = new Date(now.getTime() - 7 * 24 * 60 * 60 * 1000);
                    orders = orders.filter(order => new Date(order.created_at) >= weekAgo);
                } else if (this.dateFilter === 'month') {
                    const monthAgo = new Date(now.getTime() - 30 * 24 * 60 * 60 * 1000);
                    orders = orders.filter(order => new Date(order.created_at) >= monthAgo);
                }
                
                // Filter by search query
                if (this.searchQuery.length > 0) {
                    const query = this.searchQuery.toLowerCase();
                    orders = orders.filter(order => 
                        order.order_number.toLowerCase().includes(query) ||
                        (order.user.first_name + ' ' + order.user.last_name).toLowerCase().includes(query) ||
                        (order.user.company && order.user.company.toLowerCase().includes(query))
                    );
                }
                
                return orders;
            },

            get paginatedOrders() {
                const start = (this.currentPage - 1) * this.itemsPerPage;
                const end = start + this.itemsPerPage;
                return this.filteredOrders.slice(start, end);
            },

            get totalPages() {
                return Math.ceil(this.filteredOrders.length / this.itemsPerPage);
            },

            nextPage() {
                if (this.currentPage < this.totalPages) this.currentPage++;
            },

            prevPage() {
                if (this.currentPage > 1) this.currentPage--;
            },
            
            goToPage(page) {
                this.currentPage = page;
            },

            get allSelected() {
                return this.paginatedOrders.length > 0 && this.selectedOrders.length === this.paginatedOrders.length; // Only check visible page
            },
            
            toggleAll() {
                if (this.allSelected) {
                    this.selectedOrders = [];
                } else {
                    this.selectedOrders = this.paginatedOrders.map(o => o.id);
                }
            },
            
            // Watch filters to reset page
            init() {
                this.$watch('statusFilter', () => this.currentPage = 1);
                this.$watch('dateFilter', () => this.currentPage = 1);
                this.$watch('searchQuery', () => this.currentPage = 1);
            }
        }">
             <div class="bg-portal-sidebar border border-portal-border rounded-xl flex flex-col relative">
                <!-- Floating Bulk Action Bar -->
                @can('admin')
                <div x-show="selectedOrders.length > 0" 
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-10"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 translate-y-10"
                    class="fixed bottom-8 left-1/2 -translate-x-1/2 z-50 bg-white text-black px-6 py-4 rounded-2xl shadow-[0_20px_50px_rgba(0,0,0,0.5)] flex items-center gap-6 border border-white/20">
                    <div class="flex flex-col">
                        <span class="text-xs font-black uppercase tracking-widest text-black/50">{{ __('Multi-Sélection') }}</span>
                        <span class="text-xl font-black"><span x-text="selectedOrders.length"></span> {{ __('Commandes') }}</span>
                    </div>
                    <div class="h-10 w-[1px] bg-black/10 mx-2"></div>

                    <form action="{{ route('admin.orders.bulkUpdate') }}" method="POST" class="flex items-center gap-3">
                        @csrf
                        @method('PATCH')
                        <template x-for="id in selectedOrders">
                            <input type="hidden" name="order_ids[]" :value="id">
                        </template>
                        
                        <select name="status" class="bg-black border border-white/20 text-white text-xs font-bold uppercase rounded-xl px-4 py-2 focus:ring-portal-accent focus:border-portal-accent outline-none">
                            <option value="pending">{{ __('Set Pending') }}</option>
                            <option value="confirmed">{{ __('Confirmer') }}</option>
                            <option value="in_delivery">{{ __('En Livraison') }}</option>
                            <option value="delivered">{{ __('Livrer') }}</option>
                        </select>
                        
                        <button type="submit" class="bg-black text-white px-6 py-2 rounded-xl font-bold hover:bg-black/80 transition-colors shadow-lg">
                            {{ __('Appliquer Actions') }}
                        </button>
                    </form>

                    <button @click="selectedOrders = []" class="p-2 hover:bg-black/5 rounded-full transition-colors">
                        <x-lucide-x class="w-6 h-6" />
                    </button>
                </div>
                @endcan

                <div class="p-6 border-b border-portal-border">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="font-display font-bold text-lg">{{ __('Master Transaction Ledger') }}</h2>
                        <div class="flex items-center gap-3">
                            <span class="text-xs font-bold text-portal-muted uppercase tracking-wider" x-text="filteredOrders.length + ' {{ __('Records') }}'"></span>
                            @can('admin')
                            <a href="{{ route('admin.orders.create') }}" class="flex items-center gap-2 px-4 py-2 border border-portal-accent text-portal-accent rounded-lg text-sm font-bold hover:bg-portal-accent hover:text-black transition-colors">
                                <x-lucide-plus class="w-4 h-4" /> {{ __('Créer Commande') }}
                            </a>
                            @endcan
                            <a href="{{ route('admin.orders.export') }}" class="flex items-center gap-2 px-4 py-2 bg-portal-accent text-black rounded-lg text-sm font-bold hover:bg-white transition-colors">
                                <x-lucide-download class="w-4 h-4" /> {{ __('Export CSV') }}
                            </a>
                        </div>
                    </div>
                    
                    <!-- Filter Bar -->
                    <div class="flex flex-wrap gap-3">
                        <!-- Status Filter -->
                        <select x-model="statusFilter" class="bg-white/5 border border-portal-border text-white text-sm font-bold rounded-lg px-4 py-2 focus:ring-portal-accent focus:border-portal-accent">
                            <option value="all" class="bg-[#141415] text-white">{{ __('Tous les statuts') }}</option>
                            <option value="pending" class="bg-[#141415] text-white">{{ __('En attente') }}</option>
                            <option value="confirmed" class="bg-[#141415] text-white">{{ __('Confirmer') }}</option>
                            <option value="in_delivery" class="bg-[#141415] text-white">{{ __('En Livraison') }}</option>
                            <option value="delivered" class="bg-[#141415] text-white">{{ __('Livrer') }}</option>
                        </select>
                        
                        <!-- Date Filter -->
                        <select x-model="dateFilter" class="bg-white/5 border border-portal-border text-white text-sm font-bold rounded-lg px-4 py-2 focus:ring-portal-accent focus:border-portal-accent">
                            <option value="all" class="bg-[#141415] text-white">{{ __('Toutes les dates') }}</option>
                            <option value="today" class="bg-[#141415] text-white">{{ __('Aujourd\'hui') }}</option>
                            <option value="week" class="bg-[#141415] text-white">{{ __('Cette semaine') }}</option>
                            <option value="month" class="bg-[#141415] text-white">{{ __('Ce mois') }}</option>
                        </select>
                        
                        <!-- Search Input -->
                        <div class="flex-1 min-w-[200px]">
                            <input 
                                type="text" 
                                x-model="searchQuery" 
                                placeholder="{{ __('Rechercher client, commande...') }}"
                                class="w-full bg-white/5 border border-portal-border text-white placeholder-portal-muted text-sm rounded-lg px-4 py-2 focus:ring-portal-accent focus:border-portal-accent"
                            >
                        </div>
                        
                        <!-- Clear Filters -->
                        <button 
                            @click="statusFilter = 'all'; dateFilter = 'all'; searchQuery = ''"
                            class="px-4 py-2 bg-white/5 border border-portal-border text-portal-muted hover:text-white hover:bg-white/10 rounded-lg text-sm font-bold transition-colors flex items-center gap-2"
                        >
                            <x-lucide-x class="w-4 h-4" /> {{ __('Réinitialiser') }}
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-start">
                        <thead class="bg-white/2 text-xs font-bold text-portal-muted uppercase tracking-wider">
                            <tr>
                                @can('admin')
                                <th class="px-6 py-4 text-start">
                                    <input type="checkbox" @change="toggleAll()" :checked="allSelected" class="rounded border-portal-border bg-white/10 text-portal-accent focus:ring-portal-accent">
                                </th>
                                @endcan
                                <th class="px-6 py-4 text-start">{{ __('N° Commande') }}</th>
                                <th class="px-6 py-4 text-start">{{ __('Client / Entreprise') }}</th>

                                <th class="px-6 py-4 text-start">{{ __('Livraison') }}</th>
                                <th class="px-6 py-4 text-start">{{ __('Date') }}</th>
                                <th class="px-6 py-4 text-center">{{ __('Statut Logistique') }}</th>
                                <th class="px-6 py-4 text-end">{{ __('Montant Total') }}</th>
                                @can('admin')
                                <th class="px-6 py-4 text-end">{{ __('Actions') }}</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-portal-border">
                            <template x-for="order in paginatedOrders" :key="order.id">
                                <tr class="hover:bg-white/5 transition-all group relative" :class="{'bg-portal-accent/5': selectedOrders.includes(order.id)}">
                                    @can('admin')
                                    <td class="px-6 py-4">
                                        <input type="checkbox" :value="order.id" x-model="selectedOrders" class="rounded border-portal-border bg-white/10 text-portal-accent focus:ring-portal-accent">
                                    </td>
                                    @endcan
                                    <td class="px-4 md:px-6 py-4 font-mono text-portal-accent font-medium cursor-pointer" @click="window.location=`/orders/${order.id}`">
                                        <div class="flex items-center gap-2">
                                            <span x-text="'#PO-' + order.order_number"></span>
                                            <x-lucide-external-link class="w-3 h-3 text-portal-muted opacity-0 group-hover:opacity-100 transition-opacity" />
                                        </div>
                                    </td>
                                    <td class="px-4 md:px-6 py-4 cursor-pointer" @click="window.location=`/orders/${order.id}`">
                                        <div class="font-bold text-sm text-white" x-text="order.user.first_name + ' ' + order.user.last_name"></div>
                                        <div class="text-xs text-portal-muted" x-text="order.user.company || '{{ __('Contractor') }}'"></div>
                                    </td>

                                    <td class="px-4 md:px-6 py-4 text-sm text-portal-accent font-bold cursor-pointer" @click="window.location=`/orders/${order.id}`">
                                        <span x-text="order.requested_delivery_date ? new Date(order.requested_delivery_date).toLocaleDateString('fr-FR', {month: 'short', day: 'numeric'}) : '-'"></span>
                                    </td>
                                    <td class="px-4 md:px-6 py-4 text-sm text-portal-muted cursor-pointer" @click="window.location=`/orders/${order.id}`">
                                        <span x-text="new Date(order.created_at).toLocaleDateString('fr-FR', {month: 'short', day: 'numeric', year: 'numeric'})"></span>
                                    </td>
                                    <td class="px-4 md:px-6 py-4 text-center" @click.stop>
                                        <div class="flex gap-2 justify-center items-center">
                                            @can('admin')
                                                <template x-if="order.status === 'pending'">
                                                    <form :action="`/admin/orders/${order.id}/status`" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="status" value="confirmed">
                                                        <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-blue-500/10 text-blue-500 border border-blue-500/20 text-[0.65rem] font-bold uppercase tracking-wider hover:bg-blue-500 hover:text-white transition-all shadow-sm" title="Approve & Process">
                                                            <x-lucide-play class="w-3 h-3" /> {{ __('Confirmer') }}
                                                        </button>
                                                    </form>
                                                </template>
                                                <template x-if="order.status === 'confirmed'">
                                                    <form :action="`/admin/orders/${order.id}/status`" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="status" value="in_delivery">
                                                        <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-indigo-500/10 text-indigo-400 border border-indigo-500/20 text-[0.65rem] font-bold uppercase tracking-wider hover:bg-indigo-500 hover:text-white transition-all shadow-sm" title="Set In Delivery">
                                                            <x-lucide-truck class="w-3 h-3" /> {{ __('En Livraison') }}
                                                        </button>
                                                    </form>
                                                </template>
                                                <template x-if="order.status === 'in_delivery'">
                                                    <form :action="`/admin/orders/${order.id}/status`" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="status" value="delivered">
                                                        <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-green-500/10 text-green-500 border border-green-500/20 text-[0.65rem] font-bold uppercase tracking-wider hover:bg-green-500 hover:text-white transition-all shadow-sm" title="Mark as Delivered">
                                                            <x-lucide-check-circle class="w-3 h-3" /> {{ __('Livrer') }}
                                                        </button>
                                                    </form>
                                                </template>
                                                <template x-if="order.status === 'delivered' || order.status === 'cancelled'">
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[0.65rem] font-bold uppercase tracking-wider"
                                                        :class="{
                                                            'bg-green-500/10 text-green-500': order.status === 'delivered',
                                                            'bg-red-500/10 text-red-500': order.status === 'cancelled'
                                                        }"
                                                        x-text="{
                                                            pending: 'En attente',
                                                            confirmed: 'Confirmer',
                                                            in_delivery: 'En livraison',
                                                            delivered: 'Livrer',
                                                            cancelled: 'Annulé'
                                                        }[order.status] ?? order.status">
                                                    </span>
                                                </template>

                                            @else
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[0.65rem] font-bold uppercase tracking-wider"
                                                    :class="{
                                                        'bg-amber-500/10 text-amber-500': order.status === 'pending',
                                                        'bg-blue-500/10 text-blue-500': order.status === 'confirmed',
                                                        'bg-indigo-500/10 text-indigo-400': order.status === 'in_delivery',
                                                        'bg-green-500/10 text-green-500': order.status === 'delivered',
                                                        'bg-red-500/10 text-red-500': order.status === 'cancelled'
                                                    }"
                                                    x-text="{
                                                        pending: 'En attente',
                                                        confirmed: 'Confirmer',
                                                        in_delivery: 'En livraison',
                                                        delivered: 'Livrer',
                                                        cancelled: 'Annulé'
                                                    }[order.status] ?? order.status">
                                                </span>
                                            @endcan
                                        </div>
                                    </td>
                                    <td class="px-4 md:px-6 py-4 text-end font-mono font-bold cursor-pointer" @click="window.location=`/orders/${order.id}`">
                                        <span x-text="Number(order.total).toFixed(2) + ' {{ __('DA') }}'"></span>
                                    </td>
                                    <td class="px-4 md:px-6 py-4 text-end" @click.stop>
                                        <div class="flex items-center justify-end gap-1">
                                            @can('admin')
                                            <a :href="`/admin/orders/${order.id}/edit`" class="p-2.5 md:p-2 hover:bg-white/10 rounded-lg text-portal-muted hover:text-white transition-colors inline-flex items-center justify-center min-h-[44px] min-w-[44px] md:min-h-0 md:min-w-0" title="{{ __('Modifier') }}">
                                                <x-lucide-edit-2 class="w-5 h-5 md:w-4 md:h-4" />
                                            </a>
                                            @endcan
                                            <a :href="`/orders/${order.id}`" class="p-2.5 md:p-2 hover:bg-white/10 rounded-lg text-portal-muted hover:text-white transition-colors inline-flex items-center justify-center min-h-[44px] min-w-[44px] md:min-h-0 md:min-w-0" title="{{ __('Inspect Documentation') }}">
                                                <x-lucide-eye class="w-5 h-5 md:w-4 md:h-4" />
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Controls -->
                <div class="px-6 py-4 border-t border-portal-border bg-white/5 flex items-center justify-between" x-show="totalPages > 1">
                    <span class="text-xs text-portal-muted font-mono">{{ __('Page') }} <span x-text="currentPage"></span> / <span x-text="totalPages"></span></span>
                    <div class="flex items-center gap-2">
                        <button @click="prevPage()" :disabled="currentPage === 1" class="p-2 rounded-lg border border-portal-border hover:bg-white/10 disabled:opacity-50 disabled:cursor-not-allowed text-white transition-colors">
                            <x-lucide-chevron-left class="w-4 h-4 rtl:rotate-180" />
                        </button>
                        <div class="flex items-center gap-1">
                            <template x-for="page in totalPages">
                                <button @click="goToPage(page)" 
                                    class="w-8 h-8 rounded-lg text-xs font-bold transition-colors"
                                    :class="currentPage === page ? 'bg-portal-accent text-black' : 'hover:bg-white/10 text-portal-muted hover:text-white'"
                                    x-text="page"
                                    x-show="page === 1 || page === totalPages || (page >= currentPage - 1 && page <= currentPage + 1)"
                                ></button>
                            </template>
                        </div>
                        <button @click="nextPage()" :disabled="currentPage === totalPages" class="p-2 rounded-lg border border-portal-border hover:bg-white/10 disabled:opacity-50 disabled:cursor-not-allowed text-white transition-colors">
                             <x-lucide-chevron-right class="w-4 h-4 rtl:rotate-180" />
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Users Tab -->
        <div x-show="activeTab === 'users'" 
             x-transition:enter="transition ease-out duration-200" 
             x-transition:enter-start="opacity-0 translate-y-2" 
             x-transition:enter-end="opacity-100 translate-y-0"
             x-cloak>
             <div class="bg-portal-sidebar border border-portal-border rounded-xl flex flex-col">
                <div class="p-6 border-b border-portal-border flex items-center justify-between">
                    <h2 class="font-display font-bold text-lg">{{ __('Stakeholder Directory') }}</h2>
                    <span class="text-xs font-bold text-portal-muted uppercase tracking-wider">{{ $users->count() }} {{ __('Authenticated Accounts') }}</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-start whitespace-nowrap">
                        <thead class="bg-white/2 text-xs font-bold text-portal-muted uppercase tracking-wider">
                            <tr>
                                <th class="px-6 py-4 text-start">{{ __('Identité') }}</th>
                                <th class="px-6 py-4 text-start">{{ __('Entreprise') }}</th>
                                <th class="px-6 py-4 text-start">{{ __('Email') }}</th>
                                <th class="px-6 py-4 text-start">{{ __('Rôle / Privilèges') }}</th>
                                <th class="px-6 py-4 text-end">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-portal-border">
                            @foreach($users as $user)
                                <tr class="hover:bg-white/5 transition-colors group">
                                    <td class="px-4 md:px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-lg bg-portal-accent/20 border border-portal-accent/30 flex items-center justify-center font-bold text-portal-accent text-xs">
                                                {{ substr($user->first_name, 0, 1) }}
                                            </div>
                                            <div class="font-bold text-sm text-white">{{ $user->first_name }} {{ $user->last_name }}</div>
                                        </div>
                                    </td>
                                    <td class="px-4 md:px-6 py-4 text-sm text-portal-muted">{{ $user->company ?? __('Private Contractor') }}</td>
                                    <td class="px-4 md:px-6 py-4 text-sm font-mono text-portal-muted">{{ $user->email }}</td>
                                    <td class="px-4 md:px-6 py-4">
                                         <form action="{{ route('admin.users.updateRole', $user) }}" method="POST" class="flex gap-2 items-center">
                                            @csrf
                                            @method('PATCH')
                                             <select name="role" class="bg-white/5 border border-portal-border text-xs font-bold uppercase rounded-lg px-3 py-2 cursor-pointer focus:ring-portal-accent focus:border-portal-accent min-h-[44px] md:min-h-0
                                                {{ $user->role === 'admin' ? 'text-portal-accent' : ($user->role === 'agent' ? 'text-amber-500' : 'text-blue-500') }}
                                             ">
                                                <option value="client" {{ $user->role == 'client' ? 'selected' : '' }}>{{ __('Client') }}</option>
                                                <option value="agent" {{ $user->role == 'agent' ? 'selected' : '' }}>{{ __('Agent') }}</option>
                                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>{{ __('Administrateur') }}</option>
                                             </select>
                                            <button type="submit" class="p-2.5 md:p-1 hover:bg-white/10 rounded text-portal-accent transition-colors min-h-[44px] min-w-[44px] md:min-h-0 md:min-w-0 flex items-center justify-center">
                                                <x-lucide-check class="w-5 h-5 md:w-4 md:h-4" />
                                            </button>
                                        </form>
                                    </td>
                                    <td class="px-4 md:px-6 py-4 text-end">
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to revoke access for this user?') }}');" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2.5 md:p-2 hover:bg-red-500/10 rounded-lg text-portal-muted hover:text-red-500 transition-colors min-h-[44px] min-w-[44px] md:min-h-0 md:min-w-0 inline-flex items-center justify-center" title="{{ __('Revoke Access') }}">
                                                <x-lucide-user-cog class="w-5 h-5 md:w-4 md:h-4" />
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



