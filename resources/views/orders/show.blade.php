<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <span class="inline-block bg-portal-accent text-black px-2.5 py-1 rounded-md text-[0.7rem] font-extrabold uppercase tracking-wider mb-2">{{ __('Détails de la Commande') }}</span>
                <h1 class="text-4xl font-extrabold tracking-tight mb-2">#{{ $order->order_number }}</h1>
                <p class="text-portal-muted text-lg">{{ __('Passée le') }} {{ $order->created_at->format('d/m/Y') }} {{ __('à') }} {{ $order->created_at->format('H:i') }}</p>
            </div>
            <div class="flex items-center gap-4">
                 <span class="inline-flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-bold uppercase tracking-wider
                    {{ $order->status === 'pending' ? 'bg-yellow-500/10 text-yellow-500 border border-yellow-500/20' : '' }}
                    {{ $order->status === 'processing' ? 'bg-blue-500/10 text-blue-500 border border-blue-500/20' : '' }}
                    {{ $order->status === 'delivered' ? 'bg-green-500/10 text-green-500 border border-green-500/20' : '' }}
                    {{ $order->status === 'cancelled' ? 'bg-red-500/10 text-red-500 border border-red-500/20' : '' }}
                ">
                    {{ __('Status:') }} {{ __($order->status) }}
                </span>
                <button class="bg-white/5 border border-portal-border text-white px-4 py-3 rounded-xl font-bold hover:bg-white/10 transition-colors flex items-center gap-2">
                    <x-lucide-printer class="w-4 h-4" /> {{ __('Print Invoice') }}
                </button>
            </div>
        </div>
    </x-slot>

    <div class="grid grid-cols-3 gap-8">
        <!-- Order Items -->
        <div class="col-span-2 space-y-6">
            <div class="bg-portal-sidebar border border-portal-border rounded-xl overflow-hidden">
                <div class="p-6 border-b border-portal-border">
                    <h3 class="font-display font-bold text-base">{{ __('Liste des Articles') }}</h3>
                </div>
                <table class="w-full text-left">
                    <thead class="bg-white/2 text-xs font-bold text-portal-muted uppercase tracking-wider">
                        <tr>
                            <th class="px-6 py-4">{{ __('Item Details') }}</th>
                            <th class="px-6 py-4 text-center">{{ __('Quantity') }}</th>
                            <th class="px-6 py-4 text-right">{{ __('Unit Cost') }}</th>
                            <th class="px-6 py-4 text-right">{{ __('Subtotal') }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-portal-border">
                        @foreach($order->items as $item)
                            <tr class="hover:bg-white/2 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="font-bold text-sm">{{ $item->product->name }}</div>
                                    <div class="text-xs text-portal-muted">{{ __('REF') }}: {{ str_pad($item->product_id, 6, '0', STR_PAD_LEFT) }}</div>
                                </td>
                                <td class="px-6 py-4 text-center font-mono font-bold">{{ $item->quantity }}</td>
                                <td class="px-6 py-4 text-right font-mono text-portal-muted">{{ number_format($item->price, 2) }} {{ __('DA') }}</td>
                                <td class="px-6 py-4 text-right font-mono font-bold">{{ number_format($item->quantity * $item->price, 2) }} {{ __('DA') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="bg-white/5 border-t border-portal-border">
                        <tr>
                            <td colspan="3" class="px-6 py-3 text-right text-xs font-bold text-portal-muted uppercase tracking-wider">{{ __('Subtotal') }}</td>
                            <td class="px-6 py-3 text-right font-mono font-bold">{{ number_format($order->subtotal, 2) }} {{ __('DA') }}</td>
                        </tr>
                         <tr class="bg-portal-accent/5">
                            <td colspan="3" class="px-6 py-4 text-right font-bold text-white uppercase tracking-wider text-sm">{{ __('Total Commande HT') }}</td>
                            <td class="px-6 py-4 text-right font-mono font-bold text-xl text-portal-accent">{{ number_format($order->total, 2) }} {{ __('DA') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="bg-portal-sidebar border border-portal-border rounded-xl p-6">
                <h3 class="font-display font-bold text-lg mb-4">{{ __('Logistics Timeline') }}</h3>
                <div class="space-y-6 relative pl-4 border-l-2 border-portal-border ml-2">
                    <div class="relative">
                        <div class="absolute -left-[21px] top-1 w-3 h-3 rounded-full bg-portal-accent ring-4 ring-portal-sidebar"></div>
                        <div class="text-sm font-bold text-white mb-1">{{ __('Order Placed') }}</div>
                        <div class="text-xs text-portal-muted">{{ $order->created_at->format('F j, Y - H:i') }}</div>
                    </div>
                     <div class="relative">
                        <div class="absolute -left-[21px] top-1 w-3 h-3 rounded-full {{ $order->status !== 'pending' ? 'bg-portal-accent' : 'bg-portal-border' }} ring-4 ring-portal-sidebar"></div>
                        <div class="text-sm font-bold {{ $order->status !== 'pending' ? 'text-white' : 'text-portal-muted' }} mb-1">{{ __('processing') }}</div>
                        @if($order->status !== 'pending')
                            <div class="text-xs text-portal-muted">{{ __('Validated by Admin') }}</div>
                        @endif
                    </div>
                     <div class="relative">
                        <div class="absolute -left-[21px] top-1 w-3 h-3 rounded-full {{ $order->status === 'delivered' ? 'bg-portal-accent' : 'bg-portal-border' }} ring-4 ring-portal-sidebar"></div>
                        <div class="text-sm font-bold {{ $order->status === 'delivered' ? 'text-white' : 'text-portal-muted' }} mb-1">{{ __('Dispatched / Delivered') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Info -->
        <div class="space-y-6">
            <div class="bg-portal-sidebar border border-portal-border rounded-xl p-6">
                <h3 class="font-display font-bold text-lg mb-4">{{ __('Contact Info') }}</h3>
                <div class="space-y-3 text-sm border-b border-portal-border pb-6 mb-6">
                    <div class="flex items-center gap-3 text-portal-muted">
                        <x-lucide-user class="w-4 h-4" /> {{ $order->user->first_name }} {{ $order->user->last_name }}
                    </div>
                    <div class="flex items-center gap-3 text-portal-muted">
                        <x-lucide-mail class="w-4 h-4" /> {{ $order->user->email }}
                    </div>
                    @if($order->user->phone)
                    <div class="flex items-center gap-3 text-portal-muted">
                        <x-lucide-phone class="w-4 h-4" /> {{ $order->user->phone }}
                    </div>
                    @endif
                </div>

                <h3 class="font-display font-bold text-lg mb-4">{{ __('Logistics Details') }}</h3>
                <div class="space-y-4">
                    <div>
                        <span class="text-[0.65rem] font-bold text-portal-muted uppercase tracking-wider block mb-1">{{ __('Delivery Site') }}</span>
                        <div class="text-sm text-white bg-white/5 p-3 rounded-lg border border-portal-border">{{ $order->delivery_address ?? __('Pickup from Factory') }}</div>
                    </div>
                    @if($order->requested_delivery_date)
                    <div>
                        <span class="text-[0.65rem] font-bold text-portal-muted uppercase tracking-wider block mb-1">{{ __('Target Delivery') }}</span>
                        <div class="text-sm font-bold text-portal-accent">{{ \Carbon\Carbon::parse($order->requested_delivery_date)->format('F j, Y') }}</div>
                    </div>
                    @endif
                    <div>
                        <span class="text-[0.65rem] font-bold text-portal-muted uppercase tracking-wider block mb-1">{{ __('Logistics Config') }}</span>
                        <div class="text-[0.7rem] font-bold text-white uppercase bg-white/10 px-2 py-1 rounded inline-block">{{ $order->logistics_type }}</div>
                    </div>
                    @if($order->notes)
                    <div>
                        <span class="text-[0.65rem] font-bold text-portal-muted uppercase tracking-wider block mb-1">{{ __('Procurement Notes') }}</span>
                        <div class="text-sm text-portal-muted italic bg-white/2 p-3 rounded-lg border border-portal-border">{{ $order->notes }}</div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        </div>
    </div>
</x-app-layout>
