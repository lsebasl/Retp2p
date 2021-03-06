@extends('store.layout.layout')
@section('content')

    <div class="banner banner1">
        <div class="container">
            <h2>CHANGE YOUR <span>LIFE</span>  <i>IN A SECOND</i></h2>
        </div>
    </div>
    <!-- breadcrumbs -->
    <div class="breadcrumb_dress">
        <div class="container">
            <ul>
                <li><a href="{{ route('home.store') }}"><span class="glyphicon glyphicon-home"></span>Home</a> <i>/</i></li>
                <li><a href="{{ route('goods.index') }}"><span class="glyphicon glyphicon-tower" aria-hidden="true"></span>Products</a></li>
            </ul>
        </div>
    </div>

    <!-- //breadcrumbs -->

    {{--nav bar--}}
    <div class="mobiles">
        <div class="container">
            <div class="w3ls_mobiles_grids">
                <form method='GET' action="{{ route('goods.index')}}" class="form-inline ">
                    @include('partials.__sidebar_goods')
                {{--nav bar--}}
                     <div class="col-md-8 w3ls_mobiles_grid_right">
                        <div class="clearfix"> </div>
                            <div class="w3ls_mobiles_grid_right_grid2">
                                <div class="w3ls_mobiles_grid_right_grid2_left">
                            @include('partials.__alerts')
                            @include('partials.__search_store')
                        </div>
                </form>

                        <form>
                            <div class="form-group">
                                <button  href="{{ route('goods.index')}}" class="btn btn-primary" type="submit" style="margin-left:2px"><i class="glyphicon glyphicon-refresh"></i></button>
                            </div>
                        </form>
                        <div class="clearfix"> </div>
                    </div>
                        @forelse($products as $product)
                        <div class="w3ls_mobiles_grid_right_grid3">
                            <div class="col-md-4 agileinfo_new_products_grid agileinfo_new_products_grid_mobiles">
                                <div class="agile_ecommerce_tab_left mobiles_grid">
                                    <div class="" style="height: 250px; object-fit:cover; ">
                                        <p> <i class="item_price">Units <span class="badge badge-pill badge-light">{{$product->units}}</span></i></p>
                                        @if($product->image)
                                             <img src="/storage/{{$product->image}}" alt="product-image" class="img-responsive">
                                        @endif
                                    </div>
                                <h5 style="margin: 0;"><a href="{{route('goods.show',$product)}}">{{$product->name}}</a></h5>
                                    <p> <i class="item_price">{{$product->mark}}</i></p>
                                    <div class="simpleCart_shelfItem">
                                    <p> <i class="item_price">$ {{number_format($product->price,0,'.',',')}}</i></p>
                                    <form action="" method="post">
                                        <input type="hidden" name="_token" id="token" value="">
                                        <input type="hidden" name="cmd" value="_cart" />
                                        <input type="hidden" name="add" value="1" />
                                        <input type="hidden" name="w3ls_item" value={{$product->name}}>
                                        <input type="hidden" name="amount" value={{$product->price}}>
                                        <input type="hidden" name="id" value={{$product->id}}>
                                        <button type="submit" class="w3ls-cart">Add to cart</button>
                                    </form>
                                </div>
                            </div>
                                <hr>
                        </div>
                        @empty
                            <li>{{__('Without Products')}}</li>
                        </div>
                        @endforelse
                    <div class="clearfix"> </div>
                </div>
               {{$products->fragment('hash')->appends(request()->query())->links('pagination::default')}}
                </div>
            </div>
        </div>
    </div>
@stop
