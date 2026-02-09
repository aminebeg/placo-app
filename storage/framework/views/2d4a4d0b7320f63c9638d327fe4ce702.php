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
        <div class="mb-8">
            <a href="<?php echo e(route('products.index')); ?>" class="inline-flex items-center gap-2 text-sm font-bold text-slate-400 hover:text-white transition-colors mb-6 group">
                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-arrow-left'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4 transition-transform group-hover:-translate-x-1']); ?>
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
                <?php echo e(__('Retour au Catalogue')); ?>

            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20">
            <!-- Left Column: Image -->
            <div class="relative">
                <div class="sticky top-28 bg-[#141415] rounded-3xl border border-white/5 p-12 lg:p-20 flex items-center justify-center overflow-hidden min-h-[500px] shadow-2xl">
                     <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-white/5 via-[#141415] to-[#141415]"></div>
                     
                     <!-- Decorative elements -->
                     <div class="absolute top-8 left-8">
                        <div class="text-[0.6rem] font-bold text-slate-500 uppercase tracking-widest border border-white/10 px-3 py-1 rounded-full bg-black/20 backdrop-blur-md">
                            <?php echo e(__('Spécification Pro')); ?>

                        </div>
                     </div>

                    <?php if($product->image_url): ?>
                        <img src="<?php echo e($product->image_url); ?>" alt="<?php echo e($product->name); ?>" class="relative z-10 max-h-full max-w-full object-contain drop-shadow-2xl hover:scale-105 transition-transform duration-700">
                    <?php else: ?>
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-package'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'relative z-10 w-32 h-32 text-slate-700 stroke-1 opacity-50']); ?>
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
                    <?php endif; ?>

                    <!-- Zoom Hint -->
                    <div class="absolute bottom-8 right-8">
                        <button class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-portal-accent hover:text-black transition-all backdrop-blur-md">
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-maximize-2'); ?>
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
                </div>
            </div>

            <!-- Right Column: Details -->
            <div class="flex flex-col">
                <div class="mb-8 border-b border-white/5 pb-8">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="inline-block bg-portal-accent/10 text-portal-accent border border-portal-accent/20 px-3 py-1 rounded-full text-[0.65rem] font-bold uppercase tracking-widest"><?php echo e($product->category->name ?? __('Non classé')); ?></span>
                        <span class="inline-block bg-white/5 text-slate-400 border border-white/10 px-3 py-1 rounded-full text-[0.65rem] font-bold uppercase tracking-widest"><?php echo e(__('Ref: ') . str_pad($product->id, 6, '0', STR_PAD_LEFT)); ?></span>
                    </div>

                    <h1 class="font-display font-black text-4xl lg:text-5xl text-white mb-6 leading-[1.1]"><?php echo e($product->name); ?></h1>
                    
                    <div class="flex items-end gap-2">
                        <?php if(auth()->guard()->check()): ?>
                            <div class="font-display font-bold text-4xl text-white tracking-tight">
                                <?php echo e(number_format($product->price, 2)); ?> <span class="text-lg text-slate-500 font-sans font-normal">DA</span>
                            </div>
                            <div class="mb-1.5 text-xs font-bold text-slate-500 uppercase tracking-wider"><?php echo e(__('HT / Unité')); ?></div>
                        <?php else: ?>
                            <div class="text-xl font-medium text-slate-500 italic"><?php echo e(__('Accès Client Requis pour Tarification')); ?></div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="space-y-8 mb-12">
                    <div>
                        <h3 class="text-sm font-bold text-white mb-3 flex items-center gap-2">
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-align-left'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4 text-portal-accent']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?> <?php echo e(__('Description du Produit')); ?>

                        </h3>
                        <p class="text-slate-400 leading-relaxed text-sm lg:text-base">
                            <?php echo e($product->description_fr ?? $product->description_en ?? __('Aucune description disponible pour ce produit.')); ?>

                        </p>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="p-5 rounded-2xl bg-[#141415] border border-white/5">
                            <div class="text-[0.6rem] font-bold text-slate-500 uppercase tracking-wider mb-2"><?php echo e(__('Poids Unitaire')); ?></div>
                            <div class="font-bold text-white flex items-center gap-2 text-lg">
                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-weight'); ?>
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
                                <span><?php echo e($product->weight_kg ? number_format($product->weight_kg, 2) . ' kg' : 'N/A'); ?></span>
                            </div>
                        </div>
                        <div class="p-5 rounded-2xl bg-[#141415] border border-white/5">
                            <div class="text-[0.6rem] font-bold text-slate-500 uppercase tracking-wider mb-2"><?php echo e(__('Logistique / Colisage')); ?></div>
                            <div class="font-bold text-white flex items-center gap-2 text-lg">
                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-layers'); ?>
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
                                <span><?php echo e($product->pieces_per_bundle ? $product->pieces_per_bundle . ' pcs/lot' : 'N/A'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if(auth()->guard()->check()): ?>
                <div class="mt-auto bg-[#141415] border border-white/5 rounded-2xl p-6 lg:p-8" 
                    x-data="{ 
                        quantity: 1,
                        piecesPerBundle: <?php echo e($product->pieces_per_bundle ?? 1); ?>,
                        get isMultiple() { return this.piecesPerBundle > 1 && this.quantity % this.piecesPerBundle === 0; },
                        get needsSuggestion() { return this.piecesPerBundle > 1 && this.quantity % this.piecesPerBundle !== 0; },
                        get suggestedQuantity() {
                            return Math.ceil(this.quantity / this.piecesPerBundle) * this.piecesPerBundle;
                        }
                    }">
                    <h3 class="text-sm font-bold text-white mb-6 uppercase tracking-widest"><?php echo e(__('Ma Commande')); ?></h3>
                    
                    <div class="flex flex-col gap-6">
                        <div class="flex flex-col md:flex-row gap-4">
                            <div class="flex items-center bg-black border border-white/10 rounded-xl h-14 w-full md:w-40 relative">
                                <button @click="if(quantity > 1) quantity--" class="w-12 h-full flex items-center justify-center text-slate-400 hover:text-white hover:bg-white/5 rounded-l-xl transition-colors">
                                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-minus'); ?>
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
                                <input type="number" x-model.number="quantity" class="w-full bg-transparent border-none text-center text-white font-bold text-xl focus:ring-0 p-0 h-full appearance-none">
                                <button @click="quantity++" class="w-12 h-full flex items-center justify-center text-slate-400 hover:text-white hover:bg-white/5 rounded-r-xl transition-colors">
                                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-plus'); ?>
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
                            
                            <button 
                                @click="$dispatch('add-to-commande', { productId: <?php echo e($product->id); ?>, quantity: quantity })"
                                class="flex-1 bg-portal-accent text-black font-bold text-sm uppercase tracking-wider rounded-xl hover:bg-white transition-all h-14 flex items-center justify-center gap-2 shadow-[0_10px_20px_rgba(var(--portal-accent-rgb),0.3)] group"
                            >
                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-shopping-cart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5 group-hover:scale-110 transition-transform']); ?>
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
                                <?php echo e(__('Ajouter à ma Liste')); ?>

                            </button>
                        </div>

                        <!-- Smart Suggestion Alert -->
                        <div x-show="needsSuggestion" x-transition class="bg-blue-500/10 border border-blue-500/20 rounded-2xl p-4 flex gap-4 items-center">
                            <div class="p-2 rounded-lg bg-blue-500/20 text-blue-400 flex-shrink-0">
                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-lightbulb'); ?>
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
                            </div>
                            <div class="flex-1">
                                <div class="text-sm font-bold text-blue-400 mb-1"><?php echo e(__('Optimisation Logistique')); ?></div>
                                <p class="text-xs text-blue-300 leading-relaxed mb-3">
                                    <?php echo e(__('Ce produit est conditionné en paquets de')); ?> <span class="font-bold text-white"><?php echo e($product->pieces_per_bundle); ?></span>. 
                                    <?php echo e(__('Commandez-en')); ?> <span class="font-bold text-white" x-text="suggestedQuantity"></span> <?php echo e(__('pour un transport optimal.')); ?>

                                </p>
                                <button type="button" @click="quantity = suggestedQuantity" class="text-xs font-black uppercase tracking-tighter text-white bg-blue-500 px-3 py-1.5 rounded-lg hover:bg-blue-400 transition-colors">
                                    <?php echo e(__('Ajuster à')); ?> <span x-text="suggestedQuantity"></span>
                                </button>
                            </div>
                        </div>

                        <div x-show="isMultiple" x-transition class="bg-green-500/10 border border-green-500/20 rounded-2xl p-4 flex gap-4 items-center">
                            <div class="p-2 rounded-lg bg-green-500/20 text-green-400 flex-shrink-0">
                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-check-circle'); ?>
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
                            </div>
                            <p class="text-xs text-green-300 font-bold">
                                <?php echo e(__('Votre commande correspond parfaitement au conditionnement standard.')); ?>

                            </p>
                        </div>
                    </div>
                </div>
                <!-- Helper script for commande dispatch -->
                <script>
                    document.addEventListener('alpine:init', () => {
                        window.addEventListener('add-to-commande', async (e) => {
                            const { productId, quantity } = e.detail;
                            try {
                                const response = await fetch(`/commande/add/${productId}`, {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').getAttribute('content'),
                                        'Content-Type': 'application/json',
                                        'Accept': 'application/json'
                                    },
                                    body: JSON.stringify({ quantity })
                                });
                                const data = await response.json();
                                if (data.success) {
                                    window.showToast(data.message, 'success');
                                    window.dispatchEvent(new CustomEvent('commande-updated', { detail: { count: data.commande_count } }));
                                } else {
                                    window.showToast(data.message, 'error');
                                }
                            } catch (error) {
                                console.error('Error adding to commande:', error);
                                window.showToast('Erreur lors de l\'ajout à votre liste', 'error');
                            }
                        });
                    });
                </script>
                <?php else: ?>
                <div class="mt-auto p-6 rounded-2xl bg-white/5 border border-white/5 text-center">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-lock'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-8 h-8 text-slate-500 mx-auto mb-3']); ?>
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
                    <p class="text-slate-400 mb-4 font-medium"><?php echo e(__('Veuillez vous connecter pour commander.')); ?></p>
                    <a href="<?php echo e(route('login')); ?>" class="portal-btn portal-btn-primary inline-flex">
                        <?php echo e(__('Se connecter')); ?>

                    </a>
                </div>
                <?php endif; ?>

                <div class="mt-8 flex gap-4">
                     <a href="<?php echo e(route('products.technical_sheet', $product->id)); ?>" target="_blank" class="flex-1 p-4 rounded-xl border border-white/10 hover:bg-white/5 transition-colors flex items-center justify-center gap-2 text-slate-400 hover:text-white group">
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-file-text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5 text-portal-accent group-hover:text-white transition-colors']); ?>
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
                        <span class="text-sm font-bold"><?php echo e(__('Fiche Technique PDF')); ?></span>
                    </a>
                    <?php if(auth()->check() && auth()->user()->role === 'admin'): ?>
                        <a href="<?php echo e(route('admin.products.edit', $product->id)); ?>" class="flex-1 p-4 rounded-xl border border-white/10 hover:bg-white/5 transition-colors flex items-center justify-center gap-2 text-slate-400 hover:text-white group">
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-edit-2'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5 text-blue-400']); ?>
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
                            <span class="text-sm font-bold"><?php echo e(__('Modifier')); ?></span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
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
<?php /**PATH C:\Users\Bucket\Desktop\Commandes\placo-app\resources\views/products/show.blade.php ENDPATH**/ ?>