<form method=Get action="{{ route('products.index')}}">
    <div class="mdl-grid">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
                <i class="zmdi zmdi-search"></i>
            </label>
            <div class="mdl-textfield__expandable-holder">
                <input class="mdl-textfield__input" type="text" id="search" name="search" value="{{ request()->input('search')}}" placeholder="Name...">
                <label class="mdl-textfield__label"></label>
            </div>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <select class="mdl-textfield__input" name="search-status" id="search-status">
                <option value=""></option>
                <option value="Enable" {{'Enable' == request()->input('search-status') ? 'selected' : ''}}>{{__('Enable')}}</option>
                <option value="Disable" {{'Disable' == request()->input('search-status') ? 'selected' : ''}}>{{__('Disable')}}</option>
            </select>
            <label class="mdl-textfield__label" for="category">{{__('Select Status')}}</label>
            <span class="mdl-textfield__error">Invalid Category</span>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <select class="mdl-textfield__input" name="search-category" id="search-category">
                <option value=""></option>
                <option value="Mobile" {{'Mobile' == request()->input('search-category') ? 'selected' : ''}}>{{__('Mobile')}}</option>
                <option value="Computers" {{'Computers' == request()->input('search-category') ? 'selected' : ''}}>{{__('Computers')}}</option>
                <option value="Tv & Video" {{'Tv & Video' == request()->input('search-category') ? 'selected' : ''}}>{{__('Tv & Video')}}</option>
                <option value="Accessories" {{'Accessories' == request()->input('search-category') ? 'selected' : ''}}>{{__('Accessories')}}</option>
            </select>
            <label class="mdl-textfield__label" for="category">{{__('Select Category')}}</label>
            <span class="mdl-textfield__error">Invalid Category</span>
        </div>
        <p class="text-center"></p>
        <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
            {{__('Search')}}
        </button>
        &nbsp
</form>
<form>
    <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" href="{{route('products.index')}}">
        {{__('Clear')}}
    </button>
</form>
