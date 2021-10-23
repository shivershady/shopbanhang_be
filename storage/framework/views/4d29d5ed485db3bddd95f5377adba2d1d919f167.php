
<?php $__env->startSection('main-content'); ?>
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Add User</h3>
            </div>
            <!-- form start -->
            <form method="post" action="<?php echo e(route('admin.user.doAdd')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="card-body">

                    <div class="preview" style="display:flex;">

                    </div>
                    <br>
                    <input type="file" name="img[]" class="img-select" multiple
                           accept="image/png, image/gif, image/jpeg" onchange="previewImages()">
                </div>


                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" id="" placeholder="Name" name="name"
                               value="<?php echo e(old('name')); ?>">
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
                        <label>Password</label>
                        <input type="password" class="form-control" id="" placeholder="Password"
                               name="password" value="<?php echo e(old('password')); ?>">
                        <span style="color: red"> <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>
                    </div>

                    <div class="form-group">
                        <label>Phone</label>
                        <input type="number" class="form-control" id="" placeholder="Phone"
                               name="phone" value="<?php echo e(old('phone')); ?>">
                        <span style="color: red"> <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" id="" placeholder="email" name="email"
                               value="<?php echo e(old('email')); ?>">
                        <span style="color: red"> <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>
                    </div>

                    <div class="form-group">
                        <label>User Seller</label>
                        <select name="user_seller" class="form-control">
                            <option value="1">User</option>
                            <option value="0">Admin</option>
                            <option value="2">Seller</option>
                        </select>
                        <span style="color: red"> <?php $__errorArgs = ['user_seller'];
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
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

        <script>
            async function previewImages() {

                for (let i = 0; i < document.querySelector('.img-select').files.length; i++) {
                    const reader = new FileReader();
                    await reader.readAsDataURL(document.querySelector('.img-select').files[i]);

                    reader.onload = function (file) {
                        const preview = document.querySelector('.preview');
                        const img = document.createElement('img');
                        img.setAttribute('src', file.target.result);
                        img.classList.add('thumb');
                        preview.appendChild(img);
                    }
                }
            }

            CKEDITOR.replace('content');
        </script>

        <style>
            .thumb {
                width: 100px;
                height: 80px;
                object-font: cover;
            }
        </style>
        <!-- /.card -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('be.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\workplace\shopbanhang_be\resources\views/be/user/add.blade.php ENDPATH**/ ?>