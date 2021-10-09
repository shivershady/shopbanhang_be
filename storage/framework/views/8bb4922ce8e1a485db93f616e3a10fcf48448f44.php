<?php $__env->startSection('main-content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Order</h3>
                </div>
                <!-- ./card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Total</th>
                            <th>Sub Total</th>
                            <th>User </th>
                            <th>Status</th>
                            <th>Payment</th>
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
                                         <span class="badge badge-primary"><?php echo e($item->user->name); ?></span>
                                     <?php endif; ?>
                                 </td>
                                <td><?php echo e($item->status); ?></td>
                                <td><?php echo e($item->payment_type); ?></td>
                                <td>
                                    <a class="btn btn-warning"
                                       href="<?php echo e(route('admin.order.edit',['id'=>$item->id])); ?>">Sửa</a>
                                    <a class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá ?')"
                                       href="<?php echo e(route('admin.order.delete',['id'=>$item->id])); ?>">Xoá</a>
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


<?php echo $__env->make('be.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lrandom/Desktop/laravel/shopbanhang_be/resources/views/be/order/list.blade.php ENDPATH**/ ?>