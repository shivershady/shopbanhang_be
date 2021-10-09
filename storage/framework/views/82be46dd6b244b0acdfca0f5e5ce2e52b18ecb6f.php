<?php $__env->startSection('main-content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Edit Category</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="<?php echo e(route('admin.category.doEdit',['id'=>$obj->id])); ?>"
                      enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name"
                                   value="<?php echo e($obj->name); ?>">
                            <span style="color: red"> <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>

                        </div>

                        <div class="form-group">
                            <label for="">Parent Category</label>
                            <select name="parent_id" class="form-control">
                                <option
                                    value="0" <?php if ($obj->parent_id == 0) {
                                    echo 'selected="selected"';
                                } ?> >No Parent
                                </option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>"
                                            <?php if($obj->parent_id==$category->id): ?> selected
                                    <?php elseif($obj->id==$category->id): ?> hidden
                                        <?php endif; ?> ><?php echo e($category->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" name="slug" class="form-control" placeholder="Enter slug"
                                   value="<?php echo e($obj->slug); ?>">
                            <span style="color: red"> <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>
                        </div>

                        <div class="form-group">
                            <label for="">status</label>
                            <select name="status" class="form-control">
                                <option value="0" <?php if ($obj->status == 0) {
                                    echo 'selected="selected"';
                                } ?>>On
                                </option>
                                <option value="1" <?php if ($obj->status == 1) {
                                    echo 'selected="selected"';
                                }?>>Off
                                </option>
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
                            <label for="">Total Product</label>
                            <input type="number" name="total_product" class="form-control"
                                   placeholder="Enter Total product" step="any"
                                   value="<?php echo e($obj->total_product); ?>">
                            <span style="color: red"> <?php $__errorArgs = ['total_product'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>

                        </div>


                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('be.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\workplace\shopee_backend_cp17\resources\views/be/category/edit.blade.php ENDPATH**/ ?>