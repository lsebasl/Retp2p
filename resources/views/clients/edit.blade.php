@extends('layout.app')
@section('content')
    <div class="mdl-tabs__panel" id="tabNewClient">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
                <div class="full-width panel mdl-shadow--2dp">
                    <div class="full-width panel-tittle bg-primary text-center tittles">
                        Edit Client
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
                                `   <div class="mdl-tooltip" for="btn-addClient">Add client</div>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
