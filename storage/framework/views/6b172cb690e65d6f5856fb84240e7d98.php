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
    <?php $__env->startSection('title', 'À Propos - Global Accessoires'); ?>

    <!-- Hero Section -->
    <div class="relative py-24 md:py-32 overflow-hidden">
        <!-- Background Effects -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-portal-accent/5 rounded-full blur-[120px]"></div>
            <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20 brightness-100"></div>
        </div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <span class="text-portal-accent font-bold uppercase tracking-widest text-xs mb-4 block"><?php echo e(__('Notre Entreprise')); ?></span>
            <h1 class="text-5xl md:text-7xl font-display font-black tracking-tight mb-8 text-white">
                SARL GLOBAL <br>
                <span class="text-slate-500">ACCESSOIRES</span>
            </h1>
            <p class="text-xl text-slate-400 max-w-2xl leading-relaxed">
                <?php echo e(__('Fabricant de la marque MYFIX et distributeur multi-marques, SARL Global Accessoires s\'est imposée depuis 2015 comme un acteur industriel et commercial majeur du second œuvre en Algérie.')); ?>

            </p>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="border-y border-white/5 bg-[#0f0f10]/50 backdrop-blur-sm">
        <div class="max-w-7xl mx-auto px-6 py-12">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div>
                    <div class="text-4xl font-black text-white mb-1">2015</div>
                    <div class="text-xs font-bold text-slate-500 uppercase tracking-widest"><?php echo e(__('Année de Création')); ?></div>
                </div>
                <div>
                    <div class="text-4xl font-black text-white mb-1">5000+</div>
                    <div class="text-xs font-bold text-slate-500 uppercase tracking-widest"><?php echo e(__('Projets Fournis')); ?></div>
                </div>
                <div>
                    <div class="text-4xl font-black text-white mb-1">2000<span class="text-lg align-top">m²</span></div>
                    <div class="text-xs font-bold text-slate-500 uppercase tracking-widest"><?php echo e(__('Capacité de Stockage')); ?></div>
                </div>
                <div>
                    <div class="text-4xl font-black text-white mb-1">100%</div>
                    <div class="text-xs font-bold text-slate-500 uppercase tracking-widest"><?php echo e(__('Satisfaction Client')); ?></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <section class="py-24" id="vision">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
                <div class="relative">
                    <div class="absolute inset-0 bg-portal-accent/10 blur-[80px] rounded-full"></div>
                    <!-- Placeholder for Company Image -->
                    <div class="relative rounded-2xl overflow-hidden border border-white/10 aspect-[4/3] bg-[#141415] group">
                        <img src="/images/headquarters.png" alt="Siège Global Accessoires" class="absolute inset-0 w-full h-full object-cover opacity-60 group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0a0a0b] via-transparent to-transparent"></div>
                        <div class="absolute bottom-6 left-6 flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-portal-accent/20 backdrop-blur-md flex items-center justify-center border border-white/10">
                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-building-2'); ?>
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
                            </div>
                            <span class="text-xs uppercase font-bold tracking-widest text-white"><?php echo e(__('Siège & Dépôt Central')); ?></span>
                        </div>
                    </div>
                </div>
                <div>
                    <h2 class="text-3xl font-display font-bold mb-6 text-white"><?php echo e(__('Notre Engagement Industriel')); ?></h2>
                    <div class="space-y-6 text-slate-400 text-lg leading-relaxed">
                        <p>
                            <?php echo e(__('SARL Global Accessoires n\'est pas seulement un distributeur. Nous sommes avant tout un fabricant engagé. Avec MYFIX, nous produisons localement des solutions de fixation et d\'isolation répondant aux plus hautes exigences techniques.')); ?>

                        </p>
                        <p>
                            <?php echo e(__('Cette maîtrise de la production nous permet de garantir une qualité constante et une disponibilité immédiate, tout en proposant les produits de nos partenaires mondiaux pour une offre 360°.')); ?>

                        </p>
                        <ul class="space-y-4 mt-8">
                            <li class="flex items-center gap-3">
                                <div class="w-6 h-6 rounded-full bg-portal-accent/20 flex items-center justify-center">
                                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-check'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-3 h-3 text-portal-accent']); ?>
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
                                <span class="text-white text-base"><?php echo e(__('Disponibilité immédiate sur les produits phares')); ?></span>
                            </li>
                            <li class="flex items-center gap-3">
                                <div class="w-6 h-6 rounded-full bg-portal-accent/20 flex items-center justify-center">
                                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-check'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-3 h-3 text-portal-accent']); ?>
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
                                <span class="text-white text-base"><?php echo e(__('Logistique intégrée vers toutes les Wilayas')); ?></span>
                            </li>
                            <li class="flex items-center gap-3">
                                <div class="w-6 h-6 rounded-full bg-portal-accent/20 flex items-center justify-center">
                                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-check'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-3 h-3 text-portal-accent']); ?>
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
                                <span class="text-white text-base"><?php echo e(__('Support technique et devis personnalisés')); ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Expertise BENTO -->
    <section class="py-24 bg-[#0f0f10]" id="expertise">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-portal-accent font-bold uppercase tracking-widest text-xs mb-2 block"><?php echo e(__('Notre Expertise')); ?></span>
                <h2 class="text-4xl font-display font-black text-white"><?php echo e(__('Au-delà des Produits')); ?></h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <!-- Card 1 -->
                <div class="group relative bg-[#141415] border border-white/5 rounded-2xl p-8 overflow-hidden hover:border-portal-accent/30 transition-all duration-500">
                    <img src="/images/logistics.png" alt="Logistique" class="absolute inset-0 w-full h-full object-cover opacity-[0.05] group-hover:opacity-10 transition-opacity">
                    <div class="relative z-10">
                        <div class="w-12 h-12 bg-portal-accent/10 rounded-xl flex items-center justify-center mb-6 border border-portal-accent/20">
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-truck'); ?>
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
                        <h3 class="text-xl font-bold text-white mb-4"><?php echo e(__('Logistique Performante')); ?></h3>
                        <p class="text-slate-400">
                            <?php echo e(__('Notre centre logistique basé à Bordj Bou Arreridj est le cœur battant de notre distribution, nous permettant de livrer nos produits MYFIX et nos marques partenaires dans tout le pays.')); ?>

                        </p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="group relative bg-[#141415] border border-white/5 rounded-2xl p-8 overflow-hidden hover:border-portal-accent/30 transition-all duration-500">
                    <img src="/images/certification.png" alt="Formation" class="absolute inset-0 w-full h-full object-cover opacity-[0.05] group-hover:opacity-10 transition-opacity">
                    <div class="relative z-10">
                        <div class="w-12 h-12 bg-portal-accent/10 rounded-xl flex items-center justify-center mb-6 border border-portal-accent/20">
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-graduation-cap'); ?>
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
                        <h3 class="text-xl font-bold text-white mb-4"><?php echo e(__('Formation & Conseil')); ?></h3>
                        <p class="text-slate-400">
                            <?php echo e(__('Nous organisons régulièrement des sessions de démonstration avec nos partenaires pour former les artisans aux nouvelles techniques de pose.')); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Partners -->
    <section class="py-24 border-t border-white/5">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-display font-bold text-white mb-12"><?php echo e(__('Ils nous font confiance')); ?></h2>
            <div class="flex flex-wrap justify-center items-center gap-12 md:gap-20 opacity-50 grayscale hover:grayscale-0 hover:opacity-100 transition-all duration-500">
                 <!-- Brands (Text for now) -->
                <div class="text-3xl font-black font-display text-white tracking-widest">KNAUF</div>
                <div class="text-3xl font-black font-display text-white tracking-widest">PLACO</div>
                <div class="text-3xl font-black font-display text-white tracking-widest">ISOVER</div>
                <div class="text-3xl font-black font-display text-white tracking-widest">SEMIN</div>
                <div class="text-3xl font-black font-display text-white tracking-widest">MAPEI</div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-24 bg-portal-accent">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-display font-black text-black mb-6"><?php echo e(__('Prêt à démarrer votre chantier ?')); ?></h2>
            <p class="text-black/80 text-xl mb-10"><?php echo e(__('Contactez notre service commercial ou commandez directement en ligne.')); ?></p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="/#contact" class="px-8 py-4 bg-black text-white rounded-lg font-bold text-lg hover:bg-black/80 transition-all">
                    <?php echo e(__('Nous Contacter')); ?>

                </a>
                <a href="<?php echo e(route('products.index')); ?>" class="px-8 py-4 bg-white/20 border border-black/10 text-black rounded-lg font-bold text-lg hover:bg-white/30 transition-all backdrop-blur-md">
                    <?php echo e(__('Voir le Catalogue')); ?>

                </a>
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
<?php /**PATH C:\Users\Bucket\Desktop\Commandes\placo-app\resources\views\pages\about.blade.php ENDPATH**/ ?>