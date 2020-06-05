<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
        <h5 class="text-condensedLight">Basic Information</h5>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="number" name="barcode" pattern="-?[0-9- ]*(\.[0-9]+)?" id="barcode">
            <label class="mdl-textfield__label" for="barcode">{{__('Barcode')}}</label>
            <span class="mdl-textfield__error">Invalid barcode</span>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" name="name" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="name">
            <label class="mdl-textfield__label" for="name">{{__('Name')}}</label>
            <span class="mdl-textfield__error">Invalid name</span>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <select class="mdl-textfield__input" name="category" id="category">
                <option value="" disabled="" selected="">Select category</option>
                <option value="">Computers</option>
                <option value="">Tv & Video</option>
                <option value="">Smartphones</option>
                <option value="">Accessories</option>
                <label class="mdl-textfield__label" for="category">{{__('Select Category')}}</label>
                <span class="mdl-textfield__error">Invalid Id Type</span>
            </select>
        </div>
        <h5 class="text-condensedLight">Units and Price</h5>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="number" name="units"  pattern="-?[0-9]*(\.[0-9]+)?" id="units">
            <label class="mdl-textfield__label" for="units">{{__('Units')}}</label>
            <span class="mdl-textfield__error">Invalid number</span>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" name="price" pattern="-?[0-9.]*(\.[0-9]+)?" id="price">
            <label class="mdl-textfield__label" for="price">{{__('Price')}}</label>
            <span class="mdl-textfield__error">Invalid price</span>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="number" name="discount" pattern="-?[0-9]*(\.[0-9]+)?" id="discount">
            <label class="mdl-textfield__label" for="discount">{{__('Discount')}}</label>
            <span class="mdl-textfield__error">Invalid discount</span>
        </div>
    </div>
    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
        <h5 class="text-condensedLight">Mark and model</h5>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" name="mark" id="mark">
            <label class="mdl-textfield__label" for="mark">{{__('Mark')}}</label>
            <span class="mdl-textfield__error">Invalid Mark</span>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" name="model" id="model">
            <label class="mdl-textfield__label" for="model">{{__('Model')}}</label>
            <span class="mdl-textfield__error">Invalid model</span>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" name="description" id="description">
            <label class="mdl-textfield__label" for="description">{{__('Description')}}</label>
            <span class="mdl-textfield__error">Invalid description</span>
        </div>
        <h5 class="text-condensedLight">Other Data</h5>
        <div class="mdl-textfield mdl-js-textfield">
            <select class="mdl-textfield__input" name="status" id="status">
                <option value="" disabled="" selected="">Select status</option>
                <option value="">Enable</option>
                <option value="">Disable</option>
                <label class="mdl-textfield__label" for="status">{{__('Select Status')}}</label>
                <span class="mdl-textfield__error">Invalid Status</span>
            </select>
        </div>
        <div class="mdl-textfield mdl-js-textfield">
            <input type="file">
        </div>
    </div>
</div>
