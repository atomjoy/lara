<table width="100%" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td class="products-cell">
{{ Illuminate\Mail\Markdown::parse($slot) }}

<div class="product-row">
@foreach ($products as $product)
<x-lara::product :product="$product" />
@endforeach
</div>
</td>
</tr>
</table>
