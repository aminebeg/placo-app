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
        <div class="flex gap-2 mb-6 overflow-x-auto pb-2">
            <a href="?tab=overview" @click.prevent="activeTab = 'overview'" 
               class="px-4 py-2 rounded-lg text-sm font-bold transition-colors flex items-center gap-2"
               :class="activeTab === 'overview' ? 'bg-portal-accent text-black' : 'bg-white/5 text-portal-muted hover:text-white hover:bg-white/10'">
                <x-lucide-home class="w-4 h-4" /> {{ __('Vue d\'ensemble') }}
            </a>
            <a href="?tab=orders" @click.prevent="activeTab = 'orders'" 
               class="px-4 py-2 rounded-lg text-sm font-bold transition-colors flex items-center gap-2"
               :class="activeTab === 'orders' ? 'bg-portal-accent text-black' : 'bg-white/5 text-portal-muted hover:text-white hover:bg-white/10'">
                <x-lucide-shopping-cart class="w-4 h-4" /> {{ __('Commandes') }}
            </a>
            <a href="?tab=products" @click.prevent="activeTab = 'products'" 
               class="px-4 py-2 rounded-lg text-sm font-bold transition-colors flex items-center gap-2"
               :class="activeTab === 'products' ? 'bg-portal-accent text-black' : 'bg-white/5 text-portal-muted hover:text-white hover:bg-white/10'">
                <x-lucide-package class="w-4 h-4" /> {{ __('Produits') }}
            </a>
            @can('admin')
            <a href="?tab=users" @click.prevent="activeTab = 'users'" 
               class="px-4 py-2 rounded-lg text-sm font-bold transition-colors flex items-center gap-2"
               :class="activeTab === 'users' ? 'bg-portal-accent text-black' : 'bg-white/5 text-portal-muted hover:text-white hover:bg-white/10'">
                <x-lucide-users class="w-4 h-4" /> {{ __('Utilisateurs') }}
            </a>
            @endcan
        </div>


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
                return this.paginatedOrders.length > 0 && this.selectedOrders.length === this.paginatedOrders.length;
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
                            <option value="in_delivery" class="bg-[#141415] text-white">{{ __('En Livraison                            <option value') }}</option>
="delivered" class="bg-[#141415] text-white">{{ __('Livrer') }}</option>
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
                                    <td class="px-4 md:px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-full bg-white/5 flex items-center justify-center text-xs font-bold text-portal-muted" x-text="order.user.first_name.charAt(0) + order.user.last_name.charAt(0)"></div>
                                            <div>
                                                <div class="font-bold text-white text-sm" x-text="order.user.first_name + ' ' + order.user.last_name"></div>
                                                <div class="text-[10px] uppercase tracking-wider font-bold text-portal-muted" x-text="order.user.company || ''"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 md:px-6 py-4">
                                        <div class="text-xs font-medium text-portal-muted" x-text="order.logistics_type || 'N/A'"></div>
                                        <div class="text-xs text-portal-muted" x-text="order.requested_delivery_date ? new Date(order.requested_delivery_date).toLocaleDateString() : 'N/A'"></div>
                                    </td>
                                    <td class="px-4 md:px-6 py-4 text-xs text-portal-muted">
                                        <div x-text="new Date(order.created_at).toLocaleDateString()"></div>
                                        <div class="font-mono opacity-60" x-text="new Date(order.created_at).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})"></div>
                                    </td>
                                    <td class="px-4 md:px-6 py-4 text-center">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider
                                            " :class="{
                                            'bg-amber-500/10 text-amber-500 border border-amber-500/20': order.status === 'pending',
                                            'bg-blue-500/10 text-blue-500 border border-blue-500/20': order.status === 'confirmed',
                                            'bg-indigo-500/10 text-indigo-400 border border-indigo-500/20': order.status === 'in_delivery',
                                            'bg-emerald-500/10 text-emerald-500 border border-emerald-500/20': order.status === 'delivered',
                                            'bg-rose-500/10 text-rose-500 border border-rose-500/20': order.status === 'cancelled'
                                        }" x-text="{
                                            'pending': '{{ __('En attente') }}',
                                            'confirmed': '{{ __('Confirmer') }}',
                                            'in_delivery': '{{ __('En Livraison') }}',
                                            'delivered': '{{ __('Livrer') }}',
                                            'cancelled': '{{ __('Annule') }}'
                                        }[order.status] || order.status">
                                        </span>
                                    </td>
                                    <td class="px-4 md:px-6 py-4 text-end">
                                        <div class="font-mono font-bold text-white">
                                            <span x-text="Number(order.total).toLocaleString()"></span> <span class="text-xs text-portal-muted">DA</span>
                                        </div>
                                        <div class="text-[10px] text-portal-muted font-medium uppercase tracking-wider mt-1" x-text="order.items.length + ' {{ __('Articles') }}'"></div>
                                    </td>
                                    @can('admin')
                                    <td class="px-4 md:px-6 py-4 text-end relative">
                                        <div class="flex justify-end gap-1 opacity-0 group-hover:opacity-100 transition-all" x-show="!selectedOrders.includes(order.id)">
                                            <button @click.stop="selectedOrders.push(order.id)" class="p-2 hover:bg-white/10 rounded text-portal-muted hover:text-white transition-colors" title="{{ __('Sélectionner') }}">
                                                <x-lucide-check class="w-4 h-4" />
                                            </button>
                                        </div>
                                        <div class="flex justify-end gap-1" x-show="selectedOrders.includes(order.id)">
                                            <button @click.stop="selectedOrders = selectedOrders.filter(id => id !== order.id)" class="p-2 bg-portal-accent text-black rounded transition-colors" title="{{ __('Sélectionné') }}">
                                                <x-lucide-check class="w-4 h-4" />
                                            </button>
                                        </div>
                                    </td>
                                    @endcan
                                </tr>
                            </template>
                            
                            <!-- Empty State -->
                            <tr x-show="paginatedOrders.length === 0">
                                <td colspan="8" class="px-6 py-12 text-center text-portal-muted italic">
                                    {{ __('Aucune commande trouvée.') }}
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

        <!-- Users Tab -->
        <div x-show="activeTab === 'users'" 
             x-transition:enter="transition ease-out duration-200" 
             x-transition:enter-start="opacity-0 translate-y-2" 
             x-transition:enter-end="opacity-100 translate-y-0"
             x-cloak x-data="{
            roleFilter: 'all',
            searchQuery: '',
            currentPage: 1,
            itemsPerPage: 10,
            
            get filteredUsers() {
                let users = {{ Js::from($users) }};
                
                // Filter by role
                if (this.roleFilter !== 'all') {
                    users = users.filter(user => user.role === this.roleFilter);
                }
                
                // Filter by search query
                if (this.searchQuery.length > 0) {
                    const query = this.searchQuery.toLowerCase();
                    users = users.filter(user => 
                        (user.first_name && user.first_name.toLowerCase().includes(query)) ||
                        (user.last_name && user.last_name.toLowerCase().includes(query)) ||
                        (user.email && user.email.toLowerCase().includes(query)) ||
                        (user.company && user.company.toLowerCase().includes(query)) ||
                        (user.phone && user.phone.includes(query))
                    );
                }
                
                return users;
            },

            get paginatedUsers() {
                const start = (this.currentPage - 1) * this.itemsPerPage;
                const end = start + this.itemsPerPage;
                return this.filteredUsers.slice(start, end);
            },

            get totalPages() {
                return Math.ceil(this.filteredUsers.length / this.itemsPerPage) || 1;
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
            
            init() {
                this.$watch('roleFilter', () => this.currentPage = 1);
                this.$watch('searchQuery', () => this.currentPage = 1);
            }
        }">
             <div class="bg-portal-sidebar border border-portal-border rounded-xl flex flex-col">
                <div class="p-6 border-b border-portal-border">
                    <div class="flex flex-wrap items-center justify-between gap-4 mb-4">
                        <h2 class="font-display font-bold text-lg">{{ __('Stakeholder Directory') }}</h2>
                        <span class="text-xs font-bold text-portal-muted uppercase tracking-wider" x-text="filteredUsers.length + ' {{ __('Accounts') }}'"></span>
                    </div>
                    
                    <!-- Filter Bar -->
                    <div class="flex flex-wrap gap-3">
                        <!-- Role Filter -->
                        <select x-model="roleFilter" class="bg-white/5 border border-portal-border text-white text-sm font-bold rounded-lg px-4 py-2 focus:ring-portal-accent focus:border-portal-accent">
                            <option value="all" class="bg-[#141415] text-white">{{ __('Tous les rôles') }}</option>
                            <option value="admin" class="bg-[#141415] text-white">{{ __('Administrateur') }}</option>
                            <option value="agent" class="bg-[#141415] text-white">{{ __('Agent') }}</option>
                            <option value="client" class="bg-[#141415] text-white">{{ __('Client') }}</option>
                        </select>
                        
                        <!-- Search Input -->
                        <div class="flex-1 min-w-[200px]">
                            <div class="relative">
                                <x-lucide-search class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-portal-muted" />
                                <input 
                                    type="text" 
                                    x-model="searchQuery" 
                                    placeholder="{{ __('Rechercher par nom, email, entreprise...') }}"
                                    class="w-full bg-white/5 border border-portal-border text-white placeholder-portal-muted text-sm rounded-lg pl-10 pr-4 py-2 focus:ring-portal-accent focus:border-portal-accent"
                                >
                            </div>
                        </div>
                        
                        <!-- Clear Filters -->
                        <button 
                            @click="roleFilter = 'all'; searchQuery = ''"
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
                                <th class="px-6 py-4 text-start">{{ __('Identité') }}</th>
                                <th class="px-6 py-4 text-start">{{ __('Entreprise') }}</th>
                                <th class="px-6 py-4 text-start">{{ __('Email') }}</th>
                                <th class="px-6 py-4 text-start">{{ __('Téléphone') }}</th>
                                <th class="px-6 py-4 text-start">{{ __('Rôle') }}</th>
                                <th class="px-6 py-4 text-end">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-portal-border">
                            <template x-for="user in paginatedUsers" :key="user.id">
                                <tr class="hover:bg-white/5 transition-colors group">
                                    <td class="px-4 md:px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-lg bg-portal-accent/20 border border-portal-accent/30 flex items-center justify-center font-bold text-portal-accent text-xs">
                                                <span x-text="user.first_name ? user.first_name.charAt(0) : '?'"></span>
                                            </div>
                                            <div class="font-bold text-sm text-white">
                                                <span x-text="user.first_name + ' ' + user.last_name"></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 md:px-6 py-4 text-sm text-portal-muted" x-text="user.company || '{{ __('Private Contractor') }}'"></td>
                                    <td class="px-4 md:px-6 py-4 text-sm font-mono text-portal-muted" x-text="user.email"></td>
                                    <td class="px-4 md:px-6 py-4 text-sm font-mono text-portal-muted" x-text="user.phone || 'N/A'"></td>
                                    <td class="px-4 md:px-6 py-4">
                                         <form :action="'/admin/users/' + user.id + '/role'" method="POST" class="flex gap-2 items-center">
                                            @csrf
                                            @method('PATCH')
                                             <input type="hidden" name="role" :value="user.role">
                                             <select x-model="user.role" class="bg-white/5 border border-portal-border text-xs font-bold uppercase rounded-lg px-3 py-2 cursor-pointer focus:ring-portal-accent focus:border-portal-accent"
                                                 :class="user.role === 'admin' ? 'text-portal-accent' : (user.role === 'agent' ? 'text-amber-500' : 'text-blue-500')"
                                             >
                                                 <option value="client">{{ __('Client') }}</option>
                                                 <option value="agent">{{ __('Agent') }}</option>
                                                 <option value="admin">{{ __('Administrateur') }}</option>
                                             </select>
                                            <button type="submit" class="p-2.5 hover:bg-white/10 rounded text-portal-accent transition-colors">
                                                <x-lucide-check class="w-5 h-5" />
                                            </button>
                                         </form>
                                    </td>
                                    <td class="px-4 md:px-6 py-4 text-end">
                                        <form :action="'/admin/users/' + user.id" method="POST" onsubmit="return confirm('{{ __('Are you sure?') }}');" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2.5 hover:bg-red-500/10 rounded-lg text-portal-muted hover:text-red-500 transition-colors" title="{{ __('Supprimer') }}">
                                                <x-lucide-user-cog class="w-5 h-5" />
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </template>
                            
                            <!-- Empty State -->
                            <tr x-show="paginatedUsers.length === 0">
                                <td colspan="6" class="px-6 py-12 text-center text-portal-muted italic">
                                    {{ __('Aucun utilisateur trouvé.') }}
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
    </div>
</x-app-layout>
