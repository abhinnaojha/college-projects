<?php $__env->startSection('title', $module.' - Home'); ?>
<?php $__env->startSection('main_content'); ?>
    <section>
        <div>
            <h1><?php echo e($module); ?> page</h1>
        </div>
        <div>
            <table>
                <thead>
                    <th>customer id</th>
                    <th>pump</th>
                    <th>fuel type</th>
                    <th>quantity</th>

                </thead>
                <tbody>
                    <?php $__currentLoopData = $data['records']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($datum->customer); ?></td>
                            <td><?php echo e($datum->pump); ?></td>
                            <td><?php echo e($datum->fuel); ?></td>
                            <td><?php echo e($datum->quantity); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.mainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dell\Desktop\laravel_final\petrol\resources\views/backend/transaction/index.blade.php ENDPATH**/ ?>