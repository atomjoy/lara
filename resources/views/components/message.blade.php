<x-lara::layout>

{{-- Header --}}
<x-slot:header>
<x-lara::header></x-lara::header>
</x-slot:header>

{{-- Body --}}
{!! $slot !!}

{{-- Subcopy --}}
@isset($subcopy)
<x-slot:subcopy>
<x-lara::subcopy>{!! $subcopy !!}</x-lara::subcopy>
</x-slot:subcopy>
@endisset

{{-- Products --}}
@isset($products)
<x-slot:products>{{ $products ?? '' }}</x-slot:products>
@endisset

{{-- Events --}}
@isset($events)
<x-slot:events>{{ $events ?? '' }}</x-slot:events>
@endisset

{{-- Info --}}
@isset($info)
<x-slot:info>{{ $info ?? '' }}</x-slot:info>
@endisset

{{-- Footer --}}
<x-slot:footer>
<x-lara::footer>
© {{ date('Y') }} {{ config('app.name') }}. {{ __('All rights reserved.') }}
</x-lara::footer>
</x-slot:footer>
</x-lara::layout>
