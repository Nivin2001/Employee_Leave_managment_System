<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="profile-container">
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="https://via.placeholder.com/150" alt="Profile Picture">
            </div>
            <div class="col-md-8 profile-info">
                <h3>Edit Profile Information</h3>
                <form action="<?php echo e(route('profile.update', ['id' => auth()->user()->id])); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?> <!-- يجب إضافة هذه السطر ليتم إرسال الطلب كـ PUT -->

                    <!-- اسم المستخدم -->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo e(auth()->user()->name); ?>">
                    </div>

                    <!-- البريد الإلكتروني -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo e(auth()->user()->email); ?>">
                    </div>

                    <!-- رقم الاتصال -->
                    <div class="form-group">
                        <label for="Contact_Number">Contact Number</label>
                        <input type="text" class="form-control" id="Contact_Number" name="Contact_Number" value="<?php echo e(auth()->user()->contact); ?>">
                    </div>

                    <!-- القسم -->
                    <div class="form-group">
                        <label for="department">Department</label>
                        <select class="form-control" id="department" name="department_id">
                            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($department->id); ?>" <?php echo e(auth()->user()->department_id == $department->id ? 'selected' : ''); ?>>
                                    <?php echo e($department->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <!-- زر حفظ التغييرات -->
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('LEMS.employee.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp - Copy\htdocs\ELMS-main\resources\views/LEMS/employee/profile/edit.blade.php ENDPATH**/ ?>