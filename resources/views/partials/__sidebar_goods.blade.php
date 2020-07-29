<div class="col-md-4 w3ls_mobiles_grid_left">
    <div class="w3ls_mobiles_grid_left_grid">
        <h3>Categories</h3>
        <div class="w3ls_mobiles_grid_left_grid_sub">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title asd">
                            <a class="pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Categories
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body panel_text">
                            <ul>
                                <li><a href="{{ route('goods.index') }}">Mobiles</a></li>
                                <li><a href="{{ route('goods.index') }}">Computers</a></li>
                                <li><a href="{{ route('goods.index') }}">Tv & Video</a></li>
                                <li><a href="{{ route('goods.index') }}">Accessories</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w3ls_mobiles_grid_left_grid">
        <h3>Brands</h3>
        <div class="w3ls_mobiles_grid_left_grid_sub">
            <div class="ecommerce_color ecommerce_size">
                <ul>
                    <li><a href="{{route('goods.brand','Huawei')}}">Huawei</a></li>
                    <li><a href="{{route('goods.brand','Samsung')}}">Samsung</a></li>
                    <li><a href="{{route('goods.brand','Apple')}}">Apple</a></li>
                    <li><a href="{{route('goods.brand','Xiaomi')}}">Xiaomi</a></li>
                    <li><a href="{{route('goods.brand','Lg')}}">Lg</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="w3ls_mobiles_grid_left_grid">
        <h3>Price</h3>
        <div class="w3ls_mobiles_grid_left_grid_sub">
            <div class="ecommerce_color ecommerce_size">
                <ul>
                    <li><a href="{{route('goods.price',5000)}}">$ Below $ 5000</a>
                    <li><a href="{{route('goods.price',10000)}}">$ 5000-10000</a></li>
                    <li><a href="{{route('goods.price',20000)}}">$ 10000-20000</a></li>
                    <li><a href="{{route('goods.price',30000)}}">$ 20000-30000</a></li>
                    <li><a href="{{route('goods.price',31000)}}">$ Above $ 30000</a>
                </ul>
            </div>
        </div>
    </div>
</div>

