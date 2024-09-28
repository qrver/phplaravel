<!DOCTYPE html>
<html lang="ru">
<head>
    <?php echo $__env->make('includes.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
    <?php echo $__env->make('includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="content">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <?php echo $__env->make('includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Project (Laravel)/phplaravel/Module_04/resources/views/layouts/default.blade.php ENDPATH**/ ?>