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
        <span class="inline-block bg-portal-accent text-black px-2.5 py-1 rounded-md text-[0.7rem] font-extrabold uppercase tracking-wider mb-2"><?php echo e(__('System Administration')); ?></span>
        <h1 class="text-4xl font-extrabold tracking-tight mb-2"><?php echo e(__('Command Center')); ?></h1>
        <p class="text-portal-muted text-lg"><?php echo e(__('Central Intelligence & Administrative Controls')); ?></p>
     <?php $__env->endSlot(); ?>

    <div x-data="{ activeTab: 'overview' }">
        <!-- Tab Navigation -->
        <div class="flex gap-2 bg-white/2 p-1.5 rounded-xl border border-portal-border w-fit mb-8">
            <button @click="activeTab = 'overview'" :class="{ 'bg-portal-accent/10 text-portal-accent shadow-lg': activeTab === 'overview', 'text-portal-muted hover:bg-white/5 hover:text-white': activeTab !== 'overview' }" class="flex items-center gap-2.5 px-5 py-2.5 rounded-lg text-sm font-bold transition-all duration-300">
                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-bar-chart-3'); ?>
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
                <?php echo e(__('Overview')); ?>

            </button>
            <button @click="activeTab = 'products'" :class="{ 'bg-portal-accent/10 text-portal-accent shadow-lg': activeTab === 'products', 'text-portal-muted hover:bg-white/5 hover:text-white': activeTab !== 'products' }" class="flex items-center gap-2.5 px-5 py-2.5 rounded-lg text-sm font-bold transition-all duration-300">
                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-package'); ?>
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
                <?php echo e(__('Inventory')); ?>

            </button>
            <button @click="activeTab = 'orders'" :class="{ 'bg-portal-accent/10 text-portal-accent shadow-lg': activeTab === 'orders', 'text-portal-muted hover:bg-white/5 hover:text-white': activeTab !== 'orders' }" class="flex items-center gap-2.5 px-5 py-2.5 rounded-lg text-sm font-bold transition-all duration-300">
                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-trending-up'); ?>
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
                <?php echo e(__('Transactions')); ?>

            </button>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
            <button @click="activeTab = 'users'" :class="{ 'bg-portal-accent/10 text-portal-accent shadow-lg': activeTab === 'users', 'text-portal-muted hover:bg-white/5 hover:text-white': activeTab !== 'users' }" class="flex items-center gap-2.5 px-5 py-2.5 rounded-lg text-sm font-bold transition-all duration-300">
                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-users'); ?>
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
                <?php echo e(__('Directory')); ?>

            </button>
            <?php endif; ?>
        </div>

        <!-- Overview Tab -->
        <div x-show="activeTab === 'overview'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-8">
            
            <!-- KPI Grid -->
            <div class="grid grid-cols-4 gap-6">
                <div class="bg-portal-sidebar border border-portal-border rounded-xl p-6 relative overflow-hidden group hover:border-portal-accent/50 transition-all duration-500 hover:scale-[1.02] hover:shadow-[0_20px_40px_-15px_rgba(var(--portal-accent-rgb),0.1)]">
                    <div class="absolute top-0 end-0 p-6 opacity-10 group-hover:opacity-20 group-hover:scale-110 transition-all duration-700">
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-trending-up'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-16 h-16 text-portal-accent']); ?>
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
                    <div class="flex items-center gap-4 mb-4">
                        <div class="p-3 rounded-lg bg-portal-accent/10 text-portal-accent">
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-trending-up'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-6 h-6']); ?>
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
                        <div class="text-xs font-bold text-portal-muted uppercase tracking-wider mb-1"><?php echo e(__('Gross Revenue')); ?></div>
                        <div class="text-2xl font-mono font-bold text-white"><?php echo e(number_format($stats['revenue'], 2)); ?> <?php echo e(__('DA')); ?></div>
                        <div class="text-xs font-medium mt-2 flex items-center gap-1 <?php echo e($stats['revenue_change'] >= 0 ? 'text-green-500' : 'text-red-500'); ?>">
                            <?php if($stats['revenue_change'] >= 0): ?>
                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-arrow-up-right'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-3 h-3 rtl:rotate-180']); ?>
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
                            <?php else: ?>
                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-arrow-down-right'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-3 h-3 rtl:rotate-180']); ?>
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
                            <?php echo e($stats['revenue_change']); ?>% <?php echo e(__('vs semaine derniÃ¨re')); ?>

                        </div>
                    </div>
                </div>

                <div class="bg-portal-sidebar border border-portal-border rounded-xl p-6 relative overflow-hidden group hover:border-portal-accent/50 transition-colors">
                    <div class="absolute top-0 end-0 p-6 opacity-10 group-hover:opacity-20 transition-opacity">
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-clock'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-16 h-16 text-portal-accent']); ?>
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
                    <div class="flex items-center gap-4 mb-4">
                        <div class="p-3 rounded-lg bg-portal-accent/10 text-portal-accent">
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-clock'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-6 h-6']); ?>
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
                        <div class="text-xs font-bold text-portal-muted uppercase tracking-wider mb-1"><?php echo e(__('Active Transmissions')); ?></div>
                        <div class="text-2xl font-mono font-bold text-white"><?php echo e($stats['active_orders']); ?></div>
                        <div class="text-xs font-medium text-portal-muted mt-2"><?php echo e(__('Pending Logistics')); ?></div>
                    </div>
                </div>

                <div class="bg-portal-sidebar border border-portal-border rounded-xl p-6 relative overflow-hidden group hover:border-portal-accent/50 transition-colors">
                    <div class="absolute top-0 end-0 p-6 opacity-10 group-hover:opacity-20 transition-opacity">
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-users'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-16 h-16 text-blue-500']); ?>
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
                    <div class="flex items-center gap-4 mb-4">
                        <div class="p-3 rounded-lg bg-blue-500/10 text-blue-500">
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-users'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-6 h-6']); ?>
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
                        <div class="text-xs font-bold text-portal-muted uppercase tracking-wider mb-1"><?php echo e(__('Stakeholders')); ?></div>
                        <div class="text-2xl font-mono font-bold text-white"><?php echo e($stats['total_users']); ?></div>
                        <div class="text-xs font-medium text-blue-500 mt-2 flex items-center gap-1">
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
<?php endif; ?> <?php echo e(__('Database Growth')); ?>

                        </div>
                    </div>
                </div>

                <div class="bg-portal-sidebar border border-portal-border rounded-xl p-6 relative overflow-hidden group hover:border-portal-accent/50 transition-colors">
                    <div class="absolute top-0 end-0 p-6 opacity-10 group-hover:opacity-20 transition-opacity">
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-alert-triangle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-16 h-16 text-red-500']); ?>
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
                    <div class="flex items-center gap-4 mb-4">
                        <div class="p-3 rounded-lg bg-red-500/10 text-red-500">
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-alert-triangle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-6 h-6']); ?>
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
                        <div class="text-xs font-bold text-portal-muted uppercase tracking-wider mb-1"><?php echo e(__('Critical Inventory')); ?></div>
                        <div class="text-2xl font-mono font-bold text-white"><?php echo e($stats['low_stock']); ?></div>
                        <div class="text-xs font-medium text-red-500 mt-2 flex items-center gap-1">
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-arrow-down'); ?>
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
<?php endif; ?> <?php echo e(__('Replenishment Req.')); ?>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity Block -->
            <div class="grid grid-cols-3 gap-8">
                <div class="col-span-2 bg-portal-sidebar border border-portal-border rounded-xl flex flex-col overflow-hidden">
                    <div class="p-6 border-b border-portal-border flex items-center justify-between">
                        <h2 class="font-display font-bold text-lg"><?php echo e(__('Commandes RÃ©centes')); ?></h2>
                        <button @click="activeTab = 'orders'" class="text-xs font-bold text-portal-muted hover:text-white transition-colors flex items-center gap-1">
                            <?php echo e(__('VOIR TOUT')); ?> <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-arrow-up-right'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-3 h-3 rtl:rotate-180']); ?>
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
                    <div class="overflow-x-auto">
                        <table class="w-full text-start whitespace-nowrap">
                            <thead class="bg-white/2 text-xs font-bold text-portal-muted uppercase tracking-wider">
                                <tr>
                                    <th class="px-6 py-3 text-start"><?php echo e(__('RÃ©f. Commande')); ?></th>
                                    <th class="px-6 py-3 text-start"><?php echo e(__('Client')); ?></th>
                                    <th class="px-6 py-3 text-start"><?php echo e(__('Statut')); ?></th>
                                    <th class="px-6 py-3 text-end"><?php echo e(__('Montant')); ?></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-portal-border">
                                <?php $__currentLoopData = $recent_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="hover:bg-white/5 transition-all cursor-pointer group" onclick="window.location='<?php echo e(route('orders.show', $order->id)); ?>'">
                                        <td class="px-6 py-4 font-mono text-portal-accent font-medium">#<?php echo e($order->order_number); ?></td>
                                        <td class="px-6 py-4 text-sm font-medium"><?php echo e($order->user->first_name); ?> <?php echo e($order->user->last_name); ?></td>
                                        <td class="px-6 py-4">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold uppercase tracking-wider
                                                <?php echo e($order->status === 'pending' ? 'bg-amber-500/10 text-amber-500' : ''); ?>

                                                <?php echo e($order->status === 'confirmed' ? 'bg-blue-500/10 text-blue-500' : ''); ?>

                                                <?php echo e($order->status === 'in_delivery' ? 'bg-indigo-500/10 text-indigo-400' : ''); ?>

                                                <?php echo e($order->status === 'delivered' ? 'bg-emerald-500/10 text-emerald-500' : ''); ?>

                                                <?php echo e($order->status === 'cancelled' ? 'bg-rose-500/10 text-rose-500' : ''); ?>

                                            ">
                                                <?php echo e([
                                                    'pending' => 'En attente',
                                                    'confirmed' => 'Confirmer',
                                                    'in_delivery' => 'En livraison',
                                                    'delivered' => 'Livrer',
                                                    'cancelled' => 'Annule'
                                                ][$order->status] ?? $order->status); ?>

                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-end font-mono font-bold flex items-center justify-end gap-2">
                                            <?php echo e(number_format($order->total, 2)); ?> <?php echo e(__('DA')); ?>

                                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-chevron-right'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4 text-portal-muted opacity-0 group-hover:opacity-100 transition-opacity rtl:rotate-180']); ?>
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
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bg-portal-sidebar border border-portal-border rounded-xl p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-display font-bold text-sm"><?php echo e(__('Audit Trail')); ?></h3>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                        <form action="<?php echo e(route('admin.logs.clear')); ?>" method="POST" onsubmit="return confirm('<?php echo e(__('Effacer tout l\'historique d\'activitÃ© ?')); ?>');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="text-[10px] font-bold text-red-500/50 hover:text-red-500 transition-colors uppercase tracking-widest px-2 py-1 rounded border border-red-500/20 hover:bg-red-500/10">
                                <?php echo e(__('Effacer')); ?>

                            </button>
                        </form>
                        <?php endif; ?>
                    </div>
                    <div class="space-y-4 max-h-[400px] overflow-y-auto pr-2 custom-scrollbar">
                        <?php $__currentLoopData = $activity_logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="flex items-start gap-3 text-xs bg-white/5 p-3 rounded-lg border border-portal-border group hover:border-portal-accent/30 transition-colors">
                                <div class="p-1.5 rounded bg-portal-accent/10 text-portal-accent">
                                    <?php if($log->action === 'order_update' || $log->action === 'bulk_order_update'): ?>
                                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-shopping-cart'); ?>
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
                                    <?php elseif($log->action === 'user_role_update' || $log->action === 'user_deletion'): ?>
                                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-user'); ?>
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
                                    <?php else: ?>
                                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-activity'); ?>
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
                                    <?php endif; ?>
                                </div>
                                <div class="flex-1">
                                    <div class="text-white font-semibold mb-1"><?php echo e($log->description); ?></div>
                                    <div class="flex items-center justify-between text-[10px] text-portal-muted">
                                        <span><?php echo e($log->user->first_name); ?> <?php echo e($log->user->last_name); ?></span>
                                        <span><?php echo e($log->created_at->diffForHumans()); ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                        <?php if($activity_logs->isEmpty()): ?>
                            <div class="text-center py-8 text-portal-muted italic text-xs">
                                <?php echo e(__('Aucune activitÃ© rÃ©cente enregistrÃ©e.')); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Other tabs placeholders (to be expanded) -->
        <!-- Products Tab -->
        <div x-show="activeTab === 'products'" 
             x-transition:enter="transition ease-out duration-200" 
             x-transition:enter-start="opacity-0 translate-y-2" 
             x-transition:enter-end="opacity-100 translate-y-0" 
             x-cloak>
            <div class="bg-portal-sidebar border border-portal-border rounded-xl flex flex-col">
                <div class="p-6 border-b border-portal-border flex items-center justify-between">
                    <h2 class="font-display font-bold text-lg"><?php echo e(__('Inventory Audit')); ?></h2>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                    <a href="<?php echo e(route('admin.products.store')); ?>" class="bg-portal-accent text-black px-4 py-2 rounded-lg font-bold text-sm hover:bg-white transition-colors flex items-center gap-2">
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
<?php endif; ?> <?php echo e(__('Add Asset')); ?>

                    </a>
                    <?php endif; ?>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-start whitespace-nowrap">
                        <thead class="bg-white/2 text-xs font-bold text-portal-muted uppercase tracking-wider">
                            <tr>
                                <th class="px-6 py-4 text-start"><?php echo e(__('Produit')); ?></th>
                                <th class="px-6 py-4 text-start"><?php echo e(__('CatÃ©gorie')); ?></th>
                                <th class="px-6 py-4 text-start"><?php echo e(__('SpÃ©cifications')); ?></th>
                                <th class="px-6 py-4 text-start"><?php echo e(__('Prix Unit.')); ?></th>
                                <th class="px-6 py-4 text-start"><?php echo e(__('Ã‰tat Stock')); ?></th>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                                <th class="px-6 py-4 text-end"><?php echo e(__('Actions')); ?></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-portal-border">
                            <?php $__currentLoopData = $stat_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="hover:bg-white/5 transition-colors group">
                                    <td class="px-4 md:px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="p-2 bg-white/5 rounded-lg text-portal-muted">
                                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-package'); ?>
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
                                            <div>
                                                <div class="font-bold text-sm text-white"><?php echo e($product->name); ?></div>
                                                <div class="text-xs text-portal-muted"><?php echo e(__('SKU')); ?>: <?php echo e($product->id); ?></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 md:px-6 py-4 text-sm text-portal-muted"><?php echo e($product->category->name ?? 'N/A'); ?></td>
                                    <td class="px-4 md:px-6 py-4">
                                        <div class="text-[0.65rem] font-bold text-portal-muted uppercase"><?php echo e($product->weight_kg); ?>kg</div>
                                        <div class="text-[0.65rem] text-white"><?php echo e($product->pieces_per_bundle); ?> <?php echo e(__('pcs/bndl')); ?></div>
                                    </td>
                                    <td class="px-4 md:px-6 py-4 font-mono font-bold text-portal-accent"><?php echo e(number_format($product->price, 2)); ?> <?php echo e(__('DA')); ?></td>
                                    <td class="px-4 md:px-6 py-4">
                                        <?php if($product->in_stock): ?>
                                            <span class="inline-flex items-center px-2 py-1 rounded bg-green-500/10 text-green-500 text-[0.65rem] font-bold uppercase tracking-wider"><?php echo e(__('Active')); ?></span>
                                        <?php else: ?>
                                            <span class="inline-flex items-center px-2 py-1 rounded bg-red-500/10 text-red-500 text-[0.65rem] font-bold uppercase tracking-wider"><?php echo e(__('Depleted')); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                                    <td class="px-4 md:px-6 py-4 text-end">
                                        <div class="flex justify-end gap-2">
                                            <a href="<?php echo e(route('admin.products.edit', $product->id)); ?>" class="p-2.5 md:p-2 hover:bg-white/10 rounded-lg text-portal-muted hover:text-white transition-colors inline-flex items-center justify-center min-h-[44px] min-w-[44px] md:min-h-0 md:min-w-0">
                                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-edit-2'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5 md:w-4 md:h-4']); ?>
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
                                            <form action="<?php echo e(route('admin.products.destroy', $product->id)); ?>" method="POST" onsubmit="return confirm('<?php echo e(__('Are you sure you want to delete this asset?')); ?>');" class="inline-block">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="p-2.5 md:p-2 hover:bg-red-500/10 rounded-lg text-portal-muted hover:text-red-500 transition-colors inline-flex items-center justify-center min-h-[44px] min-w-[44px] md:min-h-0 md:min-w-0">
                                                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-trash-2'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5 md:w-4 md:h-4']); ?>
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
                                            </form>
                                        </div>
                                    </td>
                                    <?php endif; ?>
                                </tr>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <!-- Orders Tab -->
        <div x-show="activeTab === 'orders'" 
             x-transition:enter="transition ease-out duration-200" 
             x-transition:enter-start="opacity-0 translate-y-2" 
             x-transition:enter-end="opacity-100 translate-y-0"
             x-cloak x-data="{
            statusFilter: 'all',
            dateFilter: 'all',
            searchQuery: '',
            selectedOrders: [],
            
            get filteredOrders() {
                let orders = <?php echo e(Js::from($all_orders)); ?>;
                
                // Filter by status
                if (this.statusFilter !== 'all') {
                    orders = orders.filter(order => order.status === this.statusFilter);
                }
                
                // Filter by date
                const now = new Date();
                if (this.dateFilter === 'today') {
                    orders = orders.filter(order => {
                        const orderDate = new Date(order.created_at);
                        return orderDate.toDateString() === now.toDateString();
                    });
                } else if (this.dateFilter === 'week') {
                    const weekAgo = new Date(now.getTime() - 7 * 24 * 60 * 60 * 1000);
                    orders = orders.filter(order => new Date(order.created_at) >= weekAgo);
                } else if (this.dateFilter === 'month') {
                    const monthAgo = new Date(now.getTime() - 30 * 24 * 60 * 60 * 1000);
                    orders = orders.filter(order => new Date(order.created_at) >= monthAgo);
                }
                
                // Filter by search query
                if (this.searchQuery.length > 0) {
                    const query = this.searchQuery.toLowerCase();
                    orders = orders.filter(order => 
                        order.order_number.toLowerCase().includes(query) ||
                        (order.user.first_name + ' ' + order.user.last_name).toLowerCase().includes(query) ||
                        (order.user.company && order.user.company.toLowerCase().includes(query))
                    );
                }
                
                return orders;
            },

            get allSelected() {
                return this.filteredOrders.length > 0 && this.selectedOrders.length === this.filteredOrders.length;
            },
            
            toggleAll() {
                if (this.allSelected) {
                    this.selectedOrders = [];
                } else {
                    this.selectedOrders = this.filteredOrders.map(o => o.id);
                }
            }
        }">
             <div class="bg-portal-sidebar border border-portal-border rounded-xl flex flex-col relative">
                <!-- Floating Bulk Action Bar -->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                <div x-show="selectedOrders.length > 0" 
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-10"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 translate-y-10"
                    class="fixed bottom-8 left-1/2 -translate-x-1/2 z-50 bg-white text-black px-6 py-4 rounded-2xl shadow-[0_20px_50px_rgba(0,0,0,0.5)] flex items-center gap-6 border border-white/20">
                    <div class="flex flex-col">
                        <span class="text-xs font-black uppercase tracking-widest text-black/50"><?php echo e(__('Multi-SÃ©lection')); ?></span>
                        <span class="text-xl font-black"><span x-text="selectedOrders.length"></span> <?php echo e(__('Commandes')); ?></span>
                    </div>
                    <div class="h-10 w-[1px] bg-black/10 mx-2"></div>

                    <form action="<?php echo e(route('admin.orders.bulkUpdate')); ?>" method="POST" class="flex items-center gap-3">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>
                        <template x-for="id in selectedOrders">
                            <input type="hidden" name="order_ids[]" :value="id">
                        </template>
                        
                        <select name="status" class="bg-black border border-white/20 text-white text-xs font-bold uppercase rounded-xl px-4 py-2 focus:ring-portal-accent focus:border-portal-accent outline-none">
                            <option value="pending"><?php echo e(__('Set Pending')); ?></option>
                            <option value="confirmed"><?php echo e(__('Confirmer')); ?></option>
                            <option value="in_delivery"><?php echo e(__('En Livraison')); ?></option>
                            <option value="delivered"><?php echo e(__('Livrer')); ?></option>
                        </select>
                        
                        <button type="submit" class="bg-black text-white px-6 py-2 rounded-xl font-bold hover:bg-black/80 transition-colors shadow-lg">
                            <?php echo e(__('Appliquer Actions')); ?>

                        </button>
                    </form>

                    <button @click="selectedOrders = []" class="p-2 hover:bg-black/5 rounded-full transition-colors">
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-x'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-6 h-6']); ?>
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
                <?php endif; ?>

                <div class="p-6 border-b border-portal-border">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="font-display font-bold text-lg"><?php echo e(__('Master Transaction Ledger')); ?></h2>
                        <div class="flex items-center gap-3">
                            <span class="text-xs font-bold text-portal-muted uppercase tracking-wider" x-text="filteredOrders.length + ' <?php echo e(__('Records')); ?>'"></span>
                            <a href="<?php echo e(route('admin.orders.export')); ?>" class="flex items-center gap-2 px-4 py-2 bg-portal-accent text-black rounded-lg text-sm font-bold hover:bg-white transition-colors">
                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-download'); ?>
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
<?php endif; ?> <?php echo e(__('Export CSV')); ?>

                            </a>
                        </div>
                    </div>
                    
                    <!-- Filter Bar -->
                    <div class="flex flex-wrap gap-3">
                        <!-- Status Filter -->
                        <select x-model="statusFilter" class="bg-white/5 border border-portal-border text-white text-sm font-bold rounded-lg px-4 py-2 focus:ring-portal-accent focus:border-portal-accent">
                            <option value="all"><?php echo e(__('Tous les statuts')); ?></option>
                            <option value="pending"><?php echo e(__('En attente')); ?></option>
                            <option value="confirmed"><?php echo e(__('Confirmer')); ?></option>
                            <option value="in_delivery"><?php echo e(__('En Livraison')); ?></option>
                            <option value="delivered"><?php echo e(__('Livrer')); ?></option>
                        </select>
                        
                        <!-- Date Filter -->
                        <select x-model="dateFilter" class="bg-white/5 border border-portal-border text-white text-sm font-bold rounded-lg px-4 py-2 focus:ring-portal-accent focus:border-portal-accent">
                            <option value="all"><?php echo e(__('Toutes les dates')); ?></option>
                            <option value="today"><?php echo e(__('Aujourd\'hui')); ?></option>
                            <option value="week"><?php echo e(__('Cette semaine')); ?></option>
                            <option value="month"><?php echo e(__('Ce mois')); ?></option>
                        </select>
                        
                        <!-- Search Input -->
                        <div class="flex-1 min-w-[200px]">
                            <input 
                                type="text" 
                                x-model="searchQuery" 
                                placeholder="<?php echo e(__('Rechercher client, commande...')); ?>"
                                class="w-full bg-white/5 border border-portal-border text-white placeholder-portal-muted text-sm rounded-lg px-4 py-2 focus:ring-portal-accent focus:border-portal-accent"
                            >
                        </div>
                        
                        <!-- Clear Filters -->
                        <button 
                            @click="statusFilter = 'all'; dateFilter = 'all'; searchQuery = ''"
                            class="px-4 py-2 bg-white/5 border border-portal-border text-portal-muted hover:text-white hover:bg-white/10 rounded-lg text-sm font-bold transition-colors flex items-center gap-2"
                        >
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-x'); ?>
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
<?php endif; ?> <?php echo e(__('RÃ©initialiser')); ?>

                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-start">
                        <thead class="bg-white/2 text-xs font-bold text-portal-muted uppercase tracking-wider">
                            <tr>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                                <th class="px-6 py-4 text-start">
                                    <input type="checkbox" @change="toggleAll()" :checked="allSelected" class="rounded border-portal-border bg-white/10 text-portal-accent focus:ring-portal-accent">
                                </th>
                                <?php endif; ?>
                                <th class="px-6 py-4 text-start"><?php echo e(__('NÂ° Commande')); ?></th>
                                <th class="px-6 py-4 text-start"><?php echo e(__('Client / Entreprise')); ?></th>
                                <th class="px-6 py-4 text-start"><?php echo e(__('RÃ©fÃ©rence Projet')); ?></th>
                                <th class="px-6 py-4 text-start"><?php echo e(__('Livraison')); ?></th>
                                <th class="px-6 py-4 text-start"><?php echo e(__('Date')); ?></th>
                                <th class="px-6 py-4 text-center"><?php echo e(__('Statut Logistique')); ?></th>
                                <th class="px-6 py-4 text-end"><?php echo e(__('Montant Total')); ?></th>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                                <th class="px-6 py-4 text-end"><?php echo e(__('Actions')); ?></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-portal-border">
                            <template x-for="order in filteredOrders" :key="order.id">
                                <tr class="hover:bg-white/5 transition-all group relative" :class="{'bg-portal-accent/5': selectedOrders.includes(order.id)}">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                                    <td class="px-6 py-4">
                                        <input type="checkbox" :value="order.id" x-model="selectedOrders" class="rounded border-portal-border bg-white/10 text-portal-accent focus:ring-portal-accent">
                                    </td>
                                    <?php endif; ?>
                                    <td class="px-4 md:px-6 py-4 font-mono text-portal-accent font-medium cursor-pointer" @click="window.location=`/orders/${order.id}`">
                                        <div class="flex items-center gap-2">
                                            <span x-text="'#PO-' + order.order_number"></span>
                                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-external-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-3 h-3 text-portal-muted opacity-0 group-hover:opacity-100 transition-opacity']); ?>
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
                                    </td>
                                    <td class="px-4 md:px-6 py-4 cursor-pointer" @click="window.location=`/orders/${order.id}`">
                                        <div class="font-bold text-sm text-white" x-text="order.user.first_name + ' ' + order.user.last_name"></div>
                                        <div class="text-xs text-portal-muted" x-text="order.user.company || '<?php echo e(__('Contractor')); ?>'"></div>
                                    </td>
                                    <td class="px-4 md:px-6 py-4 text-sm text-white cursor-pointer" @click="window.location=`/orders/${order.id}`" x-text="order.project_reference || '-'"></td>
                                    <td class="px-4 md:px-6 py-4 text-sm text-portal-accent font-bold cursor-pointer" @click="window.location=`/orders/${order.id}`">
                                        <span x-text="order.requested_delivery_date ? new Date(order.requested_delivery_date).toLocaleDateString('fr-FR', {month: 'short', day: 'numeric'}) : '-'"></span>
                                    </td>
                                    <td class="px-4 md:px-6 py-4 text-sm text-portal-muted cursor-pointer" @click="window.location=`/orders/${order.id}`">
                                        <span x-text="new Date(order.created_at).toLocaleDateString('fr-FR', {month: 'short', day: 'numeric', year: 'numeric'})"></span>
                                    </td>
                                    <td class="px-4 md:px-6 py-4 text-center" @click.stop>
                                        <div class="flex gap-2 justify-center items-center">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                                                <template x-if="order.status === 'pending'">
                                                    <form :action="`/admin/orders/${order.id}/status`" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('PATCH'); ?>
                                                        <input type="hidden" name="status" value="confirmed">
                                                        <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-blue-500/10 text-blue-500 border border-blue-500/20 text-[0.65rem] font-bold uppercase tracking-wider hover:bg-blue-500 hover:text-white transition-all shadow-sm" title="Approve & Process">
                                                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-play'); ?>
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
<?php endif; ?> <?php echo e(__('Confirmer')); ?>

                                                        </button>
                                                    </form>
                                                </template>
                                                <template x-if="order.status === 'confirmed'">
                                                    <form :action="`/admin/orders/${order.id}/status`" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('PATCH'); ?>
                                                        <input type="hidden" name="status" value="in_delivery">
                                                        <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-indigo-500/10 text-indigo-400 border border-indigo-500/20 text-[0.65rem] font-bold uppercase tracking-wider hover:bg-indigo-500 hover:text-white transition-all shadow-sm" title="Set In Delivery">
                                                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-truck'); ?>
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
<?php endif; ?> <?php echo e(__('En Livraison')); ?>

                                                        </button>
                                                    </form>
                                                </template>
                                                <template x-if="order.status === 'in_delivery'">
                                                    <form :action="`/admin/orders/${order.id}/status`" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('PATCH'); ?>
                                                        <input type="hidden" name="status" value="delivered">
                                                        <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-green-500/10 text-green-500 border border-green-500/20 text-[0.65rem] font-bold uppercase tracking-wider hover:bg-green-500 hover:text-white transition-all shadow-sm" title="Mark as Delivered">
                                                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-check-circle'); ?>
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
<?php endif; ?> <?php echo e(__('Livrer')); ?>

                                                        </button>
                                                    </form>
                                                </template>
                                                <template x-if="order.status === 'delivered' || order.status === 'cancelled'">
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[0.65rem] font-bold uppercase tracking-wider"
                                                        :class="{
                                                            'bg-green-500/10 text-green-500': order.status === 'delivered',
                                                            'bg-red-500/10 text-red-500': order.status === 'cancelled'
                                                        }"
                                                        x-text="{
                                                            pending: 'En attente',
                                                            confirmed: 'Confirmer',
                                                            in_delivery: 'En livraison',
                                                            delivered: 'Livrer',
                                                            cancelled: 'Annulé'
                                                        }[order.status] ?? order.status">
                                                    </span>
                                                </template>

                                            <?php else: ?>
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[0.65rem] font-bold uppercase tracking-wider"
                                                    :class="{
                                                        'bg-amber-500/10 text-amber-500': order.status === 'pending',
                                                        'bg-blue-500/10 text-blue-500': order.status === 'confirmed',
                                                        'bg-indigo-500/10 text-indigo-400': order.status === 'in_delivery',
                                                        'bg-green-500/10 text-green-500': order.status === 'delivered',
                                                        'bg-red-500/10 text-red-500': order.status === 'cancelled'
                                                    }"
                                                    x-text="{
                                                        pending: 'En attente',
                                                        confirmed: 'Confirmer',
                                                        in_delivery: 'En livraison',
                                                        delivered: 'Livrer',
                                                        cancelled: 'Annulé'
                                                    }[order.status] ?? order.status">
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td class="px-4 md:px-6 py-4 text-end font-mono font-bold cursor-pointer" @click="window.location=`/orders/${order.id}`">
                                        <span x-text="Number(order.total).toFixed(2) + ' <?php echo e(__('DA')); ?>'"></span>
                                    </td>
                                    <td class="px-4 md:px-6 py-4 text-end" @click.stop>
                                        <a :href="`/orders/${order.id}`" class="p-2.5 md:p-2 hover:bg-white/10 rounded-lg text-portal-muted hover:text-white transition-colors inline-flex items-center justify-center min-h-[44px] min-w-[44px] md:min-h-0 md:min-w-0" title="<?php echo e(__('Inspect Documentation')); ?>">
                                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-eye'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5 md:w-4 md:h-4']); ?>
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
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Users Tab -->
        <div x-show="activeTab === 'users'" 
             x-transition:enter="transition ease-out duration-200" 
             x-transition:enter-start="opacity-0 translate-y-2" 
             x-transition:enter-end="opacity-100 translate-y-0"
             x-cloak>
             <div class="bg-portal-sidebar border border-portal-border rounded-xl flex flex-col">
                <div class="p-6 border-b border-portal-border flex items-center justify-between">
                    <h2 class="font-display font-bold text-lg"><?php echo e(__('Stakeholder Directory')); ?></h2>
                    <span class="text-xs font-bold text-portal-muted uppercase tracking-wider"><?php echo e($users->count()); ?> <?php echo e(__('Authenticated Accounts')); ?></span>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-start whitespace-nowrap">
                        <thead class="bg-white/2 text-xs font-bold text-portal-muted uppercase tracking-wider">
                            <tr>
                                <th class="px-6 py-4 text-start"><?php echo e(__('IdentitÃ©')); ?></th>
                                <th class="px-6 py-4 text-start"><?php echo e(__('Entreprise')); ?></th>
                                <th class="px-6 py-4 text-start"><?php echo e(__('Email')); ?></th>
                                <th class="px-6 py-4 text-start"><?php echo e(__('RÃ´le / PrivilÃ¨ges')); ?></th>
                                <th class="px-6 py-4 text-end"><?php echo e(__('Actions')); ?></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-portal-border">
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="hover:bg-white/5 transition-colors group">
                                    <td class="px-4 md:px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-lg bg-portal-accent/20 border border-portal-accent/30 flex items-center justify-center font-bold text-portal-accent text-xs">
                                                <?php echo e(substr($user->first_name, 0, 1)); ?>

                                            </div>
                                            <div class="font-bold text-sm text-white"><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></div>
                                        </div>
                                    </td>
                                    <td class="px-4 md:px-6 py-4 text-sm text-portal-muted"><?php echo e($user->company ?? __('Private Contractor')); ?></td>
                                    <td class="px-4 md:px-6 py-4 text-sm font-mono text-portal-muted"><?php echo e($user->email); ?></td>
                                    <td class="px-4 md:px-6 py-4">
                                         <form action="<?php echo e(route('admin.users.updateRole', $user)); ?>" method="POST" class="flex gap-2 items-center">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PATCH'); ?>
                                             <select name="role" class="bg-white/5 border border-portal-border text-xs font-bold uppercase rounded-lg px-3 py-2 cursor-pointer focus:ring-portal-accent focus:border-portal-accent min-h-[44px] md:min-h-0
                                                <?php echo e($user->role === 'admin' ? 'text-portal-accent' : ($user->role === 'agent' ? 'text-amber-500' : 'text-blue-500')); ?>

                                             ">
                                                <option value="client" <?php echo e($user->role == 'client' ? 'selected' : ''); ?>><?php echo e(__('Client')); ?></option>
                                                <option value="agent" <?php echo e($user->role == 'agent' ? 'selected' : ''); ?>><?php echo e(__('Agent')); ?></option>
                                                <option value="admin" <?php echo e($user->role == 'admin' ? 'selected' : ''); ?>><?php echo e(__('Administrateur')); ?></option>
                                             </select>
                                            <button type="submit" class="p-2.5 md:p-1 hover:bg-white/10 rounded text-portal-accent transition-colors min-h-[44px] min-w-[44px] md:min-h-0 md:min-w-0 flex items-center justify-center">
                                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-check'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5 md:w-4 md:h-4']); ?>
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
                                        </form>
                                    </td>
                                    <td class="px-4 md:px-6 py-4 text-end">
                                        <form action="<?php echo e(route('admin.users.destroy', $user)); ?>" method="POST" onsubmit="return confirm('<?php echo e(__('Are you sure you want to revoke access for this user?')); ?>');" class="inline-block">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="p-2.5 md:p-2 hover:bg-red-500/10 rounded-lg text-portal-muted hover:text-red-500 transition-colors min-h-[44px] min-w-[44px] md:min-h-0 md:min-w-0 inline-flex items-center justify-center" title="<?php echo e(__('Revoke Access')); ?>">
                                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-user-cog'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5 md:w-4 md:h-4']); ?>
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
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
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



<?php /**PATH C:\Users\Bucket\Desktop\Commandes\placo-app\resources\views\admin\dashboard.blade.php ENDPATH**/ ?>