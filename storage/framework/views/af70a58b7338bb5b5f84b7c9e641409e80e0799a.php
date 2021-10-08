<?php $__env->startSection('main-content'); ?>
    <div class="row">
        <h2>Product</h2>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <form class="form-group" style="display: flex; justify-content: flex-end"
                                      action="<?php echo e(route('admin.product.filter')); ?>" method="get">
                                    <select class="form-control" name="filter">
                                        <option value="" selected hidden>Select Filter</option>
                                        <option value="DESC">ID giảm dần</option>
                                        <option value="active">Đang hoạt động</option>
                                        <option value="ASC"> ID Tăng dần</option>
                                        <option value="a-z">Name A-Z</option>
                                        <option value="z-a">Name Z-A</option>
                                        <option value="price-tang">Giá Tăng Dần</option>
                                        <option value="price-giam">Giá Giảm Dần </option>
                                    </select>
                                    <button class="btn btn-success">filter</button>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form class="form-group" style="display: flex; justify-content: flex-end"
                                      action="<?php echo e(route('admin.product.search')); ?>" method="get">
                                    <input class="form-control" placeholder="Search" name="q"/>
                                    <button class="btn btn-success">search</button>
                                </form>
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
                            <th>Image</th>
                            <th>name</th>
                            <th>Category</th>
                            <th>Discount Percent</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($item->id); ?></td>
                                <td>
                                    <?php if($item->images && count($item->images)>0): ?>
                                        <img width="100px" src="<?php echo e(asset($item->images[0]->url)); ?>"
                                             alt="<?php echo e($item->name); ?>"/>
                                    <?php else: ?>
                                        <img src="https://via.placeholder.com/150
C/O https://placeholder.com/"/>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($item->name); ?></td>
                                <td>
                                    <?php if($item->category): ?>
                                        <span class="badge badge-primary"><?php echo e($item->category->name); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($item->discount): ?>
                                        <span class="badge badge-primary"><?php echo e($item->discount->discount_percent); ?></span>
                                    <?php endif; ?>
                                </td>

                                <td><?php echo e($item->price); ?></td>
                                <td>
                                    <span class="badge badge-primary"><?php if($item->active==0): ?> On <?php endif; ?></span>
                                    <span class="badge badge-primary"><?php if($item->active==1): ?> Off <?php endif; ?></span>
                                </td>
                                <td>
                                    <a class="btn btn-warning"
                                       href="<?php echo e(route('admin.product.edit',['id'=>$item->id])); ?>">Edit</a>
                                    <a class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá ?')"
                                       href="<?php echo e(route('admin.product.delete',['id'=>$item->id])); ?>">Delete</a>
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


<?php echo $__env->make('be.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\workplace\shopee_backend_cp17\resources\views/be/product/list.blade.php ENDPATH**/ ?>