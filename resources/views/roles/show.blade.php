@extends('layout.app')
@section('content')

    <!-- pageContent -->

    <div class="mdl-tabs__panel is-active" id="tabNewProvider">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
                <div class="full-width panel mdl-shadow--2dp" style="height:150rem;">
                    <div class="full-width panel-tittle bg-primary text-center tittles">

                        Role Information
                    </div>
                    @include('partials.__alerts')
                    <div class="mdl-grid portfolio-max-width">
                            <div class="mdl-card mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-shadow--2dp">
                                <div>
                                    <div>
                                        <i class="zmdi zmdi-view-list-alt"></i>
                                        <p></p>
                                        <p><strong>Role Name</strong> {{$role->name}} </p>
                                        <p><strong>Description</strong>  </p>
                                        <p>{{$role->description}}</p>
                                    </div>
                                </div>
                    </div>
                    <div class="full-width panel-tittle bg-primary text-center tittles">
                        Role Permissions
                    </div>

                        @foreach($rolePermissions as $rolePermission)
                            <table class="mdl-data-table mdl-js-data-table mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop" style="font-family:'roboto'; top: 40px; padding: 40px; font-size: large;" >
                                <tbody>
                                <tr>
                                    <td class="mdl-data-table__cell--non-numeric">{{$rolePermission->name}}</td>
                                    <td>{{$rolePermission->description}}</td>
                                </tr>
                                </tbody>
                            </table>
                        @endforeach
                 </div>
            </div>
        </div>
    </div>


@endsection

