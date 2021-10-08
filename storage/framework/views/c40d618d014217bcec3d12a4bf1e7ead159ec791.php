<?php $__env->startSection('main-content'); ?>
    <div class="row">
        <div class="col-12">
            <h2>Order List</h2>
            <div class="card">
                <div class="card-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <form class="form-group" style="display: flex; justify-content: flex-end"
                                      action="<?php echo e(route('admin.order.filter')); ?>" method="get">
                                    <select class="form-control" name="filter">
                                        <option value="" selected hidden>Select Filter</option>
                                        <option value="DESC">Mới Nhất</option>
                                        <option value="pending">Chờ sác nhận</option>
                                        <option value="processing">Chờ lấy hàng</option>
                                        <option value="sent">Đang Giao</option>
                                        <option value="received">Đã giao </option>
                                        <option value="cancel">Đã Hủy</option>
                                        <option value="ASC"> ID Tăng Dần</option>
                                        <option value="a-z">Total Tăng Dần</option>
                                        <option value="z-a">Total Giảm Dần</option>
                                    </select>
                                    <button class="btn btn-success">filter</button>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form class="form-group" style="display: flex; justify-content: flex-end"
                                      action="<?php echo e(route('admin.order.search')); ?>" method="get">
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
                            <th>Total</th>
                            <th>Sub Total</th>
                            <th>User</th>
                            <th>Status</th>
                            <th>Payment Type</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($item->id); ?></td>
                                <td><?php echo e($item->total); ?></td>
                                <td><?php echo e($item->sub_total); ?></td>
                                <td>
                                    <?php if($item->user): ?>
                                        <span class="badge badge-primary" value="<?php echo e($item->user->id); ?>"><?php echo e($item->user->name); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <span class="badge badge-primary"><?php if($item->status==1): ?> Pending <?php endif; ?></span>
                                    <span class="badge badge-primary"><?php if($item->status==2): ?> Processing <?php endif; ?></span>
                                    <span class="badge badge-primary"><?php if($item->status==3): ?> Sent <?php endif; ?></span>
                                    <span class="badge badge-primary"><?php if($item->status==4): ?> Received <?php endif; ?></span>
                                    <span class="badge badge-primary"><?php if($item->status==5): ?> Cancel <?php endif; ?></span>
                                </td>
                                <td>
                                    <span class="badge badge-primary"><?php if($item->payment_type==1): ?> Stripe <?php endif; ?></span>
                                </td>
                                <td>
                                    <a class="btn btn-warning"
                                       href="<?php echo e(route('admin.order.edit',['id'=>$item->id])); ?>">Edit</a>
                                    <a class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá ?')"
                                       href="<?php echo e(route('admin.order.delete',['id'=>$item->id])); ?>">Delete</a>
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


<?php echo $__env->make('be.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\workplace\shopee_backend_cp17\resources\views/be/order/list.blade.php ENDPATH**/ ?>