<form method=Get action="{{ route('export')}}">
  @include('partials.__form_export_products')
</form>
<form>
    <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored " style="margin-left:2px" href="{{route('products.index',"")}}" >
        {{__('Clear')}}
    </button>
</form>
<div
    @includeWhen($errors->has('search-name'), 'partials.__invalid_feedback', ['feedback' => $errors->first('search-name')])
</div>


