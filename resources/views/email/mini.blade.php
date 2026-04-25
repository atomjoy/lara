<x-lara::mini.message>

{{-- Logo image --}}
<x-lara::mini.logo />

{{-- Greeting --}}
@if (! empty($date))
<div class="email-date padding-inline">{{ $date }}</div>
@endif

<div class="email-greeting padding-inline">
@if (! empty($greeting))
{{ $greeting }}
@else
@if ($level === 'error')
@lang('Whoops!')
@else
@lang('Hello!')
@endif
@endif
</div>

<div class="padding-inline">
{{-- Intro Lines with html --}}
@foreach ($introLines as $line)
{{ Illuminate\Mail\Markdown::parse($line) }}
@endforeach

{{-- 2fa Code --}}
@isset($code)
<x-lara::mini.code>{{ $code }}</x-lara::mini.code>
@endisset

{{-- Action Button --}}
@isset($actionText)
<?php
    $color = match ($level) {
        'success', 'error' => $level,
        default => 'primary',
    };
?>
<x-lara::mini.button :url="$actionUrl" :color="$color">
{{ $actionText }}
</x-lara::mini.button>
@endisset

{{-- Outro Lines with html --}}
@foreach ($outroLines as $line)
{{ Illuminate\Mail\Markdown::parse($line) }}
@endforeach
</div>

{{-- News --}}
@isset($news)
<div class="news-list">
@foreach ($news as $item)
@if (isset($item['url']) && isset($item['image']) && isset($item['title']) && isset($item['text']) && isset($item['button_text']))
<x-lara::mini.news :url="$item['url']" :image="$item['image']" :title="$item['title']" :text="$item['text']" button_text="Read more" />
@endif
@endforeach
</div>
@endisset

<div class="padding-inline">
{{-- Salutation --}}
@if (! empty($salutation) && empty($info))
{{ $salutation }}
@else
@if (empty($info))
@lang('Regards,')<br>
{{ config('app.name') }}
@endif
@endif
</div>

{{-- Subcopy --}}
@isset($actionText)
<x-slot:subcopy>
@lang(
    "If you're having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
    'into your web browser:',
    [
        'actionText' => $actionText,
    ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
</x-slot:subcopy>
@endisset

</x-lara::message>
