@extends('layout.app')
@section('content')

    <!-- pageContent -->
    <div class="mdl-tabs__panel is-active" id="tabNewProvider">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
                <div class="full-width panel mdl-shadow--2dp "style="height:700px;">
                    <div class="full-width panel-tittle bg-primary text-center tittles">

                        Product Information
                    </div>
                    @include('partials.__alerts')
                    <table class="mdl-data-table mdl-js-data-table mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop" style="font-family:'roboto'; top: 40px; padding: 40px; font-size: large;" >
                        <tbody>
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric">Barcode</td>
                            <td>{{$product->barcode}}</td>
                        </tr>
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric">Name</td>
                            <td>{{$product->name}}</td>
                        </tr>
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric">Category</td>
                            <td>{{$product->category}}</td>
                        </tr>
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric">Model</td>
                            <td>{{$product->model}}</td>
                        </tr>
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric">Mark</td>
                            <td>{{$product->mark}}</td>
                        </tr>
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric">Description</td>
                            <td>{{$product->description}}</td>
                        </tr>
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric">Units</td>
                            <td>{{$product->units}}</td>
                        </tr>
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric">Price</td>
                            <td>{{$product->price}}</td>
                        </tr>
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric">Discount</td>
                            <td>{{$product->discount}}</td>
                        </tr>
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric">Status</td>
                            <td>{{$product->status}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection


