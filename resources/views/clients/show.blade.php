@extends('layout.app')
@section('content')

    <!-- pageContent -->


        <div class="mdl-tabs__panel is-active" id="tabNewProvider">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
                    <div class="full-width panel mdl-shadow--2dp "style="height:400px;">
                        <div class="full-width panel-tittle bg-primary text-center tittles">
                            Client Information
                        </div>
                        <table class="mdl-data-table mdl-js-data-table mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop" style="font-family:'roboto'; top: 40px; padding: 40px; font-size: large;" >
                            <tbody>
                            <tr>
                                <td class="mdl-data-table__cell--non-numeric">Name</td>
                                <td>{{$client->getFullName()}}</td>
                            </tr>
                            <tr>
                                <td class="mdl-data-table__cell--non-numeric">Id Type</td>
                                <td>{{$client->id_type}}</td>
                            </tr>
                            <tr>
                                <td class="mdl-data-table__cell--non-numeric">Identification</td>
                                <td>{{$client->identification}}</td>
                            </tr>
                            <tr>
                                <td class="mdl-data-table__cell--non-numeric">Phone</td>
                                <td>{{$client->phone}}</td>
                            </tr>
                            <tr>
                                <td class="mdl-data-table__cell--non-numeric">E-mail</td>
                                <td>{{$client->email}}</td>
                            </tr>
                            <tr>
                                <td class="mdl-data-table__cell--non-numeric">Address</td>
                                <td>{{$client->address}}</td>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection

