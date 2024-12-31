<?php $__env->startSection('content'); ?>
<div class="container mt-4">

    <!-- إحصائيات الإجازات -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm bg-warning text-white">
                <div class="card-body text-center">
                    <h5 class="card-title">Pending Requests</h5>
                    <p class="card-text"><?php echo e($totalLeaveRequestsPending); ?> Pending Leave Requests</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm bg-success text-white">
                <div class="card-body text-center">
                    <h5 class="card-title">Approved Requests</h5>
                    <p class="card-text"><?php echo e($totalLeaveRequestsAccepted); ?> Approved Leave Requests</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm bg-danger text-white">
                <div class="card-body text-center">
                    <h5 class="card-title">Declined Requests</h5>
                    <p class="card-text"><?php echo e($totalLeaveRequestsRejected); ?> Declined Leave Requests</p>
                </div>
            </div>
        </div>
    </div>

    <!-- أرصدة الإجازات -->
    <div class="row mb-4">
        <?php $__currentLoopData = $leaveBalances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $balance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4">
                <div class="card shadow-sm bg-info text-white">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?php echo e($balance->leaveType->title); ?> Leave Balance</h5>
                        <p class="card-text">You have <?php echo e($balance->leave_balance); ?> days remaining</p>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <!-- جدول تاريخ الإجازات -->
    <h2 class="mt-5 text-center text-secondary">Leave History</h2>
    <div class="table-responsive mt-3">
        <table class="table table-hover table-striped align-middle">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Leave Type</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Requested At</th>
                    <th>Reason (If Rejected)</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $leaveRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leaveRequest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($leaveRequest->leaveType->title); ?></td>
                        <td><?php echo e($leaveRequest->start_date); ?></td>
                        <td><?php echo e($leaveRequest->end_date); ?></td>
                        <td>
                            <span class="badge
                                <?php if($leaveRequest->status == 'approved'): ?> badge-success
                                <?php elseif($leaveRequest->status == 'rejected'): ?> badge-danger
                                <?php else: ?> badge-warning <?php endif; ?>">
                                <?php echo e(ucfirst($leaveRequest->status)); ?>

                            </span>
                        </td>
                        <td><?php echo e($leaveRequest->created_at->diffForHumans()); ?></td>
                        <td>
                            <?php if($leaveRequest->status === 'rejected'): ?>
                                <?php echo e($leaveRequest->reason); ?>

                            <?php else: ?>
                                <span class="text-muted">-</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('LEMS.employee.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp - Copy\htdocs\ELMS-main\resources\views/LEMS/employee/LeaveRequest/show.blade.php ENDPATH**/ ?>