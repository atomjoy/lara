@php
    $url = isset($product['url']) ? $product['url'] : app()->request->getSchemeAndHttpHost();
@endphp

<div class="product-cell">
@isset($product['img'])
<a href="{{ $url }}" target="_blank">
<img src="{{ $product['img'] }}" class="product-img">
</a>
@endisset

<div class="product-content">
@isset($product['title'])
<div class="product-title">{{ $product['title'] }}</div>
@endisset

@isset($product['line1'])
<div class="product-line">{{ $product['line1'] }}</div>
@endisset

@isset($product['line2'])
<div class="product-line">{{ $product['line2'] }}</div>
@endisset

@isset($product['line3'])
<div class="product-line">{{ $product['line3'] }}</div>
@endisset

<div class="product-prices">
@isset($product['old_price'])
<span class="product-sale-price" style="text-decoration: line-through">{{ $product['old_price'] }}</span>
@endisset

@isset($product['price'])
<x-lara::product-button :url="$url" :price="$product['price']"/>
@endisset
</div>

<div class="product-slot">
    {{ Illuminate\Mail\Markdown::parse($slot) }}
</div>

</div>

</div>
