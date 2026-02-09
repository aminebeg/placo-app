<?php if (isset($component)) { $__componentOriginal58c831a7c3cbf004f2e66a23aed50e5b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal58c831a7c3cbf004f2e66a23aed50e5b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.public-layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('public-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="max-w-7xl mx-auto px-6 py-12">
        <div class="mb-12 border-b border-white/5 pb-12">
            <span class="inline-block bg-portal-accent/10 text-portal-accent border border-portal-accent/20 px-3 py-1 rounded-full text-[0.65rem] font-bold uppercase tracking-widest mb-4"><?php echo e(__('Espace B2B')); ?></span>
            <h1 class="text-4xl md:text-5xl font-display font-black tracking-tighter mb-4"><?php echo e(__('Ma Sélection')); ?></h1>
            <p class="text-slate-400 text-lg max-w-2xl"><?php echo e(__('Vérifiez votre sélection de matériaux avant transmission pour traitement logistique.')); ?></p>
        </div>

    <?php if(empty($commande)): ?>
        <div class="bg-[#141415] border border-white/5 rounded-3xl p-16 text-center flex flex-col items-center shadow-2xl">
            <div class="w-24 h-24 bg-white/5 rounded-full flex items-center justify-center mb-8 border border-white/5">
                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-clipboard-list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-10 h-10 text-slate-500']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
            </div>
            <h3 class="font-display font-bold text-3xl mb-4 text-white"><?php echo e(__('Votre bon de commande est vide')); ?></h3>
            <p class="text-slate-400 mb-8 max-w-md mx-auto text-lg"><?php echo e(__("Vous n'avez pas encore sélectionné de matériaux. Accédez au catalogue technique pour commencer votre approvisionnement.")); ?></p>
            <a href="<?php echo e(route('products.index')); ?>" class="portal-btn portal-btn-primary px-8 py-4 text-sm font-bold">
                <?php echo e(__('Consulter le Catalogue')); ?>

            </a>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8" x-data="{
            items: <?php echo e(json_encode($commande)); ?>,
            
            get totalPrice() {
                return Object.values(this.items).reduce((sum, item) => sum + (item.price * item.quantity), 0);
            },
            
            get totalWeight() {
                return Object.values(this.items).reduce((sum, item) => sum + ((item.weight || 0) * item.quantity), 0);
            },
            
            get utility() {
                return (this.totalWeight / 24000) * 100;
            },
            
            get totalWithTax() {
                return this.totalPrice;
            },
            
            get tax() {
                return 0;
            },
            
            async updateQuantity(id, newQty) {
                if (newQty < 1) return;
                
                try {
                    const response = await fetch(`/commande/update/${id}`, {
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
                        this.items[id].quantity = newQty;
                        this.$dispatch('commande-updated', { count: Object.keys(this.items).length });
                    }
                } catch (error) {
                    console.error('Failed to update quantity:', error);
                }
            },
            
            async removeItem(id) {
                if (!confirm('<?php echo e(__('Retirer cette référence de votre bon de commande ?')); ?>')) return;
                
                try {
                    const response = await fetch(`/commande/remove/${id}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').getAttribute('content'),
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: JSON.stringify({ _method: 'DELETE' })
                    });
                    
                    if (response.ok) {
                        delete this.items[id];
                        this.$dispatch('commande-updated', { count: Object.keys(this.items).length });
                        
                        if (Object.keys(this.items).length === 0) {
                            window.location.reload();
                        }
                    }
                } catch (error) {
                    console.error('Failed to remove item:', error);
                }
            }
        }">
            <!-- Items List -->
            <div class="xl:col-span-2 space-y-6">
                <div class="bg-[#141415] border border-white/5 rounded-3xl overflow-hidden shadow-xl">
                    <div class="p-6 border-b border-white/5 bg-white/[0.02]">
                        <h3 class="font-bold text-base text-white"><?php echo e(__('Liste des Matériaux')); ?></h3>
                    </div>
                    
                    <!-- Desktop Table View -->
                    <div class="hidden md:block">
                        <table class="w-full text-start">
                            <thead class="bg-white/[0.02] text-[0.65rem] font-bold text-slate-500 uppercase tracking-wider border-b border-white/5">
                                <tr>
                                    <th class="px-6 py-4 text-start font-bold"><?php echo e(__('Matériau')); ?></th>
                                    <th class="px-6 py-4 text-center font-bold"><?php echo e(__('Quantité')); ?></th>
                                    <th class="px-6 py-4 text-end font-bold"><?php echo e(__('P.U HT')); ?></th>
                                    <th class="px-6 py-4 text-end font-bold"><?php echo e(__('Total HT')); ?></th>
                                    <th class="px-6 py-4 text-end font-bold"><?php echo e(__('Actions')); ?></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5">
                                <template x-for="(item, id) in items" :key="id">
                                    <tr class="hover:bg-white/[0.02] transition-colors group">
                                        <td class="px-6 py-6">
                                            <div class="flex items-center gap-6">
                                                <div class="w-16 h-16 bg-[#0a0a0b] rounded-xl border border-white/10 flex items-center justify-center p-2 group-hover:border-portal-accent/30 transition-colors">
                                                    <template x-if="item.image">
                                                        <img :src="item.image" class="max-w-full max-h-full object-contain mix-blend-normal">
                                                    </template>
                                                    <template x-if="!item.image">
                                                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-package'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-6 h-6 text-slate-600']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                                    </template>
                                                </div>
                                                <div>
                                                    <div class="font-bold text-white text-base mb-1" x-text="item.name"></div>
                                                    <div class="flex items-center gap-2">
                                                        <span class="text-[0.6rem] font-bold text-slate-500 uppercase tracking-wider bg-white/5 px-2 py-0.5 rounded" x-text="'REF: ' + String(id).padStart(6, '0')"></span>
                                                        <template x-if="item.weight">
                                                            <span class="text-[0.6rem] font-bold text-portal-accent uppercase tracking-wider" x-text="Number(item.weight).toFixed(2) + ' <?php echo e(__('kg')); ?>'"></span>
                                                        </template>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-6">
                                            <div class="flex items-center justify-center gap-2 bg-[#0a0a0b] rounded-lg border border-white/10 p-1 w-fit mx-auto">
                                                <button 
                                                    type="button"
                                                    @click="updateQuantity(id, item.quantity - 1)"
                                                    :disabled="item.quantity <= 1"
                                                    class="w-7 h-7 rounded bg-white/5 hover:bg-white/10 flex items-center justify-center text-slate-400 hover:text-white disabled:opacity-30 transition-colors"
                                                >
                                                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-minus'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-3 h-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                                </button>
                                                
                                                <input 
                                                    type="number" 
                                                    x-model.number="item.quantity"
                                                    @change="updateQuantity(id, item.quantity)"
                                                    min="1"
                                                    class="w-12 text-center bg-transparent border-none font-mono font-bold text-white text-sm focus:ring-0 p-0"
                                                >
                                                
                                                <button 
                                                    type="button"
                                                    @click="updateQuantity(id, item.quantity + 1)"
                                                    class="w-7 h-7 rounded bg-white/5 hover:bg-white/10 flex items-center justify-center text-slate-400 hover:text-white transition-colors"
                                                >
                                                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-plus'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-3 h-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                                </button>
                                            </div>
                                        </td>
                                        <td class="px-6 py-6 text-end">
                                            <div class="font-mono text-slate-400 font-bold tracking-tight" x-text="Number(item.price).toFixed(2) + ' <?php echo e(__('DA')); ?>'"></div>
                                        </td>
                                        <td class="px-6 py-6 text-end">
                                            <div class="font-mono text-white font-bold tracking-tight text-lg" x-text="(Number(item.price) * item.quantity).toFixed(2) + ' <?php echo e(__('DA')); ?>'"></div>
                                        </td>
                                        <td class="px-6 py-6 text-end">
                                            <button 
                                                @click="removeItem(id)"
                                                class="w-8 h-8 rounded-full hover:bg-red-500/20 text-slate-500 hover:text-red-500 transition-colors inline-flex items-center justify-center"
                                                title="<?php echo e(__('Retirer')); ?>"
                                            >
                                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-trash-2'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                            </button>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>

                    <!-- Mobile View -->
                    <div class="md:hidden divide-y divide-white/5">
                        <template x-for="(item, id) in items" :key="id">
                            <div class="p-6 flex flex-col gap-4">
                                <div class="flex items-start gap-4">
                                    <div class="w-16 h-16 bg-[#0a0a0b] rounded-xl border border-white/10 flex items-center justify-center p-2 flex-shrink-0">
                                        <template x-if="item.image">
                                            <img :src="item.image" class="max-w-full max-h-full object-contain">
                                        </template>
                                        <template x-if="!item.image">
                                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-package'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-6 h-6 text-slate-600']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                        </template>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="font-bold text-white text-sm mb-1 truncate" x-text="item.name"></div>
                                        <div class="text-xs text-slate-500 mb-2" x-text="'Ref: ' + id"></div>
                                        <div class="font-mono text-portal-accent font-bold" x-text="(Number(item.price) * item.quantity).toFixed(2) + ' <?php echo e(__('DA')); ?>'"></div>
                                    </div>
                                    <button @click="removeItem(id)" class="text-slate-600 hover:text-red-500 p-2">
                                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-trash-2'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                    </button>
                                </div>
                                <div class="flex items-center justify-between bg-white/5 p-2 rounded-xl">
                                    <span class="text-xs font-bold text-slate-400 pl-2"><?php echo e(__('Quantité')); ?></span>
                                    <div class="flex items-center gap-3">
                                        <button @click="updateQuantity(id, item.quantity - 1)" :disabled="item.quantity <= 1" class="w-8 h-8 rounded-lg bg-black/20 flex items-center justify-center text-white border border-white/10">
                                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-minus'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                        </button>
                                        <span class="font-mono font-bold text-white w-8 text-center" x-text="item.quantity"></span>
                                        <button @click="updateQuantity(id, item.quantity + 1)" class="w-8 h-8 rounded-lg bg-black/20 flex items-center justify-center text-white border border-white/10">
                                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-plus'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>

            <!-- Sidebar Summary -->
            <form action="<?php echo e(route('commande.finalize')); ?>" method="POST" class="xl:col-span-1 space-y-6">
                <?php echo csrf_field(); ?>
                <div class="bg-[#141415] border border-white/5 rounded-3xl p-6 lg:p-8 shadow-xl sticky top-28">
                        <h3 class="font-bold text-lg text-white mb-6 flex items-center gap-2">
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-truck'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5 text-portal-accent']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                            <?php echo e(__('Expédition & Logistique')); ?>

                        </h3>
                        
                        <div class="space-y-4 mb-8">
                            <div>
                                <label class="text-[0.65rem] font-bold text-portal-muted uppercase tracking-wider block mb-2 pl-1"><?php echo e(__('Destination de Livraison')); ?> <span class="text-slate-600 text-[0.55rem]">(<?php echo e(__('Optionnel')); ?>)</span></label>
                                <textarea name="delivery_address" rows="3" placeholder="<?php echo e(__('Indiquez l’adresse exacte si connue...')); ?>" class="w-full bg-[#0a0a0b] border border-white/10 rounded-xl text-sm text-white focus:ring-1 focus:ring-portal-accent focus:border-portal-accent placeholder-slate-600 py-3 px-4 transition-shadow"></textarea>
                            </div>
                            <div>
<label class="text-[0.65rem] font-bold text-portal-muted uppercase tracking-wider block mb-2 pl-1"><?php echo e(__('Date de Réception Souhaitée')); ?> <span class="text-slate-600 text-[0.55rem]">(<?php echo e(__('Optionnel')); ?>)</span></label>
                                <input type="date" name="requested_delivery_date" class="w-full bg-[#0a0a0b] border border-white/10 rounded-xl text-sm text-white focus:ring-1 focus:ring-portal-accent focus:border-portal-accent placeholder-slate-600 py-3 px-4 transition-shadow" min="<?php echo e(\Carbon\Carbon::now()->addDays(3)->format('Y-m-d')); ?>" x-init="$el.min = new Date(Date.now() + 3 * 24 * 60 * 60 * 1000).toISOString().split('T')[0]">
                            </div>
                            <div>
                                <label class="text-[0.65rem] font-bold text-portal-muted uppercase tracking-wider block mb-2 pl-1"><?php echo e(__('Type de Transport')); ?> <span class="text-slate-600 text-[0.55rem]">(<?php echo e(__('Optionnel')); ?>)</span></label>
                                <div class="relative">
                                    <select name="logistics_type" class="w-full bg-[#0a0a0b] border border-white/10 rounded-xl text-sm text-white focus:ring-1 focus:ring-portal-accent focus:border-portal-accent py-3 px-4 appearance-none">
                                        <option value="standard"><?php echo e(__('À Définir (Appel Commercial)')); ?></option>
                                        <option value="bundle"><?php echo e(__('Allégé (Fardeaux)')); ?></option>
                                        <option value="pallet"><?php echo e(__('Palettisé')); ?></option>
                                        <option value="bulk"><?php echo e(__('Vrac / Usine')); ?></option>
                                    </select>
                                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-chevron-down'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'absolute right-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-500 pointer-events-none']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                </div>
                            </div>
                            <div>
                                <label class="text-[0.65rem] font-bold text-portal-muted uppercase tracking-wider block mb-2 pl-1"><?php echo e(__('Instructions Particulières')); ?></label>
                                <textarea name="notes" rows="2" placeholder="<?php echo e(__('Ex: Accès difficile, besoin de déchargement...')); ?>" class="w-full bg-[#0a0a0b] border border-white/10 rounded-xl text-sm text-white focus:ring-1 focus:ring-portal-accent focus:border-portal-accent placeholder-slate-600 py-3 px-4 transition-shadow"></textarea>
                            </div>

<div class="p-3 rounded-lg bg-amber-500/5 border border-amber-500/10 flex gap-3">
                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-alert-triangle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4 text-amber-400 shrink-0 mt-0.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                <p class="text-[0.7rem] text-slate-400 leading-relaxed">
                                    <?php echo e(__('La date de livraison doit être au moins 3 jours après aujourd\'hui. Le jour exact de livraison peut varier selon les facteurs logistiques, la disponibilité des produits et les conditions de transport.')); ?>

                                </p>
                            </div>
                        </div>

                        <div class="border-t border-white/5 pt-6 mb-6">
                            <h4 class="font-bold text-white text-sm uppercase tracking-widest mb-4"><?php echo e(__('Audit Logistique')); ?></h4>
                            
                            <div class="bg-[#0a0a0b] rounded-xl p-4 border border-white/5 space-y-3">
                                <div class="flex justify-between items-center text-sm">
                                    <span class="text-slate-400 font-medium"><?php echo e(__('Masse Totale (Est.)')); ?></span>
                                    <span class="font-mono text-white font-bold" x-text="totalWeight.toFixed(2) + ' <?php echo e(__('kg')); ?>'"></span>
                                </div>
                                <div class="space-y-1">
                                    <div class="flex justify-between items-center text-sm">
                                        <span class="text-slate-400 font-medium"><?php echo e(__('Volume de Chargement')); ?></span>
                                        <span class="font-mono font-bold" :class="utility > 100 ? 'text-red-500' : 'text-portal-accent'" x-text="utility.toFixed(1) + '%'"></span>
                                    </div>
                                    <div class="w-full bg-white/5 rounded-full h-1.5 overflow-hidden">
                                        <div class="h-full transition-all duration-500" :class="utility > 100 ? 'bg-red-500' : 'bg-portal-accent'" :style="`width: ${Math.min(utility, 100)}%`"></div>
                                    </div>
                                    <p x-show="utility > 100" class="text-[0.6rem] text-red-500 font-bold mt-1">
                                        <?php echo e(__('Attention: Capacité maximale d\'un semi-remorque (24t) dépassée.')); ?>

                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-white/5 pt-6 mb-8">
                             <h4 class="font-bold text-white text-sm uppercase tracking-widest mb-4"><?php echo e(__('Valorisation HT')); ?></h4>
                             
                             <div class="space-y-3 text-sm mb-4">
                                <div class="flex justify-between items-center text-slate-400">
                                    <span><?php echo e(__('Sous-total HT')); ?></span>
                                    <span class="font-mono text-white" x-text="totalPrice.toFixed(2) + ' <?php echo e(__('DA')); ?>'"></span>
                                </div>
                             </div>
                             
                             <div class="flex justify-between items-end p-4 bg-portal-accent/10 rounded-xl border border-portal-accent/20">
                                <span class="font-bold text-white uppercase tracking-wider text-xs"><?php echo e(__('Total Global HT')); ?></span>
                                <span class="font-mono text-2xl font-bold text-portal-accent" x-text="totalPrice.toFixed(2) + ' <?php echo e(__('DA')); ?>'"></span>
                             </div>
                        </div>

                        <?php if(auth()->guard()->check()): ?>
                            <button type="submit" class="portal-btn portal-btn-primary w-full justify-center py-4 text-sm shadow-[0_0_30px_rgba(250,204,21,0.2)]">
                                 <?php echo e(__('Transmettre le Bon de Commande')); ?> <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-arrow-right'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5 ml-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                            </button>
                            <p class="text-[0.65rem] text-center text-slate-500 mt-4 leading-relaxed"><?php echo e(__('Toute commande transmise fait l\'objet d\'une validation par notre service commercial.')); ?></p>
                        <?php else: ?>
                            <a href="<?php echo e(route('login')); ?>" class="portal-btn bg-white text-black hover:bg-slate-200 w-full justify-center py-4 text-sm font-bold uppercase tracking-wider">
                                 <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-log-in'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5 mr-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?> <?php echo e(__('Se connecter pour valider')); ?>

                            </a>
                        <?php endif; ?>
                </div>
            </form>
        </div>
    <?php endif; ?>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal58c831a7c3cbf004f2e66a23aed50e5b)): ?>
<?php $attributes = $__attributesOriginal58c831a7c3cbf004f2e66a23aed50e5b; ?>
<?php unset($__attributesOriginal58c831a7c3cbf004f2e66a23aed50e5b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal58c831a7c3cbf004f2e66a23aed50e5b)): ?>
<?php $component = $__componentOriginal58c831a7c3cbf004f2e66a23aed50e5b; ?>
<?php unset($__componentOriginal58c831a7c3cbf004f2e66a23aed50e5b); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Bucket\Desktop\Commandes\placo-app\resources\views\commande\index.blade.php ENDPATH**/ ?>