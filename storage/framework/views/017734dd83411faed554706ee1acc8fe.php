<?php $__env->startSection('style'); ?>
<style>
    body {
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }

    /* Hero Section */
    .hero-area {
        background-image: url('<?php echo e(asset('employeeassets/Employee.png')); ?>');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 100vh;
        width: 100%;
        position: relative;
    }

    .hero-area .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .hero-area .content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: white;
    }

    /* Custom Buttons */
    .btn-custom {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.3s;
        margin: 10px;
    }

    .btn-custom:hover {
        background-color: #0056b3;
    }

    /* Cards Styling */
    .leave-request-card {
        border: none;
        border-radius: 10px;
        transition: transform 0.3s, box-shadow 0.3s;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .leave-request-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }

    .status-pending {
    background-color: #ffe8a1 !important;
    color: #856404 !important;
}

.status-approved {
    background-color: #d4edda !important;
    color: #155724 !important;
}

.status-rejected {
    background-color: #f8d7da !important;
    color: #721c24 !important;
}


    /* Text Styles */
    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
    }

    .card-subtitle {
        font-size: 1rem;
        margin-bottom: 10px;
    }

    .card-text {
        font-size: 0.95rem;
    }

    .status-text {
        font-weight: bold;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- Hero Section -->
<section class="hero-area">
    <div class="overlay"></div>
    <div class="content">
        <h1>Welcome to the Employee Leave Management System</h1>
        <p>Manage and track your leave requests easily</p>
    </div>
</section>

<!-- Main Content Section -->
<section class="container my-4">
    <h1 class="text-center mb-4">Your Leave Requests</h1>

    <!-- Buttons for Leave Request Actions -->
    <div class="text-center mb-4">
        <a class="btn btn-primary btn-custom" href="<?php echo e(route('leave-requests.create')); ?>">
            <i class="fas fa-plus-circle"></i> Submit Leave Request
        </a>
        <a class="btn btn-secondary btn-custom" href="<?php echo e(route('leave-history')); ?>">
            <i class="fas fa-list"></i> View All Leave Requests
        </a>
    </div>

    <!-- Cards Grid -->
    <div class="row">
        <?php $__currentLoopData = $leaveRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leaveRequest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 mb-4">
                <div class="card leave-request-card
                    <?php if($leaveRequest->status === 'pending'): ?> status-pending
                    <?php elseif($leaveRequest->status === 'approved'): ?> status-approved
                    <?php else: ?> status-rejected <?php endif; ?>">
                    <div class="card-body">
                        <h5 class="card-title">Leave Request #<?php echo e($leaveRequest->id); ?></h5>
                        <h6 class="card-subtitle">
                            <?php echo e($leaveRequest->leaveType ? $leaveRequest->leaveType->title : 'Not Specified'); ?>

                        </h6>

                        <p class="card-text">From: <?php echo e($leaveRequest->start_date); ?> to <?php echo e($leaveRequest->end_date); ?></p>

                        <?php if($leaveRequest->status === 'pending'): ?>
                            <p class="card-text status-text">Status: Pending - Waiting for Approval</p>
                            <a class="btn btn-sm btn-light" href="<?php echo e(route('leave-requests.edit', $leaveRequest->id)); ?>">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form class="d-inline" action="<?php echo e(route('leave-requests.destroy', $leaveRequest->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('delete'); ?>
                                <button class="btn btn-sm btn-light" onclick="return confirm('Are you sure you want to delete this request?')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        <?php elseif($leaveRequest->status === 'approved'): ?>
                            <p class="card-text status-text">Status: Approved - Enjoy your leave!</p>
                        <?php elseif($leaveRequest->status === 'rejected'): ?>
                            <p class="card-text status-text">Status: Rejected - Your leave request was not approved.</p>
                            <p class="card-text">Reason: <?php echo e($leaveRequest->reason); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        <?php echo e($leaveRequests->links()); ?>

    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('LEMS.employee.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp - Copy\htdocs\ELMS-main\resources\views/LEMS/employee/LeaveRequest/index.blade.php ENDPATH**/ ?>