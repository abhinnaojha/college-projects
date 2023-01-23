<?php $__env->startSection('title', $module.' - Create'); ?>
<?php $__env->startSection('main_content'); ?>
    <section>
        <div>
            <div>
                <h1><?php echo e($module); ?> page</h1>
            </div>
            <form action="<?php echo e(route($base_route.'update', $data['record']->id)); ?>" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <?php echo csrf_field(); ?>
                <div>
                    <div>
                        <p>

                            <span>Fuel type:</span>
                            <span>
                                <?php $__currentLoopData = $data['fuel']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fuel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <input type="hidden" name="fuel" value="<?php echo e($fuel->id); ?>">
                                    <?php echo e($fuel->name); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </span>
                        </p>
                    </div>
                    <div>
                    </div>

                    <div>
                        <label for="address">low range:</label>
                    </div>
                    <div>
                        <input type="number" name="start_at"
                               id="start_at" step="0.01" value="<?php echo e($data['record']->start_at); ?>">
                    </div>
                                        <div>
                        <label for="address">price:</label>
                    </div>
                    <div>
                        <input type="number" name="price"
                               id="price" step="0.01" value="<?php echo e($data['record']->price); ?>">
                    </div>

                    
                    
                    
                    
                    
                </div>
                <div>
                    <input type="submit" value="Make Fuel Scheme">
                </div>
            </form>
            <div>
                <a href="<?php echo e(route($base_route.'index')); ?>">
                    <button>Back to Fuel Scheme</button>
                </a>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.mainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dell\Desktop\laravel_final\petrol\resources\views/backend/fuelscheme/edit.blade.php ENDPATH**/ ?>