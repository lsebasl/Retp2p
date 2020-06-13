<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
        <h5 class="text-condensedLight">Basic Information</h5>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input {{$errors->has('barcode') ? 'is-invalid' : '' }}"  type="number" name="barcode" pattern="-?[0-9- ]*(\.[0-9]+)?" id="barcode" value="{{ old('barcode', $product->barcode)}}">
            @includeWhen($errors->has('barcode'), 'partials.__invalid_feedback', ['feedback' => $errors->first('barcode')])
            <label class="mdl-textfield__label" for="barcode">{{__('Barcode')}}</label>
            <span class="mdl-textfield__error">Invalid barcode</span>
        </div>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input {{$errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="name" value="{{ old('name', $product->name)}}">
          @includeWhen($errors->has('name'), 'partials.__invalid_feedback', ['feedback' => $errors->first('name')])
            <label class="mdl-textfield__label" for="name">{{__('Name')}}</label>
            <span class="mdl-textfield__error">Invalid name</span>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <select class="mdl-textfield__input" name="category" id="category">
                <option value="" disabled="" selected=""></option>
                <option value="Computers">Computers</option>
                <option value="Tv & Video">Tv & Video</option>
                <option value="Smartphones">Smartphones</option>
                <option value="Accessories">Accessories</option>
            </select>
            <label class="mdl-textfield__label" for="category">{{__('Select Category')}}</label>
            <span class="mdl-textfield__error">Invalid Id Type</span>
        </div>
        <h5 class="text-condensedLight">Units and Price</h5>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input {{$errors->has('units') ? 'is-invalid' : '' }}" type="number" name="units"  pattern="-?[0-9]*(\.[0-9]+)?" id="units" value="{{ old('units', $product->units)}}">
            @includeWhen($errors->has('units'), 'partials.__invalid_feedback', ['feedback' => $errors->first('units')])
            <label class="mdl-textfield__label" for="units">{{__('Units')}}</label>
            <span class="mdl-textfield__error">Invalid number</span>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input {{$errors->has('price') ? 'is-invalid' : '' }}" type="text" name="price" pattern="-?[0-9.]*(\.[0-9]+)?" id="price" value="{{ old('price', $product->price)}}">
            @includeWhen($errors->has('price'), 'partials.__invalid_feedback', ['feedback' => $errors->first('price')])
            <label class="mdl-textfield__label" for="price">{{__('Price')}}</label>
            <span class="mdl-textfield__error">Invalid price</span>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input {{$errors->has('discount') ? 'is-invalid' : '' }}" type="number" name="discount" pattern="-?[0-9]*(\.[0-9]+)?" id="discount" value="{{ old('discount', $product->discount)}}">
            @includeWhen($errors->has('discount'), 'partials.__invalid_feedback', ['feedback' => $errors->first('discount')])
            <label class="mdl-textfield__label" for="discount">{{__('Discount')}}</label>
            <span class="mdl-textfield__error">Invalid discount</span>
        </div>
    </div>
    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
        <h5 class="text-condensedLight">Mark and model</h5>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input {{$errors->has('mark') ? 'is-invalid' : '' }}" type="text" name="mark" id="mark" value="{{ old('mark', $product->mark)}}">
            @includeWhen($errors->has('mark'), 'partials.__invalid_feedback', ['feedback' => $errors->first('mark')])
            <label class="mdl-textfield__label" for="mark">{{__('Mark')}}</label>
            <span class="mdl-textfield__error">Invalid Mark</span>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input {{$errors->has('model') ? 'is-invalid' : '' }}" type="text" name="model" id="model" value="{{ old('model', $product->model)}}">
            @includeWhen($errors->has('model'), 'partials.__invalid_feedback', ['feedback' => $errors->first('model')])
            <label class="mdl-textfield__label" for="model">{{__('Model')}}</label>
            <span class="mdl-textfield__error">Invalid model</span>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input {{$errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', $product->description)}}">
            @includeWhen($errors->has('description'), 'partials.__invalid_feedback', ['feedback' => $errors->first('description')])
            <label class="mdl-textfield__label" for="description">{{__('Description')}}</label>
            <span class="mdl-textfield__error">Invalid description</span>
        </div>
        <h5 class="text-condensedLight">Other Data</h5>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <select class="mdl-textfield__input" name="status" id="status">
                <option value="" disabled="" selected=""></option>
                <option value="Enable">Enable</option>
                <option value="Disable">Disable</option>
            </select>
            <label class="mdl-textfield__label" for="status">{{__('Select Status')}}</label>
            <span class="mdl-textfield__error">Invalid Status</span>
        </div>
        <div class="mdl-textfield mdl-js-textfield">
            <input type="file" name="image" id="file">
        </div>
    </div>
</div>
