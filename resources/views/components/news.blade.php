@props([
    'image' => 'image',
    'title' => 'title',
    'text' => 'text',
    'url' => '/',
    'button_text' => 'Read more',
])

<div class="email-news">
<img class="image" src="{{ $image }}" alt="Foto">
<div class="padding-inline">
<div class="title">{{ $title }}</div>
<p class="text">{{ $text }}</p>
<x-lara::news-button :url="$url">@lang($button_text)</x-lara::news-button>
</div>
</div>
