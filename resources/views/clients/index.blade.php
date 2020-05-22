@extends('layout.app')
@section('content')
    <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
        <div class="mdl-tabs__tab-bar">
            <a href="#tabListClient" class="mdl-tabs__tab is-active">LIST</a>
            <a href="#tabNewClient" class="mdl-tabs__tab">NEW</a>
        </div>
        <div class="mdl-tabs__panel is-active" id="tabListClient">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
                    <div class="full-width panel mdl-shadow--2dp">
                        <div class="full-width panel-tittle bg-success text-center tittles">
                            List Clients
                        </div>
                        <div class="full-width panel-content">
                            <form action="#">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                                    <label class="mdl-button mdl-js-button mdl-button--icon" for="searchClient">
                                        <i class="zmdi zmdi-search"></i>
                                    </label>
                                    <div class="mdl-textfield__expandable-holder">
                                        <input class="mdl-textfield__input" type="text" id="searchClient">
                                        <label class="mdl-textfield__label"></label>
                                    </div>
                                </div>
                            </form>
                            <div class="mdl-list">
                                @foreach($clients as $client)
                                <div class="mdl-list__item mdl-list__item--two-line">
										<span class="mdl-list__item-primary-content">
											<i class="zmdi zmdi-account mdl-list__item-avatar"></i>
											<span>1. {{$client->title}}</span>
											<span class="mdl-list__item-sub-title">DNI</span>
										</span>
                                    <a class="mdl-list__item-secondary-action" href="#!"><i class="zmdi zmdi-more"></i></a>
                                </div>
                                    <li class="full-width divider-menu-h"></li>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="mdl-tabs__panel" id="tabNewClient">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
                    <div class="full-width panel mdl-shadow--2dp">
                        <div class="full-width panel-tittle bg-primary text-center tittles">
                            New client
                        </div>
                        <div class="full-width panel-content">
                            <form action="{{ route('clients.store') }}"  method="POST">
                                @csrf
                                <h5 class="text-condensedLight">Data client</h5>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="name">
                                    <label class="mdl-textfield__label" for="name">{{__('Name')}}</label>
                                    <span class="mdl-textfield__error">Invalid name</span>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="last_name">
                                    <label class="mdl-textfield__label" for="last_name">{{__('Last Name')}}</label>
                                    <span class="mdl-textfield__error">Invalid last name</span>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" id="id_type">
                                    <label class="mdl-textfield__label" for="id_type">{{__('Id Type')}}</label>
                                    <span class="mdl-textfield__error">Invalid Id Type</span>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?" id="identification">
                                    <label class="mdl-textfield__label" for="identification">{{__('Identification')}}</label>
                                    <span class="mdl-textfield__error">Invalid Identification</span>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="tel" pattern="-?[0-9+()- ]*(\.[0-9]+)?" id="phone">
                                    <label class="mdl-textfield__label" for="phone">{{__('Phone')}}</label>
                                    <span class="mdl-textfield__error">Invalid phone number</span>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="email" id="email">
                                    <label class="mdl-textfield__label" for="emailClient">{{__('E-mail')}}</label>
                                    <span class="mdl-textfield__error">email</span>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" id="address">
                                    <label class="mdl-textfield__label" for="address">{{__('Address')}}</label>
                                    <span class="mdl-textfield__error">Invalid address</span>
                                </div>

                                <p class="text-center">
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                                    Save
                                </button>
                                `   <div class="mdl-tooltip" for="btn-addClient">Add client</div>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="full-width header-well">
        <div class="full-width header-well-icon">
            <i class="zmdi zmdi-accounts"></i>
        </div>
        <div class="full-width header-well-text">
            <p class="text-condensedLight">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde aut nulla accusantium minus corporis accusamus fuga harum natus molestias necessitatibus.
            </p>
        </div>


@endsection
