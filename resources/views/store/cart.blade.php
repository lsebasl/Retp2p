@extends('store.layout.layout')
@section('content')

<html>
<head>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--fonts-->
    <link href='//fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'><!--//fonts-->
    <!-- start menu -->
    <link href="{{ mix('/css/checkout/all.css') }}" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="{{ mix('js/admin/all.js') }}"></script>
    <script>$(document).ready(function(){$(".memenu").memenu();});</script>
    <script src="{{ mix('/js/checkout/all.js') }}"> </script>
</head>
<body>

<!-- grow -->
<div class="container">
    <div class="check">
        <h1>My Shopping Bag (2)</h1>
        <div class="col-md-9 cart-items">

            <script>$(document).ready(function(c) {
                    $('.close1').on('click', function(c){
                        $('.cart-header').fadeOut('slow', function(c){
                            $('.cart-header').remove();
                        });
                    });
                });
            </script>
            @foreach($carts as $item)
            <div class="cart-header">
                <div class="close1"> </div>
                <div class="cart-sec simpleCart_shelfItem">
                    <div class="cart-item cyc">
                        <img src="" class="img-responsive" alt=""/>
                    </div>
                    <div class="cart-item-info">
                        <h3><a href="#">{{$item->name}}(XS R034)</a><span>Mark No: </span></h3>
                        <ul class="qty">
                            <li><p>price {{$item->price}} : </p></li>
                            <li><p>Qty : {{$item->quantity}}</p></li>
                        </ul>

                        <div class="delivery">
                            <p>Service Charges : Rs.100.00</p>
                            <span>Delivered in 2-3 business days</span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            @endforeach
            <script>$(document).ready(function(c) {
                    $('.close2').on('click', function(c){
                        $('.cart-header2').fadeOut('slow', function(c){
                            $('.cart-header2').remove();
                        });
                    });
                });
            </script>
                 </div>
        <div class="col-md-3 cart-total">
            <a class="continue" href="#">Continue to basket</a>
            <div class="price-details">
                <h3>Price Details</h3>
                <span>Total</span>
                <span class="total1">6200.00</span>
                <span>Discount</span>
                <span class="total1">---</span>
                <span>Delivery Charges</span>
                <span class="total1">150.00</span>
                <div class="clearfix"></div>
            </div>
            <ul class="total_price">
                <li class="last_price"> <h4>TOTAL</h4></li>
                <li class="last_price"><span>6350.00</span></li>
                <div class="clearfix"> </div>
            </ul>


            <div class="clearfix"></div>
            <a class="order" href="#">Place Order</a>
            <div class="total-item">
                <h3>OPTIONS</h3>
                <h4>COUPONS</h4>
                <a class="cpns" href="#">Apply Coupons</a>
                <p><a href="#">Log In</a> to use accounts - linked coupons</p>
            </div>
        </div>

        <div class="clearfix"> </div>
    </div>
</div>


<!--//content-->
<
</body>
</html>

@stop
