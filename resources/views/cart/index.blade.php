<x-app-layout>
    <x-slot name="header">
        <span class="inline-block bg-portal-accent text-black px-2.5 py-1 rounded-md text-[0.7rem] font-extrabold uppercase tracking-wider mb-2">{{ __('Procurement List') }}</span>
        <h1 class="text-4xl font-extrabold tracking-tight mb-2">{{ __('Requisition & Checkout') }}</h1>
        <p class="text-portal-muted text-lg">{{ __('Review items before transmitting Purchase Order.') }}</p>
    </x-slot>

    @if(empty($cart))
        <div class="bg-portal-sidebar border border-portal-border rounded-xl p-12 text-center flex flex-col items-center">
            <div class="w-24 h-24 bg-white/5 rounded-full flex items-center justify-center mb-6">
                <x-lucide-clipboard-list class="w-10 h-10 text-portal-muted opacity-50" />
            </div>
            <h3 class="font-display font-bold text-2xl mb-2">{{ __('Your List is Empty') }}</h3>
            <p class="text-portal-muted mb-8 max-w-md mx-auto">{{ __("You haven't selected any materials for procurement yet. Access the technical catalog to begin building your order.") }}</p>
            <a href="{{ route('products.index') }}" class="bg-portal-accent text-black px-8 py-4 rounded-xl font-bold hover:bg-white transition-colors">
                {{ __('Open Technical Catalog') }}
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8" x-data="{
            cart: {{ json_encode($cart) }},
            
            get totalPrice() {
                return Object.values(this.cart).reduce((sum, item) => sum + (item.price * item.quantity), 0);
            },
            
            get totalWeight() {
                return Object.values(this.cart).reduce((sum, item) => sum + ((item.weight || 0) * item.quantity), 0);
            },
            
            get utility() {
                return (this.totalWeight / 24000) * 100;
            },
            
            get totalWithTax() {
                return this.totalPrice * 1.19;
            },
            
            get tax() {
                return this.totalPrice * 0.19;
            },
            
            async updateQuantity(id, newQty) {
                if (newQty < 1) return;
                
                try {
                    const response = await fetch(`/cart/update/${id}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').getAttribute('content'),
                            'Content-Type': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: JSON.stringify({ 
                            quantity: newQty,
                            _method: 'PATCH'
                        })
                    });
                    
                    if (response.ok) {
                        this.cart[id].quantity = newQty;
                        this.$dispatch('cart-updated', { count: Object.keys(this.cart).length });
                    }
                } catch (error) {
                    console.error('Failed to update quantity:', error);
                }
            },
            
            async removeItem(id) {
                if (!confirm('{{ __('Remove this item from your requisition list?') }}')) return;
                
                try {
                    const response = await fetch(`/cart/remove/${id}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').getAttribute('content'),
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: JSON.stringify({ _method: 'DELETE' })
                    });
                    
                    if (response.ok) {
                        delete this.cart[id];
                        this.$dispatch('cart-updated', { count: Object.keys(this.cart).length });
                        
                        if (Object.keys(this.cart).length === 0) {
                            window.location.reload();
                        }
                    }
                } catch (error) {
                    console.error('Failed to remove item:', error);
                }
            }
        }">
            <!-- Cart Items -->
            <div class="xl:col-span-2">
                <div class="bg-portal-sidebar border border-portal-border rounded-xl overflow-hidden">
                    <div class="p-6 border-b border-portal-border">
                        <h3 class="font-display font-bold text-lg">{{ __('Line Items') }}</h3>
                    </div>
                    <table class="w-full text-start">
                        <thead class="bg-white/2 text-xs font-bold text-portal-muted uppercase tracking-wider">
                            <tr>
                                <th class="px-6 py-4 text-start">{{ __('Item Specifications') }}</th>
                                <th class="px-6 py-4 text-center">{{ __('Quantity') }}</th>
                                <th class="px-6 py-4 text-end">{{ __('Est. Unit Cost') }}</th>
                                <th class="px-6 py-4 text-end">{{ __('Subtotal') }}</th>
                                <th class="px-6 py-4 text-end">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-portal-border">
                            <template x-for="(item, id) in cart" :key="id">
                                <tr class="hover:bg-white/2 transition-colors">
                                    <td class="px-6 py-6">
                                        <div class="flex items-center gap-4">
                                            <div class="w-16 h-16 bg-white/5 rounded-lg border border-portal-border flex items-center justify-center p-2">
                                                <template x-if="item.image">
                                                    <img :src="item.image" class="max-w-full max-h-full object-contain">
                                                </template>
                                                <template x-if="!item.image">
                                                    <x-lucide-package class="w-6 h-6 text-portal-muted opacity-50" />
                                                </template>
                                            </div>
                                            <div>
                                                <div class="font-bold text-white" x-text="item.name"></div>
                                                <div class="flex items-center gap-2 mt-1">
                                                    <span class="text-[0.65rem] font-bold text-portal-muted uppercase tracking-wider" x-text="'{{ __('REF') }}: ' + String(id).padStart(6, '0')"></span>
                                                    <template x-if="item.weight">
                                                        <span class="text-[0.65rem] font-bold text-portal-accent uppercase bg-portal-accent/10 px-1.5 py-0.5 rounded border border-portal-accent/20" x-text="Number(item.weight).toFixed(2) + ' {{ __('kg/unit') }}'"></span>
                                                    </template>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-6">
                                        <div class="flex items-center justify-center gap-2">
                                            <button 
                                                type="button"
                                                @click="updateQuantity(id, item.quantity - 1)"
                                                :disabled="item.quantity <= 1"
                                                class="w-8 h-8 rounded-lg bg-white/5 border border-portal-border hover:bg-white/10 hover:border-portal-accent transition-colors flex items-center justify-center text-portal-muted hover:text-white disabled:opacity-30 disabled:cursor-not-allowed"
                                            >
                                                <x-lucide-minus class="w-4 h-4" />
                                            </button>
                                            
                                            <input 
                                                type="number" 
                                                x-model.number="item.quantity"
                                                @change="updateQuantity(id, item.quantity)"
                                                min="1"
                                                max="9999"
                                                class="w-16 text-center bg-white/5 border border-portal-border rounded-lg font-mono font-bold text-white focus:ring-portal-accent focus:border-portal-accent"
                                            >
                                            
                                            <button 
                                                type="button"
                                                @click="updateQuantity(id, item.quantity + 1)"
                                                class="w-8 h-8 rounded-lg bg-white/5 border border-portal-border hover:bg-white/10 hover:border-portal-accent transition-colors flex items-center justify-center text-portal-muted hover:text-white"
                                            >
                                                <x-lucide-plus class="w-4 h-4" />
                                            </button>
                                        </div>
                                    </td>
                                    <td class="px-6 py-6 text-end font-mono text-portal-muted font-bold" x-text="Number(item.price).toFixed(2) + ' {{ __('DA') }}'"></td>
<td class="px-6 py-6 text-end font-mono text-portal-accent font-bold" x-text="(Number(item.price) * item.quantity).toFixed(2) + ' {{ __('DA') }}'"></td>
                                    <td class="px-6 py-6 text-end">
                                        <button 
                                            @click="removeItem(id)"
                                            class="p-2 hover:bg-red-500/10 rounded-lg text-portal-muted hover:text-red-500 transition-colors"
                                        >
                                            <x-lucide-trash-2 class="w-5 h-5" />
                                        </button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Summary Panel (Checkout Form) -->
            <form action="{{ route('cart.checkout') }}" method="POST" class="xl:col-span-1 space-y-6">
                @csrf
                <div class="bg-portal-sidebar border border-portal-border rounded-xl p-6">
                        <h3 class="font-display font-bold text-lg mb-6">{{ __('Procurement Details') }}</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="text-[0.65rem] font-bold text-portal-muted uppercase tracking-wider block mb-1">{{ __('Project Reference (Optional)') }}</label>
                                <input type="text" name="project_reference" placeholder="{{ __('e.g. Building A, Floor 5') }}" class="w-full bg-white/5 border border-portal-border rounded-lg text-sm text-white focus:ring-portal-accent focus:border-portal-accent">
                            </div>
                            <div>
                                <label class="text-[0.65rem] font-bold text-portal-muted uppercase tracking-wider block mb-1">{{ __('Delivery Address') }}</label>
                                <textarea name="delivery_address" rows="3" placeholder="{{ __('Full site address...') }}" class="w-full bg-white/5 border border-portal-border rounded-lg text-sm text-white focus:ring-portal-accent focus:border-portal-accent"></textarea>
                            </div>
                            <div>
                                <label class="text-[0.65rem] font-bold text-portal-muted uppercase tracking-wider block mb-1">{{ __('Requested Delivery Date') }}</label>
                                <input type="date" name="requested_delivery_date" class="w-full bg-white/5 border border-portal-border rounded-lg text-sm text-white focus:ring-portal-accent focus:border-portal-accent">
                            </div>
                            <div>
                                <label class="text-[0.65rem] font-bold text-portal-muted uppercase tracking-wider block mb-1">{{ __('Logistics Configuration') }}</label>
                                <select name="logistics_type" class="w-full bg-white/5 border border-portal-border rounded-lg text-sm text-white focus:ring-portal-accent focus:border-portal-accent">
                                    <option value="standard" class="bg-portal-sidebar">{{ __('Standard Bundle') }}</option>
                                    <option value="bundle" class="bg-portal-sidebar">{{ __('Mini Bundle (Lighter)') }}</option>
                                    <option value="pallet" class="bg-portal-sidebar">{{ __('Full Pallet (Shrink Wrapped)') }}</option>
                                    <option value="bulk" class="bg-portal-sidebar">{{ __('Bulk Loading') }}</option>
                                </select>
                            </div>
                            <div>
                                <label class="text-[0.65rem] font-bold text-portal-muted uppercase tracking-wider block mb-1">{{ __('Procurement Notes') }}</label>
                                <textarea name="notes" rows="2" placeholder="{{ __('Urgency, gate instructions...') }}" class="w-full bg-white/5 border border-portal-border rounded-lg text-sm text-white focus:ring-portal-accent focus:border-portal-accent"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="bg-portal-sidebar border border-portal-border rounded-xl p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="font-display font-bold text-lg">{{ __('Logistics Summary') }}</h3>
                            <x-lucide-truck class="w-5 h-5 text-portal-muted" />
                        </div>

                        <div class="space-y-4 mb-8 bg-white/5 rounded-xl p-4 border border-portal-border">
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-portal-muted">{{ __('Total Net Weight') }}</span>
                                <span class="font-mono text-white font-bold" x-text="totalWeight.toFixed(2) + ' {{ __('kg') }}'"></span>
                            </div>
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-portal-muted">{{ __('Truckload Utility') }}</span>
                                <span class="font-mono font-bold" :class="utility > 100 ? 'text-red-500' : 'text-portal-accent'" x-text="utility.toFixed(1) + '%'"></span>
                            </div>
                            
                            <!-- Capacity Progress Bar -->
                            <div class="w-full bg-white/5 rounded-full h-1.5 overflow-hidden border border-white/5">
                                <div class="h-full transition-all duration-500" :class="utility > 100 ? 'bg-red-500' : 'bg-portal-accent'" :style="`width: ${Math.min(utility, 100)}%`"></div>
                            </div>
                            
                            <template x-if="utility > 100">
                                <div class="text-[0.65rem] text-red-400 font-bold uppercase tracking-wider">
                                    <x-lucide-alert-triangle class="w-3 h-3 inline mr-1" /> {{ __('Over weight capacity (24t limit)') }}
                                </div>
                            </template>
                            <template x-if="utility < 10">
                                <div class="text-[0.65rem] text-portal-muted font-bold uppercase tracking-wider">
                                    {{ __('Load optimization suggested') }}
                                </div>
                            </template>
                        </div>

                        <h3 class="font-display font-bold text-lg mb-6">{{ __('Financial Summary') }}</h3>
                        
                        <div class="space-y-4 text-sm border-b border-portal-border pb-6 mb-6">
                            <div class="flex justify-between items-center text-portal-muted">
                                <span>{{ __('Net Value') }}</span>
                                <span class="font-mono text-white" x-text="totalPrice.toFixed(2) + ' {{ __('DA') }}'"></span>
                            </div>
                            <div class="flex justify-between items-center text-portal-muted">
                                <span>{{ __('Logistics Fees') }}</span>
                                <span class="font-mono text-white italic text-xs">{{ __('Calculated at dispatch') }}</span>
                            </div>
                             <div class="flex justify-between items-center text-portal-muted">
                                <span>{{ __('TVA (19%)') }}</span>
                                <span class="font-mono text-white" x-text="tax.toFixed(2) + ' {{ __('DA') }}'"></span>
                            </div>
                        </div>

                        <div class="flex justify-between items-center mb-8">
                            <span class="font-bold text-lg">{{ __('Total Estimated') }}</span>
                            <span class="font-mono text-2xl font-bold text-portal-accent" x-text="totalWithTax.toFixed(2) + ' {{ __('DA') }}'"></span>
                        </div>

                        <button type="submit" class="w-full bg-portal-accent text-black font-bold py-4 rounded-xl hover:bg-white transition-colors flex items-center justify-center gap-2">
                             {{ __('Transmit Requisition') }} <x-lucide-arrow-right class="w-4 h-4" />
                        </button>
                        <p class="text-xs text-center text-portal-muted mt-4">{{ __('By transmitting this order, you agree to our B2B procurement terms.') }}</p>
                    </div>
                </form>
        </div>
    @endif
</x-app-layout>
