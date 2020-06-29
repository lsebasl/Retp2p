@extends('layout.app')
@section('content')
    <div class="mdl-tabs__panel" id="tabNewClient">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
                <div class="full-width panel mdl-shadow--2dp">
                    <div class="full-width panel-tittle bg-primary text-center tittles">
                        Edit Product
                    </div>
                    <div class="full-width panel-content">
                        <form method="POST" action="{{route('products.update', $product)}} " enctype="multipart/form-data">
                            <h5 class="text-condensedLight">Data Product</h5>
                            @method('PUT')
                            @csrf
                            @include('products.__form')
                            <p class="text-center">
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                                    {{__('Save')}}
                                </button>
                            <div class="mdl-tooltip" for="btn-addProduct">Product Update</div>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection

