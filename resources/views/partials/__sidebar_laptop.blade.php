<div class="col-md-4 w3ls_mobiles_grid_left">
    <div class="w3ls_mobiles_grid_left_grid">
        <h3>Categories</h3>
        <div class="w3ls_mobiles_grid_left_grid_sub">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title asd">
                            <a class="pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Mobiles
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body panel_text">
                            <ul>
                                <li><a href="{{ route('smartphones.index') }}">Smartphones</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title asd">
                            <a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Computers
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body panel_text">
                            <ul>
                                <li><a href="{{ route('laptop.index') }}">Pc</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title asd">
                            <a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Tv & Video
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body panel_text">
                            <ul>
                                <li><a href="{{ route('television.index') }}">Television</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingFour">
                        <h4 class="panel-title asd">
                            <a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Accessories
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                        <div class="panel-body panel_text">
                            <ul>
                                <li><a href="{{ route('headphones.index') }}">Headphones</a></li>
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
                    <li><a href="{{route('laptop.search','Hp')}}">Hp</a></li>
                    <li><a href="{{route('laptop.search','Samsung')}}">Samsung</a></li>
                    <li><a href="{{route('laptop.search','Apple')}}">Apple</a></li>
                    <li><a href="{{route('laptop.search','Microsoft')}}">Microsoft</a></li>
                    <li><a href="{{route('laptop.search','Lg')}}">Lg</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="w3ls_mobiles_grid_left_grid">
        <h3>Price</h3>
        <div class="w3ls_mobiles_grid_left_grid_sub">
            <div class="ecommerce_color ecommerce_size">
                <ul>
                    <li><a href="{{route('laptop.price',5000)}}">$ Below $ 5000</a>
                    <li><a href="{{route('laptop.price',10000)}}">$ 5000-10000</a></li>
                    <li><a href="{{route('laptop.price',20000)}}">$ 10000-20000</a></li>
                    <li><a href="{{route('laptop.price',30000)}}">$ 20000-30000</a></li>
                    <li><a href="{{route('laptop.price',31000)}}">$ Above $ 30000</a>
                </ul>
            </div>
        </div>
    </div>
</div>

