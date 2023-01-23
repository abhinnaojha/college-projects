<?php $__env->startSection('title', $module.' - Home'); ?>
<?php $__env->startSection('main_content'); ?>
    <section>
        <div>
            <h1><?php echo e($module); ?> page</h1>
        </div>
        <div>
            <a href="<?php echo e(route($base_route.'create')); ?>">
                <button>Create <?php echo e($module); ?></button>
            </a>
        </div>
        <div>
            <table>
                <thead>
                    <th>id</th>
                    <th>fuel type name</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $data['records']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($datum->id); ?></td>
                            <td><?php echo e($datum->name); ?></td>
                            <td>
                                <a href="<?php echo e(route('fueltype.edit', $datum->id)); ?>">
                                    <button class="edit">Edit</button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.mainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dell\Desktop\laravel_final\petrol\resources\views/backend/fueltype/index.blade.php ENDPATH**/ ?>