@extends('layout.app')
@section('content')

            <div class="mdl-tabs__panel" id="tabListProducts">
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
                        @include('partials.__search')
                        <nav class="full-width menu-categories">
                            <ul class="list-unstyle text-center">
                                <li><a href="#!">Computers</a></li>
                                <li><a href="#!">Tv & Video</a></li>
                                <li><a href="#!">Mobiles</a></li>
                                <li><a href="#!">Accessories</a></li>
                            </ul>
                        </nav>
                        @include('partials.__alerts')
                        <div class="full-width text-center" style="padding: 30px 0;">
                            @forelse($products as $product)
                            <div class="mdl-card mdl-shadow--2dp full-width product-card">
                                <div class="mdl-card__title" style="height: 300px; object-fit:cover" >
                                    @if($product->image)
                                    <img src="/storage/{{$product->image}}" alt="product-image" class="img-responsive">
                                        @endif
                                </div>
                                <div class="mdl-card__supporting-text">
                                    <small>{{$product->units}}</small><br>
                                    <small>{{$product->category}}</small>
                                </div>
                                <div class="mdl-card__actions mdl-card--border">
                                    {{$product->name}}
                                    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                                        <i class="zmdi zmdi-more"></i>
                                    </button>
                                </div>
                            </div>

                            @empty
                                <li>{{__('Without Products')}}</li>
                            @endforelse
                                <div class="mdl-textfield mdl-js-textfield input-placa">{{$products->links()}}
                                    <link rel="stylesheet" href="{{ mix('/css/admin/all2.css') }}">
                                </div>
                         </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
