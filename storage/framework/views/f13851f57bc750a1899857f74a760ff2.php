<?php $__env->startSection('title', 'View Department'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Department Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo e($department->name); ?></h5>
                <p class="card-text"><?php echo e($department->description ?? 'No description available.'); ?></p>
                <a href="<?php echo e(route('departments.edit', $department->id)); ?>" class="btn btn-warning">Edit</a>
                <a href="<?php echo e(route('departments.index')); ?>" class="btn btn-secondary">Back to Departments</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('LEMS.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp - Copy\htdocs\ELMS-main\resources\views/LEMS/admin/departments/show.blade.php ENDPATH**/ ?>