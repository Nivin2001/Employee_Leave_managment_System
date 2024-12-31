<?php $__env->startSection('title', 'All Department'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mb-4">
        <h1>All Departments</h1>

        <!-- Button floated to the right -->
        <a href="<?php echo e(route('departments.create')); ?>" class="btn btn-primary mb-3" style="float: right;">Add New Department</a>

        <?php if(session('success')): ?>
            <div class="alert alert-success mt-3">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <!-- Table container with white background and margins -->
        <div class="table-responsive" style="padding: 0 1px">
            <table class="table table-bordered p-3 bg-white">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Department</th>
                        <th>Shortform</th>
                        <th>Contact Email</th>
                        <th>Contact Phone</th>
                        <th>Created_at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>
                            <td><?php echo e($department->name); ?></td>
                            <td><?php echo e($department->description); ?></td>
                            <td><?php echo e($department->contact_email); ?></td>
                            <td><?php echo e($department->contact_phone); ?></td>
                            <td><?php echo e($department->created_at); ?></td>
                            <td>
                                <div class="icon-container">
                                    <a href="<?php echo e(route('departments.show', $department->id)); ?>" class="btn text-info btn-sm">
                                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                    </a>
                                    <a href="<?php echo e(route('departments.edit', $department->id)); ?>" class="btn btn-sm text-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="<?php echo e(route('departments.destroy', $department->id)); ?>" method="POST" style="display: inline;">
                                        <?php echo method_field('DELETE'); ?>
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-sm text-danger" onclick="return confirm('Are you sure you want to delete this department?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('LEMS.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp - Copy\htdocs\ELMS-main\resources\views/LEMS/admin/departments/index.blade.php ENDPATH**/ ?>