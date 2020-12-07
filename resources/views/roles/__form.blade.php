<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--8-col-desktop">
    <input class="mdl-textfield__input {{$errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"  id="name" value="{{ old('name', $role->name)}}">
    @includeWhen($errors->has('name'), 'partials.__invalid_feedback', ['feedback' => $errors->first('name')])
    <label class="mdl-textfield__label" for="name">{{__('Roll Name')}}</label>
    <span class="mdl-textfield__error">Invalid name</span>
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--8-col-desktop">
    <input class="mdl-textfield__input {{$errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description"  id="description" value="{{ old('description', $role->description)}}" >
    @includeWhen($errors->has('description'), 'partials.__invalid_feedback', ['feedback' => $errors->first('description')])
    <label class="mdl-textfield__label" for="description">{{__('Description')}}</label>
    <span class="mdl-textfield__error">Invalid Description</span>
</div>
<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">

        <div class = "mdl-grid">
            <div class = "mdl-cell mdl-cell--4-col"><b>Roles</b></div>
            <div class = "mdl-cell mdl-cell--4-col"><b>Description</b></div>
        </div>
        <div class = "mdl-grid">

        @foreach($permissions as $permission)
            <div class = "mdl-cell mdl-cell--4-col">
                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                    <input {{$errors->has('permission') ? 'is-invalid' : '' }} type="checkbox" id="permission" name="permission[]" value="{{ old('permission', $permission->id) }}" class="mdl-checkbox__input"
                    @isset($role->id)

                        @if($role->permissions->contains($permission->id))  checked = checked @endif
                    @endisset()>
                    <span class="mdl-checkbox__label">{{$permission->name}}</span>
                </label>
            </div>
            <div class = "mdl-cell mdl-cell--6-col">{{$permission->description}}</div>
                @includeWhen($errors->has('permission'), 'partials.__invalid_feedback', ['feedback' => $errors->first('permission')])
        @endforeach
        </div>
    </div>


