<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item logo-1">
                    <a class="nav-link" href="<?php echo e(route('leave-requests.index')); ?>">ElMS</a>
                </li>
            </ul>

            <!-- Right-aligned links -->
            <ul class="navbar-nav ms-auto"> <!-- Add ms-auto here to align items to the right -->
                <li class="nav-item links">
                    <a class="nav-link" href="<?php echo e(route('leave-requests.create')); ?>">Submit Request</a>
                </li>
                <!-- مثال في النافبار -->
                <li class="nav-item links">
                    <a class="nav-link" href="<?php echo e(route('leave-history')); ?>">Leave History</a>
                </li>
                <li class="nav-item links">
                    <a class="nav-link" href="<?php echo e(route('messages.create')); ?>">Contact Admin</a>
                </li>

                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        onclick="markNotificationsAsRead()">
                        <i class="fas fa-bell fa-fw"></i>
                        <span id="notification-count" class="badge badge-danger badge-counter">
                            <?php echo e(auth()->user()->unreadNotifications->count()); ?>

                        </span>
                    </a>
                    <!-- قائمة الإشعارات -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">Alerts Center</h6>
                        <?php $__empty_1 = true; $__currentLoopData = auth()->user()->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="dropdown-item d-flex align-items-start">
                                <div>
                                    <p class="mb-1">
                                        Your leave request #<?php echo e($notification->data['leave_request_id']); ?>

                                        has been <strong><?php echo e($notification->data['status']); ?></strong>.
                                    </p>
                                    <?php if(isset($notification->data['reason']) && $notification->data['status'] === 'rejected'): ?>
                                        <p class="text-danger mb-1">Reason: <?php echo e($notification->data['reason']); ?></p>
                                    <?php endif; ?>
                                    <small><?php echo e($notification->created_at->diffForHumans()); ?></small>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="dropdown-item text-center">
                                <p>No new notifications.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </li>


                <!-- User Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo e(Auth::user()->name); ?>

                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?php echo e(route('profile.show')); ?>">Profile</a></li>
                        <li>
                            <form action="<?php echo e(route('logout')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button class="dropdown-item" type="submit">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
     <!-- تأكد من تحميل المكتبات التالية -->
                <!-- jQuery -->
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <!-- Bootstrap JS -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
                <!-- Bootstrap CSS -->
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

</nav>
<?php /**PATH C:\xampp - Copy\htdocs\ELMS-main\resources\views/LEMS/employee/partials/navbar.blade.php ENDPATH**/ ?>