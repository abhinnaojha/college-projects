<?php $__env->startSection('main_content'); ?>
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

                        <div class="mt-8">
                            <nav class="">
                                <ul class="grid grid-cols-6 text-center gap-6 border min-w-full">
                                    <li class="">
                                        <a href="<?php echo e(route('admin.index')); ?>" class="hover:capitalize">
                                            Admins
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="<?php echo e(route('customer.index')); ?>" class="hover:capitalize">
                                            Customers
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('pump.index')); ?>" class="hover:capitalize">
                                            Pumps
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('fueltype.index')); ?>" class="hover:capitalize">
                                            Fuel Type
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('fuelscheme.index')); ?>" class="hover:capitalize">
                                            Fuel Scheme
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('transaction.index')); ?>" class="hover:capitalize">
                                            Transactions
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.mainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dell\Desktop\laravel_final\petrol\resources\views/backend/home/admin.blade.php ENDPATH**/ ?>