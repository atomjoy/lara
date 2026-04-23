@props([
    'url' => null,
    'price' => null,
    'currency' => 'zł',
])
@if($price)
<a href="{{ $url }}" class="product-button">{{ $price }}@lang($currency)</a>
@endif
