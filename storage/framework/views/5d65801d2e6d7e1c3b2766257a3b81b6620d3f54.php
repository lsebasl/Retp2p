
<?php $__env->startSection('content'); ?>
    <div class="mdl-tabs__panel" id="tabNewClient">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
                <div class="full-width panel mdl-shadow--2dp">
                    <div class="full-width panel-tittle bg-primary text-center tittles">
                        Edit Client
                    </div>
                    <div class="full-width panel-content">
                        <form method="POST" action="<?php echo e(route('users.update', $user)); ?>">
                            <h5 class="text-condensedLight">Data client</h5>
                            <?php echo method_field('PUT'); ?>
                            <?php echo csrf_field(); ?>
                            <?php echo $__env->make('users.__form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <p class="text-center">
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                                    <?php echo e(__('Save')); ?>

                                </button>
                                <div class="mdl-tooltip" for="btn-addClient">Client Update</div>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SEBASTIAN\laragon\www\Reto\resources\views/users/edit.blade.php ENDPATH**/ ?>