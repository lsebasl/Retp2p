@extends('layout.app')
@section('content')

        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
            <div class="mdl-tabs__tab-bar">
                <a href="#tabNewProduct" class="mdl-tabs__tab is-active">NEW</a>
                <a href="#tabListProducts" class="mdl-tabs__tab">LIST</a>
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
                                    <div class="mdl-grid">
                                        <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
                                            <h5 class="text-condensedLight">Basic Information</h5>
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="number" pattern="-?[0-9- ]*(\.[0-9]+)?" id="BarCode">
                                                <label class="mdl-textfield__label" for="BarCode">Barcode</label>
                                                <span class="mdl-textfield__error">Invalid barcode</span>
                                            </div>
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NameProduct">
                                                <label class="mdl-textfield__label" for="NameProduct">Name</label>
                                                <span class="mdl-textfield__error">Invalid name</span>
                                            </div>
                                            <div class="mdl-textfield mdl-js-textfield">
                                                <select class="mdl-textfield__input">
                                                    <option value="" disabled="" selected="">Select category</option>
                                                    <option value="">Mercado</option>
                                                    <option value="">Electrodomesticos</option>
                                                    <option value="">Hogar</option>
                                                    <option value="">Moda y Accesorios</option>
                                                </select>
                                            </div>
                                            <h5 class="text-condensedLight">Units and Price</h5>
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?" id="StrockProduct">
                                                <label class="mdl-textfield__label" for="StrockProduct">Units</label>
                                                <span class="mdl-textfield__error">Invalid number</span>
                                            </div>
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="text" pattern="-?[0-9.]*(\.[0-9]+)?" id="PriceProduct">
                                                <label class="mdl-textfield__label" for="PriceProduct">Price</label>
                                                <span class="mdl-textfield__error">Invalid price</span>
                                            </div>
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?" id="discountProduct">
                                                <label class="mdl-textfield__label" for="discountProduct">% Discount</label>
                                                <span class="mdl-textfield__error">Invalid discount</span>
                                            </div>
                                        </div>
                                        <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
                                            <h5 class="text-condensedLight">Mark and model</h5>
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="text"  id="mark">
                                                <label class="mdl-textfield__label" for="provider">Mark</label>
                                                <span class="mdl-textfield__error">Invalid Mark</span>
                                            </div>
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="text"  id="modelProduct">
                                                <label class="mdl-textfield__label" for="modelProduct">Model</label>
                                                <span class="mdl-textfield__error">Invalid model</span>
                                            </div>
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="text" id="description">
                                                <label class="mdl-textfield__label" for="description">Description</label>
                                                <span class="mdl-textfield__error">Invalid description</span>
                                            </div>
                                            <h5 class="text-condensedLight">Other Data</h5>
                                            <div class="mdl-textfield mdl-js-textfield">
                                                <select class="mdl-textfield__input">
                                                    <option value="" disabled="" selected="">Select status</option>
                                                    <option value="">Active</option>
                                                    <option value="">deactivated</option>
                                                </select>
                                            </div>
                                            <div class="mdl-textfield mdl-js-textfield">
                                                <input type="file">
                                            </div>
                                        </div>
                                    </div>
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
                                <li><a href="#!">Mercado</a></li>
                                <li><a href="#!">Electrodomesticos</a></li>
                                <li><a href="#!">Hogar</a></li>
                                <li><a href="#!">Moda y Accesorios</a></li>
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
