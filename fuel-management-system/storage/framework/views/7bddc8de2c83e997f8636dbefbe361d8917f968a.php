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
                        <label for="name">Fuel type:</label>
                    </div>
                    <div>
                        <select name="fuel" id="fuel">
                            <?php $__currentLoopData = $data['fuels']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fuel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($fuel->id); ?>"><?php echo e($fuel->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div>
                        <label for="address">end at:</label>
                    </div>
                    <div>
                        <input type="number" name="end_at" id="end_at" step="0.01">
                    </div>
                    <div>
                        <label for="address">price:</label>
                    </div>
                    <div>
                        <input type="number" name="price" id="price" step="0.01">
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

<?php echo $__env->make('backend.layouts.mainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dell\Desktop\laravel_final\petrol\resources\views/backend/fuelscheme/create.blade.php ENDPATH**/ ?>