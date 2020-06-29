<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
        <h5 class="text-condensedLight">Basic Information</h5>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input <?php echo e($errors->has('barcode') ? 'is-invalid' : ''); ?>"  type="number" name="barcode" pattern="-?[0-9- ]*(\.[0-9]+)?" id="barcode" value="<?php echo e(old('barcode', $product->barcode)); ?>">
            <?php echo $__env->renderWhen($errors->has('barcode'), 'partials.__invalid_feedback', ['feedback' => $errors->first('barcode')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
            <label class="mdl-textfield__label" for="barcode"><?php echo e(__('Barcode')); ?></label>
            <span class="mdl-textfield__error">Invalid barcode</span>
        </div>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>" type="text" name="name" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="name" value="<?php echo e(old('name', $product->name)); ?>">
          <?php echo $__env->renderWhen($errors->has('name'), 'partials.__invalid_feedback', ['feedback' => $errors->first('name')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
            <label class="mdl-textfield__label" for="name"><?php echo e(__('Name')); ?></label>
            <span class="mdl-textfield__error">Invalid name</span>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php echo e($errors->has('status') ? 'is-invalid' : ''); ?>">
            <?php echo $__env->renderWhen($errors->has('status'), 'partials.__invalid_feedback', ['feedback' => $errors->first('status')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
            <select class="mdl-textfield__input" name="category" id="category">
                <option value="" disabled="" selected=""></option>
                <option value="Computers">Computers</option>
                <option value="Tv & Video">Tv & Video</option>
                <option value="Smartphones">Mobiles</option>
                <option value="Accessories">Accessories</option>
            </select>
            <label class="mdl-textfield__label" for="category"><?php echo e(__('Select Category')); ?></label>
            <span class="mdl-textfield__error">Invalid Id Type</span>
        </div>
        <h5 class="text-condensedLight">Units and Price</h5>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input <?php echo e($errors->has('units') ? 'is-invalid' : ''); ?>" type="number" name="units"  pattern="-?[0-9]*(\.[0-9]+)?" id="units" value="<?php echo e(old('units', $product->units)); ?>">
            <?php echo $__env->renderWhen($errors->has('units'), 'partials.__invalid_feedback', ['feedback' => $errors->first('units')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
            <label class="mdl-textfield__label" for="units"><?php echo e(__('Units')); ?></label>
            <span class="mdl-textfield__error">Invalid number</span>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input <?php echo e($errors->has('price') ? 'is-invalid' : ''); ?>" type="text" name="price" pattern="-?[0-9.]*(\.[0-9]+)?" id="price" value="<?php echo e(old('price', $product->price)); ?>">
            <?php echo $__env->renderWhen($errors->has('price'), 'partials.__invalid_feedback', ['feedback' => $errors->first('price')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
            <label class="mdl-textfield__label" for="price"><?php echo e(__('Price')); ?></label>
            <span class="mdl-textfield__error">Invalid price</span>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input <?php echo e($errors->has('discount') ? 'is-invalid' : ''); ?>" type="number" name="discount" pattern="-?[0-9]*(\.[0-9]+)?" id="discount" value="<?php echo e(old('discount', $product->discount)); ?>">
            <?php echo $__env->renderWhen($errors->has('discount'), 'partials.__invalid_feedback', ['feedback' => $errors->first('discount')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
            <label class="mdl-textfield__label" for="discount"><?php echo e(__('Discount')); ?></label>
            <span class="mdl-textfield__error">Invalid discount</span>
        </div>
    </div>
    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
        <h5 class="text-condensedLight">Mark and model</h5>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input <?php echo e($errors->has('mark') ? 'is-invalid' : ''); ?>" type="text" name="mark" id="mark" value="<?php echo e(old('mark', $product->mark)); ?>">
            <?php echo $__env->renderWhen($errors->has('mark'), 'partials.__invalid_feedback', ['feedback' => $errors->first('mark')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
            <label class="mdl-textfield__label" for="mark"><?php echo e(__('Mark')); ?></label>
            <span class="mdl-textfield__error">Invalid Mark</span>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input <?php echo e($errors->has('model') ? 'is-invalid' : ''); ?>" type="text" name="model" id="model" value="<?php echo e(old('model', $product->model)); ?>">
            <?php echo $__env->renderWhen($errors->has('model'), 'partials.__invalid_feedback', ['feedback' => $errors->first('model')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
            <label class="mdl-textfield__label" for="model"><?php echo e(__('Model')); ?></label>
            <span class="mdl-textfield__error">Invalid model</span>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input <?php echo e($errors->has('description') ? 'is-invalid' : ''); ?>" type="text" name="description" id="description" value="<?php echo e(old('description', $product->description)); ?>">
            <?php echo $__env->renderWhen($errors->has('description'), 'partials.__invalid_feedback', ['feedback' => $errors->first('description')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
            <label class="mdl-textfield__label" for="description"><?php echo e(__('Description')); ?></label>
            <span class="mdl-textfield__error">Invalid description</span>
        </div>
        <h5 class="text-condensedLight">Other Data</h5>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php echo e($errors->has('status') ? 'is-invalid' : ''); ?>">
            <?php echo $__env->renderWhen($errors->has('status'), 'partials.__invalid_feedback', ['feedback' => $errors->first('status')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
            <select class="mdl-textfield__input" name="status" id="status" >
                <option value="" disabled="" selected=""></option>
                <option value="Enable">Enable</option>
                <option value="Disable">Disable</option>
            </select>
            <label class="mdl-textfield__label" for="status"><?php echo e(__('Select Status')); ?></label>
            <span class="mdl-textfield__error">Invalid Status</span>
        </div>
        <div class="mdl-textfield mdl-js-textfield ">
            <input type="file" name="image" id="file">
        </div>
        <?php if($product->image): ?>
            <div class="mdl-card mdl-shadow--2dp full-width product-card">
                <div class="mdl-card__title">
                        <img src="/storage/<?php echo e($product->image); ?>" alt="product-image" class="img-responsive">
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php /**PATH D:\SEBASTIAN\laragon\www\Reto\resources\views/products/__form.blade.php ENDPATH**/ ?>