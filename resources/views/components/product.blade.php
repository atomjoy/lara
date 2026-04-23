@php
    $price = isset($product['price']) ? $product['price'] : null;
    $sale = isset($product['old_price']) ? $product['old_price'] : null;
    $currency = isset($product['currency']) ? $product['currency'] : "zł";
@endphp

<div class="product-cell">

@isset($product['img'])
<a href="{{$product['url']}}" target="_blank">
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
@isset($sale)
<span class="product-sale-price" style="text-decoration: line-through">{{ $sale }}</span>
@endisset

@isset($product['url'])
<x-lara::product-button :url="$product['url']" :price="$price" :text="$currency"/>
@endisset
</div>

<div class="product-slot">
    {{ Illuminate\Mail\Markdown::parse($slot) }}
</div>

</div>

</div>
