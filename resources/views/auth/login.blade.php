
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('Login') }}</title>
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
    <p class="text-center text-condensedLight">Sign in with your Account</p>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input @error('email') is-invalid @enderror" type="email" id="email" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>
            @includeWhen($errors->has('email'), 'partials.__invalid_feedback', ['feedback' => $errors->first('email')])
            <label class="mdl-textfield__label" for="email">{{ __('E-Mail Address') }}</label>
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input @error('password') is-invalid @enderror" type="password" id="password" name="password"  autocomplete="current-password">
            <label class="mdl-textfield__label" for="password">{{ __('Password') }}</label>
            @includeWhen($errors->has('password'), 'partials.__invalid_feedback', ['feedback' => $errors->first('password')])
        </div>

        <button id="SingIn" class="mdl-button mdl-js-button mdl-js-ripple-effect" style="color: #3F51B5; float:right;">
            Sign in <i class="zmdi zmdi-mail-send"></i>
        </button>
        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}" style="color: #3F51B5; text-decoration-line: none" >
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
    </form>
</div>
</body>
</html>












