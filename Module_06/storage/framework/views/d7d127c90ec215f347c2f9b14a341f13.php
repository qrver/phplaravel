<?php $__env->startSection('title', 'Главная страница'); ?>

<?php $__env->startSection('content'); ?>
    <h2>Добро пожаловать на главную страницу!</h2>
    <p>Имя: <?php echo e($name); ?></p>
    <p>Возраст: 
        <?php if($age > 18): ?>
            <?php echo e($age); ?>

        <?php else: ?>
            Указанный человек слишком молод.
        <?php endif; ?>
    </p>
    <p>Должность: <?php echo e($position); ?></p>
    <p>Адрес: <?php echo e($address); ?></p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Project (Laravel)/phplaravel/Module_04/resources/views/home.blade.php ENDPATH**/ ?>