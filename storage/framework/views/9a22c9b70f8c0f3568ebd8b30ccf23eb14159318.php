<?php $__env->startSection('main-content'); ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <a class="btn btn-success" href="<?php echo e(route('admin.category.add')); ?>"
                                >ADD</a>
                            </div>

                            <div class="col-md-4">
                                <form class="form-group" style="display: flex; justify-content: flex-end"
                                      action="<?php echo e(route('admin.category.filter')); ?>" method="get">
                                    <select class="form-control" name="filter">
                                        <option value="" selected hidden>Select Filter</option>
                                        <option value="DESC">ID giảm dần</option>
                                        <option value="ASC"> ID Tăng dần</option>
                                        <option value="a-z">Name A-Z</option>
                                        <option value="z-a">Name Z-A</option>
                                    </select>
                                    <button class="btn btn-success">filter</button>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form class="form-group" style="display: flex; justify-content: flex-end"
                                      action="<?php echo e(route('admin.category.search')); ?>" method="get">
                                    <input class="form-control" placeholder="Search" name="q"/>
                                    <button class="btn btn-success">search</button>
                                </form>
                            </div>
                            <div>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>image</th>
                            <th>name</th>
                            <th>slug</th>
                            <th>parent category</th>
                            <th>status</th>
                            <th>total product</th>
                            <th>action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($item->id); ?></td>
                                <td>
                                    <?php if($item->image ): ?>
                                        <img width="100px" src="<?php echo e(asset($item->image->url)); ?>"
                                             alt="<?php echo e($item->name); ?>"/>
                                    <?php else: ?>
                                        <img src="https://via.placeholder.com/150
C/O https://placeholder.com/"/>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($item->name); ?></td>
                                <td><?php echo e($item->slug); ?></td>
                                <td>
                                    <?php if($item->parentCategory): ?>
                                        <span class="badge badge-primary"><?php echo e($item->parentCategory->name); ?></span>
                                    <?php endif; ?>
                                    <?php if(!$item->parentCategory): ?>
                                        <span class="badge badge-primary">Do not have parent</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <span class="badge badge-primary"><?php if($item->status==0): ?> On <?php endif; ?></span>
                                    <span class="badge badge-primary"><?php if($item->status==1): ?> Off <?php endif; ?></span>
                                </td>
                                <td><?php echo e($item->total_product); ?></td>
                                <td>
                                    <a class="btn btn-warning"
                                       href="<?php echo e(route('admin.category.edit',['id'=>$item->id])); ?>">Edit</a>
                                    <a class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá ?')"
                                       href="<?php echo e(route('admin.category.delete',['id'=>$item->id])); ?>">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">

                    <div class="float-right">
                        <?php echo e($list->links()); ?>

                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('be.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lrandom/Desktop/laravel/shopbanhang_be/resources/views/be/category/list.blade.php ENDPATH**/ ?>