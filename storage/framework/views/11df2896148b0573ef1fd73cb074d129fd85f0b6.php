<?php $__env->startSection('main-content'); ?>
    <div class="row">
        <div class="col-12">
            <h2>User Address List</h2>
            <div class="card">
                <div class="card-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <form class="form-group" style="display: flex; justify-content: flex-end"
                                      action="<?php echo e(route('admin.user_address.filter')); ?>" method="get">
                                    <select class="form-control" name="filter">
                                        <option value="" selected hidden>Select Filter</option>
                                        <option value="DESC">Mới Nhất</option>
                                        <option value="ASC">ID Tăng Dần</option>
                                        <option value="a-z">Address A-Z</option>
                                        <option value="z-a">Address Z-A</option>
                                    </select>
                                    <button class="btn btn-success">filter</button>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form class="form-group" style="display: flex; justify-content: flex-end"
                                      action="<?php echo e(route('admin.user_address.search')); ?>" method="get">
                                    <input class="form-control" placeholder="Search" name="q"/>
                                    <button class="btn btn-success">search</button>
                                </form>
                            </div>
                            <div>

                                <div class="col-md-4">
                                    <a class="btn btn-success" href="<?php echo e(route('admin.user_address.add')); ?>"
                                    >ADD</a>
                                </div>

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
                            <th>User</th>
                            <th>Address 1</th>
                            <th>Address 2</th>
                            <th>City</th>
                            <th>Province</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($item->id); ?></td>
                                <td>
                                    <?php if($item->user): ?>
                                        <span class="badge badge-primary"><?php echo e($item->user->name); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($item->address_line1); ?></td>
                                <td><?php echo e($item->address_line2); ?></td>
                                 <td><?php echo e($item->city); ?></td>
                                <td><?php echo e($item->province); ?></td>
                                <td>
                                    <a class="btn btn-warning"
                                       href="<?php echo e(route('admin.user_address.edit',['id'=>$item->id])); ?>">Sửa</a>
                                    <a class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá ?')"
                                       href="<?php echo e(route('admin.user_address.delete',['id'=>$item->id])); ?>">Xoá</a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">

                    <div style="text-align: center">
                        <?php echo e($list->withQueryString()->links()); ?>

                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('be.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lrandom/Desktop/laravel/shopbanhang_be/resources/views/be/user_address/list.blade.php ENDPATH**/ ?>