<?php $__env->startSection('title', 'Контакты'); ?>

<?php $__env->startSection('content'); ?>
    <h2>Контакты</h2>
    <p>Адрес: <?php echo e($address); ?></p>
    <p>Почтовый индекс: <?php echo e($post_code); ?></p>
    <p>Телефон: <?php echo e($phone); ?></p>
    <p>Email: 
        <?php if(empty($email)): ?>
            Адрес электронной почты не указан.
        <?php else: ?>
            <?php echo e($email); ?>

        <?php endif; ?>
    </p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Project (Laravel)/phplaravel/Module_04/resources/views/contacts.blade.php ENDPATH**/ ?>