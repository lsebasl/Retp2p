    
<?php $__env->startSection('content'); ?>

    <!-- pageContent -->


    <div class="mdl-tabs__panel is-active" id="tabNewProvider">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
                <div class="full-width panel mdl-shadow--2dp "style="height:500px;">
                    <div class="full-width panel-tittle bg-primary text-center tittles">

                        User Information
                    </div>
                    <?php echo $__env->make('partials.__alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <table class="mdl-data-table mdl-js-data-table mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop" style="font-family:'roboto'; top: 40px; padding: 40px; font-size: large;" >
                        <tbody>
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric">Name</td>
                            <td><?php echo e($user->getFullName()); ?></td>
                        </tr>
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric">Id Type</td>
                            <td><?php echo e($user->id_type); ?></td>
                        </tr>
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric">Identification</td>
                            <td><?php echo e($user->identification); ?></td>
                        </tr>
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric">Phone</td>
                            <td><?php echo e($user->phone); ?></td>
                        </tr>
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric">E-mail</td>
                            <td><?php echo e($user->email); ?></td>
                        </tr>
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric">Address</td>
                            <td><?php echo e($user->address); ?></td>
                        </tr>
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric">User Status</td>
                            <td><?php echo e($user->status); ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SEBASTIAN\laragon\www\Reto\resources\views/users/show.blade.php ENDPATH**/ ?>