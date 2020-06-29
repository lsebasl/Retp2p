<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e(__('Register')); ?></title>
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
    <p class="text-center text-condensedLight"><?php echo e(__('Sign up your Account')); ?></p>
    <form method="POST" action="<?php echo e(route('register')); ?>">
        <?php echo csrf_field(); ?>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" id="name" name="name" value="<?php echo e(old('name')); ?>"  autocomplete="name" autofocus >
            <?php echo $__env->renderWhen($errors->has('name'), 'partials.__invalid_feedback', ['feedback' => $errors->first('name')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
            <label class="mdl-textfield__label" for="name"><?php echo e(__('Name')); ?></label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" id="last_name" name="last_name" value="<?php echo e(old('last_name')); ?>"  autocomplete="last_name" autofocus>
            <?php echo $__env->renderWhen($errors->has('identification'), 'partials.__invalid_feedback', ['feedback' => $errors->first('last_name')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
            <label class="mdl-textfield__label" for="last_name"><?php echo e(__('Last Name')); ?></label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <select class="mdl-textfield__input" name="id_type" id="id_type">
                <option value="" disabled="" selected></option>
                <option value="Foreign ID" <?php echo e(old('id_type')=='Foreign ID' ? 'selected' : ''); ?>><?php echo e(__('Foreign ID')); ?></option>
                <option value="Card ID" <?php echo e(old('id_type')=='Card ID' ? 'selected' : ''); ?>><?php echo e(__('Card ID')); ?></option>
                <option value="Passport" <?php echo e(old('id_type')=='Passport' ? 'selected' : ''); ?>><?php echo e(__('Passport')); ?></option>
                <option value="NIT" <?php echo e(old('id_type')=='NIT' ? 'selected' : ''); ?>><?php echo e(__('NIT')); ?>

            </select>
            <?php echo $__env->renderWhen($errors->has('id_type'), 'partials.__invalid_feedback', ['feedback' => $errors->first('id_type')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
            <label class="mdl-textfield__label" for="id_type"><?php echo e(__('ID Type')); ?></label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input <?php $__errorArgs = ['identification'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="identification" id="identification" name="identification" value="<?php echo e(old('identification')); ?>"  autocomplete="identification" autofocus>
            <?php echo $__env->renderWhen($errors->has('identification'), 'partials.__invalid_feedback', ['feedback' => $errors->first('identification')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
            <label class="mdl-textfield__label" for="identification"><?php echo e(__('Identification')); ?></label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="phone" id="phone" name="phone" value="<?php echo e(old('phone')); ?>"  autocomplete="phone" autofocus>
            <?php echo $__env->renderWhen($errors->has('phone'), 'partials.__invalid_feedback', ['feedback' => $errors->first('phone')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
            <label class="mdl-textfield__label" for="phone"><?php echo e(__('Phone')); ?></label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" id="address" name="address" value="<?php echo e(old('address')); ?>"  autocomplete="address" autofocus >
            <?php echo $__env->renderWhen($errors->has('address'), 'partials.__invalid_feedback', ['feedback' =>     $errors->first('address')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
            <label class="mdl-textfield__label" for="address"><?php echo e(__('Address')); ?></label>
        </div>
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
unset($__errorArgs, $__bag); ?>" type="password" id="password" name="password"  autocomplete="new-password">
            <label class="mdl-textfield__label" for="password"><?php echo e(__('Password')); ?></label>
            <?php echo $__env->renderWhen($errors->has('password'), 'partials.__invalid_feedback', ['feedback' => $errors->first('password')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="password" id="password-confirm" name="password_confirmation"  autocomplete="new-password">
            <label class="mdl-textfield__label" for="password_confirmation"><?php echo e(__('Password Confirm')); ?></label>
            <?php echo $__env->renderWhen($errors->has('password_confirmation'), 'partials.__invalid_feedback', ['feedback' => $errors->first('password_confirmation')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
        </div>

        <button id="SignUp" class="mdl-button mdl-js-button mdl-js-ripple-effect" style="color: #3F51B5; float:right;">
            <?php echo e(__('Sign Up')); ?> <i class="zmdi zmdi-mail-send"></i>
        </button>
    </form>
</div>
</body>
</html>



<?php /**PATH D:\SEBASTIAN\laragon\www\Reto\resources\views/auth/register.blade.php ENDPATH**/ ?>