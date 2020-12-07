@extends('layout.app')
@section('content')
    <div class="mdl-tabs__panel" id="tabNewClient">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
                <div class="full-width panel mdl-shadow--2dp">
                    <div class="full-width panel-tittle bg-primary text-center tittles">
                        New client
                    </div>
                    <div class="full-width panel-content">
                        <form action="{{route('roles.update',$role)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <h5 class="text-condensedLight"><b>Data client</b></h5>
                            @include('roles.__form')
                            <p class="text-center">
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                                    {{__('Save')}}
                                </button>
                            <div class="mdl-tooltip" for="btn-addClient">Add client</div>
                        </form>
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

