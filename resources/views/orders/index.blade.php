<x-app-layout>
    <x-slot name="header">
        <span class="inline-block bg-portal-accent text-black px-2.5 py-1 rounded-md text-[0.7rem] font-extrabold uppercase tracking-wider mb-2">{{ __('Mes Commandes') }}</span>
        <h1 class="text-4xl font-extrabold tracking-tight mb-2">{{ __('Historique') }}</h1>
        <p class="text-portal-muted text-lg">{{ __('Suivez l\'état de vos commandes de matériaux.') }}</p>
    </x-slot>

    <div class="bg-portal-sidebar border border-portal-border rounded-xl flex flex-col min-h-[600px]">
        <div class="p-6 border-b border-portal-border flex items-center justify-between">
            <h2 class="font-display font-bold text-base">{{ __('Liste des Commandes') }}</h2>
            <div class="flex items-center gap-3">
                <div class="relative">
                    <x-lucide-search class="w-4 h-4 absolute start-3 top-1/2 -translate-y-1/2 text-portal-muted" />
                    <input type="text" placeholder="{{ __('Rechercher une commande...') }}" class="bg-white/5 border border-portal-border rounded-lg ps-9 pe-4 py-2 text-sm text-white focus:border-portal-accent focus:ring-0 placeholder-portal-muted w-64">
                </div>
                <button class="bg-white/5 border border-portal-border rounded-lg p-2 hover:bg-white/10 transition-colors text-portal-muted hover:text-white">
                    <x-lucide-filter class="w-5 h-5" />
                </button>
            </div>
        </div>

        @if($orders->isEmpty())
            <div class="flex-1 flex flex-col items-center justify-center text-portal-muted p-12">
                <div class="w-20 h-20 rounded-full bg-white/5 flex items-center justify-center mb-6">
                    <x-lucide-file-text class="w-10 h-10 opacity-50" />
                </div>
                <h3 class="text-xl font-display font-bold text-white mb-2">{{ __('No Orders Found') }}</h3>
                <p class="mb-8">{{ __("You haven't placed any purchase orders yet.") }}</p>
                <a href="{{ route('products.index') }}" class="bg-portal-accent text-black px-6 py-3 rounded-xl font-bold hover:bg-white transition-colors flex items-center gap-2">
                    {{ __('Browse Catalog') }} <x-lucide-arrow-right class="w-4 h-4 rtl:rotate-180" />
                </a>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-start">
                    <thead class="bg-white/2 text-xs font-bold text-portal-muted uppercase tracking-wider">
                        <tr>
                            <th class="px-8 py-4 text-start">{{ __('Reference') }}</th>
                            <th class="px-8 py-4 text-start">{{ __('Date') }}</th>
                            <th class="px-8 py-4 text-center">{{ __('Articles') }}</th>
                            <th class="px-8 py-4 text-center">{{ __('État') }}</th>
                            <th class="px-8 py-4 text-end">{{ __('Total') }}</th>
                            <th class="px-8 py-4 text-end">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-portal-border">
                        @foreach($orders as $order)
                            <tr class="hover:bg-white/2 transition-colors group cursor-pointer" onclick="window.location='{{ route('orders.show', $order->id) }}'">
                                <td class="px-8 py-5 font-mono text-portal-accent font-medium">#{{ $order->order_number }}</td>
                                <td class="px-8 py-5 text-sm font-medium text-portal-muted">{{ $order->created_at->format('M j, Y') }}<br><span class="text-xs opacity-60">{{ $order->created_at->format('H:i') }}</span></td>
                                <td class="px-8 py-5 text-center font-bold">{{ $order->items_count }}</td>
                                <td class="px-8 py-5 text-center">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider
                                        {{ $order->status === 'pending' ? 'bg-yellow-500/10 text-yellow-500 border border-yellow-500/20' : '' }}
                                        {{ $order->status === 'processing' ? 'bg-blue-500/10 text-blue-500 border border-blue-500/20' : '' }}
                                        {{ $order->status === 'delivered' ? 'bg-green-500/10 text-green-500 border border-green-500/20' : '' }}
                                        {{ $order->status === 'cancelled' ? 'bg-red-500/10 text-red-500 border border-red-500/20' : '' }}
                                    ">
                                        {{ __($order->status) }}
                                    </span>
                                </td>
                                <td class="px-8 py-5 text-end font-mono font-bold text-lg">{{ number_format($order->total, 2) }} <span class="text-sm text-portal-muted">{{ __('DA') }}</span></td>
                                <td class="px-8 py-5 text-end">
                                    <a href="{{ route('orders.show', $order->id) }}" class="inline-flex items-center gap-2 text-portal-muted hover:text-white transition-colors p-2 rounded-lg hover:bg-white/5 group-hover:text-portal-accent" title="{{ __('View Details') }}" onclick="event.stopPropagation()">
                                        <x-lucide-arrow-right class="w-5 h-5 rtl:rotate-180" />
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="p-6 border-t border-portal-border">
                {{ $orders->links() }}
            </div>
        @endif
    </div>
</x-app-layout>
