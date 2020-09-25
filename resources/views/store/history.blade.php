@extends('store.layout.layout')
@section('content')


<html lang="en">
<head>
      <!-- //end-smooth-scrolling -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('/css/admin/history.css') }}">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="{{ mix('js/admin/all.js') }}"><\/script>')</script>
    <script src="{{ mix('js/admin/all.js') }}" ></script>
</head>
{{--!DOCTYPE html>
        <div class="full-width text-center NotificationArea-title tittles">Payment History
            <a href="{{ route('goods.index') }}" class="full-width">
                <div class="navLateral-body-cl">
                    <i class="zmdi zmdi-store">GO BACK</i>
                </div>
                <div class="navLateral-body-cr hide-on-tablet">

                </div>
            </a>
        </div>--}}

<div class="mdl-grid portfolio-max-width">
    <div class="mdl-card mdl-cell mdl-cell--9-col mdl-cell--12-col-tablet mdl-shadow--2dp">
        <section class="full-width header-well">
            <div class="full-width header-well-icon">
                <i class="zmdi zmdi-store"></i>
            </div>
            <div class="full-width header-well-text">
                <p class="text-condensedLight">
                    Payment History user eye to see the invoice
                </p>
            </div>
        </section>
        <div class="full-width divider-menu-h"></div>
        <div class="">
            <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
                    <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric">Created Date</th>
                        <th class="mdl-data-table__cell--non-numeric">Reference</th>
                        <th class="mdl-data-table__cell--non-numeric">Invoice Id</th>
                        <th class="mdl-data-table__cell--non-numeric">total</th>
                        <th class="mdl-data-table__cell--non-numeric">Status</th>
                        <th class="mdl-data-table__cell--non-numeric">Options</th>
                    </tr>
                    </thead>
                    @include('partials.__alerts')
                    @forelse($paymentAttempts as $paymentAttempt)
                        <tbody>
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric">{{$paymentAttempt->created_at}}</td>
                            <td class="mdl-data-table__cell--non-numeric">{{$paymentAttempt->requestId}}</td>
                            <td class="mdl-data-table__cell--non-numeric">{{$paymentAttempt->invoice->id}}</td>
                            <td class="mdl-data-table__cell--non-numeric">{{$paymentAttempt->invoice->total}}</td>
                            <td class="mdl-data-table__cell--non-numeric">{{$paymentAttempt->status}}</td>
                            <td class="mdl-data-table__cell--non-numeric"><a type="submit" href="" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"> <i class="zmdi zmdi-eye"></i></a></td>
                        </tr>
                        @empty
                            <tr style="position: center">
                                <td ></td>
                                <td></td>
                                <td class="mdl-data-table__cell--non-numeric">{{__('Stock Empty')}}</td>
                                <td></td>
                                <td><button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-more"></i></button></td>
                            </tr>
                        @endforelse
                        </tbody>
                </table>
                <div class="mdl-textfield mdl-js-textfield input-placa">
                    <link rel="stylesheet" href="{{ mix('/css/admin/all2.css') }}">
                </div>
            </div>
        </div>
    </div>
    <div class="mdl-card mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-shadow--2dp">
        @include('partials.__search_in_history')
        @include('partials.__alerts')
        </small><br>
    </div>
</div>
@stop
