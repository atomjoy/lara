@php
    $url = config('mail.email.logo', app()->request->getSchemeAndHttpHost() . '/vendor/lara/email/logo-full.webp');
    $banner = config('mail.email.banner', app()->request->getSchemeAndHttpHost() . '/vendor/lara/email/banner.webp');
    $page = config('app.url');
@endphp

@if ($url != null)
<a href="{{ config('mail.email.link', $page) }}" target="_blank" style="display: inline-block;">
<img src="{{ $url }}" class="email-logo" alt="Logo">
</a>
@endif

@if ($banner != null)
<img src="{{ $banner }}" class="email-banner" alt="Banner">
@endif
