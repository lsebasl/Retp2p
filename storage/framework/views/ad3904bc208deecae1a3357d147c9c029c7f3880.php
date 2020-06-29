
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e(__('Login')); ?></title>
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
    <p class="text-center text-condensedLight">Sign in with your Account</p>
    <form method="POST" action="<?php echo e(route('login')); ?>">
        <?php echo csrf_field(); ?>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="email" id="email" name="email" value="<?php echo e(old('email')); ?>"  autocomplete="email" autofocus>
            <?php echo $__env->renderWhen($errors->has('email'), 'partials.__invalid_feedback', ['feedback' => $errors->first('email')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
            <label class="mdl-textfield__label" for="email"><?php echo e(__('E-Mail Address')); ?></label>
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="password" id="password" name="password"  autocomplete="current-password">
            <label class="mdl-textfield__label" for="password"><?php echo e(__('Password')); ?></label>
            <?php echo $__env->renderWhen($errors->has('password'), 'partials.__invalid_feedback', ['feedback' => $errors->first('password')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
        </div>

        <button id="SingIn" class="mdl-button mdl-js-button mdl-js-ripple-effect" style="color: #3F51B5; float:right;">
            Sign in <i class="zmdi zmdi-mail-send"></i>
        </button>
        <?php if(Route::has('password.request')): ?>
            <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>" style="color: #3F51B5; text-decoration-line: none" >
                <?php echo e(__('Forgot Your Password?')); ?>

            </a>
        <?php endif; ?>
    </form>
</div>
</body>
</html>












<?php /**PATH D:\SEBASTIAN\laragon\www\Reto\resources\views/auth/login.blade.php ENDPATH**/ ?>