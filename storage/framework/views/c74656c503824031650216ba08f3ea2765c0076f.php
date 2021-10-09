<?php $__env->startSection('main-content'); ?>
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Add Order</h3>
            </div>
            <!-- form start -->
            <form method="post" action="<?php echo e(route('admin.order.doAdd')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="card-body">
                    <div class="form-group">
                        <label>Total</label>
                        <input type="number" class="form-control" id="" placeholder="Total" name="total"
                               value="<?php echo e(old('total')); ?>">
                        <span style="color: red"> <?php $__errorArgs = ['total'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>
                    </div>

                    <div class="form-group">
                        <label>Sub Total</label>
                        <input type="number" class="form-control" id="" placeholder="Sub total" name="sub_total"
                               value="<?php echo e(old('sub_total')); ?>">
                        <span style="color: red"> <?php $__errorArgs = ['sub_total'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>
                    </div>

                    <div class="form-group">
                        <label>Warranty</label>
                        <input type="text" class="form-control" id="" placeholder="Warranty" name="warranty"
                               value="<?php echo e(old('warranty')); ?>">
                        <span style="color: red"> <?php $__errorArgs = ['warranty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>
                    </div>
                    <div class="form-group">
                        <label>User</label>
                        <select name="user_id" placeholder="user" class="form-control">
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <span style="color: red"> <?php $__errorArgs = ['user_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" placeholder="Status" class="form-control">
                            <option value="1">Pending</option>
                            <option value="2">Processing</option>
                            <option value="3">Sent</option>
                            <option value="4">Received</option>
                            <option value="5">Cancel</option>
                        </select>
                        <span style="color: red"> <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>
                    </div>

                    <div class="form-group">
                        <label>Payment</label>
                        <input type="number" class="form-control" id="" placeholder="Payment" name="payment_type"
                               value="<?php echo e(old('payment_type')); ?>">
                        <span style="color: red"> <?php $__errorArgs = ['payment_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>
                    </div>

                <!-- /.card-body -->
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('be.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lrandom/Desktop/laravel/shopbanhang_be/resources/views/be/order/add.blade.php ENDPATH**/ ?>