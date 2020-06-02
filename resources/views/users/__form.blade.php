<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input {{$errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="name" value="{{ old('name', $user->name)}}">
    @includeWhen($errors->has('name'), 'partials.__invalid_feedback', ['feedback' => $errors->first('name')])
    <label class="mdl-textfield__label" for="name">{{__('Name')}}</label>
    <span class="mdl-textfield__error">Invalid name</span>
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input {{$errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="last_name" value="{{ old('last_name', $user->last_name)}}" >
    @includeWhen($errors->has('last_name'), 'partials.__invalid_feedback', ['feedback' => $errors->first('last_name')])
    <label class="mdl-textfield__label" for="last_name">{{__('Last Name')}}</label>
    <span class="mdl-textfield__error">Invalid last name</span>
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">-
    <select class="mdl-textfield__input" name="id_type" id="id_type">
        <option value="{{ old('id_type', $user->id_type)}}" disabled="" selected></option>
        <option value="Card ID">{{__('Card ID')}}</option>
        <option value="Foreign ID">{{__('Foreign ID')}}</option>
        <option value="Passport">{{__('Passport')}}</option>
        <option value="NIT">{{__('NIT')}}</option>
    </select>
    <label class="mdl-textfield__label" for="id_type">{{__('Select Id Type')}}</label>
    <span class="mdl-textfield__error">Invalid Id Type</span>
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input {{$errors->has('identification') ? 'is-invalid' : ''}}" type="text" name="identification" pattern="-?[0-9]*(\.[0-9]+)?" id="identification" value="{{ old('identification', $user->identification)}}" >
    <label class="mdl-textfield__label" for="identification">{{__('Identification')}}</label>
    <span class="mdl-textfield__error">Invalid Identification</span>
    @includeWhen($errors->has('identification'),'partials.__invalid_feedback', ['feedback' => $errors->first('identification')])
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input {{$errors->has('phone') ? 'is-invalid' : ''}}" type="number" name="phone" pattern="-?[0-9+()- ]*(\.[0-9]+)?" id="phone" value="{{ old('phone', $user->phone)}}">
    <label class="mdl-textfield__label" for="phone">{{__('Phone')}}</label>
    <span class="mdl-textfield__error">Invalid phone number</span>
    @includeWhen($errors->has('phone'),'partials.__invalid_feedback', ['feedback' => $errors->first('phone')])
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input {{$errors->has('email') ? "is-invalid" : ''}}" name="email" type="email" id="email" value="{{ old('email', $user->email)}}">
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
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">-
    <select class="mdl-textfield__input" name="user_status" id="user_status" value="{{ old('user_status', $user->user_status)}}">
        <option value="" disabled="" selected></option>
        <option value="Card ID">{{__('Enable')}}</option>
        <option value="Foreign ID">{{__('Disable')}}</option>
    </select>
    <label class="mdl-textfield__label" for="id_type">{{__('User Status')}}</label>
    <span class="mdl-textfield__error">Invalid Id Type</span>
</div>

