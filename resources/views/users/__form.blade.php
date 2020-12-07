<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input {{$errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"  id="name" value="{{ old('name', $user->name)}}" required>
    @includeWhen($errors->has('name'), 'partials.__invalid_feedback', ['feedback' => $errors->first('name')])
    <label class="mdl-textfield__label" for="name">{{__('Name')}}</label>
    <span class="mdl-textfield__error">Invalid name</span>
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input {{$errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name"  id="last_name" value="{{ old('last_name', $user->last_name)}}" required>
    @includeWhen($errors->has('last_name'), 'partials.__invalid_feedback', ['feedback' => $errors->first('last_name')])
    <label class="mdl-textfield__label" for="last_name">{{__('Last Name')}}</label>
    <span class="mdl-textfield__error">Invalid last name</span>
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <select class="mdl-textfield__input" name="id_type" id="id_type" required>
            <option value=""></option>
        <option value="Foreign ID" {{ old('id_type',$user->id_type)=='Foreign ID' ? 'selected' : '' }}>{{__('Foreign ID')}}</option>
        <option value="Card ID" {{ old('id_type',$user->id_type)=='Card ID' ? 'selected' : '' }}>{{__('Card ID')}}</option>
        <option value="Passport" {{ old('id_type',$user->id_type)=='Passport' ? 'selected' : '' }}>{{__('Passport')}}</option>
        <option value="NIT" {{ old('id_type',$user->id_type)=='NIT' ? 'selected' : '' }}>{{__('NIT')}}
    </select>
    <label class="mdl-textfield__label" for="id_type">{{__('Select Id Type')}}</label>
    <span class="mdl-textfield__error">Invalid Id Type</span>
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input {{$errors->has('identification') ? 'is-invalid' : ''}}" type="text" name="identification" id="identification" value="{{ old('identification', $user->identification)}}" required>
    <label class="mdl-textfield__label" for="identification">{{__('Identification')}}</label>
    <span class="mdl-textfield__error">Invalid Identification</span>
    @includeWhen($errors->has('identification'),'partials.__invalid_feedback', ['feedback' => $errors->first('identification')])
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input {{$errors->has('phone') ? 'is-invalid' : ''}}" type="number" name="phone"  id="phone" value="{{ old('phone', $user->phone)}}" required>
    <label class="mdl-textfield__label" for="phone">{{__('Phone')}}</label>
    <span class="mdl-textfield__error">Invalid phone number</span>
    @includeWhen($errors->has('phone'),'partials.__invalid_feedback', ['feedback' => $errors->first('phone')])
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input {{$errors->has('email') ? "is-invalid" : ''}}" name="email" type="email" id="email" value="{{ old('email', $user->email)}}"required>
    <label class="mdl-textfield__label" for="emailClient">{{__('E-mail')}}</label>
    <span class="mdl-textfield__error">email</span>
    @includeWhen($errors->has('email'),'partials.__invalid_feedback', ['feedback' => $errors->first('email')])
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input {{$errors->has('address') ? 'is-invalid' : ''}}" name="address" type="text" id="address" value="{{ old('address', $user->address)}}">
    <label class="mdl-textfield__label" for="address">{{__('Address')}}</label>
    <span class="mdl-textfield__error">Invalid address</span>
    @includeWhen($errors->has('address'),'partials.__invalid_feedback', ['feedback' => $errors->first('address')])
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <select class="mdl-textfield__input" name="status" id="status" required>
        <option value="" ></option>
        <option value="Enable" {{ old('status',$user->status)=='Enable' ? 'selected' : '' }}>{{__('Enable')}}</option>
        <option value="Disable" {{ old('status',$user->status)=='Disable' ? 'selected' : '' }}>{{__('Disable')}}</option>
    </select>
    <label class="mdl-textfield__label" for="status">{{__('User Status')}}</label>
    <span class="mdl-textfield__error">Invalid status</span>
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <select class="mdl-textfield__input" name="role" id="role" required>
        <option value="" ></option>
        @foreach($roles as $role)
            <option value="{{$role->id}}" @if($role->name === old('role',$user->roles[0]->name) )selected @endif>{{$role->name}}</option>
        @endforeach
    </select>
    <label class="mdl-textfield__label" for="role">{{__('User Role')}}</label>
    <span class="mdl-textfield__error">Invalid role</span>
</div>

