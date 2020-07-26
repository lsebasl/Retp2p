@extends('layout.app')
@section('content')
    <h3 class="text-center tittles">RESPONSIVE TILES</h3>
    <!-- Tiles -->
    <a class="full-width tile" href="{{ route('invoices.index') }}" >
        <div class="tile-text" >
					<span class="text-condensedLight" >
						1<br>
						<small>{{__('Invoices')}}</small>
					</span>
        </div>
        <i class="zmdi zmdi-receipt tile-icon"></i>
    </a>
    <a class="full-width tile" href="{{ route('users.index')}}">
        <div class="tile-text">
					<span class="text-condensedLight">
						2<br>
						<small>{{__('Users')}}</small>
					</span>
        </div>
        <i class="zmdi zmdi-accounts tile-icon"></i>
    </a>
    <a class="full-width tile" href="{{ route('stocks.index')}}">
        <div class="tile-text">
					<span class="text-condensedLight">
						3<br>
						<small>{{__('Store')}}</small>
					</span>
        </div>
        <i class="zmdi zmdi-store tile-icon"></i>
    </a>
    <a class="full-width tile" href="{{ route('products.index')}}">
        <div class="tile-text">
					<span class="text-condensedLight">
						121<br>
						<small>{{__('Products')}}</small>
					</span>
        </div>
        <i class="zmdi zmdi-toys tile-icon"></i>
    </a>
@endsection
