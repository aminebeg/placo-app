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
    <?php $__env->startSection('title', 'Contact - Global Accessoires'); ?>

    <div class="relative min-h-screen py-24 flex flex-col justify-center">
        <!-- Background -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-1/4 left-1/4 w-[800px] h-[800px] bg-portal-accent/5 rounded-full blur-[120px]"></div>
            <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20 brightness-100"></div>
        </div>

        <div class="max-w-7xl mx-auto px-6 relative z-10 w-full">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 md:gap-24">
                
                <!-- Info Side -->
                <div>
                     <span class="text-portal-accent font-bold uppercase tracking-widest text-xs mb-4 block"><?php echo e(__('Parlons de vos projets')); ?></span>
                    <h1 class="text-5xl font-display font-black text-white mb-8"><?php echo e(__('Contactez-Nous')); ?></h1>
                    <p class="text-slate-400 text-xl leading-relaxed mb-12">
                        <?php echo e(__('Une question technique ? Une demande de devis ? Notre équipe est à votre écoute.')); ?>

                    </p>

                    <div class="space-y-10">
                        <div class="flex items-start gap-6">
                            <div class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center shrink-0">
                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-map-pin'); ?>
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
                                <h3 class="text-xl font-bold text-white mb-2"><?php echo e(__('Siège & Dépôt')); ?></h3>
                                <p class="text-slate-400 leading-relaxed">
                                    Zone Industrielle Bordj Bou Arreridj<br>
                                    Bordj Bou Arreridj, Algérie
                                </p>
                                <a href="https://maps.google.com" target="_blank" class="inline-flex items-center gap-2 text-sm font-bold text-portal-accent mt-2 hover:underline">
                                    <?php echo e(__('Voir sur la carte')); ?> <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-arrow-right'); ?>
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
                                </a>
                            </div>
                        </div>

                        <div class="relative rounded-2xl overflow-hidden border border-white/10 aspect-video mb-10 group">
                            <img src="/images/contact.png" alt="Support MyFix" class="absolute inset-0 w-full h-full object-cover opacity-50 group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0a0a0b] via-transparent to-transparent"></div>
                            <div class="absolute bottom-4 left-4 right-4 p-4 bg-white/5 backdrop-blur-md rounded-xl border border-white/10">
                                <p class="text-xs font-bold text-white uppercase tracking-widest text-center"><?php echo e(__('Une équipe à votre écoute')); ?></p>
                            </div>
                        </div>

                        <div class="flex items-start gap-6">
                            <div class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center shrink-0">
                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-phone'); ?>
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
                                <h3 class="text-xl font-bold text-white mb-2"><?php echo e(__('Téléphone')); ?></h3>
                                <p class="text-slate-400 mb-2"><?php echo e(__('Du Dimanche au Jeudi, 8h00 - 17h00')); ?></p>
                                <a href="tel:+213550000000" class="text-xl font-display font-bold text-white hover:text-portal-accent transition-colors">
                                    +213 550 00 00 00
                                </a>
                            </div>
                        </div>

                        <div class="flex items-start gap-6">
                            <div class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center shrink-0">
                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-mail'); ?>
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
                                <h3 class="text-xl font-bold text-white mb-2"><?php echo e(__('Email')); ?></h3>
                                <p class="text-slate-400 mb-2"><?php echo e(__('Réponse sous 24h ouvrées')); ?></p>
                                <a href="mailto:commercial@myfix-dz.com" class="text-lg text-white hover:text-portal-accent transition-colors">
                                    commercial@myfix-dz.com
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Side -->
                <div class="bg-[#141415] border border-white/10 rounded-3xl p-8 md:p-12 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-full h-2 bg-gradient-to-r from-portal-accent to-transparent"></div>
                    
                    <h2 class="text-2xl font-bold text-white mb-8"><?php echo e(__('Envoyer un Message')); ?></h2>
                    
                    <form class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2"><?php echo e(__('Votre Nom')); ?></label>
                                <input type="text" class="w-full bg-black/50 border border-white/10 rounded-lg px-4 py-3 text-white focus:border-portal-accent focus:ring-0 transition-colors" placeholder="<?php echo e(__('Nom complet')); ?>">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2"><?php echo e(__('Téléphone')); ?></label>
                                <input type="tel" class="w-full bg-black/50 border border-white/10 rounded-lg px-4 py-3 text-white focus:border-portal-accent focus:ring-0 transition-colors" placeholder="05 XX XX XX XX">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2"><?php echo e(__('Email Professionnel')); ?></label>
                            <input type="email" class="w-full bg-black/50 border border-white/10 rounded-lg px-4 py-3 text-white focus:border-portal-accent focus:ring-0 transition-colors" placeholder="nom@entreprise.com">
                        </div>

                        <div>
                             <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2"><?php echo e(__('Sujet')); ?></label>
                            <select class="w-full bg-black/50 border border-white/10 rounded-lg px-4 py-3 text-white focus:border-portal-accent focus:ring-0 transition-colors">
                                <option class="bg-[#141415]"><?php echo e(__('Demande de Devis')); ?></option>
                                <option class="bg-[#141415]"><?php echo e(__('Renseignement Technique')); ?></option>
                                <option class="bg-[#141415]"><?php echo e(__('Partenariat')); ?></option>
                                <option class="bg-[#141415]"><?php echo e(__('Autre')); ?></option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2"><?php echo e(__('Message')); ?></label>
                            <textarea rows="4" class="w-full bg-black/50 border border-white/10 rounded-lg px-4 py-3 text-white focus:border-portal-accent focus:ring-0 transition-colors" placeholder="<?php echo e(__('Comment pouvons-nous vous aider ?')); ?>"></textarea>
                        </div>

                        <button type="button" class="w-full bg-portal-accent text-black font-bold py-4 rounded-lg hover:bg-white transition-colors flex items-center justify-center gap-2">
                             <?php echo e(__('Envoyer la demande')); ?> <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-send'); ?>
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
                        </button>
                    </form>
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
<?php /**PATH C:\Users\Bucket\Desktop\Commandes\placo-app\resources\views\pages\contact.blade.php ENDPATH**/ ?>