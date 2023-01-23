<?php $__env->startSection('title', $module.' - Create'); ?>
<?php $__env->startSection('main_content'); ?>
    <section>
        <div>
            <div>
                <h1><?php echo e($module); ?> page</h1>
            </div>
            <form action="<?php echo e(route($base_route.'finalise')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="pump" value="<?php echo e($data['pump_id']); ?>">
                <div>
                    <div>
                        <div>
                            <label for="fuel">Fuel type:</label>
                        </div>
                        <div id="fuel_type_of_pump">
                            <select name="fuel" id="fuel">
                                <option value="0">-select fuel type-</option>

                                <?php $__currentLoopData = $data['fuels']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fuel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($fuel->ft_id); ?>"><?php echo e($fuel->ft_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div>
                        <div>
                            <label for="quantity">Quantity in litre:</label>
                        </div>
                        <div>
                            <input type="number" name="quantity" min="0.01" step="0.01">
                        </div>
                        <div>
                            <label for="customer">Customer:</label>
                        </div>
                        <div>
                            <select name="customer" id="customer">
                                <option value="0">-select customer-</option>
                                <?php $__currentLoopData = $data['customers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->id); ?> -> <?php echo e($customer->license_number); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                
                                
                            </select>
                        </div>
                    </div>


                    
                    
                    
                    
                    
                </div>
                <div>
                    <input type="submit" value="Fill fuel">
                </div>
            </form>
        </div>
























































    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.mainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dell\Desktop\laravel_final\petrol\resources\views/backend/transaction/create.blade.php ENDPATH**/ ?>