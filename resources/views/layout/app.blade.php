<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="{{ mix('/css/admin/all.css') }}">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="{{ mix('js/admin/all.js') }}"><\/script>')</script>
    <script src="{{ mix('js/admin/all.js') }}" ></script>

</head>
<body>
<!-- Notifications area -->
<section class="full-width container-notifications">
    <div class="full-width container-notifications-bg btn-Notification"></div>
    <section class="NotificationArea">
        <div class="full-width text-center NotificationArea-title tittles">Notifications <i class="zmdi zmdi-close btn-Notification"></i></div>
        <a href="#" class="Notification" id="notifation-unread-1">
            <div class="Notification-icon"><i class="zmdi zmdi-accounts-alt bg-info"></i></div>
            <div class="Notification-text">
                <p>
                    <i class="zmdi zmdi-circle"></i>
                    <strong>New User Registration</strong>
                    <br>
                    <small>Just Now</small>
                </p>
            </div>
            <div class="mdl-tooltip mdl-tooltip--left" for="notifation-unread-1">Notification as UnRead</div>
        </a>
        <a href="#" class="Notification" id="notifation-read-1">
            <div class="Notification-icon"><i class="zmdi zmdi-cloud-download bg-primary"></i></div>
            <div class="Notification-text">
                <p>
                    <i class="zmdi zmdi-circle-o"></i>
                    <strong>New Updates</strong>
                    <br>
                    <small>30 Mins Ago</small>
                </p>
            </div>
            <div class="mdl-tooltip mdl-tooltip--left" for="notifation-read-1">Notification as Read</div>
        </a>
        <a href="#" class="Notification" id="notifation-unread-2">
            <div class="Notification-icon"><i class="zmdi zmdi-upload bg-success"></i></div>
            <div class="Notification-text">
                <p>
                    <i class="zmdi zmdi-circle"></i>
                    <strong>Archive uploaded</strong>
                    <br>
                    <small>31 Mins Ago</small>
                </p>
            </div>
            <div class="mdl-tooltip mdl-tooltip--left" for="notifation-unread-2">Notification as UnRead</div>
        </a>
        <a href="#" class="Notification" id="notifation-read-2">
            <div class="Notification-icon"><i class="zmdi zmdi-mail-send bg-danger"></i></div>
            <div class="Notification-text">
                <p>
                    <i class="zmdi zmdi-circle-o"></i>
                    <strong>New Mail</strong>
                    <br>
                    <small>37 Mins Ago</small>
                </p>
            </div>
            <div class="mdl-tooltip mdl-tooltip--left" for="notifation-read-2">Notification as Read</div>
        </a>
        <a href="#" class="Notification" id="notifation-read-3">
            <div class="Notification-icon"><i class="zmdi zmdi-folder bg-primary"></i></div>
            <div class="Notification-text">
                <p>
                    <i class="zmdi zmdi-circle-o"></i>
                    <strong>Folder delete</strong>
                    <br>
                    <small>1 hours Ago</small>
                </p>
            </div>
            <div class="mdl-tooltip mdl-tooltip--left" for="notifation-read-3">Notification as Read</div>
        </a>
    </section>
</section>
<!-- navBar -->

<div class="full-width navBar">
    <div class="full-width navBar-options">
        <i class="zmdi zmdi-more-vert btn-menu" id="btn-menu"></i>
        <div class="mdl-tooltip" for="btn-menu">Menu</div>
        <nav class="navBar-options-list">
            <ul class="list-unstyle">
                <li class="btn-Notification" id="notifications">
                    <i class="zmdi zmdi-notifications"></i>
                    <!-- <i class="zmdi zmdi-notifications-active btn-Notification" id="notifications"></i> -->
                    <div class="mdl-tooltip" for="notifications">Notifications</div>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <a class="dropdown-item" href="{{ route('logout') }}" style="color: white; text-decoration-line: none"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                        <i class="zmdi zmdi-power"></i>

                @endguest

                <li class="text-condensedLight noLink" ><small> {{ ucfirst(Auth::user()->name) }}</small></li>
                <li class="noLink">
                    <figure>
                        <img src="{{ asset('assets/img/avatar-male.png') }}" alt="Avatar" class="img-responsive">
                    </figure>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- navLateral -->
<section class="full-width navLateral">
    <div class="full-width navLateral-bg btn-menu"></div>
    <div class="full-width navLateral-body">
        <div class="full-width navLateral-body-logo text-center tittles">
            <i class="zmdi zmdi-close btn-menu"></i> Project Store
        </div>
        <figure class="full-width" style="height: 77px;">
            <div class="navLateral-body-cl">
                <img src="{{ asset('assets/img/avatar-male.png') }}" alt="Avatar" class="img-responsive">
            </div>
            <figcaption class="navLateral-body-cr hide-on-tablet">
					<span>
						Full Name Admin<br>
						<small>Admin</small>
					</span>
            </figcaption>
        </figure>

        <div class="full-width tittles navLateral-body-tittle-menu">
            <i class="zmdi zmdi-desktop-mac"></i><span class="hide-on-tablet">&nbsp; DASHBOARD</span>
        </div>
        <nav class="full-width">
            <ul class="full-width list-unstyle menu-principal">
                <li class="full-width">
                    <a href="home   " class="full-width">
                        <div class="navLateral-body-cl">
                            <i class="zmdi zmdi-view-dashboard"></i>
                        </div>
                        <div class="navLateral-body-cr hide-on-tablet">
                            HOME
                        </div>
                    </a>
                </li>
                <li class="full-width divider-menu-h"></li>
                <li class="full-width">
                    <a href="#!" class="full-width btn-subMenu">
                        <div class="navLateral-body-cl">
                            <i class="zmdi zmdi-account"></i>
                        </div>
                        <div class="navLateral-body-cr hide-on-tablet">
                            {{__('USERS')}}
                        </div>
                        <span class="zmdi zmdi-chevron-left"></span>
                    </a>
                    <ul class="full-width menu-principal sub-menu-options">
                        <li class="full-width">
                            <a  href="{{ route('users.index') }}" class="full-width">
                                <div class="navLateral-body-cl">
                                    <i class="zmdi zmdi-accounts"></i>
                                </div>
                                <div class="navLateral-body-cr hide-on-tablet">
                                    {{__('User List')}}
                                </div>
                            </a>
                        </li>
                        <li class="full-width">
                            <a href="{{ route('users.create') }}" class="full-width">
                                <div class="navLateral-body-cl">
                                    <i class="zmdi zmdi-account"></i>
                                </div>
                                <div class="navLateral-body-cr hide-on-tablet">
                                    {{__('Create New User')}}
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="full-width divider-menu-h"></li>
                <li class="full-width">
                    <a href="#!" class="full-width btn-subMenu">
                        <div class="navLateral-body-cl">
                            <i class="zmdi zmdi-face"></i>
                        </div>
                        <div class="navLateral-body-cr hide-on-tablet">
                            {{__('CLIENTS')}}
                        </div>
                        <span class="zmdi zmdi-chevron-left"></span>
                    </a>
                    <ul class="full-width menu-principal sub-menu-options">
                        <li class="full-width">
                            <a  href="{{ route('clients.index') }}" class="full-width">
                                <div class="navLateral-body-cl">
                                    <i class="zmdi zmdi-accounts"></i>
                                </div>
                                <div class="navLateral-body-cr hide-on-tablet">
                                    {{__('Client List')}}
                                </div>
                            </a>
                        </li>
                        <li class="full-width">
                            <a href="{{ route('clients.index') }}" class="full-width">
                                <div class="navLateral-body-cl">
                                    <i class="zmdi zmdi-account"></i>
                                </div>
                                <div class="navLateral-body-cr hide-on-tablet">
                                    {{__('Create New Client')}}
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="full-width divider-menu-h"></li>
                <li class="full-width">
                    <a href="#!" class="full-width btn-subMenu">
                        <div class="navLateral-body-cl">
                            <i class="zmdi zmdi-toys"></i>
                        </div>
                        <div class="navLateral-body-cr hide-on-tablet">
                            {{__('PRODUCTS')}}
                        </div>
                        <span class="zmdi zmdi-chevron-left"></span>
                    </a>
                    <ul class="full-width menu-principal sub-menu-options">
                        <li class="full-width">
                            <a href="{{ route('products.index') }}" class="full-width">
                                <div class="navLateral-body-cl">
                                    <i class="zmdi zmdi-accounts-list"></i>
                                </div>
                                <div class="navLateral-body-cr hide-on-tablet">
                                    {{__('Product List')}}
                                </div>
                            </a>
                        </li>
                        <li class="full-width">
                            <a href="{{route("products.create")}}" class="full-width">
                                <div class="navLateral-body-cl">
                                    <i class="zmdi zmdi-plus"></i>
                                </div>
                                <div class="navLateral-body-cr hide-on-tablet">
                                    {{__('Create New Product')}}
                                </div>
                            </a>
                        </li>
                    </ul>
                <li class="full-width divider-menu-h"></li>
                <li class="full-width">
                    <a href="#!" class="full-width btn-subMenu">
                        <div class="navLateral-body-cl">
                            <i class="zmdi zmdi-receipt"></i>
                        </div>
                        <div class="navLateral-body-cr hide-on-tablet">
                            {{__('INVOICES')}}
                        </div>
                        <span class="zmdi zmdi-chevron-left"></span>
                    </a>
                    <ul class="full-width menu-principal sub-menu-options">
                        <li class="full-width">
                            <a href="{{route('invoices.index')}}" class="full-width">
                                <div class="navLateral-body-cl">
                                    <i class="zmdi zmdi-view-list"></i>
                                </div>
                                <div class="navLateral-body-cr hide-on-tablet">
                                    {{__('Invoice List')}}
                                </div>
                            </a>
                        </li>
                        <li class="full-width">
                            <a href="providers.html" class="full-width">
                                <div class="navLateral-body-cl">
                                    <i class="zmdi zmdi-plus"></i>
                                </div>
                                <div class="navLateral-body-cr hide-on-tablet">
                                    {{__('Create New Invoice')}}
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="full-width divider-menu-h"></li>
                <li class="full-width">
                    <a href="{{ route('stocks.index') }}" class="full-width">
                        <div class="navLateral-body-cl">
                            <i class="zmdi zmdi-store"></i>
                        </div>
                        <div class="navLateral-body-cr hide-on-tablet">
                            {{__('INVENTORY')}}
                        </div>
                    </a>
                </li>
                <li class="full-width divider-menu-h"></li>
                <li class="full-width">
                    <a href="sales.html" class="full-width">
                        <div class="navLateral-body-cl">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div>
                        <div class="navLateral-body-cr hide-on-tablet">
                            SALES
                        </div>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</section>

<!-- pageContent -->
<section class="full-width pageContent">
    <section class="full-width text-center" style="padding: 5px 0;">
    @yield('content')
    </section>
</section>
</body>
</html>
