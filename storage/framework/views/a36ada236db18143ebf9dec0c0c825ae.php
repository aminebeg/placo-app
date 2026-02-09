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
    <?php $__env->startSection('title', 'MYFIX - La Marque de Référence par Global Accessoires'); ?>

    <!-- Subheader (Brand Bar) -->
    <div class="fixed top-20 w-full z-40 border-b border-white/5 bg-[#0a0a0b]/60 backdrop-blur-xl transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 h-12 flex items-center justify-between">
            <div class="flex items-center gap-6">
                <span class="text-[0.6rem] font-black text-portal-accent uppercase tracking-[0.3em] border-r border-white/10 pr-6"><?php echo e(__('Brand Space')); ?></span>
                <nav class="flex gap-6">
                    <a href="#vision" class="text-[0.6rem] font-bold text-slate-400 hover:text-white uppercase tracking-widest transition-colors"><?php echo e(__('Vision')); ?></a>
                    <a href="#products" class="text-[0.6rem] font-bold text-slate-400 hover:text-white uppercase tracking-widest transition-colors"><?php echo e(__('Produits')); ?></a>
                    <a href="#quality" class="text-[0.6rem] font-bold text-slate-400 hover:text-white uppercase tracking-widest transition-colors"><?php echo e(__('Qualité')); ?></a>
                </nav>
            </div>
            <a href="<?php echo e(route('products.index')); ?>?brand=MYFIX" class="text-[0.6rem] font-black text-black bg-portal-accent px-3 py-1 rounded-sm uppercase tracking-widest hover:bg-white transition-all">
                <?php echo e(__('Catalogue MYFIX')); ?>

            </a>
        </div>
    </div>

    <!-- Hero Section -->
    <header class="relative min-h-[80vh] flex items-center pt-24 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="/images/plaque de platre.png" alt="MyFix Premium" class="absolute inset-0 w-full h-full object-cover opacity-20 scale-110">
            <div class="absolute inset-0 bg-gradient-to-r from-[#0a0a0b] via-[#0a0a0b]/80 to-transparent"></div>
            <div class="absolute bottom-0 left-0 w-full h-1/2 bg-gradient-to-t from-[#0a0a0b] to-transparent"></div>
        </div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="flex flex-col items-start">
                <div class="flex items-center gap-6 mb-12">
                    <img src="/images/logo-myfix.png" alt="MYFIX" class="h-24 w-auto shadow-2xl">
                    <div class="w-1 h-20 bg-portal-accent/30 rounded-full"></div>
                    <h1 class="text-7xl md:text-9xl font-display font-black tracking-tighter leading-none">
                        MYFIX
                    </h1>
                </div>
                
                <p class="text-xl md:text-2xl text-slate-300 max-w-2xl leading-relaxed mb-10 font-light">
                    <?php echo e(__('L\'excellence industrielle au service de la construction sèche. Conçu, testé et produit en Algérie par SARL Global Accessoires.')); ?>

                </p>

                <div class="flex items-center gap-6">
                    <div class="flex flex-col">
                        <span class="text-4xl font-black text-white">100%</span>
                        <span class="text-[0.6rem] font-bold text-slate-500 uppercase tracking-widest"><?php echo e(__('Algérien')); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Content Sections -->
    <section id="vision" class="py-32 relative">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                <div class="space-y-8">
                    <h2 class="text-4xl md:text-5xl font-display font-black text-white leading-tight">
                        <?php echo e(__('L\'Innovation')); ?> <br>
                        <span class="text-portal-accent"><?php echo e(__('au Coeur de la Matière')); ?></span>
                    </h2>
                    <p class="text-lg text-slate-400 leading-relaxed">
                        <?php echo e(__('Née de la volonté de SARL Global Accessoires de proposer une alternative locale de haute qualité, MYFIX est devenue en quelques années la référence pour les professionnels du plâtre et de l\'isolation en Algérie.')); ?>

                    </p>
                    <div class="grid grid-cols-2 gap-8">
                        <div class="space-y-2">
                            <h4 class="text-white font-bold"><?php echo e(__('R&D Interne')); ?></h4>
                            <p class="text-sm text-slate-500"><?php echo e(__('Chaque produit est optimisé pour les conditions climatiques locales.')); ?></p>
                        </div>
                        <div class="space-y-2">
                            <h4 class="text-white font-bold"><?php echo e(__('Contrôle Qualité')); ?></h4>
                            <p class="text-sm text-slate-500"><?php echo e(__('Des tests de résistance rigoureux avant chaque mise sur le marché.')); ?></p>
                        </div>
                    </div>
                </div>
                <div class="relative rounded-[2.5rem] overflow-hidden aspect-video border border-white/10 shadow-2xl skew-y-3">
                    <img src="/images/ossature metalique.png" alt="Vision" class="absolute inset-0 w-full h-full object-cover">
                    <div class="absolute inset-0 bg-portal-accent/20 mix-blend-overlay"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Highlight Grid -->
    <section id="products" class="py-32 bg-white/2">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-20">
                <h2 class="text-4xl md:text-6xl font-display font-black text-white mb-6 uppercase tracking-tight"><?php echo e(__('Les Essentiels')); ?></h2>
                <p class="text-slate-400 max-w-xl mx-auto"><?php echo e(__('Une gamme conçue pour la rapidité de pose et la durabilité des ouvrages.')); ?></p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php
                    $features = [
                        ['title' => 'Accessoires de Fixation', 'desc' => 'Suspentes, Cavaliers, et Attaches conçus pour une rigidité maximale.', 'img' => '/images/accessoires.png'],
                        ['title' => 'Ossatures Optimisées', 'desc' => 'Profilés en acier galvanisé de haute précision pour une planéité parfaite.', 'img' => '/images/ossature metalique.png'],
                        ['title' => 'Solutions d\'Isolation', 'desc' => 'Compléments techniques pour une performance thermique et acoustique accrue.', 'img' => '/images/plaque de platre.png'],
                    ];
                ?>

                <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="group relative bg-[#141415] rounded-3xl overflow-hidden border border-white/5 hover:border-portal-accent/30 transition-all duration-500">
                    <div class="aspect-[4/5] relative">
                        <img src="<?php echo e($f['img']); ?>" alt="<?php echo e($f['title']); ?>" class="absolute inset-0 w-full h-full object-cover opacity-40 group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#141415] via-transparent to-transparent"></div>
                    </div>
                    <div class="p-8 relative -mt-20">
                        <h3 class="text-2xl font-bold text-white mb-3"><?php echo e($f['title']); ?></h3>
                        <p class="text-slate-400 text-sm leading-relaxed mb-6"><?php echo e($f['desc']); ?></p>
                        <a href="<?php echo e(route('products.index')); ?>?brand=MYFIX" class="inline-flex items-center gap-2 text-xs font-bold text-portal-accent uppercase tracking-widest group-hover:gap-4 transition-all">
                            <?php echo e(__('Voir la gamme')); ?> <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
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
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    <!-- Quality Section -->
    <section id="quality" class="py-32 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            <div class="bg-portal-accent rounded-[3rem] p-12 md:p-24 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-white/10 rounded-full blur-[120px] -translate-y-1/2 translate-x-1/2"></div>
                
                <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <div>
                        <h2 class="text-4xl md:text-6xl font-display font-black text-black leading-none mb-8">
                            <?php echo e(__('La Qualité')); ?> <br>
                            <span class="text-white"><?php echo e(__('Sans Compromis')); ?></span>
                        </h2>
                        <ul class="space-y-6">
                            <li class="flex items-start gap-4">
                                <div class="w-10 h-10 bg-black rounded-lg flex items-center justify-center shrink-0">
                                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-shield-check'); ?>
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
                                </div>
                                <div>
                                    <h4 class="text-black font-bold"><?php echo e(__('Certifié CE & IANOR')); ?></h4>
                                    <p class="text-black/60 text-sm"><?php echo e(__('Tous nos produits répondent aux normes de sécurité et de performance en vigueur.')); ?></p>
                                </div>
                            </li>
                            <li class="flex items-start gap-4">
                                <div class="w-10 h-10 bg-black rounded-lg flex items-center justify-center shrink-0">
                                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-award'); ?>
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
                                </div>
                                <div>
                                    <h4 class="text-black font-bold"><?php echo e(__('Acier Premier Choix')); ?></h4>
                                    <p class="text-black/60 text-sm"><?php echo e(__('Utilisation exclusive de matières premières certifiées pour une longévité garantie.')); ?></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="relative">
                        <img src="/images/headquarters.png" alt="Manufacturing" class="rounded-3xl shadow-2xl rotate-2 hover:rotate-0 transition-transform duration-500">
                    </div>
                </div>
            </div>
        </div>
    </section>

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
<?php /**PATH C:\Users\Bucket\Desktop\Commandes\placo-app\resources\views\pages\brand\myfix.blade.php ENDPATH**/ ?>