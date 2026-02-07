<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e(__('Register')); ?> - MyFix Portal</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Unbounded:wght@400;500;600;700&display=swap" rel="stylesheet">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="font-sans antialiased bg-portal-bg text-portal-text min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-2xl">
        <div class="text-center mb-10">
            <div class="flex flex-col items-center justify-center gap-2 font-display font-bold text-2x tracking-tight mb-2 uppercase group">
                <div class="w-12 h-12 bg-portal-accent rounded-xl flex items-center justify-center text-black shadow-lg shadow-portal-accent/20 mb-2 transition-transform group-hover:scale-110">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-building-2'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-7 h-7']); ?>
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
                <div class="flex flex-col leading-[0.9]">
                    <span class="text-white text-2xl font-black tracking-tighter"><?php echo e(__('GLOBAL')); ?></span>
                    <span class="text-portal-accent text-sm font-bold tracking-[0.3em] ms-0.5"><?php echo e(__('ACCESSOIRES')); ?></span>
                </div>
            </div>
            <p class="text-portal-muted text-xs uppercase tracking-widest mt-4"><?php echo e(__('Ouverture de Compte Partenaire')); ?></p>
        </div>

        <div class="bg-portal-sidebar border border-portal-border rounded-xl p-8 shadow-2xl">
            <form method="POST" action="<?php echo e(route('register')); ?>" class="space-y-6">
                <?php echo csrf_field(); ?>
                
                <?php if($errors->any()): ?>
                    <div class="bg-red-500/10 border border-red-500/20 text-red-500 rounded-lg p-3 text-sm font-medium">
                        <ul class="list-disc list-inside">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2"><?php echo e(__('First Name')); ?></label>
                        <input type="text" name="first_name" required autofocus class="w-full bg-white/5 border border-portal-border rounded-lg px-4 py-3 text-white focus:border-portal-accent focus:ring-0 placeholder-portal-muted transition-colors">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2"><?php echo e(__('Last Name')); ?></label>
                        <input type="text" name="last_name" required class="w-full bg-white/5 border border-portal-border rounded-lg px-4 py-3 text-white focus:border-portal-accent focus:ring-0 placeholder-portal-muted transition-colors">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2"><?php echo e(__('Company / Organization')); ?></label>
                    <input type="text" name="company" class="w-full bg-white/5 border border-portal-border rounded-lg px-4 py-3 text-white focus:border-portal-accent focus:ring-0 placeholder-portal-muted transition-colors">
                </div>

                <div>
                    <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2"><?php echo e(__('Business Email')); ?></label>
                    <input type="email" name="email" required class="w-full bg-white/5 border border-portal-border rounded-lg px-4 py-3 text-white focus:border-portal-accent focus:ring-0 placeholder-portal-muted transition-colors">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2"><?php echo e(__('Password')); ?></label>
                        <input type="password" name="password" required class="w-full bg-white/5 border border-portal-border rounded-lg px-4 py-3 text-white focus:border-portal-accent focus:ring-0 placeholder-portal-muted transition-colors">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-portal-muted uppercase tracking-wider mb-2"><?php echo e(__('Confirm Password')); ?></label>
                        <input type="password" name="password_confirmation" required class="w-full bg-white/5 border border-portal-border rounded-lg px-4 py-3 text-white focus:border-portal-accent focus:ring-0 placeholder-portal-muted transition-colors">
                    </div>
                </div>

                <button type="submit" class="w-full bg-portal-accent text-black font-bold py-3.5 rounded-lg hover:bg-white transition-colors flex items-center justify-center gap-2">
                    <?php echo e(__('Create Account')); ?> <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-user-plus'); ?>
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
            </form>
        </div>
        
        <p class="text-center text-sm mt-8">
            <span class="text-portal-muted"><?php echo e(__('Already have an account?')); ?></span>
            <a href="<?php echo e(route('login')); ?>" class="text-portal-accent font-bold hover:underline ml-1 tracking-tight"><?php echo e(__('Sign In')); ?></a>
        </p>
    </div>
</body>
</html>
<?php /**PATH C:\Users\Bucket\Desktop\Commandes\placo-app\resources\views/auth/register.blade.php ENDPATH**/ ?>