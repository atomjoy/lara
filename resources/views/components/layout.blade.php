<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<title>{{ config('app.name') }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="color-scheme" content="light">
<meta name="supported-color-schemes" content="light">

<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">

<style>
@media only screen and (max-width: 660px) {
.footer {
width: 100% !important;
}

.button {
width: 100% !important;
}

.event-table {
width: 100% !important;
}

.event-row {
display: block !important;
width: 100% !important;
}

.event-cell {
display: block !important;
width: 100% !important;
}

.event-img {
height: 200px !important;
}

.inner-body,
.email-browser {
width: 90% !important;
}

.product-table {
width: 100% !important;
}
}

/* Lower than 640px */
@media only screen and (max-width: 640px) {
.product-row {
display: block !important;
width: 100% !important;
}

.product-cell {
display: block !important;
width: 100% !important;
}

.product-img {
width: 39% !important;
height: auto !important;
}

.product-content {
float: left !important;
width: 59% !important;
padding-left: 15px !important;
}
}

/* Lower than 520px */
@media only screen and (max-width: 520px) {
.product-cell {
display: block !important;
width: 100% !important;
}

.product-img {
width: 100% !important;
height: 250px !important;
object-fit: contain !important;
}

.product-content {
float: left !important;
width: 100% !important;
padding-left: 0px !important;
}
}
</style>
{!! $head ?? '' !!}
</head>
<body>

<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td align="center">
<table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
{!! $header ?? '' !!}

<!-- Email Body -->
<tr>
<td class="body" width="100%" cellpadding="0" cellspacing="0" style="border: hidden !important;">
<table class="inner-body" align="center" width="660" cellpadding="0" cellspacing="0" role="presentation">

<!-- Body content -->
<tr>
<td class="content-cell">
{!! Illuminate\Mail\Markdown::parse($slot) !!}

{!! $subcopy ?? '' !!}
</td>
</tr>
</table>
</td>
</tr>

<!-- Products content -->
@isset($products)
<tr>
<td class="body" width="100%" cellpadding="0" cellspacing="0" style="border: hidden !important;">
<table class="inner-body" align="center" width="660" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td class="content-cell-disabled">
{!! $products ?? '' !!}
</td>
</tr>
</table>
</td>
</tr>
@endisset

<!-- Events content -->
@isset($events)
<tr>
<td class="body" width="100%" cellpadding="0" cellspacing="0" style="border: hidden !important;">
<table class="inner-body" align="center" width="660" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td class="content-cell-disabled">
{!! $events ?? '' !!}
</td>
</tr>
</table>
</td>
</tr>
@endisset

<!-- Info content -->
@isset($info)
<tr>
<td class="body" width="100%" cellpadding="0" cellspacing="0" style="border: hidden !important;">
<table class="inner-body" align="center" width="660" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td class="content-cell-disabled">
{!! $info?? '' !!}
</td>
</tr>
</table>
</td>
</tr>
@endisset

{{-- Footer content --}}
{!! $footer ?? '' !!}
</table>
</td>
</tr>
</table>
</body>
</html>
