@props([
    'url' => null,
    'price' => null,
    'text' => 'See more',
])
@if($price)
<a href="{{ $url }}" class="event-button">@lang($text) {{ $price }}</a>
@else
<a href="{{ $url }}" class="event-button">@lang($text)</a>
@endif
