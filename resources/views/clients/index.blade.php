
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
                            {{__('List Clients')}}
                        </div>
                        <div class="full-width panel-content">
                            {{--add search form--}}
                            @include('partials.__alerts')
                            <div class="mdl-list">
                                @forelse($clients as $client)
                                    <div class="mdl-list__item mdl-list__item--two-line">
                                            <span class="mdl-list__item-primary-content">
                                                <i class="zmdi zmdi-face mdl-list__item-avatar"></i>
                                                <span> {{$client->getFullName()}} </span>
                                                <span class="mdl-list__item-sub-title">{{$client->id_type}} {{$client->identification}}</span>
                                            </span>
                                        <a class="mdl-list__item-secondary-action" href="{{route('clients.show', $client)}}"><i class="zmdi zmdi-eye" style= "color : #6574C4; width: 30px; font-size: 25px"></i></a>
                                        <a class="mdl-list__item-secondary-action" href="{{route('clients.edit', $client)}}"><i class="zmdi zmdi-edit" style= "color : #6574C4; width: 30px; font-size: 25px"></i></a>
                                        <form method="POST" action="{{route('clients.destroy',$client)}}">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="mdl-list__item-secondary-action"><i class="zmdi zmdi-delete" style= "color : #BD2765; width: 30px; font-size: 25px" ></i></button>
                                        </form>
                                    </div>
                                    <li class="full-width divider-menu-h"></li>
                                @empty
                                    <li>{{__('No hay usuarios registrados')}}</li>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--CREATE CLIENT--}}
        <div class="mdl-tabs__panel" id="tabNewClient">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
                    <div class="full-width panel mdl-shadow--2dp">
                        <div class="full-width panel-tittle bg-primary text-center tittles">
                            New client
                        </div>
                        <div class="full-width panel-content">
                            <form action="{{ route('clients.store') }}" method="POST">
                                @csrf
                                <h5 class="text-condensedLight">Data client</h5>
                                @include('clients.__form')

                                <p class="text-center">
                                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                                        {{__('Save')}}
                                    </button>
                                    <div class="mdl-tooltip" for="btn-addClient">Add client</div>
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
