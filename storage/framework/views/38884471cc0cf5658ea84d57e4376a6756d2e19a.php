
<?php $__env->startSection('content'); ?>
    <section class="full-width header-well" >
        <div class="full-width header-well-icon">
            <i class="zmdi zmdi-smartphone-portrait"></i>
        </div>
        <div class="full-width header-well-text" style="position: initial">
            <p class="text-condensedLight">
                Create Products. select all the form fields and save
            </p>
        </div>
    </section>
    <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
        <div class="mdl-tabs__tab-bar">
            <a href="#tabNewProduct" class="mdl-tabs__tab is-active">NEW</a>
        </div>
        <div class="mdl-tabs__panel is-active" id="tabNewProduct">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
                    <div class="full-width panel mdl-shadow--2dp">
                        <div class="full-width panel-tittle bg-primary text-center tittles">
                            New Product
                        </div>
                        <?php echo $__env->make('partials.__alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="full-width panel-content">
                            <form action="<?php echo e(route('products.store')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo $__env->make('products.__form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <p class="text-center">
                                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                                        <?php echo e(__('Save')); ?>

                                    </button>
                                <div class="mdl-tooltip" for="btn-addProduct">Add Product</div>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SEBASTIAN\laragon\www\Reto\resources\views/products/create.blade.php ENDPATH**/ ?>