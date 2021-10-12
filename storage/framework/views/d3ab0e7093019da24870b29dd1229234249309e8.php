<?php $__env->startSection('main-content'); ?>
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Edit User</h3>
            </div>
            <!-- form start -->
            <form method="post" action="<?php echo e(route('admin.user.doEdit',['id'=>$obj->id])); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="card-body">
                    <input type="hidden" name="removeImages" class="removeImages"/>
                    <div class="preview" style="display:flex;">
                        <?php $__currentLoopData = $obj->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="thumb-wrapper">
                                <img class="thumb" src="<?php echo e(asset($image->url)); ?>" alt="<?php echo e($obj->name); ?>"/>
                                <a class="remove-image" onclick="removeImage(<?php echo e($image->id); ?>,event)">Remove</a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <br>
                    <input type="file" name="img[]" class="img-select" multiple
                           accept="image/png, image/gif, image/jpeg" onchange="previewImages()">

                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" id="" placeholder="Name" name="name"
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
                        <label>Password</label>
                        <input type="password" class="form-control" id="" placeholder="Password"
                               name="password">
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
                               name="phone" value="<?php echo e($obj->phone); ?>">
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
                               value="<?php echo e($obj->email); ?>">
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
                        <label>user seller</label>
                        <select name="user_seller" class="form-control">
                            <option value="0" <?php if ($obj->user_seller == 0) {
                                echo 'selected="selected"';
                            }?>>Admin
                            </option>
                            <option value="1" <?php if ($obj->user_seller == 1) {
                                echo 'selected="selected"';
                            }?>>User
                            </option>
                            <option value="2" <?php if ($obj->user_seller == 2) {
                                echo 'selected="selected"';
                            }?>>Seller
                            </option>
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

            function removeImage(id,event) {
                let removeImagesInput = document.querySelector('.removeImages');
                let removeImages = removeImagesInput.value; //1|2|3|4|5|6
                removeImages = removeImages.split('|');//chuyển đổi thành mảng [1,2,3,4,5,6];[]
                removeImages.push(id);//[1,2,3,4,5,6,7]
                removeImages = removeImages.join('|');//1|2|3|4|5|6|7
                removeImagesInput.value = removeImages;

                //ẩn ảnh đi
                event.target.parentElement.style.display = 'none';
            };
            CKEDITOR.replace('content');

        </script>

        <style>
            .thumb {
                width: 100px;
                object-font: cover;
            }

            .thumb-wrapper {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center
            }
            .remove-image:hover{
                cursor: pointer;
            }
        </style>
        <!-- /.card -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('be.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\workplace\shopee_backend_cp17\resources\views/be/user/edit.blade.php ENDPATH**/ ?>