<?php if (isset($component)) { $__componentOriginal4619374cef299e94fd7263111d0abc69 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4619374cef299e94fd7263111d0abc69 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.app-layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 

        <h1 class="text-4xl font-extrabold tracking-tight mb-2 italic"><?php echo e(__('Mes Favoris')); ?></h1>
        <p class="text-slate-400 text-lg"><?php echo e(__('Retrouvez ici les produits que vous avez mis de côté.')); ?></p>
     <?php $__env->endSlot(); ?>

    <div x-data="{
        products: <?php echo e(Js::from($products)); ?>,
        isAuthenticated: <?php echo e(auth()->check() ? 'true' : 'false'); ?>,
        
        async toggleFavorite(productToToggle) {
            if (!this.isAuthenticated) {
                window.location.href = '/login';
                return;
            }

            try {
                const response = await fetch(`/favorites/toggle/${productToToggle.id}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').getAttribute('content'),
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    }
                });

                if (!response.ok) throw new Error('Network response was not ok');

                const data = await response.json();
                
                if (data.success) {
                    // Update local state - remove the item if we are on favorites page
                    this.products = this.products.filter(p => p.id !== productToToggle.id);
                    
                    // Show success message
                    if (window.showToast) {
                        window.showToast(data.message, 'success');
                    }
                }
            } catch (error) {
                console.error('Failed to toggle favorite:', error);
                if (window.showToast) {
                    window.showToast('<?php echo e(__('Une erreur est survenue')); ?>', 'error');
                }
            }
        }
    }">
        <template x-if="products.length === 0">
            <div class="flex flex-col items-center justify-center py-20 bg-white/2 border border-white/5 rounded-[2.5rem]">
                <div class="w-24 h-24 rounded-full bg-white/5 flex items-center justify-center mb-6">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-heart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-10 h-10 text-slate-700 opacity-50']); ?>
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
                <h3 class="text-2xl font-display font-bold text-white mb-2"><?php echo e(__('Votre liste est vide')); ?></h3>
                <p class="text-slate-500 mb-8 max-w-sm text-center"><?php echo e(__('Parcourez notre catalogue et cliquez sur le cœur pour ajouter des produits à vos favoris.')); ?></p>
                <a href="<?php echo e(route('products.index')); ?>" class="bg-portal-accent text-black px-8 py-4 rounded-xl font-bold hover:bg-white transition-all shadow-xl flex items-center gap-2">
                    <?php echo e(__('Explorer le Catalogue')); ?> <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-arrow-right'); ?>
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
                </a>
            </div>
        </template>
        
        <template x-if="products.length > 0">
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                <template x-for="product in products" :key="product.id">
                    <div class="group bg-[#141415] rounded-[2.5rem] border border-white/5 overflow-hidden flex flex-col hover:border-red-500/30 transition-all duration-500 hover:shadow-[0_20px_50px_rgba(0,0,0,0.5)]">
                        <!-- Image Area -->
                        <div class="relative h-64 bg-gradient-to-br from-white via-slate-50 to-slate-100 flex items-center justify-center overflow-hidden border-b border-white/5">
                             <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(circle, #000 1px, transparent 1px); background-size: 20px 20px;"></div>
                            
                             <!-- Heart Action Button -->
                             <button 
                                @click.stop="toggleFavorite(product)"
                                class="absolute top-6 right-6 z-20 w-12 h-12 rounded-full flex items-center justify-center bg-red-500 text-white shadow-xl hover:scale-110 transition-all duration-300"
                             >
                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-heart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-6 h-6 fill-current']); ?>
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

                             <a :href="'/products/' + product.id" class="relative z-10 w-full h-full p-8 flex items-center justify-center">
                                <img :src="product.image_url" :alt="product.name" class="max-w-full max-h-full w-auto h-auto object-contain group-hover:scale-110 transition-all duration-700 drop-shadow-2xl">
                             </a>
                        </div>

                        <!-- Content -->
                        <div class="p-8">
                            <div class="flex items-center gap-2 mb-3">
                                <span class="text-[0.6rem] font-black text-portal-accent uppercase tracking-[0.2em] bg-portal-accent/10 px-2 py-0.5 rounded shadow-sm" x-text="product.category?.name"></span>
                            </div>
                            <h3 class="font-display font-bold text-2xl text-white mb-4 group-hover:text-portal-accent transition-colors truncate" x-text="product.name"></h3>
                            
                            <div class="flex items-center justify-between mt-auto">
                                <div class="flex flex-col">
                                    <span class="text-[0.6rem] font-bold text-slate-500 uppercase tracking-widest"><?php echo e(__('Prix Promo B2B')); ?></span>
                                    <div class="text-2xl font-mono font-black text-white" x-text="Number(product.price).toFixed(2) + ' DA'"></div>
                                </div>
                                <a :href="'/products/' + product.id" class="w-12 h-12 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center text-slate-400 hover:bg-portal-accent hover:text-black hover:border-portal-accent transition-all group/btn">
                                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-arrow-right'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-6 h-6 group-hover/btn:translate-x-1 transition-transform']); ?>
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
                                </a>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </template>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4619374cef299e94fd7263111d0abc69)): ?>
<?php $attributes = $__attributesOriginal4619374cef299e94fd7263111d0abc69; ?>
<?php unset($__attributesOriginal4619374cef299e94fd7263111d0abc69); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4619374cef299e94fd7263111d0abc69)): ?>
<?php $component = $__componentOriginal4619374cef299e94fd7263111d0abc69; ?>
<?php unset($__componentOriginal4619374cef299e94fd7263111d0abc69); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Bucket\Desktop\Commandes\placo-app\resources\views\products\favorites.blade.php ENDPATH**/ ?>