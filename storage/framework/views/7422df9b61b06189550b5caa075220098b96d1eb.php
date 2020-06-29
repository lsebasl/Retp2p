
<?php $__env->startSection('content'); ?>

        <section class="full-width header-well" >
            <div class="full-width header-well-icon">
                <i class="zmdi zmdi-accounts"></i>
            </div>
            <div class="full-width header-well-text" style="position: initial">
                <p class="text-condensedLight">
                    list of registered users. use eye to see details, pencil to edit and trash to remove
                </p>
            </div>
        </section>
    <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
        <div class="mdl-tabs__tab-bar">
            <a href="#tabListUser" class="mdl-tabs__tab is-active">LIST</a>
        </div>
        <div class="mdl-tabs__panel is-active" id="tabListUser">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
                    <div class="full-width panel mdl-shadow--2dp">
                        <div class="full-width panel-tittle bg-success text-center tittles">
                            <?php echo e(__('List Users')); ?>

                        </div>
                        <div class="mdl-textfield mdl-js-textfield input-placa"><?php echo e($users->links()); ?>

                            <link rel="stylesheet" href="<?php echo e(mix('/css/admin/all2.css')); ?>">
                        </div>
                            
                            <?php echo $__env->make('partials.__alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="mdl-list">
                                <li class="full-width divider-menu-h"></li>
                                <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <div class="mdl-list__item mdl-list__item--two-line">
                                            <span class="mdl-list__item-primary-content">
                                                <i class="zmdi zmdi-face mdl-list__item-avatar"></i>
                                                <span> <?php echo e($user->getFullName()); ?> </span>
                                                <span class="mdl-list__item-sub-title"><?php echo e($user->id_type); ?> <?php echo e($user->identification); ?></span>
                                            </span>
                                        <a class="mdl-list__item-secondary-action" href="<?php echo e(route('users.show', $user)); ?>"><i class="zmdi zmdi-eye" style= "color : #6574C4; width: 30px; font-size: 25px"></i></a>
                                        <a class="mdl-list__item-secondary-action" href="<?php echo e(route('users.edit', $user)); ?>"><i class="zmdi zmdi-edit" style= "color : #6574C4; width: 30px; font-size: 25px"></i></a>
                                        <form method="POST" action="<?php echo e(route('users.destroy',$user)); ?>">
                                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="mdl-list__item-secondary-action" style="border: none; background-color:white"><i class="zmdi zmdi-delete" style= "color : #BD2765; width: 20px; font-size: 25px"></i></button>
                                        </form>
                                    </div>
                                    <li class="full-width divider-menu-h"></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <li><?php echo e(__('Without Users')); ?></li>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SEBASTIAN\laragon\www\Reto\resources\views/users/index.blade.php ENDPATH**/ ?>