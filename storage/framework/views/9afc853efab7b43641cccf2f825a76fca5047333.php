<?php $__env->startSection('main-content'); ?>
    <div class="row">
        <div class="col-12">
            <h2>Discount</h2>
            <div class="card">
                <div class="card-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <form class="form-group" style="display: flex; justify-content: flex-end"
                                      action="<?php echo e(route('admin.discount.filter')); ?>" method="get">
                                    <select class="form-control" name="filter">
                                        <option value="" selected hidden>Select Filter</option>
                                        <option value="DESC">Mới Nhất</option>
                                        <option value="ASC">ID Tăng Dần</option>
                                        <option value="a-z">Discount Percent Tăng Dần</option>
                                        <option value="z-a">Discount Percent Giảm Dần</option>
                                    </select>
                                    <button class="btn btn-success">filter</button>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form class="form-group" style="display: flex; justify-content: flex-end"
                                      action="<?php echo e(route('admin.discount.search')); ?>" method="get">
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
                            <th>Name</th>
                            <th>Description</th>
                            <th>discount percent</th>
                            <th>Active</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($item->id); ?></td>
                                <td><?php echo e($item->name); ?></td>
                                <td><?php echo e($item->desc); ?></td>
                                <td><?php echo e($item->discount_percent); ?></td>
                                <td>
                                    <span class="badge badge-primary"><?php if($item->active==0): ?> On <?php endif; ?></span>
                                    <span class="badge badge-primary"><?php if($item->active==1): ?> Off <?php endif; ?></span>
                                </td>
                                <td>
                                    <a class="btn btn-warning"
                                       href="<?php echo e(route('admin.discount.edit',['id'=>$item->id])); ?>">Edit</a>
                                    <a class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá ?')"
                                       href="<?php echo e(route('admin.discount.delete',['id'=>$item->id])); ?>">Delete</a>
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


<?php echo $__env->make('be.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\workplace\shopee_backend_cp17\resources\views/be/discount/list.blade.php ENDPATH**/ ?>