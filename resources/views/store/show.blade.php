@extends('store.layout.layout')
@section('content')

    <!-- banner -->
    <div class="banner banner10">
        <div class="container">
            <h2>Single Page</h2>
        </div>
    </div>
    <!-- //banner -->
    <!-- breadcrumbs -->
    <div class="breadcrumb_dress">
        <div class="container">
            <ul>
                <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
                <li>Single Page</li>
            </ul>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- single -->
    <div class="single">
        <div class="container">
            <div class="col-md-4 single-left">
                <div class="flexslider">
                    <ul class="slides">
                        <li data-thumb="images/a.jpg">
                            <div class="thumb-image"> <img src="images/a.jpg" data-imagezoom="true" class="img-responsive" alt=""> </div>
                        </li>
                        <li data-thumb="images/b.jpg">
                            <div class="thumb-image"> <img src="images/b.jpg" data-imagezoom="true" class="img-responsive" alt=""> </div>
                        </li>
                        <li data-thumb="images/c.jpg">
                            <div class="thumb-image"> <img src="images/c.jpg" data-imagezoom="true" class="img-responsive" alt=""> </div>
                        </li>
                    </ul>
                </div>
                <!-- flexslider -->
                <script defer src="js/jquery.flexslider.js"></script>
                <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
                <script>
                    // Can also be used with $(document).ready()
                    $(window).load(function() {
                        $('.flexslider').flexslider({
                            animation: "slide",
                            controlNav: "thumbnails"
                        });
                    });
                </script>
                <!-- flexslider -->
                <!-- zooming-effect -->
                <script src="js/imagezoom.js"></script>
                <!-- //zooming-effect -->
            </div>
            <div class="col-md-8 single-right">
                <h3>{{$product->name}}</h3>
                <div class="rating1">
					<span class="starRating">
						<input id="rating5" type="radio" name="rating" value="5">
						<label for="rating5">5</label>
						<input id="rating4" type="radio" name="rating" value="4">
						<label for="rating4">4</label>
						<input id="rating3" type="radio" name="rating" value="3" checked>
						<label for="rating3">3</label>
						<input id="rating2" type="radio" name="rating" value="2">
						<label for="rating2">2</label>
						<input id="rating1" type="radio" name="rating" value="1">
						<label for="rating1">1</label>
					</span>
                </div>
                <div class="description">
                    <h5><i>Description</i></h5>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                        eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.
                        Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut
                        odit aut fugit, sed quia consequuntur magni dolores eos qui
                        ratione voluptatem sequi nesciunt.</p>
                </div>
                <div class="color-quality">
                    <div class="color-quality-left">
                        <h5>Color : </h5>
                        <ul>
                            <li><a href="#"><span></span></a></li>
                            <li><a href="#" class="brown"><span></span></a></li>
                            <li><a href="#" class="purple"><span></span></a></li>
                            <li><a href="#" class="gray"><span></span></a></li>
                        </ul>
                    </div>
                    <div class="color-quality-right">
                        <h5>Quality :</h5>
                        <div class="quantity">
                            <div class="quantity-select">
                                <div class="entry value-minus1">&nbsp;</div>
                                <div class="entry value1"><span>1</span></div>
                                <div class="entry value-plus1 active">&nbsp;</div>
                            </div>
                        </div>
                        <!--quantity-->
                        <script>
                            $('.value-plus1').on('click', function(){
                                var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)+1;
                                divUpd.text(newVal);
                            });

                            $('.value-minus1').on('click', function(){
                                var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)-1;
                                if(newVal>=1) divUpd.text(newVal);
                            });
                        </script>
                        <!--quantity-->

                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="occasional">
                    <h5>RAM :</h5>
                    <div class="colr ert">
                        <div class="check">
                            <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>3 GB</label>
                        </div>
                    </div>
                    <div class="colr">
                        <div class="check">
                            <label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>2 GB</label>
                        </div>
                    </div>
                    <div class="colr">
                        <div class="check">
                            <label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>1 GB</label>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="simpleCart_shelfItem">
                    <p><span>$460</span> <i class="item_price">$450</i></p>
                    <form action="#" method="post">
                        <input type="hidden" name="cmd" value="_cart">
                        <input type="hidden" name="add" value="1">
                        <input type="hidden" name="w3ls_item" value="Smart Phone">
                        <input type="hidden" name="amount" value="450.00">
                        <button type="submit" class="w3ls-cart">Add to cart</button>
                    </form>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>



    <!-- cart-js -->
    <script src="js/minicart.js"></script>
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
    </html>
@stop
