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
        margin: 0;
        size: A4;
    }
    .print-area {
        padding: 2cm;
    }

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

     <?php $__env->slot('header', null, []); ?> 
        <div class="flex items-center justify-between">
            <div>
                <span class="inline-block bg-portal-accent text-black px-2.5 py-1 rounded-md text-[0.7rem] font-extrabold uppercase tracking-wider mb-2"><?php echo e(__('Détails de la Commande')); ?></span>
                <h1 class="text-4xl font-extrabold tracking-tight mb-2">#<?php echo e($order->order_number); ?></h1>
                <p class="text-portal-muted text-lg"><?php echo e(__('Passée le')); ?> <?php echo e($order->created_at->format('d/m/Y')); ?> <?php echo e(__('à')); ?> <?php echo e($order->created_at->format('H:i')); ?></p>
            </div>
            <div class="flex items-center gap-4">
                <button onclick="window.print()" class="no-print inline-flex flex-row items-center gap-2 bg-white/5 border border-portal-border px-4 py-2 rounded-lg text-white font-bold text-sm uppercase tracking-wider hover:bg-white/10 transition-colors" style="display: inline-flex !important; flex-direction: row !important; align-items: center !important; white-space: nowrap !important;">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-printer'); ?>
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
                    <span><?php echo e(__('Imprimer')); ?></span>
                </button>
            </div>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="print-area">
        <table style="width: 100%; border: none; margin-bottom: 20px;">
            <tr>
                <td style="width: 50%; border: none; padding: 0;">
                    <h1 class="text-2xl font-bold text-black mb-1 uppercase">SARL GLOBAL ACCESSOIRES</h1>
                    <p class="text-xs text-black leading-tight">Producteur de la marque MYFIX</p>
                    <p class="text-xs text-black leading-tight">Zone Industrielle - Bordj Bou Arreridid, Algérie</p>
                    <p class="text-xs text-black leading-tight">Tél: +213 550 00 00 00</p>
                    <p class="text-xs text-black leading-tight">Email: commercial@myfix-dz.com</p>
                </td>
                <td style="width: 50%; text-align: right; border: none; padding: 0;">
                    <div class="text-3xl font-bold text-black mb-1">BON DE COMMANDE</div>
                    <div class="text-lg font-bold text-black">N° <?php echo e($order->order_number); ?></div>
                    <div class="text-sm text-black">Date: <?php echo e($order->created_at->format('d/m/Y H:i')); ?></div>
                </td>
            </tr>
        </table>

        <div style="border-top: 2px solid black; margin-bottom: 30px;"></div>

        <table style="width: 100%; border: none; margin-bottom: 30px;">
            <tr>
                <td style="width: 50%; border: none; padding: 0; padding-right: 20px; vertical-align: top;">
                    <h3 class="font-bold text-black border-b border-gray-400 mb-2 pb-1 text-xs uppercase text-gray-600">Client</h3>
                    <p class="text-sm font-bold text-black"><?php echo e($order->user->first_name); ?> <?php echo e($order->user->last_name); ?></p>
                    <p class="text-sm text-black"><?php echo e($order->user->company ?? ''); ?></p>
                    <p class="text-sm text-black"><?php echo e($order->user->email); ?></p>
                    <p class="text-sm text-black"><?php echo e($order->user->phone ?? '-'); ?></p>
                </td>
                <td style="width: 50%; border: none; padding: 0; padding-left: 20px; vertical-align: top;">
                    <h3 class="font-bold text-black border-b border-gray-400 mb-2 pb-1 text-xs uppercase text-gray-600">Livraison</h3>
                    <p class="text-sm text-black"><?php echo e($order->delivery_address ?? 'À définir'); ?></p>
                    <?php if($order->requested_delivery_date): ?>
                    <p class="text-sm text-black">Date souhaitée: <?php echo e(\Carbon\Carbon::parse($order->requested_delivery_date)->format('d/m/Y')); ?></p>
                    <?php endif; ?>
                    <p class="text-sm text-black">Transport: <?php echo e($order->logistics_type ?? 'Standard'); ?></p>
                </td>
            </tr>
        </table>

        <div class="mb-6">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background-color: #f3f4f6;">
                        <th style="text-align: left; padding: 8px; border: 1px solid black; font-size: 11px;">RÉF</th>
                        <th style="text-align: left; padding: 8px; border: 1px solid black; font-size: 11px;">DÉSIGNATION</th>
                        <th style="text-align: center; padding: 8px; border: 1px solid black; font-size: 11px;">QTÉ</th>
                        <th style="text-align: right; padding: 8px; border: 1px solid black; font-size: 11px;">P.U. HT</th>
                        <th style="text-align: right; padding: 8px; border: 1px solid black; font-size: 11px;">TOTAL HT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td style="padding: 8px; border: 1px solid black; font-size: 12px;"><?php echo e(str_pad($item->product_id, 6, '0', STR_PAD_LEFT)); ?></td>
                        <td style="padding: 8px; border: 1px solid black; font-size: 12px;"><?php echo e($item->product->name ?? 'Produit indisponible'); ?></td>
                        <td style="text-align: center; padding: 8px; border: 1px solid black; font-size: 12px;"><?php echo e($item->quantity); ?></td>
                        <td style="text-align: right; padding: 8px; border: 1px solid black; font-size: 12px;"><?php echo e(number_format($item->price, 2)); ?></td>
                        <td style="text-align: right; padding: 8px; border: 1px solid black; font-size: 12px;"><?php echo e(number_format($item->quantity * $item->price, 2)); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                    <tr style="background-color: #f3f4f6;">
                        <td colspan="4" style="text-align: right; padding: 8px; border: 1px solid black; font-weight: bold; text-transform: uppercase;">Total HT</td>
                        <td style="text-align: right; padding: 8px; border: 1px solid black; font-weight: bold; font-size: 14px;"><?php echo e(number_format($order->total, 2)); ?> DA</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="mt-12 text-center border-t border-gray-300 pt-4">
            <p class="text-xs text-gray-500">Document valable pour approvisionnement - Sous réserve de disponibilité</p>
            <p class="text-xs text-gray-500">Merci de votre confiance.</p>
        </div>
    </div>

    <div class="space-y-8 no-print">
        <!-- Status Section -->
        <div class="bg-portal-sidebar border border-portal-border rounded-xl p-6">
            <h3 class="font-display font-bold text-lg mb-6"><?php echo e(__('Statut de la Commande')); ?></h3>

            <?php
                $statuses = ['pending', 'confirmed', 'in_delivery', 'delivered'];
                $statusLabels = [
                    'pending' => __('En attente'),
                    'confirmed' => __('Confirmée'),
                    'in_delivery' => __('En livraison'),
                    'delivered' => __('Livrée')
                ];
                $currentIndex = array_search($order->status, $statuses);
                if ($currentIndex === false) $currentIndex = 0;
            ?>

            <div class="relative mb-8">
                <div class="flex items-start justify-between">
                    <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex flex-col items-center flex-1 relative z-10">
                            <div class="w-12 h-12 rounded-full flex items-center justify-center mb-3 transition-all duration-300
                                <?php echo e($index <= $currentIndex ? 'bg-portal-accent text-black shadow-[0_0_20px_rgba(21,128,61,0.4)]' : 'bg-white/5 text-portal-muted border-2 border-portal-border'); ?>">
                                <?php if($index < $currentIndex): ?>
                                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-check'); ?>
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
                                <?php elseif($index === $currentIndex): ?>
                                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-loader-2'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-6 h-6 animate-spin']); ?>
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
                                    <span class="text-sm font-bold"><?php echo e($index + 1); ?></span>
                                <?php endif; ?>
                            </div>

                            <span class="text-xs font-bold text-center <?php echo e($index <= $currentIndex ? 'text-white' : 'text-portal-muted'); ?>">
                                <?php echo e($statusLabels[$status]); ?>

                            </span>

                            <?php if($index === $currentIndex): ?>
                                <span class="text-[0.6rem] text-portal-accent font-bold uppercase tracking-wider mt-1 bg-portal-accent/10 px-2 py-0.5 rounded-full">
                                    <?php echo e(__('En cours')); ?>

                                </span>
                            <?php endif; ?>
                        </div>

                        <?php if($index < count($statuses) - 1): ?>
                            <div class="flex-1 h-1 mx-2 rounded-full relative mt-[22px]">
                                <div class="absolute inset-0 bg-portal-border rounded-full"></div>
                                <div class="absolute inset-0 bg-portal-accent rounded-full transition-all duration-500 <?php echo e($index < $currentIndex ? 'w-full' : 'w-0'); ?>"></div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <div class="space-y-3 pt-6 border-t border-portal-border">
                <div class="flex items-center justify-between text-sm">
                    <span class="text-portal-muted"><?php echo e(__('Commande passée')); ?></span>
                    <span class="font-mono text-white"><?php echo e($order->created_at->format('d/m/Y H:i')); ?></span>
                </div>
                <?php if($order->updated_at != $order->created_at): ?>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-portal-muted"><?php echo e(__('Dernière mise à jour')); ?></span>
                        <span class="font-mono text-white"><?php echo e($order->updated_at->format('d/m/Y H:i')); ?></span>
                    </div>
                <?php endif; ?>
                <?php if($order->requested_delivery_date): ?>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-portal-muted"><?php echo e(__('Livraison demandée')); ?></span>
                        <span class="font-mono text-portal-accent font-bold"><?php echo e(\Carbon\Carbon::parse($order->requested_delivery_date)->format('d/m/Y')); ?></span>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Items List -->
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-portal-sidebar border border-portal-border rounded-xl overflow-hidden">
                    <div class="p-6 border-b border-portal-border">
                        <h3 class="font-display font-bold text-base"><?php echo e(__('Liste des Articles')); ?></h3>
                    </div>
                    <table class="w-full text-left">
                        <thead class="bg-white/2 text-xs font-bold text-portal-muted uppercase tracking-wider">
                            <tr>
                                <th class="px-6 py-4"><?php echo e(__('Détails de l\'article')); ?></th>
                                <th class="px-6 py-4 text-center"><?php echo e(__('Quantité')); ?></th>
                                <th class="px-6 py-4 text-right"><?php echo e(__('Prix Unitaire')); ?></th>
                                <th class="px-6 py-4 text-right"><?php echo e(__('Total')); ?></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-portal-border">
                            <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="hover:bg-white/2 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-4">
                                            <div class="w-12 h-12 bg-white/5 rounded-lg border border-white/10 flex items-center justify-center p-1">
                                                <?php if($item->product->image_url): ?>
                                                    <img src="<?php echo e($item->product->image_url); ?>" class="max-w-full max-h-full object-contain">
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
<?php $component->withAttributes(['class' => 'w-5 h-5 text-slate-600']); ?>
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
                                            <div>
                                                <div class="font-bold text-sm text-white"><?php echo e($item->product->name); ?></div>
                                                <div class="text-xs text-portal-muted"><?php echo e(__('RÉF')); ?>: <?php echo e(str_pad($item->product_id, 6, '0', STR_PAD_LEFT)); ?></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center font-mono font-bold text-white"><?php echo e($item->quantity); ?></td>
                                    <td class="px-6 py-4 text-right font-mono text-portal-muted"><?php echo e(number_format($item->price, 2)); ?> <?php echo e(__('DA')); ?></td>
                                    <td class="px-6 py-4 text-right font-mono font-bold text-white"><?php echo e(number_format($item->quantity * $item->price, 2)); ?> <?php echo e(__('DA')); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot class="bg-white/5 border-t border-portal-border">
                            <tr>
                                <td colspan="3" class="px-6 py-3 text-right text-xs font-bold text-portal-muted uppercase tracking-wider"><?php echo e(__('Sous-total')); ?></td>
                                <td class="px-6 py-3 text-right font-mono font-bold"><?php echo e(number_format($order->subtotal, 2)); ?> <?php echo e(__('DA')); ?></td>
                            </tr>
                             <tr class="bg-portal-accent/5">
                                <td colspan="3" class="px-6 py-4 text-right font-bold text-white uppercase tracking-wider text-sm"><?php echo e(__('Total Commande HT')); ?></td>
                                <td class="px-6 py-4 text-right font-mono font-bold text-xl text-portal-accent"><?php echo e(number_format($order->total, 2)); ?> <?php echo e(__('DA')); ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1 space-y-6">
                <div class="bg-portal-sidebar border border-portal-border rounded-xl p-6">
                    <h3 class="font-display font-bold text-lg mb-4"><?php echo e(__('Informations Contact')); ?></h3>
                    <div class="space-y-3 text-sm border-b border-portal-border pb-6 mb-6">
                        <div class="flex items-center gap-3 text-portal-muted">
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
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
<?php endif; ?> <?php echo e($order->user->first_name); ?> <?php echo e($order->user->last_name); ?>

                        </div>
                        <div class="flex items-center gap-3 text-portal-muted">
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
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
<?php endif; ?> <?php echo e($order->user->email); ?>

                        </div>
                        <?php if($order->user->phone): ?>
                        <div class="flex items-center gap-3 text-portal-muted">
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
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
<?php endif; ?>
                            <a href="tel:<?php echo e(preg_replace('/\s+/', '', $order->user->phone)); ?>" class="hover:text-white transition-colors"><?php echo e($order->user->phone); ?></a>
                        </div>
                        <?php endif; ?>
                    </div>

                    <h3 class="font-display font-bold text-lg mb-4"><?php echo e(__('Détails Livraison')); ?></h3>
                    <div class="space-y-4">
                        <div>
                            <span class="text-[0.65rem] font-bold text-portal-muted uppercase tracking-wider block mb-1"><?php echo e(__('Lieu de livraison')); ?></span>
                            <div class="text-sm text-white bg-white/5 p-3 rounded-lg border border-portal-border"><?php echo e($order->delivery_address ?? __('Récupération à l\'usine')); ?></div>
                        </div>
                        <?php if($order->requested_delivery_date): ?>
                        <div>
                            <span class="text-[0.65rem] font-bold text-portal-muted uppercase tracking-wider block mb-1"><?php echo e(__('Date prévue')); ?></span>
                            <div class="text-sm font-bold text-portal-accent"><?php echo e(\Carbon\Carbon::parse($order->requested_delivery_date)->format('d/m/Y')); ?></div>
                        </div>
                        <?php endif; ?>
                        <div>
                            <span class="text-[0.65rem] font-bold text-portal-muted uppercase tracking-wider block mb-1"><?php echo e(__('Type Logistique')); ?></span>
                            <div class="text-[0.7rem] font-bold text-white uppercase bg-white/10 px-2 py-1 rounded inline-block"><?php echo e($order->logistics_type ?? 'Standard'); ?></div>
                        </div>
                        <?php if($order->notes): ?>
                        <div>
                            <span class="text-[0.65rem] font-bold text-portal-muted uppercase tracking-wider block mb-1"><?php echo e(__('Notes')); ?></span>
                            <div class="text-sm text-portal-muted italic bg-white/2 p-3 rounded-lg border border-portal-border"><?php echo e($order->notes); ?></div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="no-print bg-portal-sidebar border border-portal-border rounded-xl p-6 lg:p-8 mt-8">
        <div class="flex items-center justify-between mb-6">
            <h2 class="font-display font-bold text-xl flex items-center gap-3">
                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-message-square'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-6 h-6 text-portal-accent']); ?>
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
                <?php echo e(__('Communications & Suivi')); ?>

            </h2>
            <span class="text-xs font-bold text-portal-muted uppercase bg-white/5 px-3 py-1 rounded-full border border-portal-border">
                <?php echo e($order->comments->count()); ?> <?php echo e(__('messages')); ?>

            </span>
        </div>

        <div class="space-y-6 mb-8 max-h-[500px] overflow-y-auto pr-4 custom-scrollbar">
            <?php $__empty_1 = true; $__currentLoopData = $order->comments->filter(fn($c) => !$c->is_internal || auth()->user()->role === 'admin'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="flex gap-4 <?php echo e($comment->user_id === auth()->id() ? 'justify-end' : ''); ?>">
                    <div class="flex flex-col max-w-[80%] <?php echo e($comment->user_id === auth()->id() ? 'items-end' : ''); ?>">
                        <div class="flex items-center gap-2 mb-1 px-1">
                            <span class="text-[10px] font-black uppercase tracking-widest <?php echo e($comment->user_id === auth()->id() ? 'text-portal-accent' : 'text-slate-400'); ?>">
                                <?php echo e($comment->user->first_name); ?> <?php echo e($comment->user->last_name); ?>

                            </span>
                            <span class="text-[10px] text-portal-muted"><?php echo e($comment->created_at->diffForHumans()); ?></span>
                            <?php if($comment->is_internal): ?>
                                <span class="bg-amber-500/20 text-amber-500 text-[8px] font-black uppercase px-1.5 py-0.5 rounded border border-amber-500/20">
                                    <?php echo e(__('Interne')); ?>

                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="p-4 rounded-2xl text-sm leading-relaxed <?php echo e($comment->user_id === auth()->id() ? 'bg-portal-accent text-black font-medium rounded-tr-none' : 'bg-white/5 text-slate-300 border border-white/10 rounded-tl-none'); ?>">
                            <?php echo e($comment->comment); ?>

                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="text-center py-12 border-2 border-dashed border-portal-border rounded-2xl">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-message-circle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-12 h-12 text-portal-muted/30 mx-auto mb-4']); ?>
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
                    <p class="text-portal-muted italic"><?php echo e(__('Aucune communication enregistrée pour cette commande.')); ?></p>
                </div>
            <?php endif; ?>
        </div>

        <div class="pt-6 border-t border-portal-border">
            <form action="<?php echo e(route('orders.comments.store', $order->id)); ?>" method="POST" class="space-y-4">
                <?php echo csrf_field(); ?>
                <div class="relative">
                    <textarea
                        name="comment"
                        rows="3"
                        class="w-full bg-black border border-portal-border rounded-xl p-4 text-sm text-white placeholder-slate-600 focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all resize-none"
                        placeholder="<?php echo e(auth()->user()->role === 'admin' ? __('Écrivez un message ou une note interne...') : __('Écrivez un message pour l\'administration...')); ?>"
                        required
                    ></textarea>
                </div>
                <div class="flex items-center justify-between">
                    <?php if(auth()->user()->role === 'admin'): ?>
                        <label class="flex items-center gap-2 cursor-pointer group">
                            <input type="checkbox" name="is_internal" value="1" class="rounded border-portal-border bg-black text-portal-accent focus:ring-portal-accent">
                            <span class="text-xs font-bold text-slate-500 group-hover:text-slate-300 transition-colors uppercase tracking-widest"><?php echo e(__('Note interne (Invisible client)')); ?></span>
                        </label>
                    <?php else: ?>
                        <div></div>
                    <?php endif; ?>
                    <button type="submit" class="bg-portal-accent text-black font-black uppercase tracking-widest px-6 py-3 rounded-xl hover:bg-white transition-all flex items-center gap-2 text-xs shadow-lg">
                        <?php echo e(__('Envoyer')); ?> <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-send'); ?>
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
<?php /**PATH C:\Users\Bucket\Desktop\Commandes\placo-app\resources\views/orders/show.blade.php ENDPATH**/ ?>