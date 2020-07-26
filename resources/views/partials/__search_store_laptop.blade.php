

<form method='GET' action="{{ route('laptop.index')}}" class="form-inline ">
    <input type="search" class="form-control mr-sm-2 {{$errors->has('name') ? 'is-invalid' : '' }}" name="name" placeholder="Name..." value="{{ request()->input('name')}}">
    <input type="search" class="form-control mr-sm-2 {{$errors->has('mark') ? 'is-invalid' : '' }} " name="mark" placeholder="Mark..." value="{{ request()->input('mark')}}">
    <input type="search" class="form-control mr-sm-2 {{$errors->has('price') ? 'is-invalid' : '' }}" name="price" placeholder="Max Price..." value="{{ request()->input('price')}}">
    <div class="form-group">
        <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
    </div>
    @includeWhen($errors->has('name'), 'partials.__invalid_feedback', ['feedback' => $errors->first('name')])
    @includeWhen($errors->has('mark'), 'partials.__invalid_feedback', ['feedback' => $errors->first('mark')])
    @includeWhen($errors->has('price'), 'partials.__invalid_feedback', ['feedback' => $errors->first('price')])
</form>



 {{--<div class="row row-filters">
          <input class="search_box" type="checkbox" id="search_box">
          <label class="icon-search" for="search_box"></label>
          <div class="form-inline">
              <div class="input-group">
              <form action="#" method="post">
                  <input type="text" name="Search" placeholder="Search...">
                  <input type="submit" value="Send" style="color: darkblue">
              </form>
              </div>
          </div>
      </div>--}}

    {{--  <div class="cart cart box_1">
          <form action="#" method="post" class="last">
              <input type="hidden" name="cmd" value="_cart" />
              <input type="hidden" name="display" value="1" />
              <button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
          </form>
      </div>--}}
