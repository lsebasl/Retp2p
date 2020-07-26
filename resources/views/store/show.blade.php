@extends('store.layout.layout')
@section('content')

    <!-- banner -->
    <div class="banner banner10">
        <div class="container">
            <h2>{{$product->name}}</h2>
        </div>
    </div>
    <!-- //banner -->
    <!-- breadcrumbs -->
    <div class="breadcrumb_dress">
        <div class="container">
            <ul>
                <li><a href="{{route('home.store')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
                <li>{{$product->name}}</li>
            </ul>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- single -->
    <div class="single">
        <div class="container">
            <div class="col-md-4 single-left">

                <!-- zooming-effect -->
                @if($product->image)
                    <img src="/storage/{{$product->image}}" alt="product-image" class="img-responsive">
                @endif
                <script src="js/imagezoom.js"></script>
                <!-- //zooming-effect -->
            </div>
            <div class="col-md-8 single-right">
                <h3>{{$product->name}} {{$product->model}}</h3>
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
                    <p>{{$product->description}} {{$product->mark}} {{$product->model}}</p>
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
                        <h5>Units :</h5>
                        <div class="quantity">
                            <div class="quantity-select">
                                <div class="entry value-minus1">&nbsp;</div>
                                <div class="entry value1"><span>{{$product->units}}</span></div>
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

                <div class="simpleCart_shelfItem">
                    <p><span>{{$product->price}}</span> <i class="item_price">{{$product->price}}</i></p>
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
