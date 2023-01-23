<?php $__env->startSection('title', $module.' - Edit - '. $data['record']->id . '. ' . $data['record']->name); ?>
<?php $__env->startSection('main_content'); ?>
    <section>
        <div>
            <div>
                <h1><?php echo e($module); ?> page</h1>
            </div>
            <form action="<?php echo e(route($base_route.'update', $data['record']->id)); ?>" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="user" value="<?php echo e($data['record']->user); ?>">
                <?php echo csrf_field(); ?>
                <div>
                    <div>
                        <label name="name">Pump name:</label>
                    </div>
                    <div>
                        <input type="text" name="name" value="<?php echo e($data['record']->name); ?>">
                    </div>

                    <div>
                        <label name="name">Pump address:</label>
                    </div>
                    <div>
                        <input type="text" name="address" value="<?php echo e($data['record']->address); ?>">
                    </div>
                    <div>
                        <?php $__currentLoopData = $data['fuels']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div>
                                <input type="checkbox" name="fuel[]" value="<?php echo e($f->id); ?>">
                                <?php echo e($f->name); ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    
                    
                    
                    
                    
                </div>
                <div class="mt-3">
                    <input type="submit" value="Update pump">
                </div>
            </form>
            <div>
                <a href="<?php echo e(route($base_route.'index')); ?>">
                    <button class="mt-8 back">Back to pump</button>
                </a>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.mainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dell\Desktop\laravel_final\petrol\resources\views/backend/pump/edit.blade.php ENDPATH**/ ?>