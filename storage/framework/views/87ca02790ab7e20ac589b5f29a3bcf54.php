 
 <?php $__env->startSection('content'); ?>

 <style>
     /* تنسيق الكارد */
     .card {
         color: #fff; /* نص أبيض */
         border-radius: 8px; /* زوايا مستديرة */
         box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* تأثير الظل */
         padding: 20px; /* إضافة مساحة داخلية */
         text-align: center; /* محاذاة النصوص */
     }

     .card i {
         font-size: 24px; /* تكبير حجم الأيقونات */
         margin-bottom: 10px;
     }

     /* ألوان خلفيات مختلفة */
     .card.bg-employee {
         background-color: #4e73df; /* لون أزرق */
     }

     .card.bg-leave-type {
         background-color: #1cc88a; /* لون أخضر */
     }

     .card.bg-departments {
         background-color: #36b9cc; /* لون سماوي */
     }

     .card.bg-pending {
         background-color: #f6c23e; /* لون برتقالي */
     }

     .card.bg-accepted {
         background-color: #28a745; /* لون أخضر غامق */
     }

     .card.bg-rejected {
         background-color: #e74a3b; /* لون أحمر */
     }

     /* تنسيق العنوان الرئيسي */
     h1.h3 {
         font-weight: bold;
         margin-bottom: 20px;
     }

     /* تنسيق Recent List */
     .recent-list-title {
         font-weight: bold;
         position: relative;
         display: inline-block;
         margin-bottom: 20px;
     }

     .recent-list-title::after {
         content: "";
         display: block;
         width: 100%;
         height: 3px;
         background-color: #007bff; /* اللون الأزرق */
         margin-top: 5px;
     }

     /* تنسيق الجدول */
     .table {
         background-color: white; /* خلفية بيضاء للجدول */
         border-radius: 8px; /* زوايا دائرية */
         box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* تأثير الظل */
     }

     /* تنسيق الأيقونات */
     .text-warning {
         color: #f1c40f !important;
     }

     .text-success {
         color: #28a745 !important;
     }

     .text-danger {
         color: #dc3545 !important;
     }

     /* شريط العنوان */
     .badge {
         font-size: 14px;
         font-weight: bold;
         border-radius: 20px;
     }
 </style>
 <?php $__env->startSection('search'); ?>
 <!-- Topbar Search -->
 <form action="<?php echo e(route('employees.index')); ?>" method="get"
     class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
     <div class="input-group">
         <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Search here..."
             aria-label="Search" aria-describedby="basic-addon2">
         <div class="input-group-append">
             <button class="btn btn-primary" type="submit">
                 <i class="fas fa-search fa-sm"></i>
             </button>
         </div>
     </div>
 </form>
<?php $__env->stopSection(); ?>

 <h1 class="h3 mb-4 text-gray-800 mt-5">Dashboard Counts</h1>

 <div class="row">
     <!-- Employee Count -->
     <div class="col-xl-4 col-md-6">
         <div class="card bg-employee mb-4">
             <i class="fas fa-users"></i>
             <div class="card-body">
                 <span>Employee Count: <strong><?php echo e($totalEmployees); ?></strong></span>
             </div>
         </div>
     </div>

     <!-- Leave Type Count -->
     <div class="col-xl-4 col-md-6">
         <div class="card bg-leave-type mb-4">
             <i class="fas fa-suitcase"></i>
             <div class="card-body">
                 <span>Leave Type Count: <strong><?php echo e($totalLeaveTypes); ?></strong></span>
             </div>
         </div>
     </div>

     <!-- Available Departments -->
     <div class="col-xl-4 col-md-6">
         <div class="card bg-departments mb-4">
             <i class="fas fa-building"></i>
             <div class="card-body">
                 <span>Available Departments: <strong><?php echo e($totaldepartments); ?></strong></span>
             </div>
         </div>
     </div>
 </div>
 <div class="row">
    <!-- Pending Leave Requests -->
    <div class="col-xl-4 col-md-6">
        <div class="card bg-pending mb-4">
            <i class="fas fa-clock"></i>
            <div class="card-body">
                <span>Pending Leave Requests: <strong><?php echo e($totalLeaveRequestsAppend); ?></strong></span>
            </div>
        </div>
    </div>

    <!-- Accepted Leave Requests -->
    <div class="col-xl-4 col-md-6">
        <div class="card bg-accepted mb-4">
            <i class="fas fa-check-circle"></i>
            <div class="card-body">
                <span>Accepted Leave Requests: <strong><?php echo e($totalLeaveRequestsAccepted); ?></strong></span>
            </div>
        </div>
    </div>

    <!-- Rejected Leave Requests -->
    <div class="col-xl-4 col-md-6">
        <div class="card bg-rejected mb-4">
            <i class="fas fa-times-circle"></i>
            <div class="card-body">
                <span>Rejected Leave Requests: <strong><?php echo e($totalLeaveRequestsRejected); ?></strong></span>
            </div>
        </div>
    </div>
</div>

 <div class="d-flex justify-content-between align-items-center mb-4">
     <h3 class="recent-list-title">Recent List</h3>
 </div>

 <table class="table table-bordered">
     <thead>
         <tr>
             <th>#</th>
             <th>Employee Name</th>
             <th>Leave Type</th>
             <th>Start Date</th>
             <th>End Date</th>
             <th>Current Status</th>
             <th>Actions</th>
         </tr>
     </thead>
     <tbody>



     <?php $__currentLoopData = $latestLeaveRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($index + 1); ?></td>
            <td><?php echo e($request->user->name ?? 'N/A'); ?></td>
            <td><?php echo e($request->leaveType->title ?? 'N/A'); ?></td>
            <td><?php echo e($request->start_date); ?></td>
            <td><?php echo e($request->end_date); ?></td>

            <td class="text-center">
                <!-- تحقق من حالة الـ status -->
                <span><?php echo e($request->status); ?></span> <!-- عرض حالة الـ status -->
                <?php if($request->status == 'Pending'): ?>
                    <span class="text-warning">   <i class="fas fa-clock"></i> Pending</span>
                <?php elseif($request->status == 'Approved'): ?>
                    <span class="text-success"><i class="fas fa-check-circle"></i> Approved</span>
                <?php elseif($request->status == 'Rejected'): ?>
                    <span class="text-danger"><i class="fas fa-times-circle"></i> Rejected</span>

                <?php endif; ?>
            </td>
            <td>
                <a href="<?php echo e(route('admin.leave-requests.index', $request->id)); ?>" class="btn btn-info">
                    <i class="fas fa-eye"></i> View Details
                </a>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

     </tbody>
 </table>

 <div class="mt-3">
     <?php echo e($latestLeaveRequests->links()); ?>

 </div>

 <?php $__env->stopSection(); ?>

<?php echo $__env->make('LEMS.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp - Copy\htdocs\ELMS-main\resources\views/LEMS/admin/index.blade.php ENDPATH**/ ?>