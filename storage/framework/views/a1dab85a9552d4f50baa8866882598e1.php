 <?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Edit Leave Balance</h1>
        <form action="<?php echo e(route('leave-balance.update', $Balance->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?> <!-- لتحديد أن هذه العملية هي PUT للتحديث -->

            <div class="form-group">
                <label for="leave_type">Leave Type</label>
                <select id="leave_type" name="leave_type_id" class="form-control" required>
                    <option value="">Select Leave Type</option>
                    <?php $__currentLoopData = $leaveTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leaveType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($leaveType->id); ?>" <?php echo e($Balance->leave_type_id == $leaveType->id ? 'selected' : ''); ?>>
                            <?php echo e($leaveType->title); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <label for="balance">Balance</label>
                <input type="number" id="balance" name="leave_balance" class="form-control" value="<?php echo e($Balance->leave_balance); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('LEMS.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp - Copy\htdocs\ELMS-main\resources\views/LEMS/admin/leave-balance/edit.blade.php ENDPATH**/ ?>