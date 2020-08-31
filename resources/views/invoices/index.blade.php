@extends('layout.app')
@section('content')
    <div class="mdl-grid portfolio-max-width">
        <div class="mdl-card mdl-cell mdl-cell--9-col mdl-cell--12-col-tablet mdl-shadow--2dp">
            <section class="full-width header-well">
                <div class="full-width header-well-icon">
                    <i class="zmdi zmdi-store"></i>
                </div>
                <div class="full-width header-well-text">
                    <p class="text-condensedLight">
                        Invoices use 3 point to see the options
                    </p>
                </div>
            </section>
            <div class="full-width divider-menu-h"></div>
            <div class="">
                <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                    <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
                        <thead>
                        <tr>
                            <th class="mdl-data-table__cell--non-numeric">Id</th>
                            <th class="mdl-data-table__cell--non-numeric">Expedition date</th>
                            <th class="mdl-data-table__cell--non-numeric">Payment</th>
                            <th class="mdl-data-table__cell--non-numeric">Expiration Date</th>
                            <th class="mdl-data-table__cell--non-numeric">Subtotal</th>
                            <th class="mdl-data-table__cell--non-numeric">Quantity</th>
                            <th class="mdl-data-table__cell--non-numeric">Total</th>
                            <th class=" ">Options</th>
                        </tr>
                        </thead>
                        @include('partials.__alerts')
                        @forelse($invoices as $invoice)
                            <tbody>
                            <tr>
                                <td class="mdl-data-table__cell--non-numeric">{{$invoice->category->id}}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{$invoice->expedition_date}}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{$invoice->payment_method}}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{$invoice->expiration_date}}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{$invoice->subtotal}}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{$invoice->quantity}}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{$invoice->total}}</td>
                                <td style="display: flex; align-items: center; flex-direction: row-reverse;border-bottom: none">
                                    <form method="POST" action="{{route('invoices.destroy',$invoice)}}">
                                        @csrf @method('DELETE')
                                        <a type="submit" href="{{route('invoices.show', $invoice)}}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-eye"></i></a>
                                        <a type="submit" href="{{route('invoices.edit', $invoice)}}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-edit"></i></a>
                                        <button type="submit" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-delete" style="color: darkred"></i></button>
                                    </form>
                                </td>
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
                    <div class="mdl-textfield mdl-js-textfield input-placa">{{$invoices->fragment('hash')->appends(request()->query())->links()}}
                        <link rel="stylesheet" href="{{ mix('/css/admin/all2.css') }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="mdl-card mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-shadow--2dp">
            @include('partials.__alerts')
           </small><br>
        </div>
    </div>
@endsection
