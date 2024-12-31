<?php $__env->startSection('title', 'Edit Employee'); ?>
<?php $__env->startSection('content'); ?>
    <h3>Edit Employee</h3>
    <form action="<?php echo e(route('employees.update', $employees->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <?php echo $__env->make('LEMS.flash_erroe', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="form-floating mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name" name="name"
                placeholder="Name" value="<?php echo e(old('name', $employees->name)); ?>">
            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <small class="invalid-feedback"><?php echo e($message); ?></small>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-floating mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" name="email"
                placeholder="Your email" value="<?php echo e(old('email', $employees->email)); ?>">
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <small class="invalid-feedback"><?php echo e($message); ?></small>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-floating mb-3">
            <label for="password">Password</label>
            <div class="input-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Your password">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                        <i class="fa fa-eye"></i>
                    </button>
                </div>
            </div>

        </div>




        <button type="submit" class="btn btn-primary">Update Employee</button>
    </form>

<?php $__env->startSection('script'); ?>

    <script>
        $(document).ready(function() {
            const passwordInput = $('#password');
            const toggleButton = $('#togglePassword');

            toggleButton.on('click', function() {
                const type = passwordInput.attr('type');
                if (type === 'password') {
                    passwordInput.attr('type', 'text');
                    toggleButton.find('i').removeClass('fa-eye').addClass('fa-times');
                } else {
                    passwordInput.attr('type', 'password');
                    toggleButton.find('i').removeClass('fa-times').addClass('fa-eye');
                }
            });

            toggleButton.on('mouseenter', function() {
                passwordInput.attr('type', 'text');
                toggleButton.find('i').removeClass('fa-eye').addClass('fa-times');
            });

            toggleButton.on('mouseleave', function() {
                const type = passwordInput.attr('type');
                if (type !== 'password') {
                    passwordInput.attr('type', 'password');
                    toggleButton.find('i').removeClass('fa-times').addClass('fa-eye');
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('LEMS.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp - Copy\htdocs\ELMS-main\resources\views/LEMS/admin/employee/edit.blade.php ENDPATH**/ ?>