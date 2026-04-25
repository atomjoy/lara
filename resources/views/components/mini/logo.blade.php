@php
    $url = config('mail.email.logo', app()->request->getSchemeAndHttpHost() . '/vendor/lara/email/logo-full.webp');
    $banner = config('mail.email.banner', app()->request->getSchemeAndHttpHost() . '/vendor/lara/email/banner.webp');
    $page = config('app.url');
@endphp

<div class="padding-inline">
@if ($url != null)
<a href="{{ config('mail.email.link', $page) }}" target="_blank" style="display: inline-block; float: left;">
<img src="{{ $url }}" class="email-logo" alt="Logo" style="margin-top: 32px;">
</a>
@endif

@if ($banner != null)
<img src="{{ $banner }}" class="email-banner" alt="Banner">
@endif
</div>
