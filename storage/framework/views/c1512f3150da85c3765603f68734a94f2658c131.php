<?php $__env->startSection('main-content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Variant</h3>
                </div>
                <!-- ./card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>variant</th>
                            <th>price</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($item->id); ?></td>
                                <td><?php echo e($item->name); ?></td>
                                <td><?php echo e($item->price); ?></td>
                                <td>
                                    <?php if($item->variant): ?>
                                        <span class="badge badge-primary"><?php echo e($item->variant->name); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a class="btn btn-warning"
                                       href="<?php echo e(route('admin.variant_value.edit',['id'=>$item->id])); ?>">Sửa</a>
                                    <a class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá ?')"
                                       href="<?php echo e(route('admin.variant_value.delete',['id'=>$item->id])); ?>">Xoá</a>
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


<?php echo $__env->make('be.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\workplace\shopee_backend_cp17\resources\views/be/variant_value/list.blade.php ENDPATH**/ ?>