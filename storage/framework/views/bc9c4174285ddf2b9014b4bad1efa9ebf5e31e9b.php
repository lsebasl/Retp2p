<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>" type="text" name="name" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="name" >
    <?php echo $__env->renderWhen($errors->has('name'), 'partials.__invalid_feedback', ['feedback' => $errors->first('name')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
    <label class="mdl-textfield__label" for="name"><?php echo e(__('Name')); ?></label>
    <span class="mdl-textfield__error">Invalid name</span>
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textf    ield--floating-label">
    <input class="mdl-textfield__input <?php echo e($errors->has('last_name') ? 'is-invalid' : ''); ?>" type="text" name="last_name" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="last_name" >
    <?php echo $__env->renderWhen($errors->has('last_name'), 'partials.__invalid_feedback', ['feedback' => $errors->first('last_name')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
    <label class="mdl-textfield__label" for="last_name"><?php echo e(__('Last Name')); ?></label>
    <span class="mdl-textfield__error">Invalid last name</span>
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">-
    <select class="mdl-textfield__input" name="id_type" id="id_type" >
        <option value="" disabled="" selected></option>
        <option value="Card ID"><?php echo e(__('Card ID')); ?></option>
        <option value="Foreign ID"><?php echo e(__('Foreign ID')); ?></option>
        <option value="Passport"><?php echo e(__('Passport')); ?></option>
        <option value="NIT"><?php echo e(__('NIT')); ?></option>
    </select>
    <label class="mdl-textfield__label" for="id_type"><?php echo e(__('Select Id Type')); ?></label>
    <span class="mdl-textfield__error">Invalid Id Type</span>
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input <?php echo e($errors->has('identification') ? 'is-invalid' : ''); ?>" type="text" name="identification" pattern="-?[0-9]*(\.[0-9]+)?" id="identification">
    <label class="mdl-textfield__label" for="identification"><?php echo e(__('Identification')); ?></label>.
    <span class="mdl-textfield__error">Invalid Identification</span>
    <?php echo $__env->renderWhen($errors->has('identification'),'partials.__invalid_feedback', ['feedback' => $errors->first('identification')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input <?php echo e($errors->has('phone') ? 'is-invalid' : ''); ?>" type="number" name="phone" pattern="-?[0-9+()- ]*(\.[0-9]+)?" id="phone">
    <label class="mdl-textfield__label" for="phone"><?php echo e(__('Phone')); ?></label>
    <span class="mdl-textfield__error">Invalid phone number</span>
    <?php echo $__env->renderWhen($errors->has('phone'),'partials.__invalid_feedback', ['feedback' => $errors->first('phone')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input <?php echo e($errors->has('email') ? "is-invalid" : ''); ?>" name="email" type="email" id="email">
    <label class="mdl-textfield__label" for="emailClient"><?php echo e(__('E-mail')); ?></label>
    <span class="mdl-textfield__error">email</span>
    <?php echo $__env->renderWhen($errors->has('email'),'partials.__invalid_feedback', ['feedback' => $errors->first('email')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input <?php echo e($errors->has('address') ? 'is-invalid' : ''); ?>" name="address" type="text" id="address">
    <label class="mdl-textfield__label" for="address"><?php echo e(__('Address')); ?></label>
    <span class="mdl-textfield__error">Invalid address</span>
    <?php echo $__env->renderWhen($errors->has('address'),'partials.__invalid_feedback', ['feedback' => $errors->first('address')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
</div>
<?php /**PATH D:\SEBASTIAN\laragon\www\Reto\resources\views/clients/__form.blade.php ENDPATH**/ ?>