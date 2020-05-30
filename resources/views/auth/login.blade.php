
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/sweetalert2.css">
    <link rel="stylesheet" href="css/material.min.css">
    <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="//ajax.google apis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="js/material.min.js" ></script>
    <script src="js/sweetalert2.min.js" ></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js" ></script>
    <script src="js/main.js" ></script>
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












