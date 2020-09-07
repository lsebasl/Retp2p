<!DOCTYPE html>
<html lang="en">
<head>
    <title>Project Store a Ecommerce Online Shopping </title>
    <!-- Custom Theme files -->
    <link href="{{ mix('css/store/all.css') }}" rel="stylesheet" type="text/css" media="all" />

    <!-- //font-awesome icons -->
    <!-- js -->
    <script src="{{ mix('js/store/all.js') }}" ></script>
    <!-- //js -->
    <!-- web fonts -->
    <link href='//fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <!-- //web fonts -->
    <!-- start-smooth-scrolling -->
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>
    <!-- //end-smooth-scrolling -->
</head>
<body>
<!-- header modal -->
<div class="modal fade" id="myModal88" tabindex="-1" role="dialog" aria-labelledby="myModal88"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;</button>
                <h4 class="modal-title" id="myModalLabel">Login or Register</h4>
            </div>
            <div class="modal-body modal-body-sub">
                <div class="row">
                    <div class="col-md-8 modal_body_left modal_body_left1" style="border-right: 1px dotted #C2C2C2;padding-right:3em;">
                        <div class="sap_tabs">
                            <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                                <ul>
                                    <p>
                                    <a href="{{ route('login') }}" class="resp-tab-item" aria-controls="tab_item-0"><span>Sign in</span></a>
                                    <a href="{{ route('register')}}" class="resp-tab-item" aria-controls="tab_item-1"><span>Sign up</span></a>
                                    </p>
                                </ul>
                            </div>
                        </div>
                        <script src="src={{ mix('js/store/all.js') }}" type="text/javascript"></script>
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('#horizontalTab').easyResponsiveTabs({
                                    type: 'default', //Types: default, vertical, accordion
                                    width: 'auto', //auto or any width like 600px
                                    fit: true   // 100% fit in a container
                                });
                            });
                        </script>
                    </div>
                    <div class="col-md-4 modal_body_right modal_body_right1">
                        <div class="row text-center sign-with">
                            <div class="col-md-12">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="cart cart box_1">
    <form action="{{route('cart.show')}}" method="GET" class="last">
        <input type="hidden" name="cmd" value="_cart" />
        <input type="hidden" name="display" value="1" />
        <button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
    </form>
</div>
<!-- header -->
@guest()
    <div class="top-right links" style="">
        <div class="header" id="home1">
            <div class="container">
                <div class="w3l_login">
                    <a href="#" data-toggle="modal" data-target="#myModal88" title="Login o Register"><span class="glyphicon glyphicon-user" aria-hidden="true"><h5>Login</h5></span></a>
                </div>
                <div class="w3l_logo">
                    <h1><a href="{{ route('home.store') }}">Project Store<span>Your project. Your story.</span></a></h1>
                </div>
          </div>
          @else
                <div class="container" id="home1">
                    <h2><small>Hola {{ ucfirst(Auth::user()->name) }}</small></h2>
                    <h5><small>your account is {{ ucfirst(Auth::user()->status) }}</small></h5>
                    <h5><small>It role is {{ ucfirst(Auth::user()->role) }}</small></h5>
                 <a class="header" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                  </form>
          </div>
              <div class="container">
                  <div class="w3l_logo">
                      <h1><a href="{{ route('login') }}">Project Store<span>Your project. Your story.</span></a></h1>
                  </div>
          </div>
      </div>
  </div>
    </div>

@endguest

<!-- //header -->
<!-- navigation -->
<div class="navigation">
    <div class="container">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header nav_2">
                <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('home.store') }}" class="act">Home</a></li>
                    <!-- Mega Menu -->

                    <li><a href="{{ route('goods.index') }}">Products</a></li>
                    <li><a href="{{ route('cart.show') }}">Checkout</a></li>
                    <li><a href="{{ route('store.about') }}">About Us</a></li>
                    <li class="w3pages"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('store.profile') }}">View Profile</a></li>
                            <li><a href="{{ route('payment.history') }}">payment history</a></li>
                            <li><a class="header" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

<!-- //navigation -->

@yield('content')

<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="w3_footer_grids">
            <div class="col-md-3 w3_footer_grid">
                <h3>Contact</h3>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
                <ul class="address">
                    <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>1234k Avenue, 4th block, <span>New York City.</span></li>
                    <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">info@example.com</a></li>
                    <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 567</li>
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>Information</h3>
                <ul class="info">
                    <li><a href="{{ route('store.about') }}">About Us</a></li>
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>Category</h3>
                <ul class="info">
                    @foreach($categories as $category)
                    <li><a href="{{ route('goods.category',$category->id) }}">{{$category->name}}</a></li>
                    @endforeach()
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>Profile</h3>
                <ul class="info">
                    <li><a href="index.html">View Profile</a></li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="footer-copy">
        <div class="footer-copy1">
            <div class="footer-copy-pos">
                <a href="#home1" class="scroll"><img src="{{ asset('store/images/arrow.png') }}" alt=" " class="img-responsive" /></a>
            </div>
        </div>
        <div class="container">
            <p>&copy; 2020 Project Store. All rights reserved</a></p>
        </div>
    </div>
</div>



<!-- //footer -->
<!-- cart-js -->
<script src="{{ mix('js/store/minicart.js') }}" ></script>
<script>
    w3ls.render();

    w3ls.cart.on('w3sb_checkout', function (evt) {
        var items, len, i;

        if (this.subtotal() > 0) {
            items = this.items();

            for (i = 0, len = items.length; i < len; i++) {
            }
        }
    });
</script>
<!-- //cart-js -->
</body>
</html><!DOCTYPE html>

