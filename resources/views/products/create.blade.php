@extends('layout.app')
@section('content')
    <section class="full-width header-well" >
        <div class="full-width header-well-icon">
            <i class="zmdi zmdi-smartphone-portrait"></i>
        </div>
        <div class="full-width header-well-text" style="position: initial">
            <p class="text-condensedLight">
                Create Products. select all the form fields and save
            </p>
        </div>
    </section>
    <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
        <div class="mdl-tabs__tab-bar">
            <a href="#tabNewProduct" class="mdl-tabs__tab is-active">NEW</a>
        </div>
        <div class="mdl-tabs__panel is-active" id="tabNewProduct">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
                    <div class="full-width panel mdl-shadow--2dp">
                        <div class="full-width panel-tittle bg-primary text-center tittles">
                            New Product
                        </div>
                        <div class="full-width panel-content">
                            <form>
                                @csrf
                                @include('products.__form')

                                <p class="text-center">
                                    <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addProduct">
                                        <i class="zmdi zmdi-plus"></i>
                                    </button>
                                <div class="mdl-tooltip" for="btn-addProduct">Add Product</div>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

