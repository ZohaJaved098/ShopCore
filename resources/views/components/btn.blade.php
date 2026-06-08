@props(['type' => '', 'del' => false, 'extraClass' => ''])
@php
    if ($del)
        $extraClass = " bg-red-700 hover:bg-red-400 "
@endphp
@if($type === 'button')
    <button {{ $attributes }}
        class="px-5 py-2 capitalize bg-emerald-700 {{ $extraClass }} hover:bg-emerald-400 rounded-lg text-white hover:text-white/50 text-nowrap">
        {{ $slot }}
    </button>
@elseif($type === 'a')
    <a {{ $attributes }}
        class="px-5 py-2 bg-emerald-700 hover:bg-emerald-400 rounded-lg {{ $extraClass }} text-white hover:text-white/50 capitalize text-nowrap">
        {{ $slot }}
    </a>
@endif