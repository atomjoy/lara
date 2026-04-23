<x-lara::message>

{{-- Logo image --}}
<x-lara::logo />

{{-- Greeting --}}
@if (! empty($date))
<div class="email-date">{{ $date }}</div>
@endif

<div class="email-greeting">
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

{{-- Intro Lines with html --}}
@foreach ($introLines as $line)
{{ Illuminate\Mail\Markdown::parse($line) }}
@endforeach

{{-- 2fa Code --}}
@isset($code)
<x-lara::code>{{ $code }}</x-lara::code>
@endisset

{{-- Action Button --}}
@isset($actionText)
<?php
    $color = match ($level) {
        'success', 'error' => $level,
        default => 'primary',
    };
?>
<x-lara::button :url="$actionUrl" :color="$color">
{{ $actionText }}
</x-lara::button>
@endisset

{{-- Outro Lines with html --}}
@foreach ($outroLines as $line)
{{ Illuminate\Mail\Markdown::parse($line) }}
@endforeach

{{-- Salutation --}}
@if (! empty($salutation) && empty($info))
{{ $salutation }}
@else
@if (empty($info))
@lang('Regards,')<br>
{{ config('app.name') }}
@endif
@endif

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

{{-- Products --}}
@isset($products)
<x-slot:products>
<div class="page-title">@lang(config('mail.email.products.title','Fresh promotions'))</div>
@foreach ($products as $row)
<x-lara::products :products="$row" />
@endforeach
</x-slot:products>
@endisset

{{-- Events --}}
@isset($events)
<x-slot:events>
<div class="page-title">@lang(config('mail.email.events.title','Upcoming live events'))</div>
@foreach ($events as $row)
<x-lara::events :events="$row" />
@endforeach
</x-slot:events>
@endisset

{{-- Info --}}
@isset($info)
<x-slot:info>
<div class="page-title">@lang(config('mail.email.info.title', 'Looking for more?'))</div>
<x-lara::info :info="$info">
{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Regards,')<br>
{{ config('app.name') }}
@endif
</x-lara::info>
</x-slot:info>
@endisset

</x-lara::message>
