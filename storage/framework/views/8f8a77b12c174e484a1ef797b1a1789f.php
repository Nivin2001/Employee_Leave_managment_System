<?php $__env->startSection('title', 'All Employees'); ?>

<?php $__env->startSection('search'); ?>
    <!-- Topbar Search -->
    <form action="<?php echo e(route('employees.index')); ?>" method="get"
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Search for Employee..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('LEMS.flash_action', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <h3 class="mb-4">All Employees</h3>

    <div class="container mb-4">
        <!-- Button floated to the right -->
        <a href="<?php echo e(route('employees.create')); ?>" class="btn btn-primary mb-3" style="float: right;">Add New Employee</a>
    </div>

    <!-- Table container with white background and appropriate margins -->
    <div class="table-responsive" style="padding: 0 35px">
        <table class="table table-bordered p-3 bg-white">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Employee ID</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Joined On</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($index + 1); ?></td> <!-- Sequential number -->
                        <td><?php echo e($employee->name); ?></td>
                        <td><?php echo e($employee->id); ?></td>
                        <td><?php echo e($employee->email); ?></td>
                        <td><?php echo e(optional($employee->department)->name ?? 'N/A'); ?></td> 
                        <td><?php echo e($employee->created_at->diffForHumans()); ?></td>
                        <td>
                            <a href="<?php echo e(route('employees.show', $employee->id)); ?>" class="btn text-info btn-sm">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </a>
                            <a class="btn btn-sm text-primary" href="<?php echo e(route('employees.edit', $employee->id)); ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form class="d-inline" action="<?php echo e(route('employees.destroy', $employee->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('delete'); ?>
                                <button class="btn btn-sm text-danger" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <?php echo e($employees->links('pagination::bootstrap-5')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Optional: Add any custom scripts if needed
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('LEMS.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp - Copy\htdocs\ELMS-main\resources\views/LEMS/admin/employee/index.blade.php ENDPATH**/ ?>