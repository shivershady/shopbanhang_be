
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('be.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\workplace\shopbanhang_be\resources\views/be/category/edit.blade.php ENDPATH**/ ?>