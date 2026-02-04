<x-app-layout>
    <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <!-- Print Button -->
        <div class="mb-6 flex justify-end print:hidden">
            <button onclick="window.print()" class="bg-portal-accent text-black font-bold py-2 px-4 rounded-lg hover:bg-white transition-colors flex items-center gap-2">
                <x-lucide-printer class="w-4 h-4" /> {{ __('Print Sheet') }}
            </button>
        </div>

        <!-- Sheet Container -->
        <div class="bg-white text-black p-0 overflow-hidden shadow-2xl rounded-sm print:shadow-none print:w-full">
            <!-- Header -->
            <div class="bg-slate-900 text-white p-8 flex justify-between items-start print:bg-slate-900 print:text-white print-color-adjust-exact">
                <div>
                    <h1 class="text-3xl font-extrabold uppercase tracking-tight mb-2">{{ __('Technical Data Sheet') }}</h1>
                    <p class="text-slate-400 font-mono text-sm">{{ __('Document Ref') }}: TDS-{{ str_pad($product->id, 6, '0', STR_PAD_LEFT) }}-{{ date('Y') }}</p>
                </div>
                <div class="text-right">
                    <div class="text-2xl font-bold text-portal-accent">MyFix</div>
                    <div class="text-xs text-slate-400 mt-1">{{ __('Professional Solutions') }}</div>
                </div>
            </div>

            <!-- Product Identity -->
            <div class="p-8 border-b border-slate-200 flex flex-col md:flex-row gap-8 items-start">
                <div class="w-full md:w-1/3 p-4 border border-slate-100 bg-slate-50 rounded flex items-center justify-center">
                    @if($product->image_url)
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="max-h-48 object-contain mix-blend-multiply">
                    @else
                        <div class="h-48 flex items-center justify-center text-slate-300">
                            <span class="text-xs uppercase">{{ __('No Image') }}</span>
                        </div>
                    @endif
                </div>
                <div class="flex-1">
                    <h2 class="text-2xl font-bold text-slate-900 mb-2">{{ $product->name }}</h2>
                    <div class="inline-block bg-slate-100 text-slate-600 text-xs font-bold uppercase px-2 py-1 rounded mb-4">
                        {{ $product->category->name ?? __('Uncategorized') }}
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <span class="block text-slate-400 text-xs uppercase font-bold">{{ __('SKU Code') }}</span>
                            <span class="font-mono font-bold">{{ str_pad($product->id, 6, '0', STR_PAD_LEFT) }}</span>
                        </div>
                        <div>
                            <span class="block text-slate-400 text-xs uppercase font-bold">{{ __('Date Generated') }}</span>
                            <span class="font-mono">{{ date('d M Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Specifications Table -->
            <div class="p-8 bg-slate-50">
                <h3 class="font-bold text-slate-900 uppercase tracking-wider text-sm mb-4 border-b border-slate-200 pb-2">{{ __('Technical Specifications') }}</h3>
                
                <table class="w-full text-sm text-left">
                    <thead class="text-xs text-slate-500 uppercase bg-slate-100">
                        <tr>
                            <th scope="col" class="px-6 py-3 border-b border-slate-200">{{ __('Property') }}</th>
                            <th scope="col" class="px-6 py-3 border-b border-slate-200">{{ __('Value') }}</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <tr class="border-b border-slate-100">
                            <td class="px-6 py-4 font-medium text-slate-900">{{ __('Net Weight') }}</td>
                            <td class="px-6 py-4 font-mono text-slate-600">{{ number_format($product->weight_kg, 3) }} kg</td>
                        </tr>
                        <tr class="border-b border-slate-100">
                            <td class="px-6 py-4 font-medium text-slate-900">{{ __('Packaging Unit') }}</td>
                            <td class="px-6 py-4 font-mono text-slate-600">{{ $product->pieces_per_bundle }} pcs / bundle</td>
                        </tr>
                        <tr class="border-b border-slate-100">
                            <td class="px-6 py-4 font-medium text-slate-900">{{ __('Price Reference') }}</td>
                            <td class="px-6 py-4 font-mono text-slate-600">{{ number_format($product->price, 2) }} DA</td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <!-- Description -->
            <div class="p-8">
                <h3 class="font-bold text-slate-900 uppercase tracking-wider text-sm mb-4 border-b border-slate-200 pb-2">{{ __('Product Description') }}</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-sm leading-relaxed text-slate-600">
                    <div>
                        <strong class="block text-slate-900 mb-1">English</strong>
                        <p>{{ $product->description_en ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <strong class="block text-slate-900 mb-1">Français</strong>
                        <p>{{ $product->description_fr ?? 'N/P' }}</p>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="bg-slate-100 p-8 text-center border-t border-slate-200 print:bg-slate-100 print:text-slate-500 print-color-adjust-exact">
                <p class="text-xs text-slate-400 uppercase tracking-widest mb-2">{{ __('Official Technical Documentation') }}</p>
                <div class="text-[0.6rem] text-slate-400 max-w-lg mx-auto">
                    {{ __('The information contained in this technical sheet is based on our current knowledge. It is accurate to the best of our ability but does not constitute a guarantee. Specifications are subject to change without notice.') }}
                </div>
                <div class="mt-4 font-bold text-slate-900 text-sm">MyFix</div>
            </div>
        </div>
    </div>
    
    <style>
        @media print {
            body { background: white; }
            nav, header, footer { display: none !important; }
            .print\:hidden { display: none !important; }
            .print\:bg-slate-900 { background-color: #0f172a !important; -webkit-print-color-adjust: exact; }
            .print\:text-white { color: white !important; -webkit-print-color-adjust: exact; }
            .print\:shadow-none { box-shadow: none !important; }
            .print\:w-full { width: 100% !important; max-width: none !important; }
            .min-h-screen { min-height: auto !important; }
        }
    </style>
</x-app-layout>
