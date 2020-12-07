<form method=Get action="{{ route('users.index')}}">
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
        <label class="mdl-button mdl-js-button mdl-button--icon" for="name">
            <i class="zmdi zmdi-search"></i>
        </label>
        <div class="mdl-textfield__expandable-holder">
            <input class="mdl-textfield__input" type="text" id="name" name="name" value="{{ request()->input('name')}}" placeholder="Search...">
            <label class="mdl-textfield__label"></label>
        </div>
    </div>
</form>
