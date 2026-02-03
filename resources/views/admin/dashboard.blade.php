<x-app-layout>
    <x-slot name="header">
        <span class="inline-block bg-portal-accent text-black px-2.5 py-1 rounded-md text-[0.7rem] font-extrabold uppercase tracking-wider mb-2">{{ __('System Administration') }}</span>
        <h1 class="text-4xl font-extrabold tracking-tight mb-2">{{ __('Command Center') }}</h1>
        <p class="text-portal-muted text-lg">{{ __('Central Intelligence & Administrative Controls') }}</p>
    </x-slot>

    <div x-data="{ activeTab: 'overview' }">
        <!-- Tab Navigation -->
        <div class="flex gap-2 bg-white/2 p-1.5 rounded-xl border border-portal-border w-fit mb-8">
            <button @click="activeTab = 'overview'" :class="{ 'bg-portal-accent/10 text-portal-accent shadow-lg': activeTab === 'overview', 'text-portal-muted hover:bg-white/5 hover:text-white': activeTab !== 'overview' }" class="flex items-center gap-2.5 px-5 py-2.5 rounded-lg text-sm font-bold transition-all duration-300">
                <x-lucide-bar-chart-3 class="w-4 h-4" />
                {{ __('Overview') }}
            </button>
            <button @click="activeTab = 'products'" :class="{ 'bg-portal-accent/10 text-portal-accent shadow-lg': activeTab === 'products', 'text-portal-muted hover:bg-white/5 hover:text-white': activeTab !== 'products' }" class="flex items-center gap-2.5 px-5 py-2.5 rounded-lg text-sm font-bold transition-all duration-300">
                <x-lucide-package class="w-4 h-4" />
                {{ __('Inventory') }}
            </button>
            <button @click="activeTab = 'orders'" :class="{ 'bg-portal-accent/10 text-portal-accent shadow-lg': activeTab === 'orders', 'text-portal-muted hover:bg-white/5 hover:text-white': activeTab !== 'orders' }" class="flex items-center gap-2.5 px-5 py-2.5 rounded-lg text-sm font-bold transition-all duration-300">
                <x-lucide-trending-up class="w-4 h-4" />
                {{ __('Transactions') }}
            </button>
            <button @click="activeTab = 'users'" :class="{ 'bg-portal-accent/10 text-portal-accent shadow-lg': activeTab === 'users', 'text-portal-muted hover:bg-white/5 hover:text-white': activeTab !== 'users' }" class="flex items-center gap-2.5 px-5 py-2.5 rounded-lg text-sm font-bold transition-all duration-300">
                <x-lucide-users class="w-4 h-4" />
                {{ __('Directory') }}
            </button>
        </div>

        <!-- Overview Tab -->
        <div x-show="activeTab === 'overview'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-8">
            
            <!-- KPI Grid -->
            <div class="grid grid-cols-4 gap-6">
                <div class="bg-portal-sidebar border border-portal-border rounded-xl p-6 relative overflow-hidden group hover:border-portal-accent/50 transition-colors">
                    <div class="absolute top-0 end-0 p-6 opacity-10 group-hover:opacity-20 transition-opacity">
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
                        <div class="text-xs font-medium text-green-500 mt-2 flex items-center gap-1">
                            <x-lucide-arrow-up-right class="w-3 h-3 rtl:rotate-180" /> {{ __('Portfolio Valuation') }}
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

                <div class="bg-portal-sidebar border border-portal-border rounded-xl p-6 relative overflow-hidden group hover:border-portal-accent/50 transition-colors">
                    <div class="absolute top-0 end-0 p-6 opacity-10 group-hover:opacity-20 transition-opacity">
                        <x-lucide-alert-triangle class="w-16 h-16 text-red-500" />
                    </div>
                    <div class="flex items-center gap-4 mb-4">
                        <div class="p-3 rounded-lg bg-red-500/10 text-red-500">
                            <x-lucide-alert-triangle class="w-6 h-6" />
                        </div>
                    </div>
                    <div>
                        <div class="text-xs font-bold text-portal-muted uppercase tracking-wider mb-1">{{ __('Critical Inventory') }}</div>
                        <div class="text-2xl font-mono font-bold text-white">{{ $stats['low_stock'] }}</div>
                        <div class="text-xs font-medium text-red-500 mt-2 flex items-center gap-1">
                            <x-lucide-arrow-down class="w-3 h-3" /> {{ __('Replenishment Req.') }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity Block -->
            <div class="grid grid-cols-3 gap-8">
                <div class="col-span-2 bg-portal-sidebar border border-portal-border rounded-xl flex flex-col">
                    <div class="p-6 border-b border-portal-border flex items-center justify-between">
                        <h2 class="font-display font-bold text-lg">{{ __('Recent Logistics Activity') }}</h2>
                        <button @click="activeTab = 'orders'" class="text-xs font-bold text-portal-muted hover:text-white transition-colors flex items-center gap-1">
                            {{ __('AUDIT ALL') }} <x-lucide-arrow-up-right class="w-3 h-3 rtl:rotate-180" />
                        </button>
                    </div>
                    <div class="p-0">
                        <table class="w-full text-start">
                            <thead class="bg-white/2 text-xs font-bold text-portal-muted uppercase tracking-wider">
                                <tr>
                                    <th class="px-6 py-3 text-start">{{ __('Reference') }}</th>
                                    <th class="px-6 py-3 text-start">{{ __('Stakeholder') }}</th>
                                    <th class="px-6 py-3 text-start">{{ __('Status') }}</th>
                                    <th class="px-6 py-3 text-end">{{ __('Valuation') }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-portal-border">
                                @foreach($recent_orders as $order)
                                    <tr class="hover:bg-white/5 transition-all cursor-pointer group" onclick="window.location='{{ route('orders.show', $order->id) }}'">
                                        <td class="px-6 py-4 font-mono text-portal-accent font-medium">#PO-{{ $order->order_number }}</td>
                                        <td class="px-6 py-4 text-sm font-medium">{{ $order->user->first_name }} {{ $order->user->last_name }}</td>
                                        <td class="px-6 py-4">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold uppercase tracking-wider
                                                {{ $order->status === 'pending' ? 'bg-yellow-500/10 text-yellow-500' : '' }}
                                                {{ $order->status === 'processing' ? 'bg-blue-500/10 text-blue-500' : '' }}
                                                {{ $order->status === 'delivered' ? 'bg-green-500/10 text-green-500' : '' }}
                                                {{ $order->status === 'cancelled' ? 'bg-red-500/10 text-red-500' : '' }}
                                            ">
                                                {{ __($order->status) }}
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
                    <h3 class="font-display font-bold text-sm mb-4">{{ __('System Integrity') }}</h3>
                    <div class="space-y-4">
                        <div class="flex items-center gap-3 text-sm font-semibold text-portal-muted bg-white/5 p-3 rounded-lg border border-portal-border">
                            <x-lucide-shield-check class="w-4 h-4 text-portal-accent" />
                            <span>{{ __('Security Protocol') }}: <span class="text-white">{{ __('Active') }}</span></span>
                        </div>
                        <div class="flex items-center gap-3 text-sm font-semibold text-portal-muted bg-white/5 p-3 rounded-lg border border-portal-border">
                            <x-lucide-activity class="w-4 h-4 text-portal-accent" />
                            <span>{{ __('Load Balancer') }}: <span class="text-white">{{ __('Optimal') }}</span></span>
                        </div>
                        <div class="flex items-center gap-3 text-sm font-semibold text-portal-muted bg-white/5 p-3 rounded-lg border border-portal-border">
                            <x-lucide-database class="w-4 h-4 text-portal-accent" />
                            <span>{{ __('Database Latency') }}: <span class="text-white">12ms</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Other tabs placeholders (to be expanded) -->
        <!-- Products Tab -->
        <div x-show="activeTab === 'products'" x-cloak>
            <div class="bg-portal-sidebar border border-portal-border rounded-xl flex flex-col">
                <div class="p-6 border-b border-portal-border flex items-center justify-between">
                    <h2 class="font-display font-bold text-lg">{{ __('Inventory Audit') }}</h2>
                    <a href="{{ route('products.create') }}" class="bg-portal-accent text-black px-4 py-2 rounded-lg font-bold text-sm hover:bg-white transition-colors flex items-center gap-2">
                        <x-lucide-plus class="w-4 h-4" /> {{ __('Add Asset') }}
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-start">
                        <thead class="bg-white/2 text-xs font-bold text-portal-muted uppercase tracking-wider">
                            <tr>
                                <th class="px-6 py-4 text-start">{{ __('Asset') }}</th>
                                <th class="px-6 py-4 text-start">{{ __('Category') }}</th>
                                <th class="px-6 py-4 text-start">{{ __('Specs') }}</th>
                                <th class="px-6 py-4 text-start">{{ __('Price') }}</th>
                                <th class="px-6 py-4 text-start">{{ __('Status') }}</th>
                                <th class="px-6 py-4 text-end">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-portal-border">
                            @foreach($stat_products as $product)
                                <tr class="hover:bg-white/5 transition-colors group">
                                    <td class="px-4 md:px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="p-2 bg-white/5 rounded-lg text-portal-muted">
                                                <x-lucide-package class="w-4 h-4" />
                                            </div>
                                            <div>
                                                <div class="font-bold text-sm text-white">{{ $product->name }}</div>
                                                <div class="text-xs text-portal-muted">{{ __('SKU') }}: {{ $product->id }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 md:px-6 py-4 text-sm text-portal-muted">{{ $product->category->name ?? 'N/A' }}</td>
                                    <td class="px-4 md:px-6 py-4">
                                        <div class="text-[0.65rem] font-bold text-portal-muted uppercase">{{ $product->weight_kg }}kg</div>
                                        <div class="text-[0.65rem] text-white">{{ $product->pieces_per_bundle }} {{ __('pcs/bndl') }}</div>
                                    </td>
                                    <td class="px-4 md:px-6 py-4 font-mono font-bold text-portal-accent">{{ number_format($product->price, 2) }} {{ __('DA') }}</td>
                                    <td class="px-4 md:px-6 py-4">
                                        @if($product->in_stock)
                                            <span class="inline-flex items-center px-2 py-1 rounded bg-green-500/10 text-green-500 text-[0.65rem] font-bold uppercase tracking-wider">{{ __('Active') }}</span>
                                        @else
                                            <span class="inline-flex items-center px-2 py-1 rounded bg-red-500/10 text-red-500 text-[0.65rem] font-bold uppercase tracking-wider">{{ __('Depleted') }}</span>
                                        @endif
                                    </td>
                                    <td class="px-4 md:px-6 py-4 text-end">
                                        <div class="flex justify-end gap-2">
                                            <a href="{{ route('products.edit', $product->id) }}" class="p-2.5 md:p-2 hover:bg-white/10 rounded-lg text-portal-muted hover:text-white transition-colors inline-flex items-center justify-center min-h-[44px] min-w-[44px] md:min-h-0 md:min-w-0">
                                                <x-lucide-edit-2 class="w-5 h-5 md:w-4 md:h-4" />
                                            </a>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to delete this asset?') }}');" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2.5 md:p-2 hover:bg-red-500/10 rounded-lg text-portal-muted hover:text-red-500 transition-colors inline-flex items-center justify-center min-h-[44px] min-w-[44px] md:min-h-0 md:min-w-0">
                                                    <x-lucide-trash-2 class="w-5 h-5 md:w-4 md:h-4" />
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <!-- Orders Tab -->
        <div x-show="activeTab === 'orders'" x-cloak>
             <div class="bg-portal-sidebar border border-portal-border rounded-xl flex flex-col">
                <div class="p-6 border-b border-portal-border flex items-center justify-between">
                    <h2 class="font-display font-bold text-lg">{{ __('Master Transaction Ledger') }}</h2>
                    <span class="text-xs font-bold text-portal-muted uppercase tracking-wider">{{ $all_orders->count() }} {{ __('Global Records') }}</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-start">
                        <thead class="bg-white/2 text-xs font-bold text-portal-muted uppercase tracking-wider">
                            <tr>
                                <th class="px-6 py-4 text-start">{{ __('PO Reference') }}</th>
                                <th class="px-6 py-4 text-start">{{ __('Stakeholder') }}</th>
                                <th class="px-6 py-4 text-start">{{ __('Project Ref') }}</th>
                                <th class="px-6 py-4 text-start">{{ __('Target Date') }}</th>
                                <th class="px-6 py-4 text-start">{{ __('Date') }}</th>
                                <th class="px-6 py-4 text-center">{{ __('Logistics Status') }}</th>
                                <th class="px-6 py-4 text-end">{{ __('Valuation') }}</th>
                                <th class="px-6 py-4 text-end">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-portal-border">
                            @foreach($all_orders as $order)
                                <tr class="hover:bg-white/5 transition-all group relative">
                                    <td class="px-4 md:px-6 py-4 font-mono text-portal-accent font-medium cursor-pointer" onclick="window.location='{{ route('orders.show', $order->id) }}'">
                                        <div class="flex items-center gap-2">
                                            #PO-{{ $order->order_number }}
                                            <x-lucide-external-link class="w-3 h-3 text-portal-muted opacity-0 group-hover:opacity-100 transition-opacity" />
                                        </div>
                                    </td>
                                    <td class="px-4 md:px-6 py-4 cursor-pointer" onclick="window.location='{{ route('orders.show', $order->id) }}'">
                                        <div class="font-bold text-sm text-white">{{ $order->user->first_name }} {{ $order->user->last_name }}</div>
                                        <div class="text-xs text-portal-muted">{{ $order->user->company ?? __('Contractor') }}</div>
                                    </td>
                                    <td class="px-4 md:px-6 py-4 text-sm text-white cursor-pointer" onclick="window.location='{{ route('orders.show', $order->id) }}'">
                                        {{ $order->project_reference ?? '-' }}
                                    </td>
                                    <td class="px-4 md:px-6 py-4 text-sm text-portal-accent font-bold cursor-pointer" onclick="window.location='{{ route('orders.show', $order->id) }}'">
                                        {{ $order->requested_delivery_date ? \Carbon\Carbon::parse($order->requested_delivery_date)->format('M j') : '-' }}
                                    </td>
                                    <td class="px-4 md:px-6 py-4 text-sm text-portal-muted cursor-pointer" onclick="window.location='{{ route('orders.show', $order->id) }}'">{{ $order->created_at->format('M j, Y') }}</td>
                                    <td class="px-4 md:px-6 py-4 text-center" onclick="event.stopPropagation();">
                                        <div class="flex gap-2 justify-center items-center">
                                            @if($order->status === 'pending')
                                                <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="processing">
                                                    <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-blue-500/10 text-blue-500 border border-blue-500/20 text-[0.65rem] font-bold uppercase tracking-wider hover:bg-blue-500 hover:text-white transition-all shadow-sm" title="Approve & Process">
                                                        <x-lucide-play class="w-3 h-3" /> {{ __('Approve') }}
                                                    </button>
                                                </form>
                                            @elseif($order->status === 'processing')
                                                <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="delivered">
                                                    <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-green-500/10 text-green-500 border border-green-500/20 text-[0.65rem] font-bold uppercase tracking-wider hover:bg-green-500 hover:text-white transition-all shadow-sm" title="Mark as Delivered">
                                                        <x-lucide-check-circle class="w-3 h-3" /> {{ __('Deliver') }}
                                                    </button>
                                                </form>
                                            @else
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[0.65rem] font-bold uppercase tracking-wider
                                                    {{ $order->status === 'delivered' ? 'bg-green-500/10 text-green-500' : '' }}
                                                    {{ $order->status === 'cancelled' ? 'bg-red-500/10 text-red-500' : '' }}
                                                ">
                                                    {{ __($order->status) }}
                                                </span>
                                            @endif

                                            @if($order->status !== 'delivered' && $order->status !== 'cancelled')
                                                <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="cancelled">
                                                    <button type="submit" class="p-2 hover:bg-red-500/10 rounded-lg text-portal-muted hover:text-red-500 transition-colors" title="{{ __('Cancel') }}">
                                                        <x-lucide-x-circle class="w-4 h-4" />
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-4 md:px-6 py-4 text-end font-mono font-bold cursor-pointer" onclick="window.location='{{ route('orders.show', $order->id) }}'">{{ number_format($order->total, 2) }} {{ __('DA') }}</td>
                                    <td class="px-4 md:px-6 py-4 text-end" onclick="event.stopPropagation();">
                                        <a href="{{ route('orders.show', $order->id) }}" class="p-2.5 md:p-2 hover:bg-white/10 rounded-lg text-portal-muted hover:text-white transition-colors inline-flex items-center justify-center min-h-[44px] min-w-[44px] md:min-h-0 md:min-w-0" title="{{ __('Inspect Documentation') }}">
                                            <x-lucide-eye class="w-5 h-5 md:w-4 md:h-4" />
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Users Tab -->
        <div x-show="activeTab === 'users'" x-cloak>
             <div class="bg-portal-sidebar border border-portal-border rounded-xl flex flex-col">
                <div class="p-6 border-b border-portal-border flex items-center justify-between">
                    <h2 class="font-display font-bold text-lg">{{ __('Stakeholder Directory') }}</h2>
                    <span class="text-xs font-bold text-portal-muted uppercase tracking-wider">{{ $users->count() }} {{ __('Authenticated Accounts') }}</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-start">
                        <thead class="bg-white/2 text-xs font-bold text-portal-muted uppercase tracking-wider">
                            <tr>
                                <th class="px-6 py-4 text-start">{{ __('Identity') }}</th>
                                <th class="px-6 py-4 text-start">{{ __('Organization') }}</th>
                                <th class="px-6 py-4 text-start">{{ __('Email') }}</th>
                                <th class="px-6 py-4 text-start">{{ __('Privilege Level') }}</th>
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
                                                {{ $user->role === 'admin' ? 'text-portal-accent' : 'text-blue-500' }}
                                            ">
                                                <option value="client" {{ $user->role == 'client' ? 'selected' : '' }}>{{ __('client') }}</option>
                                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>{{ __('admin') }}</option>
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
