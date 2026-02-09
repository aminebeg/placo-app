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
        <span class="inline-block bg-portal-accent text-black px-2.5 py-1 rounded-md text-[0.7rem] font-extrabold uppercase tracking-wider mb-2"><?php echo e(__('Administration')); ?></span>
        <h1 class="text-4xl font-extrabold tracking-tight mb-2 uppercase italic"><?php echo e(__('Paramètres Généraux')); ?></h1>
        <p class="text-portal-muted text-lg"><?php echo e(__('Configuration de l\'application et de l\'entreprise.')); ?></p>
     <?php $__env->endSlot(); ?>

    <!-- Content -->
    <div class="max-w-4xl">
        <form action="<?php echo e(route('admin.settings.update')); ?>" method="POST" enctype="multipart/form-data" class="space-y-8">
            <?php echo csrf_field(); ?>
            
            <!-- Company Info Section -->
            <div class="bg-portal-sidebar border border-portal-border rounded-xl p-6">
                <h3 class="font-display font-bold text-lg mb-6 flex items-center gap-2">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-building'); ?>
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
                    <?php echo e(__('Information Entreprise')); ?>

                </h3>
                
                <div class="space-y-6">
                    <!-- Company Name -->
                    <div>
                        <label class="block text-sm font-bold text-portal-muted mb-2 uppercase tracking-wide"><?php echo e(__('Nom de l\'entreprise')); ?></label>
                        <input type="text" name="company_name" value="<?php echo e($settings['company_name'] ?? ''); ?>" class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all">
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-sm font-bold text-portal-muted mb-2 uppercase tracking-wide"><?php echo e(__('Slogan / Description')); ?></label>
                        <input type="text" name="company_description" value="<?php echo e($settings['company_description'] ?? ''); ?>" class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all">
                    </div>

                    <!-- Address -->
                    <div>
                        <label class="block text-sm font-bold text-portal-muted mb-2 uppercase tracking-wide"><?php echo e(__('Adresse Physique')); ?></label>
                        <textarea name="company_address" rows="3" class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all"><?php echo e($settings['company_address'] ?? ''); ?></textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Phone -->
                        <div>
                            <label class="block text-sm font-bold text-portal-muted mb-2 uppercase tracking-wide"><?php echo e(__('Téléphone')); ?></label>
                            <input type="text" name="company_phone" value="<?php echo e($settings['company_phone'] ?? ''); ?>" class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all">
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-bold text-portal-muted mb-2 uppercase tracking-wide"><?php echo e(__('Email Contact')); ?></label>
                            <input type="email" name="company_email" value="<?php echo e($settings['company_email'] ?? ''); ?>" class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Branding Section -->
            <div class="bg-portal-sidebar border border-portal-border rounded-xl p-6">
                <h3 class="font-display font-bold text-lg mb-6 flex items-center gap-2">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-image'); ?>
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
                    <?php echo e(__('Identité Visuelle')); ?>

                </h3>

                <div class="flex items-start gap-8">
                     <?php if(isset($settings['company_logo']) && $settings['company_logo']): ?>
                        <div class="bg-white p-4 rounded-xl">
                            <img src="<?php echo e(Storage::url($settings['company_logo'])); ?>" alt="Logo" class="max-h-32 object-contain">
                        </div>
                    <?php endif; ?>
                    
                    <div class="flex-1">
                        <label class="block text-sm font-bold text-portal-muted mb-2 uppercase tracking-wide"><?php echo e(__('Logo Officiel')); ?></label>
                        <input type="file" name="company_logo" accept="image/*" class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-bold file:bg-portal-accent file:text-black hover:file:bg-white transition-all">
                        <p class="mt-2 text-xs text-portal-muted"><?php echo e(__('Format recommandé: PNG ou SVG avec fond transparent.')); ?></p>
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-portal-accent text-black font-black uppercase tracking-widest px-8 py-4 rounded-xl hover:bg-white transition-all shadow-[0_0_20px_rgba(21,128,61,0.4)] flex items-center gap-2">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-save'); ?>
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
                    <?php echo e(__('Enregistrer les modifications')); ?>

                </button>
            </div>
        </form>
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
<?php /**PATH C:\Users\Bucket\Desktop\Commandes\placo-app\resources\views/admin/settings.blade.php ENDPATH**/ ?>