@extends('app-layout')

@section('content')
<style>
@media screen {
  .print-area { display: none !important; }
  .no-print { display: block !important; }
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

<div x-data="{ sidebarOpen: false }">
    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <span class="inline-block bg-portal-accent text-black px-2.5 py-1 rounded-md text-[0.7rem] font-extrabold uppercase tracking-wider mb-2">Test Order Details</span>
            <h1 class="text-4xl font-extrabold tracking-tight mb-2">#BON-698729CFCEA7D</h1>
            <p class="text-portal-muted text-lg">Passée le 08/02/2026 à 15:30</p>
        </div>
        <div class="flex items-center gap-4">
             <span class="inline-flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-bold uppercase tracking-wider bg-yellow-500/10 text-yellow-500 border border-yellow-500/20">
                Status: pending
            </span>
            <a href="#" class="bg-white/5 border border-portal-border text-white px-4 py-3 rounded-xl font-bold hover:bg-white/10 transition-colors flex items-center gap-2 no-print">
                <x-printer class="w-4 h-4" /> Imprimer la commande
            </a>
        </div>
    </div>

    <!-- Print-only content (hidden on screen, visible when printing) -->
    <div class="print-area">
        <div class="flex justify-between items-start">
            <div>
                <h1 class="text-2xl font-bold text-black mb-2">SARL GLOBAL ACCESSOIRES</h1>
                <p class="text-sm text-gray-600 mb-1">Producteur de la marque MYFIX</p>
                <p class="text-sm text-gray-600">Zone Industrielle - Bordj Bou Arreridid, Algérie</p>
                <p class="text-sm text-gray-600">Tél: +213 550 00 00 00</p>
                <p class="text-sm text-gray-600">Email: commercial@myfix-dz.com</p>
            </div>
            <div class="text-right">
                <div class="text-3xl font-bold text-black mb-2">BON DE COMMANDE</div>
                <div class="text-lg font-semibold text-black">N° BON-698729CFCEA7D</div>
                <div class="text-sm text-gray-600">Date: 08/02/2026</div>
            </div>
        </div>

        <!-- Print-only client info -->
        <div class="mb-6 grid grid-cols-2 gap-8 mt-8">
            <div>
                <h3 class="font-bold text-black mb-2 border-b border-gray-300 pb-1">CLIENT:</h3>
                <p class="text-sm text-black">Mohamed Amine BEGHOURA</p>
                <p class="text-sm text-black">Test Company</p>
                <p class="text-sm text-black">test@example.com</p>
                <p class="text-sm text-black">+213770123456</p>
            </div>
            <div>
                <h3 class="font-bold text-black mb-2 border-b border-gray-300 pb-1">LIVRAISON:</h3>
                <p class="text-sm text-black">Test Delivery Address</p>
                <p class="text-sm text-black">Date souhaitée: 15/02/2026</p>
            </div>
        </div>

        <!-- Print-only items table -->
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
                    <tr class="border-b border-gray-300">
                        <td class="py-2 px-4 text-sm text-black">000001</td>
                        <td class="py-2 px-4 text-sm text-black">MyFix Metal Studs - Bundle</td>
                        <td class="py-2 px-4 text-center text-sm text-black">10</td>
                        <td class="py-2 px-4 text-right text-sm text-black">8,500.00 DZD</td>
                        <td class="py-2 px-4 text-right text-sm text-black">85,000.00 DZD</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="border-t-2 border-black">
                        <td colspan="4" class="py-3 px-4 text-right font-bold text-black">TOTAL HT:</td>
                        <td class="py-3 px-4 text-right font-bold text-lg text-black">85,000.00 DZD</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <!-- Print-only footer -->
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

    <!-- Screen Version (hidden when printing) -->
    <div class="grid grid-cols-3 gap-8 no-print">
        <!-- Order Items -->
        <div class="col-span-2 space-y-6">
            <div class="bg-portal-sidebar border border-portal-border rounded-xl overflow-hidden">
                <div class="p-6 border-b border-portal-border">
                    <h3 class="font-display font-bold text-base">Liste des Articles</h3>
                </div>
                <table class="w-full text-left">
                    <thead class="bg-white/2 text-xs font-bold text-portal-muted uppercase tracking-wider">
                        <tr>
                            <th class="px-6 py-4">Item Details</th>
                            <th class="px-6 py-4 text-center">Quantity</th>
                            <th class="px-6 py-4 text-right">Unit Cost</th>
                            <th class="px-6 py-4 text-right">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-portal-border">
                        <tr class="hover:bg-white/2 transition-colors">
                            <td class="px-6 py-4">
                                <div class="font-bold text-sm">MyFix Metal Studs - Bundle</div>
                                <div class="text-xs text-portal-muted">REF: 000001</div>
                            </td>
                            <td class="px-6 py-4 text-center font-mono font-bold">10</td>
                            <td class="px-6 py-4 text-right font-mono text-portal-muted">8,500.00 DA</td>
                            <td class="px-6 py-4 text-right font-mono font-bold">85,000.00 DA</td>
                        </tr>
                    </tbody>
                    <tfoot class="bg-white/5 border-t border-portal-border">
                        <tr>
                            <td colspan="3" class="px-6 py-3 text-right text-xs font-bold text-portal-muted uppercase tracking-wider">Subtotal</td>
                            <td class="px-6 py-3 text-right font-mono font-bold">85,000.00 DA</td>
                        </tr>
                         <tr class="bg-portal-accent/5">
                            <td colspan="3" class="px-6 py-4 text-right font-bold text-white uppercase tracking-wider text-sm">Total Commande HT</td>
                            <td class="px-6 py-4 text-right font-mono font-bold text-xl text-portal-accent">85,000.00 DA</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <!-- Sidebar Info -->
        <div class="space-y-6">
            <div class="bg-portal-sidebar border border-portal-border rounded-xl p-6">
                <h3 class="font-display font-bold text-lg mb-4">Contact Info</h3>
                <div class="space-y-3 text-sm border-b border-portal-border pb-6 mb-6">
                    <div class="flex items-center gap-3 text-portal-muted">
                        <x-user class="w-4 h-4" /> Mohamed Amine BEGHOURA
                    </div>
                    <div class="flex items-center gap-3 text-portal-muted">
                        <x-mail class="w-4 h-4" /> test@example.com
                    </div>
                    <div class="flex items-center gap-3 text-portal-muted">
                        <x-phone class="w-4 h-4" /> +213770123456
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection