<x-lara::mini.layout>

{{-- Header --}}
<x-slot:header>
<x-lara::mini.header />
</x-slot:header>

{{-- Body --}}
{!! $slot !!}

{{-- Subcopy --}}
@isset($subcopy)
<x-slot:subcopy>
<x-lara::mini.subcopy>{!! $subcopy !!}</x-lara::mini.subcopy>
</x-slot:subcopy>
@endisset

{{-- Footer --}}
<x-slot:footer>
<x-lara::mini.footer>
© {{ date('Y') }} {{ config('app.name') }}. {{ __('All rights reserved.') }}
</x-lara::mini.footer>
</x-slot:footer>
</x-lara::mini.layout>
