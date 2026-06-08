@props(['black' => false])
@php
    if ($black)
        $extraClass = 'bg-black/20';
    else
        $extraClass = 'bg-white/20';

@endphp

<hr class="w-full border-transparent {{ $extraClass }}  my-2" />