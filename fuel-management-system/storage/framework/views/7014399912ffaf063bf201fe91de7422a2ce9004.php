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
                        <label name="user">Username:</label>
                    </div>
                    <div>
                        <select name="user">
                            <option value="0">-select user-</option>
                            <?php $__currentLoopData = $data['records']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($datum->user_id); ?>"><?php echo e($datum->user_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    
                    
                    
                    
                    
                </div>
                <div>
                    <input type="submit" value="Make admin">
                </div>
            </form>
            <div>
                <a href="<?php echo e(route('admin.index')); ?>">
                    <button class="back">Back to admin</button>
                </a>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.mainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dell\Desktop\laravel_final\petrol\resources\views/backend/admin/create.blade.php ENDPATH**/ ?>