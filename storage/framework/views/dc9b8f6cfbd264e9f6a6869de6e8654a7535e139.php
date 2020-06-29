<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>" type="text" name="name"  id="name" value="<?php echo e(old('name', $user->name)); ?>" required>
    <?php echo $__env->renderWhen($errors->has('name'), 'partials.__invalid_feedback', ['feedback' => $errors->first('name')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
    <label class="mdl-textfield__label" for="name"><?php echo e(__('Name')); ?></label>
    <span class="mdl-textfield__error">Invalid name</span>
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input <?php echo e($errors->has('last_name') ? 'is-invalid' : ''); ?>" type="text" name="last_name"  id="last_name" value="<?php echo e(old('last_name', $user->last_name)); ?>" required>
    <?php echo $__env->renderWhen($errors->has('last_name'), 'partials.__invalid_feedback', ['feedback' => $errors->first('last_name')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
    <label class="mdl-textfield__label" for="last_name"><?php echo e(__('Last Name')); ?></label>
    <span class="mdl-textfield__error">Invalid last name</span>
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <select class="mdl-textfield__input" name="id_type" id="id_type" required>
            <option value="" ></option>
        <option value="Foreign ID" <?php echo e(old('id_type',$user->id_type)=='Foreign ID' ? 'selected' : ''); ?>><?php echo e(__('Foreign ID')); ?></option>
        <option value="Card ID" <?php echo e(old('id_type',$user->id_type)=='Card ID' ? 'selected' : ''); ?>><?php echo e(__('Card ID')); ?></option>
        <option value="Passport" <?php echo e(old('id_type',$user->id_type)=='Passport' ? 'selected' : ''); ?>><?php echo e(__('Passport')); ?></option>
        <option value="NIT" <?php echo e(old('id_type',$user->id_type)=='NIT' ? 'selected' : ''); ?>><?php echo e(__('NIT')); ?>

    </select>
    <label class="mdl-textfield__label" for="id_type"><?php echo e(__('Select Id Type')); ?></label>
    <span class="mdl-textfield__error">Invalid Id Type</span>
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input <?php echo e($errors->has('identification') ? 'is-invalid' : ''); ?>" type="text" name="identification" id="identification" value="<?php echo e(old('identification', $user->identification)); ?>" required>
    <label class="mdl-textfield__label" for="identification"><?php echo e(__('Identification')); ?></label>
    <span class="mdl-textfield__error">Invalid Identification</span>
    <?php echo $__env->renderWhen($errors->has('identification'),'partials.__invalid_feedback', ['feedback' => $errors->first('identification')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input <?php echo e($errors->has('phone') ? 'is-invalid' : ''); ?>" type="number" name="phone"  id="phone" value="<?php echo e(old('phone', $user->phone)); ?>" required>
    <label class="mdl-textfield__label" for="phone"><?php echo e(__('Phone')); ?></label>
    <span class="mdl-textfield__error">Invalid phone number</span>
    <?php echo $__env->renderWhen($errors->has('phone'),'partials.__invalid_feedback', ['feedback' => $errors->first('phone')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input <?php echo e($errors->has('email') ? "is-invalid" : ''); ?>" name="email" type="email" id="email" value="<?php echo e(old('email', $user->email)); ?>"required>
    <label class="mdl-textfield__label" for="emailClient"><?php echo e(__('E-mail')); ?></label>
    <span class="mdl-textfield__error">email</span>
    <?php echo $__env->renderWhen($errors->has('email'),'partials.__invalid_feedback', ['feedback' => $errors->first('email')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input <?php echo e($errors->has('address') ? 'is-invalid' : ''); ?>" name="address" type="text" id="address" value="<?php echo e(old('address', $user->address)); ?>">
    <label class="mdl-textfield__label" for="address"><?php echo e(__('Address')); ?></label>
    <span class="mdl-textfield__error">Invalid address</span>
    <?php echo $__env->renderWhen($errors->has('address'),'partials.__invalid_feedback', ['feedback' => $errors->first('address')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <select class="mdl-textfield__input" name="status" id="status" required>
        <option value=""></option>
        <option value="Enable" <?php echo e(old('status',$user->status)=='Enable' ? 'selected' : ''); ?>><?php echo e(__('Enable')); ?></option>
        <option value="Disable" <?php echo e(old('status',$user->status)=='Disable' ? 'selected' : ''); ?>><?php echo e(__('Disable')); ?></option>
    </select>
    <label class="mdl-textfield__label" for="status"><?php echo e(__('User Status')); ?></label>
    <span class="mdl-textfield__error">Invalid status</span>
</div>

<?php /**PATH D:\SEBASTIAN\laragon\www\Reto\resources\views/users/__form.blade.php ENDPATH**/ ?>