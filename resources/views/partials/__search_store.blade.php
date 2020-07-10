

<form method='GET' action="{{ route('smartphones.index')}}" class="form-inline">
    <input type="search" class="form-control mr-sm-2" name="name" placeholder="Search..." value="{{ request()->input('name')}}">
    <div class="form-group">
        <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
    </div>
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
