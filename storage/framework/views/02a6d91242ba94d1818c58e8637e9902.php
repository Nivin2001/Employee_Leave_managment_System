<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Add Department</h1>

    <form action="<?php echo e(route('departments.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="form-group">
            <label for="name">Department Name</label>
            <input type="text" class="form-control" id="name" name="name" required value="<?php echo e(old('name')); ?>">
            <?php if($errors->has('name')): ?>
                <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="description">Shortform</label>
            <input class="form-control" id="description" name="description"><?php echo e(old('description')); ?></textarea>
            <?php if($errors->has('description')): ?>
                <span class="text-danger"><?php echo e($errors->first('description')); ?></span>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="contact_email">Contact Email</label>
            <input type="text" class="form-control" id="contact_email" name="contact_email" required value="<?php echo e(old('contact_email')); ?>">
            <?php if($errors->has('contact_email')): ?>
                <span class="text-danger"><?php echo e($errors->first('contact_email')); ?></span>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="contact_phone">Contact Phone</label>
            <input type="text" class="form-control" id="contact_phone" name="contact_phone" required value="<?php echo e(old('contact_phone')); ?>">
            <?php if($errors->has('contact_phone')): ?>
                <span class="text-danger"><?php echo e($errors->first('contact_phone')); ?></span>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
        <a href="<?php echo e(route('departments.index')); ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('LEMS.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp - Copy\htdocs\ELMS-main\resources\views/LEMS/admin/departments/create.blade.php ENDPATH**/ ?>