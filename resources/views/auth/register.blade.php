<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('Register') }}</title>
    <link rel="stylesheet" href="{{ mix('/css/admin/all.css') }}">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="{{ mix('js/admin/all.js') }}"><\/script>')</script>
    <script src="{{ mix('js/admin/all.js') }}" ></script>
</head>
<body class="cover">
<div class="container-login">
    <p class="text-center" style="font-size: 80px;">
        <i class="zmdi zmdi-account-circle"></i>
    </p>
    <p class="text-center text-condensedLight">{{ __('Sign up your Account') }}</p>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus >
            @includeWhen($errors->has('name'), 'partials.__invalid_feedback', ['feedback' => $errors->first('name')])
            <label class="mdl-textfield__label" for="name">{{ __('Name') }}</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input @error('last_name') is-invalid @enderror" type="text" id="last_name" name="last_name" value="{{ old('last_name') }}"  autocomplete="last_name" autofocus>
            @includeWhen($errors->has('identification'), 'partials.__invalid_feedback', ['feedback' => $errors->first('last_name')])
            <label class="mdl-textfield__label" for="last_name">{{ __('Last Name') }}</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <select class="mdl-textfield__input" name="id_type" id="id_type">
                <option value="" disabled="" selected></option>
                <option value="Card ID">{{__('Card ID')}}</option>
                <option value="Foreign ID">{{__('Foreign ID')}}</option>
                <option value="Passport">{{__('Passport')}}</option>
                <option value="NIT">{{__('NIT')}}</option>
            </select>
            @includeWhen($errors->has('id_type'), 'partials.__invalid_feedback', ['feedback' => $errors->first('id_type')])
            <label class="mdl-textfield__label" for="id_type">{{ __('ID Type') }}</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input @error('identification') is-invalid @enderror" type="identification" id="identification" name="identification" value="{{ old('identification') }}"  autocomplete="identification" autofocus>
            @includeWhen($errors->has('identification'), 'partials.__invalid_feedback', ['feedback' => $errors->first('identification')])
            <label class="mdl-textfield__label" for="identification">{{ __('Identification') }}</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input @error('phone') is-invalid @enderror" type="phone" id="phone" name="phone" value="{{ old('phone') }}"  autocomplete="phone" autofocus>
            @includeWhen($errors->has('phone'), 'partials.__invalid_feedback', ['feedback' => $errors->first('phone')])
            <label class="mdl-textfield__label" for="phone">{{ __('Phone') }}</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input @error('address') is-invalid @enderror" type="text" id="address" name="address" value="{{ old('address') }}"  autocomplete="address" autofocus >
            @includeWhen($errors->has('address'), 'partials.__invalid_feedback', ['feedback' =>     $errors->first('address')])
            <label class="mdl-textfield__label" for="address">{{ __('Address') }}</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input @error('email') is-invalid @enderror" type="email" id="email" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>
            @includeWhen($errors->has('email'), 'partials.__invalid_feedback', ['feedback' => $errors->first('email')])
            <label class="mdl-textfield__label" for="email">{{ __('E-Mail Address') }}</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input @error('password') is-invalid @enderror" type="password" id="password" name="password"  autocomplete="new-password">
            <label class="mdl-textfield__label" for="password">{{ __('Password') }}</label>
            @includeWhen($errors->has('password'), 'partials.__invalid_feedback', ['feedback' => $errors->first('password')])
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input @error('password_confirmation') is-invalid @enderror" type="password" id="password-confirm" name="password_confirmation"  autocomplete="new-password">
            <label class="mdl-textfield__label" for="password_confirmation">{{ __('Password Confirm') }}</label>
            @includeWhen($errors->has('password_confirmation'), 'partials.__invalid_feedback', ['feedback' => $errors->first('password_confirmation')])
        </div>

        <button id="SignUp" class="mdl-button mdl-js-button mdl-js-ripple-effect" style="color: #3F51B5; float:right;">
            {{ __('Sign Up') }} <i class="zmdi zmdi-mail-send"></i>
        </button>
    </form>
</div>
</body>
</html>

{{--resgister--para borrar}}

                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>--}}

