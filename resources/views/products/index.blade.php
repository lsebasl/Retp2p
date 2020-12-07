@extends('layout.app')
@section('content')
    <div class="mdl-grid portfolio-max-width">
                <div class="mdl-card mdl-cell mdl-cell--9-col mdl-cell--12-col-tablet mdl-shadow--2dp">
                        <div class="full-width text-center" style="padding: 30px 0;">
                            @forelse($products as $product)
                            <div class="mdl-card mdl-shadow--2dp full-width product-card ">
                                <div class="mdl-card__title" style="height: 300px; object-fit:cover; top: 30px; padding: 30px; font-size: large;" >
                                    @if($product->image)
                                    <img src="/storage/{{$product->image}}" alt="product-image" class="img-responsive">
                                        @endif
                                </div>
                                <div class="mdl-card__supporting-text">
                                    <small>{{$product->units}} units</small><br>
                                    <small>{{$product->category->name}}</small>
                                    <small>{{$product->status}}</small>
                                </div>
                                <form method="get" action="{{route('products.edit',$product)}}">
                                <div class="mdl-card__actions mdl-card--border">
                                    {{$product->name}}
                                        <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" >
                                            <i class="zmdi zmdi-more"></i>
                                        </button>
                                </div>
                                </form>
                            </div>

                            @empty
                                <li>{{__('Without Products')}}</li>
                            @endforelse
                                <div class="mdl-textfield mdl-js-textfield input-placa">{{$products->fragment('hash')->appends(request()->query())->links()}}
                                    <link rel="stylesheet" href="{{ mix('/css/admin/all2.css') }}">
                                </div>
                         </div>
                    </div>
        <div class="mdl-card mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-shadow--2dp">
            @include('partials.__alerts')
            @include('partials.__search_in_products')</small><br>
        </div>

    </div>

    </section>
@endsection
