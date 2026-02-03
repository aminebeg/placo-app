<x-app-layout>
    <x-slot name="header">
        <span class="inline-block bg-portal-accent text-black px-2.5 py-1 rounded-md text-[0.7rem] font-extrabold uppercase tracking-wider mb-2">{{ __('Technical Catalog') }}</span>
        <h1 class="text-4xl font-extrabold tracking-tight mb-2">{{ __('Detailed Specifications') }}</h1>
        <p class="text-portal-muted text-lg">{{ __('Product') }}: <span class="text-white">{{ $product->name }}</span></p>
    </x-slot>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Main Info -->
        <div class="bg-portal-sidebar border border-portal-border rounded-xl p-8">
            <h3 class="font-display font-bold text-lg border-b border-portal-border pb-2 mb-6">{{ __('Asset Profile') }}</h3>
            
            <div class="aspect-video bg-white/5 rounded-lg flex items-center justify-center mb-8 relative group cursor-pointer overflow-hidden">
                 @if($product->image_url)
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="max-h-full max-w-full object-contain">
                @else
                    <x-lucide-package class="w-20 h-20 text-portal-muted opacity-20" />
                @endif
                <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <span class="text-xs font-bold uppercase tracking-wider">{{ __('Update Image') }}</span>
                </div>
            </div>

            <div class="space-y-4">
                <div class="flex justify-between py-2 border-b border-white/5">
                    <span class="text-portal-muted text-sm font-semibold">{{ __('SKU Reference') }}</span>
                    <span class="font-mono text-white">{{ str_pad($product->id, 6, '0', STR_PAD_LEFT) }}</span>
                </div>
                <div class="flex justify-between py-2 border-b border-white/5">
                    <span class="text-portal-muted text-sm font-semibold">{{ __('Category') }}</span>
                    <span class="text-white">{{ $product->category->name ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between py-2 border-b border-white/5">
                    <span class="text-portal-muted text-sm font-semibold">{{ __('Base Price') }}</span>
                    <span class="font-mono text-white font-bold">{{ number_format($product->price, 2) }} {{ __('DA') }}</span>
                </div>
                 @if($product->weight_kg)
                 <div class="flex justify-between py-2 border-b border-white/5">
                    <span class="text-portal-muted text-sm font-semibold">{{ __('Unit Weight') }}</span>
                    <span class="font-mono text-white">{{ number_format($product->weight_kg, 3) }} {{ __('kg') }}</span>
                </div>
                @endif
                @if($product->pieces_per_bundle)
                <div class="flex justify-between py-2 border-b border-white/5">
                    <span class="text-portal-muted text-sm font-semibold">{{ __('Bundle Capacity') }}</span>
                    <span class="text-white">{{ $product->pieces_per_bundle }} {{ __('pcs') }}</span>
                </div>
                @endif
                 <div class="flex justify-between py-2 border-b border-white/5">
                    <span class="text-portal-muted text-sm font-semibold">{{ __('Availability') }}</span>
                     @if($product->in_stock)
                        <span class="text-green-500 font-bold text-xs uppercase bg-green-500/10 px-2 py-0.5 rounded">{{ __('In Stock') }}</span>
                    @else
                        <span class="text-red-500 font-bold text-xs uppercase bg-red-500/10 px-2 py-0.5 rounded">{{ __('Lead Time') }}</span>
                    @endif
                </div>
            </div>

             <div class="mt-8 pt-6 border-t border-portal-border">
                <a href="{{ route('products.edit', $product->id) }}" class="w-full bg-portal-accent text-black font-bold py-3 rounded-lg hover:bg-white transition-colors flex items-center justify-center gap-2">
                    <x-lucide-edit-2 class="w-4 h-4" /> {{ __('Edit Specifications') }}
                </a>
            </div>
        </div>

        <!-- Description & Metadata -->
        <div class="space-y-6">
            <div class="bg-portal-sidebar border border-portal-border rounded-xl p-8">
                 <h3 class="font-display font-bold text-lg border-b border-portal-border pb-2 mb-4">{{ __('Technical Description') }}</h3>
                 <div class="space-y-4">
                    <div>
                        <span class="text-[0.65rem] font-bold text-portal-muted uppercase tracking-wider block mb-1">English</span>
                        <p class="text-sm leading-relaxed text-white">{{ $product->description_en ?? __('No description available.') }}</p>
                    </div>
                     <div>
                        <span class="text-[0.65rem] font-bold text-portal-muted uppercase tracking-wider block mb-1">Français</span>
                        <p class="text-sm leading-relaxed text-portal-muted">{{ $product->description_fr ?? __('Unavailable.') }}</p>
                    </div>
                 </div>
            </div>

            <div class="bg-portal-sidebar border border-portal-border rounded-xl p-8">
                <h3 class="font-display font-bold text-lg border-b border-portal-border pb-2 mb-4">{{ __('Documentation') }}</h3>
                @if($product->technical_sheet_url)
                <a href="{{ $product->technical_sheet_url }}" target="_blank" class="flex items-center gap-4 p-4 rounded-lg bg-white/5 border border-portal-border hover:bg-white/10 transition-colors cursor-pointer group">
                    <x-lucide-file-text class="w-8 h-8 text-portal-accent" />
                    <div class="flex-1">
                        <div class="font-bold text-sm">{{ __('Technical Datasheet (PDF)') }}</div>
                        <div class="text-xs text-portal-muted">{{ __('Official Factory Specifications') }}</div>
                    </div>
                    <x-lucide-download class="w-4 h-4 text-portal-muted group-hover:text-white" />
                </a>
                @else
                <div class="flex items-center gap-4 p-4 rounded-lg bg-white/5 border border-portal-border opacity-50">
                    <x-lucide-file-x class="w-8 h-8 text-portal-muted" />
                    <div class="flex-1">
                        <div class="font-bold text-sm">{{ __('Documentation Unavailable') }}</div>
                        <div class="text-xs text-portal-muted">{{ __('Contact support for specs') }}</div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
