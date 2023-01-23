<?php $__env->startSection('title', $module.' - Create'); ?>
<?php $__env->startSection('main_content'); ?>
    <section>
        <div class="">
            <div>
                <h1><?php echo e($module); ?> page</h1>
            </div>
            <form action="<?php echo e(route($base_route.'store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="">
                    <div class="">
                        <select name="user">
                            <option value="0">-select user-</option>
                            <?php $__currentLoopData = $data['records']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($datum->user_id); ?>"><?php echo e($datum->user_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div>
                        <label for="name">Pump name:</label>
                    </div>
                    <div>
                        <input type="text" name="name" id="name">
                    </div>

                    <div>
                        <label for="address">Pump address:</label>
                    </div>
                    <div>
                        <input type="text" name="address" id="address">
                    </div>
                    <div>
                        <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                <div>
                    <input type="submit" value="Make pump" class="create">
                </div>
            </form>
            <div>
                <a href="<?php echo e(route($base_route.'index')); ?>">
                    <button class="back">Back to pump</button>
                </a>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.mainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dell\Desktop\laravel_final\petrol\resources\views/backend/pump/create.blade.php ENDPATH**/ ?>