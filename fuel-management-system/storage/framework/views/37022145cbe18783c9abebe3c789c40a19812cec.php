<?php $__env->startSection('main_content'); ?>
<section>
    <div>
        <h1><?php echo e($module); ?> page</h1>
    </div>
</section>
<?php echo $__env->yieldContent('content'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.mainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dell\Desktop\laravel_final\petrol\resources\views/backend/admin/admin.blade.php ENDPATH**/ ?>