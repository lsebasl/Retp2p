@extends('layout.app')
@section('content')

    <section class="full-width header-well" >
        <div class="full-width header-well-icon">
            <i class="zmdi zmdi-accounts"></i>
        </div>
        <div class="full-width header-well-text">
            <p class="text-condensedLight">List of registered roles.
                <br>Use eye to see details, pencil to edit and trash to remove</p>
        </div>
    </section>
    <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
        <div class="mdl-tabs__tab-bar">
            <a href="#tabListRoles" class="mdl-tabs__tab is-active">LIST</a>
        </div>
        <div class="mdl-tabs__panel is-active" id="tabListRoles">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
                    <div class="full-width panel mdl-shadow--2dp">
                        <div class="full-width panel-tittle bg-success text-center tittles">
                            {{__('roles List')}}
                        </div>

                        {{--add search form--}}
                        @include('partials.__search_roles')
                        @include('partials.__alerts')
                        <div class="mdl-list">
                            <li class="full-width divider-menu-h"></li>
                            @forelse($roles as $role)
                                <div class="mdl-list__item mdl-list__item--two-line">
                                            <span class="mdl-list__item-primary-content">
                                                <i class="zmdi zmdi-account-circle mdl-list__item-avatar"></i>
                                                <span>{{$role->id. ' ' .$role->name}} </span>
                                                <span class="mdl-list__item-sub-title"></span>
                                            </span>
                                    <a class="mdl-list__item-secondary-action" href="{{route('roles.show', $role)}}"><i class="zmdi zmdi-eye" style= "color : #6574C4; width: 30px; font-size: 25px"></i></a>
                                    <a class="mdl-list__item-secondary-action" href="{{route('roles.edit', $role)}}"><i class="zmdi zmdi-edit" style= "color : #6574C4; width: 30px; font-size: 25px"></i></a>
                                    <form method="POST" action="{{route('roles.destroy',$role)}}">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="mdl-list__item-secondary-action" style="border: none; background-color:white"><i class="zmdi zmdi-delete" style= "color : #BD2765; width: 20px; font-size: 25px"></i></button>
                                    </form>
                                </div>
                                <li class="full-width divider-menu-h"></li>
                            @empty
                                <li>{{__('Without roles')}}</li>
                            @endforelse
                            <div class="mdl-textfield mdl-js-textfield input-placa">{{$roles->fragment('hash')->appends(request()->query())->links()}}
                                <link rel="stylesheet" href="{{ mix('/css/admin/all2.css') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

