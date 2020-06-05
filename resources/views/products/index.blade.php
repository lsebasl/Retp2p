@extends('layout.app')
@section('content')

            <div class="mdl-tabs__panel" id="tabListProducts">
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
                        <form action="#">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                                <label class="mdl-button mdl-js-button mdl-button--icon" for="searchProduct">
                                    <i class="zmdi zmdi-search"></i>
                                </label>
                                <div class="mdl-textfield__expandable-holder">
                                    <input class="mdl-textfield__input" type="text" id="searchProduct">
                                    <label class="mdl-textfield__label"></label>
                                </div>
                            </div>
                        </form>
                        <nav class="full-width menu-categories">
                            <ul class="list-unstyle text-center">
                                <li><a href="#!">Computers</a></li>
                                <li><a href="#!">Tv & Video</a></li>
                                <li><a href="#!">Smartphones</a></li>
                                <li><a href="#!">Accessories</a></li>
                            </ul>
                        </nav>
                        <div class="full-width text-center" style="padding: 30px 0;">
                            <div class="mdl-card mdl-shadow--2dp full-width product-card">
                                <div class="mdl-card__title">
                                    <img src="assets/img/fontLogin.jpg" alt="product" class="img-responsive">
                                </div>
                                <div class="mdl-card__supporting-text">
                                    <small>Stock</small><br>
                                    <small>Category</small>
                                </div>
                                <div class="mdl-card__actions mdl-card--border">
                                    Product name
                                    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                                        <i class="zmdi zmdi-more"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="mdl-card mdl-shadow--2dp full-width product-card">
                                <div class="mdl-card__title">
                                    <img src="assets/img/fontLogin.jpg" alt="product" class="img-responsive">
                                </div>
                                <div class="mdl-card__supporting-text">
                                    <small>Stock</small><br>
                                    <small>Category</small>
                                </div>
                                <div class="mdl-card__actions mdl-card--border">
                                    Product name
                                    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                                        <i class="zmdi zmdi-more"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="mdl-card mdl-shadow--2dp full-width product-card">
                                <div class="mdl-card__title">
                                    <img src="assets/img/fontLogin.jpg" alt="product" class="img-responsive">
                                </div>
                                <div class="mdl-card__supporting-text">
                                    <small>Stock</small><br>
                                    <small>Category</small>
                                </div>
                                <div class="mdl-card__actions mdl-card--border">
                                    Product name
                                    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                                        <i class="zmdi zmdi-more"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="mdl-card mdl-shadow--2dp full-width product-card">
                                <div class="mdl-card__title">
                                    <img src="assets/img/fontLogin.jpg" alt="product" class="img-responsive">
                                </div>
                                <div class="mdl-card__supporting-text">
                                    <small>Stock</small><br>
                                    <small>Category</small>
                                </div>
                                <div class="mdl-card__actions mdl-card--border">
                                    Product name
                                    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                                        <i class="zmdi zmdi-more"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
