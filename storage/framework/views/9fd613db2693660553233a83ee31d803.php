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
        <span class="inline-block bg-portal-accent text-black px-2.5 py-1 rounded-md text-[0.7rem] font-extrabold uppercase tracking-wider mb-2">Technical Catalog</span>
        <h1 class="text-4xl font-extrabold tracking-tight mb-2">Editor Specification</h1>
        <p class="text-portal-muted text-lg">Modify the specifications for existing asset.</p>
     <?php $__env->endSlot(); ?>

    <div class="max-w-4xl">
        <div class="bg-portal-sidebar border border-portal-border rounded-xl p-8">
            <form method="POST" action="<?php echo e(route('admin.products.update', $product->id)); ?>" enctype="multipart/form-data" class="space-y-8">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <!-- Basic Information -->
                <div class="space-y-6">
                    <h3 class="font-display font-bold text-lg border-b border-portal-border pb-2 mb-6 flex items-center gap-2">
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-box'); ?>
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
                        <?php echo e(__('Core Specifications')); ?>

                    </h3>
                    
                    <div class="mb-6">
                        <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2"><?php echo e(__('Product Image')); ?></label>
                        <?php if($product->image_url): ?>
                            <div class="mb-4">
                                <img src="<?php echo e($product->image_url); ?>" alt="Current Image" class="h-32 w-auto object-contain rounded-xl border border-portal-border bg-white/5 p-2">
                            </div>
                        <?php endif; ?>
                        <input type="file" name="image" class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-portal-accent file:text-black hover:file:bg-white transition-all">
                        <p class="text-xs text-portal-muted mt-2"><?php echo e(__('Leave blank to keep current image.')); ?></p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="space-y-2">
                            <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider"><?php echo e(__('Name (EN)')); ?></label>
                            <input type="text" name="name_en" value="<?php echo e(old('name_en', $product->name_en)); ?>" required class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all placeholder-portal-muted text-sm font-medium">
                        </div>
                        <div class="space-y-2">
                            <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider"><?php echo e(__('Name (FR)')); ?></label>
                            <input type="text" name="name_fr" value="<?php echo e(old('name_fr', $product->name_fr)); ?>" required class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all placeholder-portal-muted text-sm font-medium">
                        </div>
                        <div class="space-y-2">
                            <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider"><?php echo e(__('Name (AR)')); ?></label>
                            <input type="text" name="name_ar" value="<?php echo e(old('name_ar', $product->name_ar)); ?>" dir="rtl" required class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all placeholder-portal-muted text-sm font-medium">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="md:col-span-2 space-y-2">
                            <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider"><?php echo e(__('Category')); ?></label>
                            <select name="category_id" class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all text-sm font-medium cursor-pointer">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>" class="bg-portal-sidebar" <?php echo e($product->category_id == $category->id ? 'selected' : ''); ?>><?php echo e($category->name_en); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider"><?php echo e(__('Unit Price (DA)')); ?></label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-portal-muted font-mono text-sm">DA</span>
                                <input type="number" step="0.01" name="price" value="<?php echo e(old('price', $product->price)); ?>" required class="w-full bg-white/5 border border-portal-border rounded-xl pl-10 pr-4 py-3 text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all placeholder-portal-muted text-sm font-mono font-bold">
                            </div>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider"><?php echo e(__('Status')); ?></label>
                        <select name="status" class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all text-sm font-medium cursor-pointer">
                            <option value="active" class="bg-portal-sidebar" <?php echo e(old('status', $product->status) == 'active' ? 'selected' : ''); ?>><?php echo e(__('Actif - Visible pour les clients')); ?></option>
                            <option value="draft" class="bg-portal-sidebar" <?php echo e(old('status', $product->status) == 'draft' ? 'selected' : ''); ?>><?php echo e(__('Brouillon - En cours de préparation')); ?></option>
                            <option value="archived" class="bg-portal-sidebar" <?php echo e(old('status', $product->status) == 'archived' ? 'selected' : ''); ?>><?php echo e(__('Archivé - Masqué du catalogue')); ?></option>
                        </select>
                    </div>
                </div>

                <!-- Technical Details -->
                <div class="space-y-6">
                    <h3 class="font-display font-bold text-lg border-b border-portal-border pb-2 mb-6 flex items-center gap-2">
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-file-text'); ?>
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
                        <?php echo e(__('Technical Data')); ?>

                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="space-y-2">
                            <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider"><?php echo e(__('Description (EN)')); ?></label>
                            <textarea name="description_en" rows="4" class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all placeholder-portal-muted text-sm"><?php echo e(old('description_en', $product->description_en)); ?></textarea>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider"><?php echo e(__('Description (FR)')); ?></label>
                            <textarea name="description_fr" rows="4" class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all placeholder-portal-muted text-sm"><?php echo e(old('description_fr', $product->description_fr)); ?></textarea>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider"><?php echo e(__('Description (AR)')); ?></label>
                            <textarea name="description_ar" rows="4" dir="rtl" class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all placeholder-portal-muted text-sm"><?php echo e(old('description_ar', $product->description_ar)); ?></textarea>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-1">
                        <div class="space-y-2">
                            <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider"><?php echo e(__('Unit Weight (kg)')); ?></label>
                            <input type="number" step="0.001" name="weight_kg" value="<?php echo e(old('weight_kg', $product->weight_kg)); ?>" class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all text-sm font-mono">
                        </div>
                        <div class="space-y-2">
                            <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider"><?php echo e(__('Pieces per Bundle')); ?></label>
                            <input type="number" name="pieces_per_bundle" value="<?php echo e(old('pieces_per_bundle', $product->pieces_per_bundle)); ?>" class="w-full bg-white/5 border border-portal-border rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all text-sm font-mono">
                        </div>
                    </div>
                </div>

                <!-- Action Bar -->
                <div class="flex items-center justify-end gap-4 pt-6 border-t border-portal-border">
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="px-6 py-3 rounded-xl font-bold text-sm text-portal-muted hover:text-white hover:bg-white/5 transition-colors"><?php echo e(__('Discard')); ?></a>
                    <button type="submit" class="bg-portal-accent text-black px-6 py-3 rounded-xl font-bold text-sm hover:bg-white transition-colors flex items-center gap-2 shadow-[0_0_20px_rgba(21,128,61,0.4)]">
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-save'); ?>
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
<?php endif; ?> <?php echo e(__('Save Changes')); ?>

                    </button>
                </div>
            </form>
        </div>
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
<?php /**PATH C:\Users\Bucket\Desktop\Commandes\placo-app\resources\views/products/edit.blade.php ENDPATH**/ ?>