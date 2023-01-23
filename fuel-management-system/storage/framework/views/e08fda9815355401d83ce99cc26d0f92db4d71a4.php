<?php $__env->startSection('title', $module.' - Home'); ?>
<?php $__env->startSection('main_content'); ?>
    <section>
        <div>
            <h1>Pump details</h1>
        </div>
        <div>
            <table>
                <tbody>
                    <tr>
                       <th>pump id</th>
                        <td><?php echo e($data['record']->id); ?></td>
                    </tr>
                    <tr>
                        <th>pump name</th>
                        <td><?php echo e($data['record']->name); ?></td>
                    </tr>
                    <tr>
                        <th>pump address</th>
                        <td><?php echo e($data['record']->address); ?></td>
                    </tr>
                    <tr>
                        <th>fuels available</th>
                        <td>
                            <?php $__currentLoopData = $data['fuel']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fuel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span>
                                    <?php echo e($fuel->f_name); ?>

                                </span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <a href="<?php echo e(route($base_route.'edit', $data['record']->id)); ?>">
                                <button class="edit">Edit</button>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <a href="<?php echo e(route($base_route.'index')); ?>">
                                <button>Back to pump</button>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.mainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dell\Desktop\laravel_final\petrol\resources\views/backend/pump/view.blade.php ENDPATH**/ ?>