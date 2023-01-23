<?php $__env->startSection('main_content'); ?>
    <div class="mt-8">
        <div class="">
            <div class="">
                <div class="">
                    <div class="">
                        <?php if(session('status')): ?>
                            <div class="" role="alert">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>

                        <div>
                            <table>
                                <tr>
                                    <th>transaction id</th>
                                    <th>pump name</th>
                                    <th>fuel type</th>
                                    <th>quantity</th>
                                    <th>transaction amount</th>
                                </tr>
                                <?php $__currentLoopData = $records['current_fuel']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($cf->tran_id); ?></td>
                                        <td><?php echo e($cf->pump); ?></td>
                                        <td><?php echo e($cf->fuel); ?></td>
                                        <td><?php echo e($cf->quantity); ?></td>
                                        <td><?php echo e($cf->amount); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.mainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dell\Desktop\laravel_final\petrol\resources\views/backend/home/customer.blade.php ENDPATH**/ ?>