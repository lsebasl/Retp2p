@extends('layout.app')
@section('content')
    <h3 class="text-center tittles">RESPONSIVE TILES</h3>
    <!-- Tiles -->
    <article class="full-width tile">
        <div class="tile-text">
					<span class="text-condensedLight">
						1<br>
						<small>{{__('Invoices')}}</small>
					</span>
        </div>
        <i class="zmdi zmdi-receipt tile-icon"></i>
    </article>
    <article class="full-width tile">
        <div class="tile-text">
					<span class="text-condensedLight">
						2<br>
						<small>{{__('Clients')}}</small>
					</span>
        </div>
        <i class="zmdi zmdi-accounts tile-icon"></i>
    </article>
    <article class="full-width tile">
        <div class="tile-text">
					<span class="text-condensedLight">
						3<br>
						<small>{{__('Sellers')}}</small>
					</span>
        </div>
        <i class="zmdi zmdi-mood tile-icon"></i>
    </article>
    <article class="full-width tile">
        <div class="tile-text">
					<span class="text-condensedLight">
						121<br>
						<small>{{__('Products')}}</small>
					</span>
        </div>
        <i class="zmdi zmdi-toys tile-icon"></i>
    </article>
@endsection
