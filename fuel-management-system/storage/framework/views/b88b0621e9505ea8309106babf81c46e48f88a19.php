<?php $__env->startSection('main_content'); ?>
<div>
    <?php echo $__env->yieldContent('index'); ?>
    iyelded content
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.mainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dell\Desktop\laravel_final\petrol\resources\views/backend/admin/test.blade.php ENDPATH**/ ?>