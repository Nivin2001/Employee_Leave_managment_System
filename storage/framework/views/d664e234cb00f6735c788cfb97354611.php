<?php $__env->startSection('title', 'Create Employees'); ?>
<?php $__env->startSection('content'); ?>

    <div class="container">
        <h1><?php echo e($employees->name); ?> Details</h1>
        <div class="card mb-3">
            <div class="card-body ">
                <div class="row align-items-center">

                    <div class="col-md-3 ">
                            <img src="https://ui-avatars.com/api/?name=<?php echo e($employees->name); ?>" class="p-1"  style="border: 1px solid #ccc; width:100px;">
                    </div>

                    <div class="col-md-3">
                        <h5 class="card-title"><?php echo e($employees->name); ?> (<small><?php echo e($employees->type); ?></small>)
                        </h5>
                        <p class="card-text"><strong>Email:</strong> <?php echo e($employees->email); ?></p>

                    </div>
                </div>
            </div>
        </div>

        <a href="<?php echo e(route('employees.index')); ?>" class="btn btn-primary w-100">Back to List</a>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('LEMS.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp - Copy\htdocs\ELMS-main\resources\views/LEMS/admin/employee/show.blade.php ENDPATH**/ ?>