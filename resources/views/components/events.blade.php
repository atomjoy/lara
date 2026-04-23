<table width="100%" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td class="events-cell">
{{ Illuminate\Mail\Markdown::parse($slot) }}

<div class="event-row">
@foreach ($events as $event)
<x-lara::event :event="$event" />
@endforeach
</div>
</td>
</tr>
</table>
