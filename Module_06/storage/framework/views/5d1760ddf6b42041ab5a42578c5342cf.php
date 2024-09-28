<?php $__env->startSection('content'); ?>

<form name="employee-form" id="employee-form" method="post" action="<?php echo e(url('store-form')); ?>">
    <?php echo csrf_field(); ?>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control" required="true">
    </div>
    <div class="form-group">
        <label for="surname">Surname</label>
        <input type="text" id="surname" name="surname" class="form-control" required="true">
    </div>
    <div class="form-group">
        <label for="position">Position</label>
        <input type="text" id="position" name="position" class="form-control" required="true">
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" id="address" name="address" class="form-control" required="true">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control" required="true">
    </div>
    <div class="form-group">
        <label for="workData">Work Data</label>
        <textarea name="workData" class="form-control" required="true"></textarea>
    </div>
    <div class="form-group">
        <label for="jsonData">JSON данные</label>
        <textarea name="jsonData" id="jsonData" class="form-control" required="true" rows="5">{
            "address": {
                "street": "Kulas Light",
                "suite": "Apt. 556",
                "city": "Gwenborough",
                "zipcode": "92998-3874",
                "geo": {
                    "lat": "-37.3159",
                    "lng": "81.1496"
                }
            }
        }
        </textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Project (Laravel)/phplaravel/Module_05/resources/views/employee-form.blade.php ENDPATH**/ ?>