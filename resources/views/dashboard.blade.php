<x-app-layout>
    <x-slot name="header">
        <span class="inline-block bg-portal-accent text-black px-2.5 py-1 rounded-md text-[0.7rem] font-extrabold uppercase tracking-wider mb-2">{{ __('Operational Overview') }}</span>
        <h1 class="text-4xl font-extrabold tracking-tight mb-2">{{ __('Welcome back, :name', ['name' => auth()->user()->first_name]) }}</h1>
        <p class="text-portal-muted text-lg">{{ __("Here's what's happening today.") }}</p>
    </x-slot>

    <div class="flex flex-col xl:grid xl:grid-cols-3 gap-8">
        <!-- Main Activity -->
        <div class="xl:col-span-2 space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                 <div class="portal-card relative overflow-hidden group hover:border-portal-accent/50">
                    <div class="absolute top-0 end-0 p-6 opacity-10 group-hover:opacity-20 transition-opacity transform group-hover:scale-110 duration-500">
                        <x-lucide-file-text class="w-16 h-16 text-portal-accent" />
                    </div>
                    <div class="flex items-center gap-4 mb-4">
                        <div class="p-3 rounded-lg bg-portal-accent/10 text-portal-accent">
                            <x-lucide-file-text class="w-6 h-6" />
                        </div>
                    </div>
<div>
                        <div class="text-[0.6rem] font-extrabold text-portal-muted uppercase tracking-[0.2em] mb-1">{{ __('Commandes Actives') }}</div>
                        <div class="text-3xl font-display font-bold text-white tracking-tight flex items-baseline gap-2">
                             {{ \App\Models\Order::where('user_id', auth()->id())->count() }} <span class="text-xs font-bold text-portal-muted uppercase">{{ __('Commandes') }}</span>
                        </div>
                        <div class="mt-4 flex items-center gap-2">
                            <div class="flex-1 h-1.5 bg-white/5 rounded-full overflow-hidden">
                                <div class="h-full bg-portal-accent w-1/3 rounded-full shadow-[0_0_10px_rgba(197,160,89,0.5)]"></div>
                            </div>
                            <span class="text-[0.65rem] font-bold text-portal-accent">{{ \App\Models\Order::where('user_id', auth()->id())->count() > 0 ? '100%' : '0%' }}</span>
                        </div>
                    </div>
                </div>

                <div class="portal-card relative overflow-hidden group hover:border-portal-accent/50">
                    <div class="absolute top-0 end-0 p-6 opacity-10 group-hover:opacity-20 transition-opacity transform group-hover:scale-110 duration-500">
                        <x-lucide-shopping-cart class="w-16 h-16 text-portal-accent" />
                    </div>
                    <div class="flex items-center gap-4 mb-4">
                        <div class="p-3 rounded-lg bg-blue-500/10 text-blue-500">
                            <x-lucide-shopping-cart class="w-6 h-6" />
                        </div>
                    </div>
                    <div>
                        <div class="text-[0.6rem] font-extrabold text-portal-muted uppercase tracking-[0.2em] mb-1">{{ __('Ma Sélection') }}</div>
                        <div class="text-3xl font-display font-bold text-white tracking-tight flex items-baseline gap-2">
                            12 <span class="text-xs font-bold text-portal-muted uppercase">{{ __('Articles') }}</span>
                        </div>
                        <div class="text-[0.65rem] font-bold text-blue-500 mt-2 flex items-center gap-1.5">
                            <x-lucide-zap class="w-3 h-3" /> {{ __('Prêt à commander') }}
                        </div>
                    </div>
                </div>
            </div>

<div class="portal-card !p-0 overflow-hidden">
                <div class="p-6 border-b border-portal-border flex items-center justify-between bg-white/5">
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 rounded-full bg-portal-accent animate-pulse"></div>
                        <h2 class="font-display font-bold text-base">{{ __('Mes Commandes Récentes') }}</h2>
                    </div>
                    <a href="{{ route('orders.index') }}" class="text-[0.65rem] font-bold text-portal-accent uppercase tracking-wider hover:text-white transition-colors">
                        {{ __('Voir tout') }}
                    </a>
                </div>
                <div class="p-6">
                    @php
                        $recentOrders = \App\Models\Order::where('user_id', auth()->id())
                            ->with('items.product')
                            ->orderBy('created_at', 'desc')
                            ->limit(3)
                            ->get();
                    @endphp
                    
                    @if($recentOrders->count() > 0)
                        <div class="space-y-4">
                            @foreach($recentOrders as $order)
                                <div class="flex items-center justify-between p-4 rounded-xl bg-white/5 border border-white/5 hover:border-portal-accent/30 transition-all group">
                                    <div class="flex items-center gap-4">
                                        <div class="w-10 h-10 rounded-lg bg-portal-accent/10 flex items-center justify-center">
                                            <x-lucide-file-text class="w-5 h-5 text-portal-accent" />
                                        </div>
                                        <div>
                                            <div class="font-bold text-white text-sm">{{ __('Commande') }} #{{ $order->order_number ?? $order->id }}</div>
                                            <div class="text-xs text-portal-muted">{{ $order->created_at->format('d/m/Y') }} • {{ $order->items->count() }} {{ __('articles') }}</div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="font-bold text-white">{{ number_format($order->total, 2) }} DZD</div>
                                        <div class="text-xs px-2 py-1 rounded-full bg-{{ $order->status === 'pending' ? 'yellow' : ($order->status === 'completed' ? 'green' : 'red') }}-500/20 text-{{ $order->status === 'pending' ? 'yellow' : ($order->status === 'completed' ? 'green' : 'red') }}-400 font-bold uppercase">
                                            {{ $order->status }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <div class="w-16 h-16 rounded-full bg-portal-accent/10 flex items-center justify-center mx-auto mb-4">
                                <x-lucide-shopping-cart class="w-8 h-8 text-portal-accent" />
                            </div>
                            <h3 class="text-lg font-bold text-white mb-2">{{ __('Aucune commande pour le moment') }}</h3>
                            <p class="text-sm text-portal-muted mb-6">{{ __('Commencez par parcourir notre catalogue et passer votre première commande.') }}</p>
                            <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-portal-accent text-black rounded-lg font-bold hover:bg-white transition-all">
                                <x-lucide-package-plus class="w-4 h-4" />
                                {{ __('Parcourir le Catalogue') }}
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Side Panel -->
        <div class="space-y-6">
<div class="portal-card">
                 <h3 class="text-[0.65rem] font-extrabold text-portal-muted uppercase tracking-[0.2em] mb-6">{{ __('Actions Rapides') }}</h3>
                 <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-1 gap-3">
                    <a href="{{ route('products.index') }}" class="flex items-center justify-between p-4 rounded-xl bg-white/5 border border-white/5 hover:border-portal-accent/30 hover:bg-portal-accent/5 transition-all group">
                        <div class="flex items-center gap-3 text-sm font-bold">
                            <x-lucide-package-plus class="w-4 h-4 text-portal-accent" /> {{ __('Parcourir le Catalogue') }}
                        </div>
                        <x-lucide-arrow-right class="w-4 h-4 text-portal-muted group-hover:text-portal-accent transition-all rtl:rotate-180" />
                    </a>
                    <a href="{{ route('orders.index') }}" class="flex items-center justify-between p-4 rounded-xl bg-white/5 border border-white/5 hover:border-portal-accent/30 hover:bg-portal-accent/5 transition-all group">
                        <div class="flex items-center gap-3 text-sm font-bold">
                            <x-lucide-history class="w-4 h-4 text-portal-accent" /> {{ __('Mes Commandes') }}
                        </div>
                        <x-lucide-arrow-right class="w-4 h-4 text-portal-muted group-hover:text-portal-accent transition-all rtl:rotate-180" />
                    </a>
                    <a href="tel:+213550000000" class="flex items-center justify-between p-4 rounded-xl bg-blue-500/10 border border-blue-500/20 hover:border-blue-500/40 hover:bg-blue-500/5 transition-all group">
                        <div class="flex items-center gap-3 text-sm font-bold text-blue-400">
                            <x-lucide-phone class="w-4 h-4" /> {{ __('Service Commercial') }}
                        </div>
                        <x-lucide-arrow-right class="w-4 h-4 text-blue-400 group-hover:text-blue-300 transition-all rtl:rotate-180" />
                    </a>
                 </div>
            </div>

            <div class="portal-card glass-panel relative overflow-hidden">
                <div class="absolute -bottom-8 -right-8 w-24 h-24 bg-portal-accent/10 rounded-full blur-2xl"></div>
                <h3 class="text-[0.65rem] font-extrabold text-portal-muted uppercase tracking-[0.2em] mb-4">{{ __('Support Center') }}</h3>
                <p class="text-xs text-portal-muted mb-6 leading-relaxed">
                    {{ __('Need technical assistance or have questions about logistics?') }}
                </p>
                <button class="w-full py-3 bg-white/5 border border-white/10 rounded-xl text-xs font-bold hover:bg-white/10 transition-all flex items-center justify-center gap-2">
                    <x-lucide-message-square class="w-4 h-4" /> {{ __('Contact Specialist') }}
                </button>
            </div>
        </div>
    </div>
</x-app-layout>
