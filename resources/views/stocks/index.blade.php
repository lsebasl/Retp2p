@extends('layout.app')
@section('content')

    <section class="full-width header-well">
        <div class="full-width header-well-icon">
            <i class="zmdi zmdi-store"></i>
        </div>
        <div class="full-width header-well-text">
            <p class="text-condensedLight">
                Inventory user 3 point to see the options
            </p>
        </div>
    </section>
    <div class="full-width divider-menu-h"></div>
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
            <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
                <thead>
                <tr>
                    <th class="mdl-data-table__cell--non-numeric">Name</th>
                    <th>BarCode</th>
                    <th>Units</th>
                    <th>Price</th>
                    <th>Options</th>
                </tr>
                </thead>
                @include('partials.__alerts')
                @forelse($products as $product)
                <tbody>
                <tr>
                    <td class="mdl-data-table__cell--non-numeric">{{$product->name}}</td>
                    <td>{{$product->barcode}}</td>
                    <td>{{$product->units}}</td>
                    <td>{{$product->price}}</td>
                    <td style="display: flex; align-items: center; flex-direction: row-reverse;border-bottom: none">
                        <form method="POST" action="{{route('products.destroy',$product)}}">
                            @csrf @method('DELETE')
                            <a type="submit" href="{{route('products.show', $product)}}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-eye"></i></a>
                            <a type="submit" href="{{route('products.edit', $product)}}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-edit"></i></a>
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
        </div>
    </div>

@endsection
