<?php $__env->startSection('main-content'); ?>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Edit Product</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" enctype="multipart/form-data" action="<?php echo e(route('admin.product.doEdit',['id'=>$obj->id])); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <input type="hidden" name="removeImages" class="removeImages"/>
                        <div class="preview" style="display:flex;">

                                <div class="thumb-wrapper">
                                    <img class="thumb" src="<?php echo e(asset($obj->image->url)); ?>" alt="<?php echo e($obj->name); ?>"/>
                                    <a class="remove-image" onclick="removeImage(<?php echo e($obj->image->id); ?>,event)">Remove</a>
                                </div>

                        </div>
                        <br>
                        <input type="file" name="img[]" class="img-select" multiple
                               accept="image/png, image/gif, image/jpeg" onchange="previewImages()">

                        <br>
                        <br>

                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name"
                                   value="<?php echo e($obj->name); ?>">
                            <span style="color: red"><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                        </div>

                        <div class="form-group">
                            <label for="">Slug</label>
                            <input type="text" name="slug" class="form-control" placeholder="Slug"
                                   value="<?php echo e($obj->slug); ?>">
                            <span style="color: red"><?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" name="quantity" value="<?php echo e($obj->quantity); ?>" placeholder="quantity"
                                   class="form-control"/>
                            <span style="color: red"><?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>

                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" placeholder="price" class="form-control"
                                   value="<?php echo e($obj->price); ?>"/>
                            <span style="color: red"><?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>

                        </div>

                        <div>
                            <label for="">IHot</label>
                            <input name="iHot" value="<?php echo e($obj->iHot); ?>" placeholder="iHot" class="form-control"
                                   type="text"/>
                            <span style="color: red"><?php $__errorArgs = ['iHot'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>

                        </div>

                        <div>
                            <label for="iPay">Ipay</label>
                            <input name="iPay" value="<?php echo e($obj->iPay); ?>" placeholder="IPay" class="form-control"
                                   type="text"/>
                            <span style="color: red"><?php $__errorArgs = ['iPay'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>

                        </div>

                        <div class="form-group">
                            <label for="">Warranty</label>
                            <input type="text" name="warranty" class="form-control" placeholder="Warranty"
                                   value="<?php echo e($obj->warranty); ?>">
                            <span style="color: red"><?php $__errorArgs = ['warranty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>

                        </div>


                        <div class="form-group">
                            <label for="">View</label>
                            <input type="text" name="view" class="form-control" placeholder="View"
                                   value="<?php echo e($obj->view); ?>">
                            <span style="color: red"><?php $__errorArgs = ['view'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>

                        </div>

                        <div class="form-group">
                            <label>Active</label>
                            <select name="active" placeholder="active" class="form-control" >
                                <option value="0" <?php if($obj->active==0): ?><?php echo e('selected="selected"'); ?> <?php endif; ?>>On</option>
                                <option value="1" <?php if($obj->active==1): ?><?php echo e('selected="selected"'); ?> <?php endif; ?>>Off</option>
                            </select>
                            <span style="color: red"><?php $__errorArgs = ['active'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                        </div>

                        <div class="form-group">
                            <label for="">Description</label>
                            <input type="text" name="description" class="form-control" placeholder="Description"
                                   value="<?php echo e($obj->description); ?>"/>
                            <span style="color: red"><?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>

                        </div>

                        <div class="form-group">
                            <label for="">Category</label>
                            <select name="category_id" class="form-control">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if ($category->id == $obj->category_id) {
                                        echo "selected=selected";
                                    } ?> value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <span style="color: red"><?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>

                        </div>

                        <div class="form-group">
                            <label for="">Discount</label>
                            <select name="discount_id" class="form-control">
                                <?php $__currentLoopData = $discounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($discount->id); ?>" <?php if($discount->id==$obj->discount_id){
                                        echo 'selected="selected"';
                                    } ?>><?php echo e($discount->discount_percent); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <span style="color: red"><?php $__errorArgs = ['discount_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>

                        </div>
                        <div class="form-group">
                            <label for="">Content</label>
                            <textarea name="content" class="form-control" placeholder="Content" ><?php echo e($obj->content); ?></textarea>

                            <span style="color: red"><?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>

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
            object-fit: cover;
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

<?php echo $__env->make('be.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\workplace\shopbanhang_be\resources\views/be/product/edit.blade.php ENDPATH**/ ?>