@php
    $unsubscribe = config('mail.email.footer.unsubscribe', app()->request->getSchemeAndHttpHost() .'/unsubscribe');
    $policy = config('mail.email.footer.policy', app()->request->getSchemeAndHttpHost() . '/privacy-policy');
    $settings = config('mail.email.footer.settings', app()->request->getSchemeAndHttpHost() . '/subscriber/settings');
@endphp
<tr>
<td>
<table class="footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td class="content-cell" align="center">
{{ Illuminate\Mail\Markdown::parse($slot) }}

<div class="links">
    <a class="footer-link" href="{{ $unsubscribe }}" target="_blank">@lang('Unsubscribe')</a> | <a class="footer-link" href="{{ $policy }}" target="_blank">@lang('Privacy Policy')</a> | <a class="footer-link" href="{{ $settings }}" target="_blank">@lang('Manage settings')</a>
</div>
</td>
</tr>
</table>
</td>
</tr>
