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
    <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <!-- Print Button -->
        <div class="mb-6 flex justify-end print:hidden">
            <button onclick="window.print()" class="bg-portal-accent text-black font-bold py-2 px-4 rounded-lg hover:bg-white transition-colors flex items-center gap-2">
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
<?php endif; ?> <?php echo e(__('Print Sheet')); ?>

            </button>
        </div>

        <!-- Sheet Container -->
        <div class="bg-white text-black p-0 overflow-hidden shadow-2xl rounded-sm print:shadow-none print:w-full">
            <!-- Header -->
            <div class="bg-slate-900 text-white p-8 flex justify-between items-start print:bg-slate-900 print:text-white print-color-adjust-exact">
                <div>
                    <h1 class="text-3xl font-extrabold uppercase tracking-tight mb-2"><?php echo e(__('Technical Data Sheet')); ?></h1>
                    <p class="text-slate-400 font-mono text-sm"><?php echo e(__('Document Ref')); ?>: TDS-<?php echo e(str_pad($product->id, 6, '0', STR_PAD_LEFT)); ?>-<?php echo e(date('Y')); ?></p>
                </div>
                <div class="text-right">
                    <div class="text-2xl font-bold text-portal-accent">MyFix</div>
                    <div class="text-xs text-slate-400 mt-1"><?php echo e(__('Professional Solutions')); ?></div>
                </div>
            </div>

            <!-- Product Identity -->
            <div class="p-8 border-b border-slate-200 flex flex-col md:flex-row gap-8 items-start">
                <div class="w-full md:w-1/3 p-4 border border-slate-100 bg-slate-50 rounded flex items-center justify-center">
                    <?php if($product->image_url): ?>
                        <img src="<?php echo e($product->image_url); ?>" alt="<?php echo e($product->name); ?>" class="max-h-48 object-contain mix-blend-multiply">
                    <?php else: ?>
                        <div class="h-48 flex items-center justify-center text-slate-300">
                            <span class="text-xs uppercase"><?php echo e(__('No Image')); ?></span>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="flex-1">
                    <h2 class="text-2xl font-bold text-slate-900 mb-2"><?php echo e($product->name); ?></h2>
                    <div class="inline-block bg-slate-100 text-slate-600 text-xs font-bold uppercase px-2 py-1 rounded mb-4">
                        <?php echo e($product->category->name ?? __('Uncategorized')); ?>

                    </div>
                    
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <span class="block text-slate-400 text-xs uppercase font-bold"><?php echo e(__('SKU Code')); ?></span>
                            <span class="font-mono font-bold"><?php echo e(str_pad($product->id, 6, '0', STR_PAD_LEFT)); ?></span>
                        </div>
                        <div>
                            <span class="block text-slate-400 text-xs uppercase font-bold"><?php echo e(__('Date Generated')); ?></span>
                            <span class="font-mono"><?php echo e(date('d M Y')); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Specifications Table -->
            <div class="p-8 bg-slate-50">
                <h3 class="font-bold text-slate-900 uppercase tracking-wider text-sm mb-4 border-b border-slate-200 pb-2"><?php echo e(__('Technical Specifications')); ?></h3>
                
                <table class="w-full text-sm text-left">
                    <thead class="text-xs text-slate-500 uppercase bg-slate-100">
                        <tr>
                            <th scope="col" class="px-6 py-3 border-b border-slate-200"><?php echo e(__('Property')); ?></th>
                            <th scope="col" class="px-6 py-3 border-b border-slate-200"><?php echo e(__('Value')); ?></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <tr class="border-b border-slate-100">
                            <td class="px-6 py-4 font-medium text-slate-900"><?php echo e(__('Net Weight')); ?></td>
                            <td class="px-6 py-4 font-mono text-slate-600"><?php echo e(number_format($product->weight_kg, 3)); ?> kg</td>
                        </tr>
                        <tr class="border-b border-slate-100">
                            <td class="px-6 py-4 font-medium text-slate-900"><?php echo e(__('Packaging Unit')); ?></td>
                            <td class="px-6 py-4 font-mono text-slate-600"><?php echo e($product->pieces_per_bundle); ?> pcs / bundle</td>
                        </tr>
                        <tr class="border-b border-slate-100">
                            <td class="px-6 py-4 font-medium text-slate-900"><?php echo e(__('Price Reference')); ?></td>
                            <td class="px-6 py-4 font-mono text-slate-600"><?php echo e(number_format($product->price, 2)); ?> DA</td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <!-- Description -->
            <div class="p-8">
                <h3 class="font-bold text-slate-900 uppercase tracking-wider text-sm mb-4 border-b border-slate-200 pb-2"><?php echo e(__('Product Description')); ?></h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-sm leading-relaxed text-slate-600">
                    <div>
                        <strong class="block text-slate-900 mb-1">English</strong>
                        <p><?php echo e($product->description_en ?? 'N/A'); ?></p>
                    </div>
                    <div>
                        <strong class="block text-slate-900 mb-1">Français</strong>
                        <p><?php echo e($product->description_fr ?? 'N/P'); ?></p>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="bg-slate-100 p-8 text-center border-t border-slate-200 print:bg-slate-100 print:text-slate-500 print-color-adjust-exact">
                <p class="text-xs text-slate-400 uppercase tracking-widest mb-2"><?php echo e(__('Official Technical Documentation')); ?></p>
                <div class="text-[0.6rem] text-slate-400 max-w-lg mx-auto">
                    <?php echo e(__('The information contained in this technical sheet is based on our current knowledge. It is accurate to the best of our ability but does not constitute a guarantee. Specifications are subject to change without notice.')); ?>

                </div>
                <div class="mt-4 font-bold text-slate-900 text-sm">MyFix</div>
            </div>
        </div>
    </div>
    
    <style>
        @media print {
            body { background: white; }
            nav, header, footer { display: none !important; }
            .print\:hidden { display: none !important; }
            .print\:bg-slate-900 { background-color: #0f172a !important; -webkit-print-color-adjust: exact; }
            .print\:text-white { color: white !important; -webkit-print-color-adjust: exact; }
            .print\:shadow-none { box-shadow: none !important; }
            .print\:w-full { width: 100% !important; max-width: none !important; }
            .min-h-screen { min-height: auto !important; }
        }
    </style>
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
<?php /**PATH C:\Users\Bucket\Desktop\Commandes\placo-app\resources\views\products\technical-sheet.blade.php ENDPATH**/ ?>