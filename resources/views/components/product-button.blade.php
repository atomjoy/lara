@props([
    'url' => null,
    'price' => null,
])

@if($price)
<a href="{{ $url }}" class="product-button">{{ $price }}</a>
@endif
