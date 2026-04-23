<table width="100%" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td class="content-cell" style="padding-top: 0px">
<p class="info-text">{{ $info }}</p>

<x-lara::info-button :url="config('app.url')" />
</td>
</tr>
<tr>
<td class="content-cell" style="padding-top: 0px">
{{ Illuminate\Mail\Markdown::parse($slot) }}
</td>
</tr>
</table>
