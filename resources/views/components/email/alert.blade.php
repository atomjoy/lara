{{--
    Use with: <x-lara-alert type="danger" message="Database connection error." class="mb-4"/>
--}}
<div class="full-width">
<div class="alert-title">Server Error</div>
<div {{ $attributes->class(['selected' => $isSelected()])->merge(['class' => 'alert alert-'.$type]) }}>
{{ $message }} {{ $slot }}
</div>
</div>

