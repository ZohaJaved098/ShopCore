@props(['extraClass' => '', 'formType' => ''])
@php
    if ($formType)
        $extraClass .= " bg-transparent mb-5 ";
    else
        $extraClass .= " bg-emerald-700/25 ";
@endphp

<form method="POST" {{ $attributes }}
    class=" w-full md:w-4/5 h-fit p-10 m-auto flex flex-col {{ $extraClass }} rounded-lg  shadow-2xl">
    @csrf
    @if ($formType == 'edit')
        @method('PATCH')
    @endif
    {{ $slot }}
</form>