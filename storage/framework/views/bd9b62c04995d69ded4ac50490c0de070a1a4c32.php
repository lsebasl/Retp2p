
<?php if(session()->has('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>
<?php if(session()->has('error')): ?>
    <div class="alert alert-danger">
        <?php echo e(session('error')); ?>

    </div>
<?php endif; ?>
<?php if(session()->has('info')): ?>
    <div class="alert alert-info">
        <?php echo e(session('info')); ?>

    </div>
<?php endif; ?>
<?php if(session()->has('message')): ?>
    <div class="alert alert-message">
        <?php echo e(session('message')); ?>

    </div>
<?php endif; ?>

<?php /**PATH D:\SEBASTIAN\laragon\www\Reto\resources\views/partials/__alerts.blade.php ENDPATH**/ ?>