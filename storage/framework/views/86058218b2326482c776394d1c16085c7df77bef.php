<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e(__('Verify')); ?></title>
    <link rel="stylesheet" href="<?php echo e(mix('/css/admin/all.css')); ?>">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo e(mix('js/admin/all.js')); ?>"><\/script>')</script>
    <script src="<?php echo e(mix('js/admin/all.js')); ?>" ></script>
</head>
<body class="cover">
<div class="container-login">
    <p class="text-center" style="font-size: 80px;">
        <i class="zmdi zmdi-account-circle"></i>
    </p>
    <p class="text-center text-condensedLight">Sign up your Account</p>
    <div method="POST" action=VERIFY style= "text-align:center">
        <?php echo csrf_field(); ?>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <a class="mdl-textfield" for="email"><?php echo e(__('Verify Your Email Address')); ?></a>
            <?php if(session('resent')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e(__('A fresh verification link has been sent to your email address.')); ?>

                </div>
            <?php endif; ?>
            <?php echo e(__('Before proceeding, please check your email for a verification link.')); ?>

            <?php echo e(__('If you did not receive the email,')); ?>

            <form class="d-inline" method="POST" action="<?php echo e(route('verification.resend')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" style="position: initial;margin-top: 30px; " class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"><?php echo e(__('click here to request another')); ?></button>
            </form>
        </div>

    </div>
</div>
</body>
</html>



<?php /**PATH D:\SEBASTIAN\laragon\www\Reto\resources\views/auth/verify.blade.php ENDPATH**/ ?>