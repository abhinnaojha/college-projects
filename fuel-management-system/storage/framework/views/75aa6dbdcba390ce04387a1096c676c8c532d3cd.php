<?php $__env->startSection('title', $module.' - Finalise'); ?>
<?php $__env->startSection('main_content'); ?>
    <section>
        <div>
            <div>
                <h1><?php echo e($module); ?> page</h1>
            </div>
            <form action="<?php echo e(route($base_route.'store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="customer" value="<?php echo e($data['finalised']->customer); ?>">
                <input type="hidden" name="pump" value="<?php echo e($data['finalised']->pump); ?>">
                <input type="hidden" name="fuel" value="<?php echo e($data['finalised']->fuel); ?>">
                <input type="hidden" name="quantity" value="<?php echo e($data['finalised']->quantity); ?>">
                <input type="hidden" name="amount" value="<?php echo e($data['amount']); ?>">

                <p>
                    Final payable amount is Rs.<?php echo e($data['amount']); ?> only.
                </p>
                <p>
                    Please confirm that payment has been made to pump.
                </p>
                <input type="submit" value="Confirm">
            </form>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.mainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dell\Desktop\laravel_final\petrol\resources\views/backend/transaction/finalise.blade.php ENDPATH**/ ?>