
<?php $__env->startSection('content'); ?>

            <div class="mdl-tabs__panel" id="tabListProducts">
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
                        <form action="#">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                                <label class="mdl-button mdl-js-button mdl-button--icon" for="searchProduct">
                                    <i class="zmdi zmdi-search"></i>
                                </label>
                                <div class="mdl-textfield__expandable-holder">
                                    <input class="mdl-textfield__input" type="text" id="searchProduct">
                                    <label class="mdl-textfield__label"></label>
                                </div>
                            </div>
                        </form>
                        <nav class="full-width menu-categories">
                            <ul class="list-unstyle text-center">
                                <li><a href="#!">Computers</a></li>
                                <li><a href="#!">Tv & Video</a></li>
                                <li><a href="#!">Mobiles</a></li>
                                <li><a href="#!">Accessories</a></li>
                            </ul>
                        </nav>
                        <?php echo $__env->make('partials.__alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="full-width text-center" style="padding: 30px 0;">
                            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="mdl-card mdl-shadow--2dp full-width product-card">
                                <div class="mdl-card__title" style="height: 300px; object-fit:cover" >
                                    <?php if($product->image): ?>
                                    <img src="/storage/<?php echo e($product->image); ?>" alt="product-image" class="img-responsive">
                                        <?php endif; ?>
                                </div>
                                <div class="mdl-card__supporting-text">
                                    <small><?php echo e($product->units); ?></small><br>
                                    <small><?php echo e($product->category); ?></small>
                                </div>
                                <div class="mdl-card__actions mdl-card--border">
                                    <?php echo e($product->name); ?>

                                    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                                        <i class="zmdi zmdi-more"></i>
                                    </button>
                                </div>
                            </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <li><?php echo e(__('Without Products')); ?></li>
                            <?php endif; ?>
                         </div>
                    </div>
                </div>
            </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SEBASTIAN\laragon\www\Reto\resources\views/products/index.blade.php ENDPATH**/ ?>