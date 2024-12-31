<?php
function getStatusColor($status)
{
    switch ($status) {
        case 'approved':
            return 'green';
        case 'rejected':
            return 'red';
        default:
            return 'orange';
    }
}
?>



<?php $__env->startSection('title', 'Leave Requests'); ?>

<?php $__env->startSection('content'); ?>
    <h3 class="text-center my-4 fw-4">Employee Leave Requests</h3>

    <!-- روابط التنقل بين الحالات -->
    <div class="mb-4">
        <a href="<?php echo e(route('admin.leave-requests.pending')); ?>" class="btn btn-warning">Pending</a>
        <a href="<?php echo e(route('admin.leave-requests.approved')); ?>" class="btn btn-success">Approved</a>
        <a href="<?php echo e(route('admin.leave-requests.rejected')); ?>" class="btn btn-danger">Rejected</a>
    </div>

    <!-- جدول عرض الطلبات -->
    <div class="table-responsive">
        <table class="table table-bordered bg-white p-3">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Employee ID</th>
                    <th>Leave Type</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Applied On</th>
                    <th>Status</th>
                    <th>Actions</th>
                    <th>Reasons</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $leaveRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $leaveRequest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($index + 1); ?></td>
                        <td><?php echo e($leaveRequest->user->name); ?></td>
                        <td><?php echo e($leaveRequest->user->id); ?></td>
                        <td><?php echo e($leaveRequest->leaveType->title); ?></td>
                        <td><?php echo e($leaveRequest->start_date); ?></td>
                        <td><?php echo e($leaveRequest->end_date); ?></td>
                        <td><?php echo e($leaveRequest->created_at); ?></td>
                        <td style="color: <?php echo e(getStatusColor($leaveRequest->status)); ?>"><?php echo e(ucFirst($leaveRequest->status)); ?></td>
                        <td>
                            <?php if($leaveRequest->status === 'pending'): ?>
                                <div class="d-flex">
                                    <form action="<?php echo e(route('leave-requests.approve.store', $leaveRequest->id)); ?>" method="POST" class="mx-1">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-sm btn-outline-success">
                                            <i class="fa-solid fa-check-double"></i>
                                        </button>
                                    </form>
                                    <a href="<?php echo e(route('leave-requests.deny', $leaveRequest->id)); ?>" class="btn btn-sm btn-outline-danger">
                                        <i class="fa-solid fa-xmark"></i>
                                    </a>
                                </div>
                            <?php elseif($leaveRequest->status === 'approved' || $leaveRequest->status === 'rejected'): ?>
                                Answered
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($leaveRequest->reason); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <?php echo e($leaveRequests->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('LEMS.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp - Copy\htdocs\ELMS-main\resources\views/LEMS/admin/leaveRequests/index.blade.php ENDPATH**/ ?>