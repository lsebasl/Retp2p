
<?php $__env->startSection('content'); ?>
    <h3 class="text-center tittles">RESPONSIVE TILES</h3>
    <!-- Tiles -->
    <a class="full-width tile" href="<?php echo e(route('invoices.index')); ?>" >
        <div class="tile-text" >
					<span class="text-condensedLight" >
						1<br>
						<small><?php echo e(__('Invoices')); ?></small>
					</span>
        </div>
        <i class="zmdi zmdi-receipt tile-icon"></i>
    </a>
    <a class="full-width tile" href="<?php echo e(route('users.index')); ?>">
        <div class="tile-text">
					<span class="text-condensedLight">
						2<br>
						<small><?php echo e(__('Users')); ?></small>
					</span>
        </div>
        <i class="zmdi zmdi-accounts tile-icon"></i>
    </a>
    <a class="full-width tile" href="<?php echo e(route('stocks.index')); ?>">
        <div class="tile-text">
					<span class="text-condensedLight">
						3<br>
						<small><?php echo e(__('Store')); ?></small>
					</span>
        </div>
        <i class="zmdi zmdi-store tile-icon"></i>
    </a>
    <a class="full-width tile" href="<?php echo e(route('products.index')); ?>">
        <div class="tile-text">
					<span class="text-condensedLight">
						121<br>
						<small><?php echo e(__('Products')); ?></small>
					</span>
        </div>
        <i class="zmdi zmdi-toys tile-icon"></i>
    </a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SEBASTIAN\laragon\www\Reto\resources\views/home.blade.php ENDPATH**/ ?>