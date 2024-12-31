<?php $__env->startSection('title', 'deny Requests'); ?>

<?php $__env->startSection('content'); ?>
<h2>Deny Leave Request</h2>

<form action="<?php echo e(route('leave-requests.deny.store', $leaveRequest->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>

    <div class="form-group">
        <label for="reason">Denial Reason:</label>
        <textarea name="reason" id="reason" class="form-control" rows="4"></textarea>
    </div>

    <button type="submit" class="btn btn-outline-danger">Reject</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('LEMS.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp - Copy\htdocs\ELMS-main\resources\views/LEMS/admin/leaveRequests/deny.blade.php ENDPATH**/ ?>