

<?php $__env->startSection('content'); ?>
    <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
        <div class="mdl-tabs__tab-bar">
            <a href="#tabListClient" class="mdl-tabs__tab is-active">LIST</a>
            <a href="#tabNewClient" class="mdl-tabs__tab">NEW</a>
        </div>
        <div class="mdl-tabs__panel is-active" id="tabListClient">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
                    <div class="full-width panel mdl-shadow--2dp">

                        <div class="full-width panel-tittle bg-success text-center tittles">
                            <?php echo e(__('List Clients')); ?>

                        </div>
                        <div class="full-width panel-content">
                            
                            <?php echo $__env->make('partials.__alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="mdl-list">
                                <?php $__empty_1 = true; $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <div class="mdl-list__item mdl-list__item--two-line">
                                            <span class="mdl-list__item-primary-content">
                                                <i class="zmdi zmdi-face mdl-list__item-avatar"></i>
                                                <span> <?php echo e($client->getFullName()); ?> </span>
                                                <span class="mdl-list__item-sub-title"><?php echo e($client->id_type); ?> <?php echo e($client->identification); ?></span>
                                            </span>
                                        <a class="mdl-list__item-secondary-action" href="<?php echo e(route('clients.show', $client)); ?>"><i class="zmdi zmdi-eye" style= "color : #6574C4; width: 30px; font-size: 25px"></i></a>
                                        <a class="mdl-list__item-secondary-action" href="<?php echo e(route('clients.edit', $client)); ?>"><i class="zmdi zmdi-edit" style= "color : #6574C4; width: 30px; font-size: 25px"></i></a>
                                        <form method="POST" action="<?php echo e(route('clients.destroy',$client)); ?>">
                                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="mdl-list__item-secondary-action"><i class="zmdi zmdi-delete" style= "color : #BD2765; width: 30px; font-size: 25px" ></i></button>
                                        </form>
                                    </div>
                                    <li class="full-width divider-menu-h"></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <li><?php echo e(__('No hay usuarios registrados')); ?></li>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mdl-tabs__panel" id="tabNewClient">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
                    <div class="full-width panel mdl-shadow--2dp">
                        <div class="full-width panel-tittle bg-primary text-center tittles">
                            New client
                        </div>
                        <div class="full-width panel-content">
                            <form action="<?php echo e(route('clients.store')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <h5 class="text-condensedLight">Data client</h5>
                                <?php echo $__env->make('clients.__form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <p class="text-center">
                                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                                        <?php echo e(__('Save')); ?>

                                    </button>
                                    <div class="mdl-tooltip" for="btn-addClient">Add client</div>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="full-width header-well">
        <div class="full-width header-well-icon">
            <i class="zmdi zmdi-accounts"></i>
        </div>
        <div class="full-width header-well-text">
            <p class="text-condensedLight">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde aut nulla accusantium minus corporis accusamus fuga harum natus molestias necessitatibus.
            </p>
        </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SEBASTIAN\laragon\www\Reto\resources\views/clients/index.blade.php ENDPATH**/ ?>