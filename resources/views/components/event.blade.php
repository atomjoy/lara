@php
    $button = isset($event['button']) ? $event['button'] : null;
    $price = isset($event['price']) ? $event['price'] : null;
@endphp

<div class="event-cell">

@isset($event['img'])
<img src="{{ $event['img'] }}" class="event-img">
@endisset

@isset($event['date'])
<div class="event-date">{{ $event['date'] }}</div>
@endisset

@isset($event['title'])
<div class="event-title">{{ $event['title'] }}</div>
@endisset

@isset($event['desc'])
<p class="event-text">{{ $event['desc'] }}</p>
@endisset

<div class="event-slot">
    {{ Illuminate\Mail\Markdown::parse($slot) }}
</div>

@isset($event['url'])
<x-lara::event-button :url="$event['url']" :text="$button" :price="$price" />
@endisset

</div>
