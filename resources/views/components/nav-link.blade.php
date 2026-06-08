@props(['info' => '', 'dropdown' => '', 'extraClass' => ''])
@php
    if ($dropdown)
        $extraClass .= ' flex-row gap-2 ';
    else
        $extraClass .= ' flex-col ';
@endphp
<a {{ $attributes }}
    class="flex {{ $extraClass }} text-emerald-700 font-light hover:text-emerald-400 hover:font-bold items-center group cursor-pointercapitalize text-lg capitalize  ">
    {{ $slot }}

    @if ($info)
        <p class="text-xs text-center ">
            {{ $info }}
        </p>
    @elseif ($dropdown)
        <p class="text-lg text-center hover:text-emerald-400">{{ $dropdown }}</p>
    @endif

</a>
