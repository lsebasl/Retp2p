    @extends('layout.app')
@section('content')

    <!-- pageContent -->
    <div class="mdl-tabs__panel is-active" id="tabNewProvider">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
                <div class="full-width panel mdl-shadow--2dp "style="height:500px;">
                    <div class="full-width panel-tittle bg-primary text-center tittles">

                        User Information
                    </div>
                    @include('partials.__alerts')
                    <table class="mdl-data-table mdl-js-data-table mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop" style="font-family:'roboto'; top: 40px; padding: 40px; font-size: large;" >
                        <tbody>
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric">Name</td>
                            <td>{{$user->getFullName()}}</td>
                        </tr>
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric">Id Type</td>
                            <td>{{$user->id_type}}</td>
                        </tr>
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric">Identification</td>
                            <td>{{$user->identification}}</td>
                        </tr>
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric">Phone</td>
                            <td>{{$user->phone}}</td>
                        </tr>
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric">E-mail</td>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric">Address</td>
                            <td>{{$user->address}}</td>
                        </tr>
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric">User Role</td>
                            <td>{{$user->roles[0]->name}}</td>
                        </tr>
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric">User Status</td>
                            <td>{{$user->status}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection

