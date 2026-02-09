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
        <span class="inline-block bg-portal-accent text-black px-2.5 py-1 rounded-md text-[0.7rem] font-extrabold uppercase tracking-wider mb-2"><?php echo e(__('Mon Profil')); ?></span>
        <h1 class="text-4xl font-extrabold tracking-tight mb-2"><?php echo e(__('Mettre a jour mes informations')); ?></h1>
        <p class="text-portal-muted text-lg"><?php echo e(__('Votre numero de telephone est obligatoire pour que nous puissions vous appeler.')); ?></p>
     <?php $__env->endSlot(); ?>

    <div class="max-w-3xl">
        <div class="bg-portal-sidebar border border-portal-border rounded-xl p-6 lg:p-8">
            <form action="<?php echo e(route('profile.update')); ?>" method="POST" class="space-y-6">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>

                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2"><?php echo e(__('Prenom')); ?></label>
                        <input type="text" name="first_name" value="<?php echo e(old('first_name', $user->first_name)); ?>" required class="w-full bg-black border border-portal-border rounded-xl px-4 py-3 text-sm text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all">
                        <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-400 text-xs mt-2"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2"><?php echo e(__('Nom')); ?></label>
                        <input type="text" name="last_name" value="<?php echo e(old('last_name', $user->last_name)); ?>" required class="w-full bg-black border border-portal-border rounded-xl px-4 py-3 text-sm text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all">
                        <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-400 text-xs mt-2"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2"><?php echo e(__('Entreprise')); ?></label>
                    <input type="text" name="company" value="<?php echo e(old('company', $user->company)); ?>" class="w-full bg-black border border-portal-border rounded-xl px-4 py-3 text-sm text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all">
                    <?php $__errorArgs = ['company'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-400 text-xs mt-2"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2"><?php echo e(__('Telephone')); ?></label>
                    <input type="text" name="phone" value="<?php echo e(old('phone', $user->phone)); ?>" required class="w-full bg-black border border-portal-border rounded-xl px-4 py-3 text-sm text-white focus:ring-2 focus:ring-portal-accent/50 focus:border-portal-accent transition-all">
                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-400 text-xs mt-2"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="flex flex-wrap items-center gap-3 pt-2">
                    <button type="submit" class="bg-portal-accent text-black font-black uppercase tracking-widest px-6 py-3 rounded-xl hover:bg-white transition-all text-xs shadow-lg">
                        <?php echo e(__('Enregistrer le profil')); ?>

                    </button>
                    <?php if($user->phone): ?>
                        <a href="tel:<?php echo e(preg_replace('/\s+/', '', $user->phone)); ?>" class="bg-white/5 border border-portal-border text-white px-4 py-3 rounded-xl font-bold hover:bg-white/10 transition-colors text-xs">
                            <?php echo e(__('Appeler ce numero')); ?>

                        </a>
                    <?php endif; ?>
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
<?php /**PATH C:\Users\Bucket\Desktop\Commandes\placo-app\resources\views\profile\edit.blade.php ENDPATH**/ ?>