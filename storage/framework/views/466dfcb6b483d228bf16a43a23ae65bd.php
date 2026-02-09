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
        <span class="inline-block bg-portal-accent text-black px-2.5 py-1 rounded-md text-[0.7rem] font-extrabold uppercase tracking-wider mb-2"><?php echo e(__('Mes Commandes')); ?></span>
        <h1 class="text-4xl font-extrabold tracking-tight mb-2"><?php echo e(__('Historique')); ?></h1>
        <p class="text-portal-muted text-lg"><?php echo e(__('Suivez l\'état de vos commandes de matériaux.')); ?></p>
     <?php $__env->endSlot(); ?>

    <div class="bg-portal-sidebar border border-portal-border rounded-xl flex flex-col min-h-[600px]">
        <div class="p-6 border-b border-portal-border flex items-center justify-between">
            <h2 class="font-display font-bold text-base"><?php echo e(__('Liste des Commandes')); ?></h2>
            <div class="flex items-center gap-3">
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
<?php $component->withAttributes(['class' => 'w-4 h-4 absolute start-3 top-1/2 -translate-y-1/2 text-portal-muted']); ?>
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
                    <input type="text" placeholder="<?php echo e(__('Rechercher une commande...')); ?>" class="bg-white/5 border border-portal-border rounded-lg ps-9 pe-4 py-2 text-sm text-white focus:border-portal-accent focus:ring-0 placeholder-portal-muted w-64">
                </div>
                <button class="bg-white/5 border border-portal-border rounded-lg p-2 hover:bg-white/10 transition-colors text-portal-muted hover:text-white">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-filter'); ?>
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

        <?php if($orders->isEmpty()): ?>
            <div class="flex-1 flex flex-col items-center justify-center text-portal-muted p-12">
                <div class="w-20 h-20 rounded-full bg-white/5 flex items-center justify-center mb-6">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-file-text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-10 h-10 opacity-50']); ?>
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
                <h3 class="text-xl font-display font-bold text-white mb-2"><?php echo e(__('No Orders Found')); ?></h3>
                <p class="mb-8"><?php echo e(__("You haven't placed any purchase orders yet.")); ?></p>
                <a href="<?php echo e(route('products.index')); ?>" class="bg-portal-accent text-black px-6 py-3 rounded-xl font-bold hover:bg-white transition-colors flex items-center gap-2">
                    <?php echo e(__('Browse Catalog')); ?> <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-arrow-right'); ?>
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
<?php endif; ?>
                </a>
            </div>
        <?php else: ?>
            <div class="overflow-x-auto">
                <table class="w-full text-start">
                    <thead class="bg-white/2 text-xs font-bold text-portal-muted uppercase tracking-wider">
                        <tr>
                            <th class="px-8 py-4 text-start"><?php echo e(__('Reference')); ?></th>
                            <th class="px-8 py-4 text-start"><?php echo e(__('Date')); ?></th>
                            <th class="px-8 py-4 text-center"><?php echo e(__('Articles')); ?></th>
                            <th class="px-8 py-4 text-center"><?php echo e(__('État')); ?></th>
                            <th class="px-8 py-4 text-end"><?php echo e(__('Total')); ?></th>
                            <th class="px-8 py-4 text-end"><?php echo e(__('Actions')); ?></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-portal-border">
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="hover:bg-white/2 transition-colors group cursor-pointer" onclick="window.location='<?php echo e(route('orders.show', $order->id)); ?>'">
                                <td class="px-8 py-5 font-mono text-portal-accent font-medium">#<?php echo e($order->order_number); ?></td>
                                <td class="px-8 py-5 text-sm font-medium text-portal-muted"><?php echo e($order->created_at->format('M j, Y')); ?><br><span class="text-xs opacity-60"><?php echo e($order->created_at->format('H:i')); ?></span></td>
                                <td class="px-8 py-5 text-center font-bold"><?php echo e($order->items_count); ?></td>
                                <td class="px-8 py-5 text-center">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider
                                        <?php echo e($order->status === 'pending' ? 'bg-yellow-500/10 text-yellow-500 border border-yellow-500/20' : ''); ?>

                                        <?php echo e($order->status === 'confirmed' ? 'bg-blue-500/10 text-blue-500 border border-blue-500/20' : ''); ?>

                                        <?php echo e($order->status === 'in_delivery' ? 'bg-indigo-500/10 text-indigo-400 border border-indigo-500/20' : ''); ?>

                                        <?php echo e($order->status === 'delivered' ? 'bg-green-500/10 text-green-500 border border-green-500/20' : ''); ?>

                                        <?php echo e($order->status === 'cancelled' ? 'bg-red-500/10 text-red-500 border border-red-500/20' : ''); ?>

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
                                <td class="px-8 py-5 text-end font-mono font-bold text-lg"><?php echo e(number_format($order->total, 2)); ?> <span class="text-sm text-portal-muted"><?php echo e(__('DA')); ?></span></td>
                                <td class="px-8 py-5 text-end">
                                    <a href="<?php echo e(route('orders.show', $order->id)); ?>" class="inline-flex items-center gap-2 text-portal-muted hover:text-white transition-colors p-2 rounded-lg hover:bg-white/5 group-hover:text-portal-accent" title="<?php echo e(__('View Details')); ?>" onclick="event.stopPropagation()">
                                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-arrow-right'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5 rtl:rotate-180']); ?>
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
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            
            <div class="p-6 border-t border-portal-border">
                <?php echo e($orders->links()); ?>

            </div>
        <?php endif; ?>
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
<?php /**PATH C:\Users\Bucket\Desktop\Commandes\placo-app\resources\views\orders\index.blade.php ENDPATH**/ ?>