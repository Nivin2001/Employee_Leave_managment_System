<?php if(session('msg')): ?>
    <div class="alert alert-<?php echo e(session('type')); ?>">
        <?php echo e(session('msg')); ?>

    </div>
<?php endif; ?>
<?php /**PATH C:\xampp - Copy\htdocs\ELMS-main\resources\views/LEMS/flash_action.blade.php ENDPATH**/ ?>