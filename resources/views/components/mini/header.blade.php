@php
    $url = config('mail.email.browser', null);
@endphp

<tr>
<td class="header">
<!-- Header container -->
<table class="email-browser" align="center" width="660" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td class="header">
<!-- Header content -->
@if ($url != null)
<a href="{{ $url }}" class="email-browser-url" target="_blank">@lang('View in browser')</a>
@endif
</a>
<!-- Header content end -->
</td>
</tr>
</table>
<!-- Header container end -->
</td>
</tr>
