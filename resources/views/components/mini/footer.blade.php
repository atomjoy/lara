@php
    $unsubscribe = config('mail.email.footer.unsubscribe', app()->request->getSchemeAndHttpHost() .'/unsubscribe');
    $policy = config('mail.email.footer.policy', app()->request->getSchemeAndHttpHost() . '/privacy-policy');
    $settings = config('mail.email.footer.settings', app()->request->getSchemeAndHttpHost() . '/subscriber/settings');
    $url = config('mail.email.footer.logo', app()->request->getSchemeAndHttpHost() . '/vendor/lara/email/footer-logo.webp');
    $page = config('app.url');
@endphp
<tr>
<td>
<table class="footer" align="center" width="660" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td class="content-cell" align="center">

{{-- Logo --}}
<div class="logo">
@if ($url != null)
<a href="{{ config('mail.email.link', $page) }}" target="_blank" style="display: inline-block;">
<img src="{{ $url }}" class="email-logo" alt="Logo">
</a>
@endif
</div>

{{-- Social icons --}}
<div class="social">
<x-lara::mini.footer-social/>
</div>

{{ Illuminate\Mail\Markdown::parse($slot) }}

{{-- Unsubscribe links --}}
<div class="links">
    <a class="footer-link" href="{{ $unsubscribe }}" target="_blank">@lang('Unsubscribe')</a> | <a class="footer-link" href="{{ $policy }}" target="_blank">@lang('Privacy Policy')</a> | <a class="footer-link" href="{{ $settings }}" target="_blank">@lang('Manage settings')</a>
</div>
</td>
</tr>
</table>
</td>
</tr>
