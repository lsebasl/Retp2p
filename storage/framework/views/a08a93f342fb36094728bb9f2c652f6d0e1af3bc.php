
<?php $__env->startSection('content'); ?>

    <section class="full-width header-well">
        <div class="full-width header-well-icon">
            <i class="zmdi zmdi-store"></i>
        </div>
        <div class="full-width header-well-text">
            <p class="text-condensedLight">
                Inventory user 3 point to see the options
            </p>
        </div>
    </section>
    <div class="full-width divider-menu-h"></div>
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
            <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
                <thead>
                <tr>
                    <th class="mdl-data-table__cell--non-numeric">Name</th>
                    <th>BarCode</th>
                    <th>Units</th>
                    <th>Price</th>
                    <th>Options</th>
                </tr>
                </thead>
                <?php echo $__env->make('partials.__alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tbody>
                <tr>
                    <td class="mdl-data-table__cell--non-numeric"><?php echo e($product->name); ?></td>
                    <td><?php echo e($product->barcode); ?></td>
                    <td><?php echo e($product->units); ?></td>
                    <td><?php echo e($product->price); ?></td>
                    <td style="display: flex; align-items: center; flex-direction: row-reverse;border-bottom: none">
                        <form method="POST" action="<?php echo e(route('products.destroy',$product)); ?>">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <a type="submit" href="<?php echo e(route('products.show', $product)); ?>" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-eye"></i></a>
                            <a type="submit" href="<?php echo e(route('products.edit', $product)); ?>" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-edit"></i></a>
                            <button type="submit" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-delete" style="color: darkred"></i></button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr style="position: center">
                        <td ></td>
                        <td></td>
                        <td class="mdl-data-table__cell--non-numeric"><?php echo e(__('Stock Empty')); ?></td>
                        <td></td>
                        <td><button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-more"></i></button></td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SEBASTIAN\laragon\www\Reto\resources\views/stocks/index.blade.php ENDPATH**/ ?>