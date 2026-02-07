<x-app-layout>
<style>
@media screen {
  .print-area { display: none; }
}
@media print {
    body * {
        visibility: hidden;
    }
    .print-area, .print-area * {
        visibility: visible;
    }
    .print-area {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        background: white !important;
        color: black !important;
    }
    .no-print {
        display: none !important;
    }
    @page {
        margin: 1.5cm;
        size: A4;
    }
    
    /* Print-specific styles */
    .print-area .bg-portal-sidebar,
    .print-area .bg-white\/5,
    .print-area .bg-white\/2 {
        background: white !important;
        border: 1px solid #ccc !important;
    }
    
    .print-area .text-white,
    .print-area .text-portal-accent {
        color: black !important;
    }
    
    .print-area .text-portal-muted {
        color: #666 !important;
    }
    
    .print-area .border-portal-border {
        border-color: #ccc !important;
    }
    
    .print-area .bg-portal-accent\/10,
    .print-area .bg-yellow-500\/10,
    .print-area .bg-blue-500\/10,
    .print-area .bg-green-500\/10 {
        background: #f5f5f5 !important;
    }
    
    .print-area .text-yellow-500,
    .print-area .text-blue-500,
    .print-area .text-green-500,
    .print-area .text-portal-accent {
        color: black !important;
        font-weight: bold;
    }
}
</style>
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
                <a href="{{ route('orders.print', $order->id) }}" target="_blank" class="bg-white/5 border border-portal-border text-white px-4 py-3 rounded-xl font-bold hover:bg-white/10 transition-colors flex items-center gap-2 no-print">
                    <x-lucide-printer class="w-4 h-4" /> {{ __('Imprimer la commande') }}
                </a>
            </div>
        </div>
    </x-slot>

    @if(false)
    <div class="print-area">
    <!-- Print Header -->
    <div class="mb-8 pb-6 border-b-2 border-black">
        <div class="flex justify-between items-start">
            <div>
                <h1 class="text-2xl font-bold text-black mb-2">SARL GLOBAL ACCESSOIRES</h1>
                <p class="text-sm text-gray-600 mb-1">Producteur de la marque MYFIX</p>
                <p class="text-sm text-gray-600">Zone Industrielle - Bordj Bou Arreridj, Algérie</p>
                <p class="text-sm text-gray-600">Tél: +213 550 00 00 00</p>
                <p class="text-sm text-gray-600">Email: commercial@myfix-dz.com</p>
            </div>
            <div class="text-right">
                <div class="text-3xl font-bold text-black mb-2">BON DE COMMANDE</div>
                <div class="text-lg font-semibold text-black">N° {{ $order->order_number }}</div>
                <div class="text-sm text-gray-600">Date: {{ $order->created_at->format('d/m/Y') }}</div>
            </div>
        </div>
    </div>

    <!-- Client Info -->
    <div class="mb-6 grid grid-cols-2 gap-8">
        <div>
            <h3 class="font-bold text-black mb-2 border-b border-gray-300 pb-1">CLIENT:</h3>
            <p class="text-sm text-black">{{ $order->user->first_name }} {{ $order->user->last_name }}</p>
            <p class="text-sm text-black">{{ $order->user->company ?? '-' }}</p>
            <p class="text-sm text-black">{{ $order->user->email }}</p>
            <p class="text-sm text-black">{{ $order->user->phone ?? '-' }}</p>
        </div>
        <div>
            <h3 class="font-bold text-black mb-2 border-b border-gray-300 pb-1">LIVRAISON:</h3>
            <p class="text-sm text-black">{{ $order->delivery_address ?? 'À définir' }}</p>
            @if($order->requested_delivery_date)
            <p class="text-sm text-black">Date souhaitée: {{ \Carbon\Carbon::parse($order->requested_delivery_date)->format('d/m/Y') }}</p>
            @endif
            <p class="text-sm text-black">Transport: {{ $order->logistics_type ?? 'Standard' }}</p>
        </div>
    </div>

    <!-- Order Items Table -->
    <div class="mb-6">
        <table class="w-full border-collapse">
            <thead>
                <tr class="border-b-2 border-black">
                    <th class="text-left py-2 px-4 font-bold text-black">RÉFÉRENCE</th>
                    <th class="text-left py-2 px-4 font-bold text-black">DÉSIGNATION</th>
                    <th class="text-center py-2 px-4 font-bold text-black">QUANTITÉ</th>
                    <th class="text-right py-2 px-4 font-bold text-black">P.U. HT</th>
                    <th class="text-right py-2 px-4 font-bold text-black">TOTAL HT</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                <tr class="border-b border-gray-300">
                    <td class="py-2 px-4 text-sm text-black">{{ str_pad($item->product_id, 6, '0', STR_PAD_LEFT) }}</td>
                    <td class="py-2 px-4 text-sm text-black">{{ $item->product->name }}</td>
                    <td class="py-2 px-4 text-center text-sm text-black">{{ $item->quantity }}</td>
                    <td class="py-2 px-4 text-right text-sm text-black">{{ number_format($item->price, 2) }} DZD</td>
                    <td class="py-2 px-4 text-right text-sm text-black">{{ number_format($item->quantity * $item->price, 2) }} DZD</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="border-t-2 border-black">
                    <td colspan="4" class="py-3 px-4 text-right font-bold text-black">TOTAL HT:</td>
                    <td class="py-3 px-4 text-right font-bold text-lg text-black">{{ number_format($order->total, 2) }} DZD</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <!-- Footer -->
    <div class="mt-12 pt-6 border-t-2 border-black">
        <div class="grid grid-cols-3 gap-8 text-center">
            <div>
                <p class="text-sm font-bold text-black mb-4">Signature Client</p>
                <div class="border-b border-gray-400 h-12"></div>
            </div>
            <div>
                <p class="text-sm font-bold text-black mb-4">Timbre & Cachet</p>
                <div class="border-b border-gray-400 h-12"></div>
            </div>
            <div>
                <p class="text-sm font-bold text-black mb-4">Signature MYFIX</p>
                <div class="border-b border-gray-400 h-12"></div>
            </div>
        </div>
        <div class="mt-8 text-center">
            <p class="text-xs text-gray-600">Document valable pour approvisionnement - Sous réserve de disponibilité</p>
        </div>
    </div>
    </div>
    @endif
    <!-- Screen Version (hidden when printing) -->
    <div class="grid grid-cols-3 gap-8 no-print">
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
                <h3 class="font-display font-bold text-lg mb-6">{{ __('Statut de la Commande') }}</h3>
                
                @php
                    $statuses = ['pending', 'processing', 'delivered'];
                    $statusLabels = [
                        'pending' => __('En Attente'),
                        'processing' => __('En Traitement'),
                        'delivered' => __('Livrée')
                    ];
                    $currentIndex = array_search($order->status, $statuses);
                    if ($currentIndex === false) $currentIndex = 0;
                @endphp
                
                <!-- Horizontal Progress Bar -->
                <div class="relative mb-8">
                    <div class="flex items-center justify-between">
                        @foreach($statuses as $index => $status)
                            <div class="flex flex-col items-center flex-1 relative z-10">
                                <!-- Status Circle -->
                                <div class="w-12 h-12 rounded-full flex items-center justify-center mb-3 transition-all duration-300
                                    {{ $index <= $currentIndex ? 'bg-portal-accent text-black shadow-[0_0_20px_rgba(21,128,61,0.4)]' : 'bg-white/5 text-portal-muted border-2 border-portal-border' }}">
                                    @if($index < $currentIndex)
                                        <x-lucide-check class="w-6 h-6" />
                                    @elseif($index === $currentIndex)
                                        <x-lucide-loader-2 class="w-6 h-6 animate-spin" />
                                    @else
                                        <span class="text-sm font-bold">{{ $index + 1 }}</span>
                                    @endif
                                </div>
                                
                                <!-- Status Label -->
                                <span class="text-xs font-bold text-center {{ $index <= $currentIndex ? 'text-white' : 'text-portal-muted' }}">
                                    {{ $statusLabels[$status] }}
                                </span>
                                
                                <!-- Current Status Indicator -->
                                @if($index === $currentIndex)
                                    <span class="text-[0.6rem] text-portal-accent font-bold uppercase tracking-wider mt-1 bg-portal-accent/10 px-2 py-0.5 rounded-full">
                                        {{ __('En cours') }}
                                    </span>
                                @endif
                            </div>
                            
                            <!-- Connecting Line -->
                            @if($index < count($statuses) - 1)
                                <div class="flex-1 h-1 mx-2 rounded-full relative" style="top: -20px;">
                                    <div class="absolute inset-0 bg-portal-border rounded-full"></div>
                                    <div class="absolute inset-0 bg-portal-accent rounded-full transition-all duration-500 {{ $index < $currentIndex ? 'w-full' : 'w-0' }}"></div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                
                <!-- Timeline Details -->
                <div class="space-y-3 pt-6 border-t border-portal-border">
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-portal-muted">{{ __('Commande passée') }}</span>
                        <span class="font-mono text-white">{{ $order->created_at->format('d/m/Y H:i') }}</span>
                    </div>
                    @if($order->updated_at != $order->created_at)
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-portal-muted">{{ __('Dernière mise à jour') }}</span>
                            <span class="font-mono text-white">{{ $order->updated_at->format('d/m/Y H:i') }}</span>
                        </div>
                    @endif
                    @if($order->requested_delivery_date)
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-portal-muted">{{ __('Livraison demandée') }}</span>
                            <span class="font-mono text-portal-accent font-bold">{{ \Carbon\Carbon::parse($order->requested_delivery_date)->format('d/m/Y') }}</span>
                        </div>
                    @endif
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
            <!-- Messages & Communication -->
            <div class="no-print bg-portal-sidebar border border-portal-border rounded-xl p-6 lg:p-8">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="font-display font-bold text-xl flex items-center gap-3">
                        <x-lucide-message-square class="w-6 h-6 text-portal-accent" />
                        {{ __('Communications & Suivi') }}
                    </h2>
                    <span class="text-xs font-bold text-portal-muted uppercase bg-white/5 px-3 py-1 rounded-full border border-portal-border">
                        {{ $order->comments->count() }} {{ __('messages') }}
                    </span>
                </div>

                <div class="space-y-6 mb-8 max-h-[500px] overflow-y-auto pr-4 custom-scrollbar">
                    @forelse($order->comments->filter(fn($c) => !$c->is_internal || auth()->user()->role === 'admin') as $comment)
                        <div class="flex gap-4 {{ $comment->user_id === auth()->id() ? 'justify-end' : '' }}">
                            <div class="flex flex-col max-w-[80%] {{ $comment->user_id === auth()->id() ? 'items-end' : '' }}">
                                <div class="flex items-center gap-2 mb-1 px-1">
                                    <span class="text-[10px] font-black uppercase tracking-widest {{ $comment->user_id === auth()->id() ? 'text-portal-accent' : 'text-slate-400' }}">
                                        {{ $comment->user->first_name }} {{ $comment->user->last_name }}
                                    </span>
                                    <span class="text-[10px] text-portal-muted">{{ $comment->created_at->diffForHumans() }}</span>
                                    @if($comment->is_internal)
                                        <span class="bg-amber-500/20 text-amber-500 text-[8px] font-black uppercase px-1.5 py-0.5 rounded border border-amber-500/20">
                                            {{ __('Interne') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="p-4 rounded-2xl text-sm leading-relaxed {{ $comment->user_id === auth()->id() ? 'bg-portal-accent text-black font-medium rounded-tr-none' : 'bg-white/5 text-slate-300 border border-white/10 rounded-tl-none' }}">
                                    {{ $comment->comment }}
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12 border-2 border-dashed border-portal-border rounded-2xl">
                            <x-lucide-message-circle class="w-12 h-12 text-portal-muted/30 mx-auto mb-4" />
                            <p class="text-portal-muted italic">{{ __('Aucune communication enregistrée pour cette commande.') }}</p>
                        </div>
                    @endforelse
                </div>

                <div class="pt-6 border-t border-portal-border">
                    <form action="{{ route('orders.comments.store', $order->id) }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="relative">
                            <textarea 
                                name="comment" 
                                rows="3" 
                                class="w-full bg-black border border-portal-border rounded-xl p-4 text-sm text-white placeholder-slate-600 focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all resize-none"
                                placeholder="{{ auth()->user()->role === 'admin' ? __('Écrivez un message ou une note interne...') : __('Écrivez un message pour l\'administration...') }}"
                                required
                            ></textarea>
                        </div>
                        <div class="flex items-center justify-between">
                            @if(auth()->user()->role === 'admin')
                                <label class="flex items-center gap-2 cursor-pointer group">
                                    <input type="checkbox" name="is_internal" value="1" class="rounded border-portal-border bg-black text-portal-accent focus:ring-portal-accent">
                                    <span class="text-xs font-bold text-slate-500 group-hover:text-slate-300 transition-colors uppercase tracking-widest">{{ __('Note interne (Invisible client)') }}</span>
                                </label>
                            @else
                                <div></div>
                            @endif
                            <button type="submit" class="bg-portal-accent text-black font-black uppercase tracking-widest px-6 py-3 rounded-xl hover:bg-white transition-all flex items-center gap-2 text-xs shadow-lg">
                                {{ __('Envoyer') }} <x-lucide-send class="w-4 h-4" />
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<script>document.addEventListener('DOMContentLoaded', function(){ var el = document.querySelector('.print-area'); if (el) { el.style.display = 'none'; } });</script>
</x-app-layout>
