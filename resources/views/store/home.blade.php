@extends('store.layout.layout')
@section('content')

<!-- banner - style.css 488-->
<div class="banner">
    <!-- banner - style.css 549-->
    <div class="container">
        <h3>Project Store, <span>Special Offers</span></h3>
    </div>
</div>
<!-- banner-bottom - style.ccs 566 -->
<div class="banner-bottom">
    <div class="container">
        <div class="col-md-5 wthree_banner_bottom_left">
            <!-- video-imh - style.ccs 575 -->
            <div class="video-img">
            </div>
        </div>
        <!-- banner categories - style.ccs 631 -->
        <div class="col-md-7 wthree_banner_bottom_right">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home">Mobiles</a></li>
                    <li role="presentation"><a href="#audio" role="tab" id="audio-tab" data-toggle="tab" aria-controls="audio">Tv & Video</a></li>
                    <li role="presentation"><a href="#video" role="tab" id="video-tab" data-toggle="tab" aria-controls="video">Computer</a></li>
                        <li role="presentation"><a href="#tv" role="tab" id="tv-tab" data-toggle="tab" aria-controls="tv">Accessories</a></li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <!-- MOBILES 1 2 3-->
                    <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
                        <div class="agile_ecommerce_tabs">
                            <div class="col-md-4 agile_ecommerce_tab_left">
                                <div class="">
                                    <img src="{{ asset('store/images/3.jpg')}}" alt=" " class="img-responsive" />
                                </div>
                                <h5><a href="single.html">Mobile Phone1</a></h5>
                                <div class="simpleCart_shelfItem">
                                    <p><span>$380</span> <i class="item_price">$350</i></p>
                                    <form action="#" method="post">
                                        <input type="hidden" name="cmd" value="_cart" />
                                        <input type="hidden" name="add" value="1" />
                                        <input type="hidden" name="w3ls_item" value="Mobile Phone1" />
                                        <input type="hidden" name="amount" value="350.00" />
                                        <button type="submit" class="w3ls-cart">Add to cart</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4 agile_ecommerce_tab_left">
                                <div class="">
                                    <img src="{{ asset('store/images/4.jpg')}}" alt=" " class="img-responsive" />
                                </div>
                                <h5><a href="single.html">Mobile Phone2</a></h5>
                                <div class="simpleCart_shelfItem">
                                    <p><span>$330</span> <i class="item_price">$302</i></p>
                                    <form action="#" method="post">
                                        <input type="hidden" name="cmd" value="_cart" />
                                        <input type="hidden" name="add" value="1" />
                                        <input type="hidden" name="w3ls_item" value="Mobile Phone2" />
                                        <input type="hidden" name="amount" value="302.00" />
                                        <button type="submit" class="w3ls-cart">Add to cart</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4 agile_ecommerce_tab_left">
                                <div class="">
                                    <img src="{{ asset('store/images/4.jpg')}}" alt=" " class="img-responsive" />
                                </div>
                                <h5><a href="single.html">Mobile Phone3</a></h5>
                                <div class="simpleCart_shelfItem">
                                    <p><span>$250</span> <i class="item_price">$245</i></p>
                                    <form action="#" method="post">
                                        <input type="hidden" name="cmd" value="_cart" />
                                        <input type="hidden" name="add" value="1" />
                                        <input type="hidden" name="w3ls_item" value="Mobile Phone3" />
                                        <input type="hidden" name="amount" value="245.00"/>
                                        <button type="submit" class="w3ls-cart">Add to cart</button>
                                    </form>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <!-- MOBILES 1 2 3-->
                    <!-- TV AND VIDEO-->
                    <div role="tabpanel" class="tab-pane fade" id="audio" aria-labelledby="audio-tab">
                        <div class="agile_ecommerce_tabs">
                            <div class="col-md-4 agile_ecommerce_tab_left">
                                <div class="">
                                    <img src="{{ asset('store/images/8.jpg') }}" alt=" " class="img-responsive" />
                                </div>
                                <h5><a href="single.html">Speakers</a></h5>
                                <p><span>$320</span> <i class="item_price">$250</i></p>
                                <div class="simpleCart_shelfItem">
                                    <form action="#" method="post">
                                        <input type="hidden" name="cmd" value="_cart" />
                                        <input type="hidden" name="add" value="1" />
                                        <input type="hidden" name="w3ls_item" value="Speakers" />
                                        <input type="hidden" name="amount" value="250.00" />
                                        <button type="submit" class="w3ls-cart">Add to cart</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4 agile_ecommerce_tab_left">
                                <div class="">
                                    <img src="{{ asset('store/images/9.jpg')}}" alt=" " class="img-responsive" />
                                </div>
                                <h5><a href="single.html">Headphones</a></h5>
                                <div class="simpleCart_shelfItem">
                                    <p><span>$180</span> <i class="item_price">$150</i></p>
                                    <form action="#" method="post">
                                        <input type="hidden" name="cmd" value="_cart" />
                                        <input type="hidden" name="add" value="1" />
                                        <input type="hidden" name="w3ls_item" value="Headphones" />
                                        <input type="hidden" name="amount" value="150.00" />
                                        <button type="submit" class="w3ls-cart">Add to cart</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4 agile_ecommerce_tab_left">
                                <div class="">
                                    <img src="{{ asset('store/images/10.jpg')}}" alt=" " class="img-responsive" />
                                </div>
                                <h5><a href="single.html">Audio Player</a></h5>
                                <div class="simpleCart_shelfItem">
                                    <p><span>$220</span> <i class="item_price">$180</i></p>
                                    <form action="#" method="post">
                                        <input type="hidden" name="cmd" value="_cart" />
                                        <input type="hidden" name="add" value="1" />
                                        <input type="hidden" name="w3ls_item" value="Audio Player" />
                                        <input type="hidden" name="amount" value="180.00"/>
                                        <button type="submit" class="w3ls-cart">Add to cart</button>
                                    </form>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <!-- TV AND VIDEO-->
                    <!--COMPUTERS-->
                    <div role="tabpanel" class="tab-pane fade" id="video" aria-labelledby="video-tab">
                        <div class="agile_ecommerce_tabs">
                            <div class="col-md-4 agile_ecommerce_tab_left">
                                <div class="">
                                    <img src="{{ asset('store/images/11.jpg')}}" alt=" " class="img-responsive" />
                                </div>
                                <h5><a href="single.html">Laptop</a></h5>
                                <div class="simpleCart_shelfItem">
                                    <p><span>$880</span> <i class="item_price">$850</i></p>
                                    <form action="#" method="post">
                                        <input type="hidden" name="cmd" value="_cart" />
                                        <input type="hidden" name="add" value="1" />
                                        <input type="hidden" name="w3ls_item" value="Laptop" />
                                        <input type="hidden" name="amount" value="850.00" />
                                        <button type="submit" class="w3ls-cart">Add to cart</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4 agile_ecommerce_tab_left">
                                <div class="">
                                    <img src="{{ asset('store/images/12.jpg')}}" alt=" " class="img-responsive" /
                                </div>
                                <h5><a href="single.html">Notebook</a></h5>
                                <div class="simpleCart_shelfItem">
                                    <p><span>$290</span> <i class="item_price">$280</i></p>
                                    <form action="#" method="post">
                                        <input type="hidden" name="cmd" value="_cart" />
                                        <input type="hidden" name="add" value="1" />
                                        <input type="hidden" name="w3ls_item" value="Notebook" />
                                        <input type="hidden" name="amount" value="280.00" />
                                        <button type="submit" class="w3ls-cart">Add to cart</button>
                                    </form>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        </div>
                    </div>
                    <!--COMPUTERS-->
                    <!--ACCESSORIES-->
                    <div role="tabpanel" class="tab-pane fade" id="tv" aria-labelledby="tv-tab">
                        <div class="agile_ecommerce_tabs">
                            <div class="col-md-4 agile_ecommerce_tab_left">
                                <div class="">
                                    <img src="{{ asset('store/images/8.jpg')}}" alt=" " class="img-responsive" />
                                </div>
                                <h5><a href="single.html">Speakers</a></h5>
                                <div class="simpleCart_shelfItem">
                                    <p><span>$950</span> <i class="item_price">$820</i></p>
                                    <form action="#" method="post">
                                        <input type="hidden" name="cmd" value="_cart" />
                                        <input type="hidden" name="add" value="1" />
                                        <input type="hidden" name="w3ls_item" value="Speakers" />
                                        <input type="hidden" name="amount" value="820.00" />
                                        <button type="submit" class="w3ls-cart">Add to cart</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4 agile_ecommerce_tab_left">
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                        <!--ACCESSORIES-->
                      </div>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
<!-- banner-bottom1 -->
<div class="banner-bottom1">
    <div class="agileinfo_banner_bottom1_grids">
        <div class="col-md-7 agileinfo_banner_bottom1_grid_left">
            <h3>Grand Opening Event With flat<span>20% <i>Discount</i></span></h3>
            <a href="products.html">Shop Now</a>
        </div>
        <div class="col-md-5 agileinfo_banner_bottom1_grid_right">
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- //banner-bottom1 -->
<!-- special-deals -->
<div class="special-deals">
    <div class="container">
        <h2>Special Deals</h2>
        <div class="w3agile_special_deals_grids">
            <div class="col-md-7 w3agile_special_deals_grid_left">
                <div class="w3agile_special_deals_grid_left_grid">
                    <img src="{{ asset('store/images/21.jpg')}}" alt=" " class="img-responsive" />
                    <div class="w3agile_special_deals_grid_left_grid_pos1">
                        <h5>30%<span>Off/-</span></h5>
                    </div>
                    <div class="w3agile_special_deals_grid_left_grid_pos">
                        <h4>We Offer <span>Best Products</span></h4>
                    </div>
                </div>
                <script src="{{ mix('js/store/all.js') }}" ></script>
            </div>
            <div class="col-md-5 w3agile_special_deals_grid_right">
                <img src="{{ asset('store/images/20.jpg')}}" alt=" " class="img-responsive" />
                <div class="w3agile_special_deals_grid_right_pos">
                    <h4>Women's <span>Special</span></h4>
                    <h5>save up <span>to</span> 30%</h5>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //special-deals -->
<!-- new-products -->
<div class="new-products">
    <div class="container">
        <h3>New Products</h3>
        <div class="agileinfo_new_products_grids">
            <div class="col-md-3 agileinfo_new_products_grid">
                <div class="agile_ecommerce_tab_left agileinfo_new_products_grid1">
                    <div class="">
                        <img src="{{ asset('store/images/25.jpg')}}" alt=" " class="img-responsive" />
                    </div>
                    <h5><a href="single.html">Laptops</a></h5>
                    <div class="simpleCart_shelfItem">
                        <p><span>$520</span> <i class="item_price">$500</i></p>
                        <form action="#" method="post">
                            <input type="hidden" name="cmd" value="_cart">
                            <input type="hidden" name="add" value="1">
                            <input type="hidden" name="w3ls_item" value="Red Laptop">
                            <input type="hidden" name="amount" value="500.00">
                            <button type="submit" class="w3ls-cart">Add to cart</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3 agileinfo_new_products_grid">
                <div class="agile_ecommerce_tab_left agileinfo_new_products_grid1">
                    <div class="">
                        <img src="{{ asset('store/images/27.jpg')}}" alt=" " class="img-responsive" />
                    </div>
                    <h5><a href="single.html">Black Phone</a></h5>
                    <div class="simpleCart_shelfItem">
                        <p><span>$380</span> <i class="item_price">$370</i></p>
                        <form action="#" method="post">
                            <input type="hidden" name="cmd" value="_cart">
                            <input type="hidden" name="add" value="1">
                            <input type="hidden" name="w3ls_item" value="Black Phone">
                            <input type="hidden" name="amount" value="370.00">
                            <button type="submit" class="w3ls-cart">Add to cart</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3 agileinfo_new_products_grid">
                <div class="agile_ecommerce_tab_left agileinfo_new_products_grid1">
                    <div class="">
                        <img src="{{ asset('store/images/34.jpg')}}" alt=" " class="img-responsive" />
                    </div>
                    <h5><a href="single.html">Tv & Video</a></h5>
                    <div class="simpleCart_shelfItem">
                        <p><span>$150</span> <i class="item_price">$100</i></p>
                        <form action="#" method="post">
                            <input type="hidden" name="cmd" value="_cart">
                            <input type="hidden" name="add" value="1">
                            <input type="hidden" name="w3ls_item" value="Kids Toy">
                            <input type="hidden" name="amount" value="100.00">
                            <button type="submit" class="w3ls-cart">Add to cart</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3 agileinfo_new_products_grid">
                <div class="agile_ecommerce_tab_left agileinfo_new_products_grid1">
                    <div class="">
                        <img src="{{ asset('store/images/37.jpg') }}" alt=" " class="img-responsive" />
                    </div>
                    <h5><a href="single.html">Induction Stove</a></h5>
                    <div class="simpleCart_shelfItem">
                        <p><span>$280</span> <i class="item_price">$250</i></p>
                        <form action="#" method="post">
                            <input type="hidden" name="cmd" value="_cart">
                            <input type="hidden" name="add" value="1">
                            <input type="hidden" name="w3ls_item" value="Induction Stove">
                            <input type="hidden" name="amount" value="250.00">
                            <button type="submit" class="w3ls-cart">Add to cart</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //new-products -->
<!-- top-brands -->
<div class="top-brands">
    <div class="container">
        <h3>Top Brands</h3>
        <div class="sliderfig">
            <ul id="flexiselDemo1">
                <li>
                    <img src="{{ asset('store/images/tb1.jpg') }}" alt=" " class="img-responsive" />
                </li>
                <li>
                    <img src="{{ asset('store/images/tb2.jpg') }}" alt=" " class="img-responsive" />
                </li>
                <li>
                    <img src="{{ asset('store/images/tb3.jpg') }}" alt=" " class="img-responsive" />
                </li>
                <li>
                    <img src="{{ asset('store/images/tb4.jpg') }}" alt=" " class="img-responsive" />
                </li>
                <li>
                    <img src="{{ asset('store/images/tb5.jpg') }}" alt=" " class="img-responsive" />
                </li>
            </ul>
        </div>
        <script type="text/javascript">
            $(window).load(function() {
                $("#flexiselDemo1").flexisel({
                    visibleItems: 4,
                    animationSpeed: 1000,
                    autoPlay: true,
                    autoPlaySpeed: 3000,
                    pauseOnHover: true,
                    enableResponsiveBreakpoints: true,
                    responsiveBreakpoints: {
                        portrait: {
                            changePoint:480,
                            visibleItems: 1
                        },
                        landscape: {
                            changePoint:640,
                            visibleItems:2
                        },
                        tablet: {
                            changePoint:768,
                            visibleItems: 3
                        }
                    }
                });

            });
        </script>
        <script type="text/javascript" src="{{ mix('js/store/all.js') }}"></script>
    </div>
</div>
<!-- //top-brands -->

    @stop
