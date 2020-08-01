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
                            @foreach($categories as $category)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="search-category.{{ $category->name }}" name="search-category" value="{{ $category->name }}" {{$category->name == request()->input('search-category') ? 'checked' : ''}}>
                                    <label class="form-check-label" style="font-size: .95em; margin:5px;font-weight: normal" for="search-category.{{ $category->name }}">
                                        {{ $category->name }}
                                    </label>
                                </div>
                            @endforeach
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
            <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title asd">
                            <a class="pa_italic" role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Categories
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
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
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="search-mark5" name="search-mark" value="Sony" {{'Sony' == request()->input('search-mark') ? 'checked' : ''}}>
                                <label class="form-check-label" style="font-size: .95em; margin:5px;font-weight: normal">
                                    Sony
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="search-mark6" name="search-mark" value="Hp" {{'Hp' == request()->input('search-mark') ? 'checked' : ''}}>
                                <label class="form-check-label" style="font-size: .95em; margin:5px;font-weight: normal">
                                    Hp
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="search-mark7" name="search-mark" value="Microsoft" {{'Microsoft' == request()->input('search-mark') ? 'checked' : ''}}>
                                <label class="form-check-label" style="font-size: .95em; margin:5px;font-weight: normal">
                                    Microsoft
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
        <h3>Price</h3>
        <div class="w3ls_mobiles_grid_left_grid_sub">
            <div class="panel-group" id="accordion3" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title asd">
                            <a class="pa_italic" role="button" data-toggle="collapse" data-parent="#accordion3" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Price
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
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

