<!DOCTYPE html>
<html lang="en">
<head>
    <title>Project Store a Ecommerce Online Shopping Category </title>
    <!-- Custom Theme files -->
    <link href="{{ asset('store/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('store/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('store/css/fasthover.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('store/css/popuo-box.css') }}" rel="stylesheet" type="text/css" media="all" />
    <!-- //Custom Theme files -->
    <!-- font-awesome icons -->
    <link href="{{ asset('store/css/font-awesome.css') }}" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!-- js -->
    <script src="{{ asset('store/js/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('store/css/jquery.countdown.css')}}" /> <!-- countdown -->
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
<!-- for bootstrap working -->
<script type="text/javascript" src="{{ asset('store/js/bootstrap-3.1.1.min.js') }}"></script>
<!-- //for bootstrap working -->
<!-- header modal -->
<div class="modal fade" id="myModal88" tabindex="-1" role="dialog" aria-labelledby="myModal88"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;</button>
                <h4 class="modal-title" id="myModalLabel">Don't Wait, Login now!</h4>
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
                        <script src="{{ asset('store/js/easyResponsiveTabs.js')}}" type="text/javascript"></script>
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
<script>
    $('#myModal88').modal('show');
</script>
<!-- header modal -->
<!-- header -->
<div class="header" id="home1">
    <div class="container">
        <div class="w3l_login">
            <a href="#" data-toggle="modal" data-target="#myModal88"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
        </div>
        <div class="w3l_logo">
            <h1><a href="{{ route('login') }}">Project Store<span>Your project. Your story.</span></a></h1>
        </div>
        {{--<div class="search">
            <input class="search_box" type="checkbox" id="search_box">
            <label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
            <div class="search_form">
                <form action="#" method="post">
                    <input type="text" name="Search" placeholder="Search...">
                    <input type="submit" value="Send">
                </form>
            </div>
        </div>
        <div class="cart cart box_1">
            <form action="#" method="post" class="last">
                <input type="hidden" name="cmd" value="_cart" />
                <input type="hidden" name="display" value="1" />
                <button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
            </form>
        </div>--}}
    </div>
</div>
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
                    <li><a href="index.html" class="act">Home</a></li>
                    <!-- Mega Menu -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
                        <ul class="dropdown-menu multi-column columns-3">
                            <div class="row">
                                <div class="col-sm-3">
                                    <ul class="multi-column-dropdown">
                                        <h6>Mobiles</h6>
                                        <li><a href="products.html">Mobile Phones</a></li>
                                        <li><a href="products.html">Popular Models</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-3">
                                    <ul class="multi-column-dropdown">
                                        <h6>Computers</h6>
                                        <li><a href="products1.html">Laptop</a></li>
                                        <li><a href="products1.html">   Desktop</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-2">
                                    <ul class="multi-column-dropdown">
                                        <h6>Tv & Video</h6>
                                        <li><a href="products2.html">Tv & Video</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-2">
                                    <ul class="multi-column-dropdown">
                                        <h6>Accessories</h6>
                                        <li><a href="products2.html">Accesories</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-4">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </ul>
                    </li>
                    <li><a href="about.html">About Us</a></li>
                    <li class="w3pages"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="icons.html">View Profile</a></li>
                            <li><a href="codes.html">Update Profile</a></li>
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
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="mail.html">Contact Us</a></li>
                    <li><a href="products.html">Special Products</a></li>
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>Category</h3>
                <ul class="info">
                    <li><a href="products.html">Computers</a></li>
                    <li><a href="products1.html">Tv & Video</a></li>
                    <li><a href="products.html">Smartphones</a></li>
                    <li><a href="products1.html">Accessories</a></li>
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>Profile</h3>
                <ul class="info">
                    <li><a href="index.html">View Profile</a></li>
                    <li><a href="products.html">Update Profile</a></li>
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
<script src="{{ asset('store/js/minicart.js')}}"></script>
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
