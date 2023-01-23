<?php $__env->startSection('title', $module.' - Create'); ?>
<?php $__env->startSection('main_content'); ?>
    <section>
        <div>
            <div>
                <h1><?php echo e($module); ?> page</h1>
            </div>
            <form action="<?php echo e(route($base_route.'store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div>
                    <div>
                        <label name="name">Fuel name:</label>
                    </div>
                    <div>
                        <input type="text" name="name"/>
                    </div>
                    
                    
                    
                    
                    
                </div>
                <div>
                    <input type="submit" value="Make new fuel type">
                </div>
            </form>
            <div>
                <a href="<?php echo e(route($base_route.'index')); ?>">
                    <button>Back to Fuel Types</button>
                </a>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.mainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dell\Desktop\laravel_final\petrol\resources\views/backend/fueltype/create.blade.php ENDPATH**/ ?>