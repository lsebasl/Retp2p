<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('Verify') }}</title>
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
    <p class="text-center text-condensedLight">Sign up your Account</p>
    <div method="POST" action=VERIFY style= "text-align:center">
        @csrf
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <a class="mdl-textfield" for="email">{{ __('Verify Your Email Address') }}</a>
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif
            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email,') }}
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" style="position: initial;margin-top: 30px; " class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">{{ __('click here to request another')}}</button>
            </form>
        </div>

    </div>
</div>
</body>
</html>

{{--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},

                  <form class="d-inline" method="POST" action="">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>--}}

