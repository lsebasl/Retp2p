<div class="mdl-grid">
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
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{$errors->has('search-category') ? 'is-invalid' : '' }}">
        @includeWhen($errors->has('search-category'), 'partials.__invalid_feedback', ['feedback' => $errors->first('search-category')])
        <select class="mdl-textfield__input" name="search-category" id="search-category">
            <option value=""></option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{" $category->id" ==  request()->input('search-category') ? 'selected' : ''}}>{{$category->name}}</option>
            @endforeach
        </select>
        <label class="mdl-textfield__label" for="search-category">{{__('Select Category')}}</label>
        <span class="mdl-textfield__error">Invalid Category</span>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{$errors->has('search-mark') ? 'is-invalid' : '' }}">
        @includeWhen($errors->has('search-mark'), 'partials.__invalid_feedback', ['feedback' => $errors->first('search-mark')])
        <select class="mdl-textfield__input" name="search-mark" id="search-mark">
            <option value=""></option>
            @foreach($marks as $mark)
                <option value="{{ $mark->name }}" {{ $mark->name ==  request()->input('search-mark') ? 'selected' : ''}}>{{$mark->name}}</option>
            @endforeach
        </select>
        <label class="mdl-textfield__label" for="search-mark">{{__('Select Mark')}}</label>
        <span class="mdl-textfield__error">Invalid Mark</span>
    </div>
       <p class="text-center"></p>
    <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" >
        {{__('Search')}}
    </button>
