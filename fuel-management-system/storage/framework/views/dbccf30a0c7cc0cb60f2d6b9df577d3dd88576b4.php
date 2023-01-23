<?php $__env->startSection('content'); ?>
    <div class="">
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
                            <nav>
                                <ul>
                                    <li>
                                        <a href="<?php echo e(route('admin.index')); ?>">
                                            Admins
                                        </a>
                                    </li>
                                    <li>Customers</li>
                                    <li>Pumps</li>
                                    <li>Transactions</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dell\Desktop\laravel_final\petrol\resources\views/home/admin.blade.php ENDPATH**/ ?>