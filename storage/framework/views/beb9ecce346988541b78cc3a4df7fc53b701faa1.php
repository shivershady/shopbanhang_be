<?php $__env->startSection('main-content'); ?>
    <div class="row">
        <div class="col-12">
            <h2>Statement</h2>
            <div class="card">
                <div class="card-header">
                    <div class="container">
                        <div class="row">
                            <div class="col" style="margin-left: 10px">
                                <a class="btn btn-success" href="<?php echo e(route('admin.statement.add')); ?>"
                                >ADD</a>
                            </div>

                            <div class="col" style="margin-left: 10px">
                                <form class="form-group" style="display: flex; justify-content: flex-end"
                                      action="<?php echo e(route('admin.statement.filter')); ?>" method="get">
                                    <select class="form-control" name="filter">
                                        <option value="" selected hidden>Select Filter</option>
                                        <option value="DESC">ID giảm dần</option>
                                        <option value="ASC">ID Tăng Dần</option>
                                        <option value="a-z">Amount Tăng Dần </option>
                                        <option value="z-a">Amount Giảm Dần</option>
                                    </select>
                                    <button class="btn btn-success">filter</button>
                                </form>
                            </div>
                            <div class="col">
                                <form class="form-group" style="display: flex; justify-content: flex-end"
                                      action="<?php echo e(route('admin.statement.search')); ?>" method="get">
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
                                <th>Is Sub</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Order</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($item->id); ?></td>
                                    <td>
                                        <span class="badge badge-primary"><?php if($item->is_sub==0): ?> True <?php endif; ?></span>
                                        <span class="badge badge-primary"><?php if($item->is_sub==1): ?> False <?php endif; ?></span>
                                    </td>
                                    <td><?php echo e($item->amount); ?></td>
                                    <td>
                                        <span class="badge badge-primary"><?php if($item->status==0): ?> On <?php endif; ?></span>
                                        <span class="badge badge-primary"><?php if($item->status==1): ?> Off <?php endif; ?></span>
                                    </td>
                                    <td>
                                        <?php if($item->order): ?>
                                            <span class="badge badge-primary"><?php echo e($item->order->total); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($item->created_at); ?></td>
                                    <td>
                                        <a class="btn btn-warning"
                                           href="<?php echo e(route('admin.statement.edit',['id'=>$item->id])); ?>">Edit</a>
                                        <a class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá ?')"
                                           href="<?php echo e(route('admin.statement.delete',['id'=>$item->id])); ?>">Delete</a>
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


<?php echo $__env->make('be.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\workplace\shopbanhang_be\resources\views/be/statement/list.blade.php ENDPATH**/ ?>