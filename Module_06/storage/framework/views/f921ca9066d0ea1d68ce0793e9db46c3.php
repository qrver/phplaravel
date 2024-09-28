<?php $__env->startSection('content'); ?>

<h2>Данные сотрудника</h2>
<p><strong>Имя:</strong> <?php echo e($name); ?></p>
<p><strong>Фамилия:</strong> <?php echo e($surname); ?></p>
<p><strong>Должность:</strong> <?php echo e($position); ?></p>
<p><strong>Адрес проживания:</strong> <?php echo e($address); ?></p>
<p><strong>Email:</strong> <?php echo e($email); ?></p>
<p><strong>Данные о работе:</strong> <?php echo e($workData); ?></p>
<h3>Адрес из JSON:</h3>
<p><strong>Улица:</strong> <?php echo e($street); ?></p>
<p><strong>Город:</strong> <?php echo e($city); ?></p>
<p><strong>Широта:</strong> <?php echo e($lat); ?></p>
<p><strong>Долгота:</strong> <?php echo e($lng); ?></p>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Project (Laravel)/phplaravel/Module_05/resources/views/employee-result.blade.php ENDPATH**/ ?>