@component('mail::message')
# Alert Stock

There are less than 10 units in Product ID {{$details['product_id'] }}, Name {{$details['product_name']}}, the product
will be disable if there are not units.

{{--@component('mail::button', ['url' => ''])
Button Text
@endcomponent--}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
