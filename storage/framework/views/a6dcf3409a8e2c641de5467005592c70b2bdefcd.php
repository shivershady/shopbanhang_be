<?php $__env->startSection('main-content'); ?>
    <div class="row">
        <div class="col-12">
            <h2>User List</h2>
            <div class="card">
                <div class="card-header">
                    <div class="container">
                        <div class="row">
                                <div class="col" style="margin-left: 10px">
                                    <a class="btn btn-success" href="<?php echo e(route('admin.user.add')); ?>"
                                    >ADD</a>
                                </div>
                            <div class="col" style="margin-left: 10px">
                                <form class="form-group" style="display: flex; justify-content: flex-end"
                                      action="<?php echo e(route('admin.user.filter')); ?>" method="get">
                                    <select class="form-control" name="filter">
                                        <option value="" selected hidden>Select Filter</option>
                                        <option value="DESC">ID giảm dần</option>
                                        <option value="ASC">ID Tăng Dần</option>
                                        <option value="a-z">Name A-Z</option>
                                        <option value="z-a">Name Z-A</option>
                                    </select>
                                    <button class="btn btn-success">filter</button>
                                </form>
                            </div>
                            <div class="col">
                                <form class="form-group" style="display: flex; justify-content: flex-end"
                                      action="<?php echo e(route('admin.user.search')); ?>" method="get">
                                    <input class="form-control" placeholder="Search" name="q"/>
                                    <button class="btn btn-success">search</button>
                                </form>
                            </div>

                        </div>
                    </div>
                    <!-- ./card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Level</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($item->id); ?></td>
                                    <td><?php echo e($item->name); ?></td>
                                    <td><?php echo e($item->email); ?></td>
                                    <td><?php echo e($item->phone); ?></td>
                                    <td>
                                        <span class="badge badge-primary"><?php if($item->user_seller==0): ?>Admin <?php endif; ?></span>
                                        <span class="badge badge-primary"><?php if($item->user_seller==1): ?>User <?php endif; ?></span>
                                        <span class="badge badge-primary"><?php if($item->user_seller==2): ?>Seller <?php endif; ?></span>
                                    </td>
                                    <td>
                                        <a class="btn btn-warning"
                                           href="<?php echo e(route('admin.user.edit',['id'=>$item->id])); ?>">Edit</a>
                                        <a class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá ?')"
                                           href="<?php echo e(route('admin.user.delete',['id'=>$item->id])); ?>">Delete</a>
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


<?php echo $__env->make('be.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\workplace\shopee_backend_cp17\resources\views/be/user/list.blade.php ENDPATH**/ ?>