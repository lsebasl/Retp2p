<form method=Get action="{{ route('products.index')}}">
    <div class="mdl-grid">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable {{$errors->has('reference') ? 'is-invalid' : '' }}">
            <label class="mdl-button mdl-js-button mdl-button--icon " for="reference">
                <i class="zmdi zmdi-search"></i>
            </label>
            <div class="mdl-textfield__expandable-holder ">
                <input class="mdl-textfield__input " type="text" id="reference" name="reference" value="{{ request()->input('reference')}}" placeholder="Reference...">
                <label class="mdl-textfield__label"></label>
            </div>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{$errors->has('search-status') ? 'is-invalid' : '' }}">
            @includeWhen($errors->has('search-status'), 'partials.__invalid_feedback', ['feedback' => $errors->first('search-status')])
            <select class="mdl-textfield__input" name="search-status" id="search-status">
                <option value=""></option>
                <option value="Enable" {{'Enable' == request()->input('search-status') ? 'selected' : ''}}>{{__('Enable')}}</option>
                <option value="Disable" {{'Disable' == request()->input('search-status') ? 'selected' : ''}}>{{__('Disable')}}</option>
            </select>
            <label class="mdl-textfield__label" for="category">{{__('Select Status')}}</label>
            <span class="mdl-textfield__error">Invalid Category</span>
        </div>
        <p class="text-center"></p>
        <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" >
            {{__('Search')}}
        </button>
</form>
<form>
    <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored " style="margin-left:2px" href="{{route('products.index',"")}}" >
        {{__('Clear')}}
    </button>
</form>
<div
    @includeWhen($errors->has('search-name'), 'partials.__invalid_feedback', ['feedback' => $errors->first('search-name')])
</div>
</div>


