<?php if(session('status')): ?>
    <div class="alert alert-success">
        <?php echo e(session('status')); ?>

    </div>
<?php elseif(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php elseif(session('unsuccess')): ?>
    <div class="alert alert-warning">
        <?php echo e(session('unsuccess')); ?>

    </div>
<?php endif; ?>