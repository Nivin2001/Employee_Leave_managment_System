<?php $__env->startSection('content'); ?>
<?php echo $__env->make('LEMS.flash_action', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container">
    <h1 style="padding: 0 35px" class="mb-3">Leave Balance</h1>

    <div class="container mb-4">
        <!-- Button floated to the right -->
        <a href="<?php echo e(route('leave-balance.create')); ?>" class="btn btn-primary mb-3" style="float: right;">Add New Leave Balance</a>
    </div>
    <div class="table-responsive" style="padding: 0 35px">
        <table class="table table-bordered p-3 bg-white">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Leave Type</th>
                    <th>Leave Balance</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $balances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $balance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($key + 1); ?></td>
                        <td><?php echo e($balance->leaveType->title); ?></td>
                        <td><?php echo e($balance->leave_balance); ?></td>
                        <td>
                            <a href="<?php echo e(route('leave-balance.edit', $balance->id)); ?>" class="btn text-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="<?php echo e(route('leave-balance.destroy', $balance->id)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn text-danger btn-sm" onclick="return confirm('Are you sure you want to delete this leave type?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('LEMS.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp - Copy\htdocs\ELMS-main\resources\views/LEMS/admin/leave-balance/index.blade.php ENDPATH**/ ?>