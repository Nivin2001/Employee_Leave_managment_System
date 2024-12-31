<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Send a Message to Admin</h2>

    <!-- Display success message if available -->
    

    <!-- Message submission form -->
    <form action="<?php echo e(route('messages.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="message">Message Text:</label>
            <textarea name="message" id="message" class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Send</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('LEMS.employee.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp - Copy\htdocs\ELMS-main\resources\views/LEMS/employee/messages/create.blade.php ENDPATH**/ ?>