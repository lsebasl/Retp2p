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
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="search-category" name="search-category" value="Mobiles" {{'Mobiles' == request()->input('search-category') ? 'checked' : ''}}>
                                <label class="form-check-label" style="font-size: .95em; margin:5px;font-weight: normal" for="search-category">
                                    Mobiles
                                </label>
                            </div>
                            <div class="form-check ">
                                <input class="form-check-input" style="font-size: 95em" type="radio" id="search-category2" name="search-category" value="Computers" {{'Computers' == request()->input('search-category') ? 'checked' : ''}}>
                                <label class="form-check-label" style="font-size: .95em; margin:5px;font-weight: normal" for="search-category2">
                                    Computers
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="search-category3" name="search-category" value="Tv & Video" {{'Tv & Video' == request()->input('search-category') ? 'checked' : ''}}>
                                <label class="form-check-label" style="font-size: .95em; margin:5px;font-weight: normal" for="search-category3">
                                    Tv & Video
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="search-category4" name="search-category" value="Accessories" {{'Accessories' == request()->input('search-category') ? 'checked' : ''}}>
                                <label class="form-check-label" style="font-size: .95em; margin:5px;font-weight: normal" for="search-category4">
                                    Accessories
                                </label>
                            </div>
                            <button class="form-control" style="color:darkblue; margin: 10px" >
                                {{__('Search')}}
                            </button>

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
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body panel_text">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="search-mark1" name="search-mark" value="Huawei" {{'Huawei' == request()->input('search-mark') ? 'checked' : ''}}>
                            <label class="form-check-label" style="font-size: .95em; margin:5px;font-weight: normal" for="search-mark1">
                                Huawei
                            </label>
                        </div>
                        <div class="form-check ">
                            <input class="form-check-input" style="font-size: 95em" type="radio" id="search-mark2" name="search-mark" value='Samsung' {{'Samsung' == request()->input('search-mark') ? 'checked' : ''}}>
                            <label class="form-check-label" style="font-size: .95em; margin:5px;font-weight: normal" for="search-mark2">
                                Samsung
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="search-mark3" name="search-mark" value='Apple' {{'Apple' == request()->input('search-mark') ? 'checked' : ''}}>
                            <label class="form-check-label" style="font-size: .95em; margin:5px;font-weight: normal" for="search-mark3">
                                Apple
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="search-mark4" name="search-mark" value="Xiaomi" {{'Xiaomi' == request()->input('search-mark') ? 'checked' : ''}}>
                            <label class="form-check-label" style="font-size: .95em; margin:5px;font-weight: normal">
                                Xiaomi
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="search-mark4" name="search-mark" value="Lg" {{'Lg' == request()->input('search-mark') ? 'checked' : ''}}>
                            <label class="form-check-label" style="font-size: .95em; margin:5px;font-weight: normal">
                                Lg
                            </label>
                        </div>
                        <button class="form-control" style="color:darkblue; margin: 10px" >
                            {{__('Search')}}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w3ls_mobiles_grid_left_grid">
        <h3>Price</h3>
        <div class="w3ls_mobiles_grid_left_grid_sub">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title asd">
                            <a class="pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Price
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body panel_text">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="search-price1" name="search-price" value = 5000 {{ 5000 == request()->input('search-price') ? 'checked' : ''}}>
                                <label class="form-check-label" style="font-size: .95em; margin:5px;font-weight: normal" for="search-price1">
                                    Below $ 5.000
                                </label>
                            </div>
                            <div class="form-check ">
                                <input class="form-check-input" style="font-size: 95em" type="radio" id="search-price2" name="search-price" value= 10000 {{10000 == request()->input('search-price') ? 'checked' : ''}}>
                                <label class="form-check-label" style="font-size: .95em; margin:5px;font-weight: normal" for="search-price2">
                                    $ 5.000-10.000
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="search-price3" name="search-price" value= 20000 {{20000 == request()->input('search-price') ? 'checked' : ''}}>
                                <label class="form-check-label" style="font-size: .95em; margin:5px;font-weight: normal" for="search-price3">
                                    $ 10.000-20.000
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="search-price4" name="search-price" value= 30000 {{ 30000 == request()->input('search-price') ? 'checked' : ''}}>
                                <label class="form-check-label" style="font-size: .95em; margin:5px;font-weight: normal" for="search-price4">
                                    $20.000-30.000
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="search-price4" name="search-price" value= 31000 {{ 31000 == request()->input('search-price') ? 'checked' : ''}}>
                                <label class="form-check-label" style="font-size: .95em; margin:5px;font-weight: normal" for="search-price4">
                                    Over 30.000
                                </label>
                            </div>
                            <button class="form-control" style="color:darkblue; margin: 10px" >
                                {{__('Search')}}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

