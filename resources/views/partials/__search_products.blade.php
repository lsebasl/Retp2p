<form method=Get action="{{ route('products.index')}}">
    <div class="mdl-grid">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable {{$errors->has('search-name') ? 'is-invalid' : '' }}">
            <label class="mdl-button mdl-js-button mdl-button--icon " for="search-name">
                <i class="zmdi zmdi-search"></i>
            </label>
            <div class="mdl-textfield__expandable-holder ">
                <input class="mdl-textfield__input " type="text" id="search-name" name="search-name" value="{{ request()->input('search-name')}}" placeholder="Name...">
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
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{$errors->has('search-category') ? 'is-invalid' : '' }}">
            @includeWhen($errors->has('search-category'), 'partials.__invalid_feedback', ['feedback' => $errors->first('search-category')])
            <select class="mdl-textfield__input" name="search-category" id="search-category">
                <option value=""></option>
                @foreach($categories as $category)
                    <option value="{{ $category->name }}" @if($category->name === request()->input('search-category')) selected @endif>{{$category->name}}</option>
                @endforeach
            </select>
            <label class="mdl-textfield__label" for="category">{{__('Select Category')}}</label>
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


