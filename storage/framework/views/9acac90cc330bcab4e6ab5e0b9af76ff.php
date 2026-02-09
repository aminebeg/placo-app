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
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8" x-data="orderForm()">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <a href="<?php echo e(route('admin.dashboard', ['tab' => 'orders'])); ?>" class="inline-flex items-center gap-2 text-sm font-medium text-portal-muted hover:text-white transition-colors mb-2">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-arrow-left'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4 rtl:rotate-180']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?> <?php echo e(__('Retour aux Commandes')); ?>

                </a>
                <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight uppercase italic text-white flex items-center gap-3">
                    <?php echo e(__('Modifier Commande')); ?>

                    <span class="text-lg bg-white/10 px-2 py-1 rounded text-portal-muted not-italic font-mono">#<?php echo e($order->order_number); ?></span>
                </h1>
                <p class="text-portal-muted mt-1"><?php echo e(__('Modification complète de la commande et des informations client associées.')); ?></p>
            </div>
            
            <div class="flex items-center gap-3">
                <a href="<?php echo e(route('orders.show', $order->id)); ?>" class="px-4 py-2 rounded-lg border border-portal-border text-portal-muted hover:text-white hover:bg-white/5 transition-colors text-sm font-medium flex items-center gap-2">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-eye'); ?>
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
<?php endif; ?> <?php echo e(__('Voir')); ?>

                </a>
                <button type="button" @click="resetForm()" class="px-4 py-2 rounded-lg border border-portal-border text-portal-muted hover:text-white hover:bg-white/5 transition-colors text-sm font-medium">
                    <?php echo e(__('Réinitialiser')); ?>

                </button>
                <button form="order-edit-form" type="submit" class="px-6 py-2 rounded-lg bg-portal-accent text-black font-bold uppercase tracking-wide hover:brightness-110 transition-all shadow-lg shadow-portal-accent/20 flex items-center gap-2">
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
<?php endif; ?>
                    <?php echo e(__('Mettre à jour')); ?>

                </button>
            </div>
        </div>

        <form id="order-edit-form" action="<?php echo e(route('admin.orders.update', $order->id)); ?>" method="POST" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <!-- Left Column: Main Info -->
            <div class="lg:col-span-2 space-y-6">
                
                <!-- Customer Info Card -->
                <div class="bg-portal-sidebar/50 backdrop-blur-sm border border-portal-border rounded-xl overflow-hidden shadow-lg shadow-black/20">
                    <div class="px-6 py-4 border-b border-portal-border bg-white/5 flex items-center justify-between">
                        <h2 class="font-bold text-lg flex items-center gap-2 text-white">
                            <span class="p-1.5 rounded-lg bg-purple-500/10 text-purple-400"><?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-user'); ?>
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
<?php endif; ?></span>
                            <?php echo e(__('Informations Client')); ?>

                        </h2>
                        <span class="text-xs text-portal-muted bg-white/5 px-2 py-1 rounded"><?php echo e(__('Modifie le profil')); ?></span>
                    </div>

                    <!-- User Search/Select -->
                    <div class="px-6 pt-6 -mb-2 relative z-20">
                        <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2"><?php echo e(__('Rechercher un autre client')); ?></label>
                        <div class="relative">
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-search'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-portal-muted']); ?>
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
                            <input type="text" x-model="userSearch" placeholder="<?php echo e(__('Nom, email ou téléphone...')); ?>" 
                                class="w-full bg-black/40 border border-portal-border text-white rounded-lg pl-10 pr-4 py-2.5 focus:ring-1 focus:ring-portal-accent focus:border-portal-accent transition-all placeholder:text-white/20">
                            
                            <!-- Dropdown Results -->
                            <div x-show="userSearch.length > 1 && filteredUsers.length > 0" 
                                class="absolute top-full left-0 right-0 mt-1 bg-[#141415] border border-portal-border rounded-lg shadow-xl max-h-60 overflow-y-auto z-50"
                                x-transition.opacity
                                style="display: none;">
                                <template x-for="user in filteredUsers" :key="user.id">
                                    <div @click="selectUser(user)" class="px-4 py-3 hover:bg-white/5 cursor-pointer border-b border-white/5 last:border-0 group">
                                        <div class="flex items-center justify-between">
                                            <span class="font-bold text-white text-sm" x-text="user.first_name + ' ' + user.last_name"></span>
                                            <span class="text-xs text-portal-accent bg-portal-accent/10 px-2 py-0.5 rounded" x-show="user.company" x-text="user.company"></span>
                                        </div>
                                        <div class="flex items-center gap-3 mt-1 text-xs text-portal-muted">
                                            <span x-text="user.email || 'Pas d\'email'"></span>
                                            <span>&bull;</span>
                                            <span x-text="user.phone || 'Pas de tél'"></span>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- First Name -->
                        <div class="group">
                            <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2 group-focus-within:text-portal-accent transition-colors"><?php echo e(__('Prénom')); ?> <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-portal-muted"><?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-user'); ?>
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
<?php endif; ?></span>
                                <input type="text" name="first_name" value="<?php echo e(old('first_name', $order->user->first_name)); ?>" required 
                                    class="w-full bg-black/40 border border-portal-border text-white rounded-lg pl-10 pr-4 py-2.5 focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all placeholder:text-white/20" 
                                    placeholder="John">
                            </div>
                            <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Last Name -->
                        <div class="group">
                            <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2 group-focus-within:text-portal-accent transition-colors"><?php echo e(__('Nom')); ?> <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-portal-muted"><?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-user'); ?>
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
<?php endif; ?></span>
                                <input type="text" name="last_name" value="<?php echo e(old('last_name', $order->user->last_name)); ?>" required 
                                    class="w-full bg-black/40 border border-portal-border text-white rounded-lg pl-10 pr-4 py-2.5 focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all placeholder:text-white/20" 
                                    placeholder="Doe">
                            </div>
                            <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                        <!-- Email -->
                        <div class="group">
                            <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2 group-focus-within:text-portal-accent transition-colors"><?php echo e(__('Email')); ?> <span class="text-white/30 lowercase font-normal">(<?php echo e(__('Optionnel')); ?>)</span></label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-portal-muted"><?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-mail'); ?>
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
<?php endif; ?></span>
                                <input type="email" name="email" value="<?php echo e(old('email', $order->user->email)); ?>" 
                                    class="w-full bg-black/40 border border-portal-border text-white rounded-lg pl-10 pr-4 py-2.5 focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all placeholder:text-white/20" 
                                    placeholder="client@example.com">
                            </div>
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Phone -->
                        <div class="group">
                            <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2 group-focus-within:text-portal-accent transition-colors"><?php echo e(__('Téléphone')); ?> <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-portal-muted"><?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-phone'); ?>
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
<?php endif; ?></span>
                                <input type="text" name="phone" value="<?php echo e(old('phone', $order->user->phone)); ?>" required 
                                    class="w-full bg-black/40 border border-portal-border text-white rounded-lg pl-10 pr-4 py-2.5 focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all placeholder:text-white/20" 
                                    placeholder="0550...">
                            </div>
                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                        <!-- Company -->
                        <div class="md:col-span-2 group">
                            <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2 group-focus-within:text-portal-accent transition-colors"><?php echo e(__('Entreprise')); ?> <span class="text-white/30 lowercase font-normal">(<?php echo e(__('Optionnel')); ?>)</span></label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-portal-muted"><?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-building'); ?>
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
<?php endif; ?></span>
                                <input type="text" name="company" value="<?php echo e(old('company', $order->user->company)); ?>" 
                                    class="w-full bg-black/40 border border-portal-border text-white rounded-lg pl-10 pr-4 py-2.5 focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all placeholder:text-white/20" 
                                    placeholder="SARL...">
                            </div>
                            <?php $__errorArgs = ['company'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>

                <!-- Order Items Card -->
                <div class="bg-portal-sidebar/50 backdrop-blur-sm border border-portal-border rounded-xl overflow-hidden flex flex-col min-h-[400px] shadow-lg shadow-black/20">
                    <div class="px-6 py-4 border-b border-portal-border bg-white/5 flex items-center justify-between">
                        <h2 class="font-bold text-lg flex items-center gap-2 text-white">
                            <span class="p-1.5 rounded-lg bg-portal-accent/10 text-portal-accent"><?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-package'); ?>
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
<?php endif; ?></span>
                            <?php echo e(__('Contenu de la Commande')); ?>

                        </h2>
                        <span class="text-xs font-mono bg-white/10 px-2 py-1 rounded text-portal-muted" x-text="items.length + ' <?php echo e(__('Articles')); ?>'"></span>
                    </div>

                    <div class="p-6 flex-1 flex flex-col">
                        <!-- Items Header (Desktop) -->
                        <div class="hidden md:grid grid-cols-12 gap-4 mb-2 text-[10px] font-bold text-portal-muted uppercase tracking-wider px-2">
                            <div class="col-span-6"><?php echo e(__('Produit')); ?></div>
                            <div class="col-span-2 text-center"><?php echo e(__('Quantité')); ?></div>
                            <div class="col-span-3 text-right"><?php echo e(__('Prix Tot.')); ?></div>
                            <div class="col-span-1"></div>
                        </div>

                        <!-- Items List -->
                        <div class="space-y-3 mb-6">
                            <template x-for="(item, index) in items" :key="index">
                                <div class="bg-black/40 border border-portal-border rounded-lg p-3 md:grid md:grid-cols-12 md:gap-4 md:items-center relative group hover:border-portal-accent/30 transition-colors">
                                    
                                    <!-- Product Select (Searchable) -->
                                    <div class="col-span-6 mb-3 md:mb-0 relative" x-data="{
                                        search: '',
                                        open: false,
                                        get filteredProducts() {
                                            if (this.search === '') return this.products; 
                                            return this.products.filter(p => p.name.toLowerCase().includes(this.search.toLowerCase()));
                                        },
                                        init() {
                                            if (item.product_id) {
                                                const p = this.products.find(p => p.id == item.product_id);
                                                if (p) this.search = p.name;
                                            }
                                            this.$watch('item.product_id', (value) => {
                                                if (!value) this.search = '';
                                            });
                                        },
                                        selectProduct(p) {
                                            item.product_id = p.id;
                                            this.search = p.name;
                                            this.open = false;
                                        }
                                    }">
                                        <div class="relative">
                                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-search'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-portal-muted pointer-events-none']); ?>
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
                                            <input type="text" 
                                                x-model="search" 
                                                @focus="open = true"
                                                @click.outside="open = false"
                                                @keydown.escape="open = false"
                                                placeholder="<?php echo e(__('Rechercher un produit...')); ?>"
                                                class="w-full bg-black/40 border border-portal-border rounded-lg pl-10 pr-4 py-2.5 text-white text-sm focus:ring-1 focus:ring-portal-accent focus:border-portal-accent transition-colors placeholder:text-white/20"
                                            >
                                            <input type="hidden" :name="`items[${index}][product_id]`" x-model="item.product_id">
                                            
                                            <!-- Chevron indicator -->
                                            <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none text-portal-muted">
                                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-chevron-down'); ?>
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
                                            </div>
                                        </div>

                                        <!-- Dropdown Results -->
                                        <div x-show="open" 
                                            class="absolute top-full left-0 right-0 mt-1 bg-[#141415] border border-portal-border rounded-lg shadow-xl max-h-60 overflow-y-auto z-50"
                                            x-transition.opacity
                                            style="display: none;">
                                            <template x-for="product in filteredProducts" :key="product.id">
                                                <div @click="selectProduct(product)" class="px-4 py-3 hover:bg-white/5 cursor-pointer border-b border-white/5 last:border-0 group">
                                                    <div class="flex items-center justify-between">
                                                        <span class="font-bold text-white text-sm" x-text="product.name"></span>
                                                        <span class="text-xs font-mono text-portal-accent" x-text="formatMoney(product.price)"></span>
                                                    </div>
                                                </div>
                                            </template>
                                            <div x-show="filteredProducts.length === 0" class="px-4 py-3 text-portal-muted text-xs italic">
                                                <?php echo e(__('Aucun produit trouvé.')); ?>

                                            </div>
                                        </div>
                                        
                                        <p x-show="getError(index, 'product_id')" x-text="getError(index, 'product_id')" class="text-red-500 text-xs mt-1"></p>
                                    </div>

                                    <!-- Quantity -->
                                    <div class="col-span-2 mb-3 md:mb-0 flex justify-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <button type="button" @click="item.quantity > 1 ? item.quantity-- : null" class="w-8 h-8 flex items-center justify-center bg-white/5 hover:bg-white/10 rounded-lg transition-colors text-white/50 hover:text-white font-bold">-</button>
                                            <input type="number" :name="`items[${index}][quantity]`" x-model="item.quantity" min="1" required 
                                                class="w-16 bg-transparent border-0 text-center text-white font-bold text-lg focus:ring-0 p-0 appearance-none">
                                            <button type="button" @click="item.quantity++" class="w-8 h-8 flex items-center justify-center bg-white/5 hover:bg-white/10 rounded-lg transition-colors text-white/50 hover:text-white font-bold">+</button>
                                        </div>
                                    </div>

                                    <!-- Price Display -->
                                    <div class="col-span-3 mb-3 md:mb-0 text-right font-mono font-medium text-portal-accent">
                                        <span x-text="formatMoney(getItemTotal(item))"></span>
                                    </div>

                                    <!-- Delete Button -->
                                    <div class="col-span-1 text-right md:text-center absolute top-2 right-2 md:relative md:top-auto md:right-auto">
                                        <button type="button" @click="removeItem(index)" class="text-white/20 hover:text-red-500 transition-colors p-2" :disabled="items.length === 1">
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
                                    </div>
                                </div>
                            </template>
                        </div>

                        <!-- Add Button -->
                        <button type="button" @click="addItem()" class="w-full py-4 border border-dashed border-portal-border hover:border-portal-accent/50 bg-white/[0.02] hover:bg-white/[0.05] text-portal-muted hover:text-white rounded-xl flex items-center justify-center gap-2 transition-all font-bold text-sm">
                            <div class="w-6 h-6 rounded-full bg-white/10 flex items-center justify-center group-hover:scale-110 transition-transform">
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
                            </div>
                            <?php echo e(__('Ajouter un produit')); ?>

                        </button>
                    </div>
                </div>
            </div>

            <!-- Right Column: Summary & Actions -->
            <div class="space-y-6">
                
                <!-- Status & Dates Card -->
                <div class="bg-portal-sidebar/50 backdrop-blur-sm border border-portal-border rounded-xl overflow-hidden p-6 space-y-6 shadow-lg shadow-black/20">
                     <h3 class="font-bold text-white text-sm uppercase tracking-wider border-b border-white/10 pb-2 mb-4"><?php echo e(__('Paramètres de Commande')); ?></h3>
                     
                    <div class="relative">
                        <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2"><?php echo e(__('Statut Actuel')); ?></label>
                        <select name="status" class="w-full bg-black/40 border border-portal-border text-white rounded-lg pl-4 pr-10 py-2.5 focus:ring-1 focus:ring-portal-accent focus:border-portal-accent appearance-none transition-colors">
                            <option value="pending" class="bg-[#141415]" <?php echo e(old('status', $order->status) == 'pending' ? 'selected' : ''); ?>><?php echo e(__('En attente (Pending)')); ?></option>
                            <option value="confirmed" class="bg-[#141415]" <?php echo e(old('status', $order->status) == 'confirmed' ? 'selected' : ''); ?>><?php echo e(__('Confirmé (Confirmed)')); ?></option>
                            <option value="in_delivery" class="bg-[#141415]" <?php echo e(old('status', $order->status) == 'in_delivery' ? 'selected' : ''); ?>><?php echo e(__('En Livraison (In Delivery)')); ?></option>
                            <option value="delivered" class="bg-[#141415]" <?php echo e(old('status', $order->status) == 'delivered' ? 'selected' : ''); ?>><?php echo e(__('Livré (Delivered)')); ?></option>
                            <option value="cancelled" class="bg-[#141415]" <?php echo e(old('status', $order->status) == 'cancelled' ? 'selected' : ''); ?>><?php echo e(__('Annulé (Cancelled)')); ?></option>
                        </select>
                        <div class="absolute right-3 top-[34px] pointer-events-none text-portal-muted">
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-chevron-down'); ?>
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
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2"><?php echo e(__('Date souhaitée')); ?></label>
                        <input type="date" name="requested_delivery_date" value="<?php echo e(old('requested_delivery_date', $order->requested_delivery_date)); ?>" class="w-full bg-black/40 border border-portal-border text-white rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-colors">
                    </div>
                </div>

                <!-- Delivery Address -->
                <div class="bg-portal-sidebar/50 backdrop-blur-sm border border-portal-border rounded-xl overflow-hidden p-6 shadow-lg shadow-black/20">
                    <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2"><?php echo e(__('Adresse de Livraison')); ?></label>
                    <textarea name="delivery_address" rows="4" class="w-full bg-black/40 border border-portal-border text-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-colors resize-none"><?php echo e(old('delivery_address', $order->delivery_address)); ?></textarea>
                </div>

                <!-- Notes -->
                <div class="bg-portal-sidebar/50 backdrop-blur-sm border border-portal-border rounded-xl overflow-hidden p-6 shadow-lg shadow-black/20">
                    <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2"><?php echo e(__('Notes Internes')); ?></label>
                    <textarea name="notes" rows="3" class="w-full bg-black/40 border border-portal-border text-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-colors resize-none" placeholder="Instructions..."><?php echo e(old('notes', $order->notes)); ?></textarea>
                </div>

                <!-- Total Summary Sticky -->
                <div class="sticky top-6">
                    <div class="bg-portal-sidebar/80 backdrop-blur-md border border-portal-border rounded-xl p-6 shadow-2xl relative overflow-hidden group">
                        <div class="absolute top-0 right-0 p-6 opacity-10 group-hover:opacity-20 transition-opacity">
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-receipt'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-24 h-24 text-portal-accent']); ?>
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
                        <div class="relative z-10">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-portal-muted font-bold uppercase tracking-widest text-xs"><?php echo e(__('Total Estimé')); ?></h3>
                                <div class="p-2 rounded-lg bg-portal-accent/10 text-portal-accent">
                                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-calculator'); ?>
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
                                </div>
                            </div>
                            <div class="text-4xl font-mono font-bold text-white tracking-tight leading-none mb-2" x-text="formatMoney(total)"></div>
                            <p class="text-xs font-medium text-portal-muted flex items-center gap-2">
                                <span class="px-2 py-0.5 rounded bg-white/5 text-white" x-text="items.length + ' <?php echo e(__('Articles')); ?>'"></span>
                                <span><?php echo e(__('TVA incluse')); ?></span>
                            </p>
                        </div>
                        <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-portal-accent to-portal-accent/20"></div>
                    </div>
                </div>

            </div>
        </form>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('orderForm', () => ({
                items: <?php echo json_encode(old('items', $order->items->map(function($item) { return ['product_id' => $item->product_id, 'quantity' => $item->quantity]; }))) ?>,
                errors: <?php echo json_encode($errors->toArray(), 15, 512) ?>,
                products: <?php echo json_encode($products, 15, 512) ?>,
                users: <?php echo json_encode($users, 15, 512) ?>,
                userSearch: '',

                get filteredUsers() {
                    if (this.userSearch === '') return [];
                    const search = this.userSearch.toLowerCase();
                    return this.users.filter(user => {
                        return (user.first_name + ' ' + user.last_name).toLowerCase().includes(search) ||
                               (user.email && user.email.toLowerCase().includes(search)) ||
                               (user.phone && user.phone.includes(search)) ||
                               (user.company && user.company.toLowerCase().includes(search));
                    }).slice(0, 5); // Limit to 5 results
                },

                selectUser(user) {
                    // Update form values with user data
                    document.querySelector('input[name="first_name"]').value = user.first_name;
                    document.querySelector('input[name="last_name"]').value = user.last_name;
                    document.querySelector('input[name="email"]').value = user.email || '';
                    document.querySelector('input[name="phone"]').value = user.phone || '';
                    document.querySelector('input[name="company"]').value = user.company || '';
                    
                    this.userSearch = ''; // Clear search
                },

                get total() {
                    return this.items.reduce((sum, item) => sum + this.getItemTotal(item), 0);
                },

                getItemTotal(item) {
                    const product = this.products.find(p => p.id == item.product_id);
                    return product ? (parseFloat(product.price) * parseInt(item.quantity || 0)) : 0;
                },

                formatMoney(amount) {
                    return new Intl.NumberFormat('fr-DZ', { style: 'currency', currency: 'DZD', maximumFractionDigits: 0 }).format(amount);
                },

                getError(index, field) {
                    const key = `items.${index}.${field}`;
                    return this.errors[key] ? this.errors[key][0] : null;
                },
                
                addItem() {
                    this.items.push({ product_id: '', quantity: 1 });
                },
                
                removeItem(index) {
                    if (this.items.length > 1) {
                        this.items.splice(index, 1);
                    }
                },
                
                resetForm() {
                    if(confirm('Êtes-vous sûr de vouloir réinitialiser les modifications ?')) {
                        window.location.reload();
                    }
                }
            }));
        });
    </script>
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
<?php /**PATH C:\Users\Bucket\Desktop\Commandes\placo-app\resources\views/admin/orders/edit.blade.php ENDPATH**/ ?>