<?php $__env->startSection('title', 'Leave Types'); ?>

<?php $__env->startSection('content'); ?>
    <h1 style="padding: 0 35px" class="mb-3">Leave Types </h1>

    <div class="container mb-4">
        <!-- Button floated to the right -->
        <a href="<?php echo e(route('leave-types.create')); ?>" class="btn btn-primary mb-3" style="float: right;">Add New Leave Type</a>
    </div>

    
    <?php echo $__env->make('LEMS.flash_action', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="table-responsive" style="padding: 0 35px">
        <table class="table table-bordered p-3 bg-white">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $leave_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $leaveType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($index + 1); ?></td>
                        <td><?php echo e($leaveType->title); ?></td>
                        <td><?php echo e($leaveType->description); ?></td>
                        <td><?php echo e($leaveType->created_at->format('Y-m-d H:i:s')); ?></td>
                        <td>
                            <a href="<?php echo e(route('leave-types.edit', $leaveType->id)); ?>" class="btn text-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="<?php echo e(route('leave-types.destroy', $leaveType->id)); ?>" method="POST" class="d-inline">
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('LEMS.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp - Copy\htdocs\ELMS-main\resources\views/LEMS/admin/leaveTypes/index.blade.php ENDPATH**/ ?>