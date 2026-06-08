@props(['type', 'name', 'value' => old($name)])
<div class="relative w-full">
    <input type="{{ $type }}" value="{{ $value }}" name="{{ $name }}" {{ $type == 'checkbox' && $value ? 'checked' : ''}}
        @if ($type == 'password') id="togglePassword" @else id="{{ $name }}" @endif class=" {{ $type === 'checkbox' || $type === 'file' ? " cursor-pointer " : " cursor-text " }} p-3 rounded-lg bg-white my-5 outline outline-emerald-300
    {{ $type == 'file'
    ? 'file:bg-emerald-500 file:text-white file:border-0 file:px-4 file:py-2 file:rounded-lg file:cursor-pointer file:mr-4 hover:file:bg-emerald-600'
    : '' }} {{ $type == 'checkbox' ? "accent-emerald-700 w-5 h-5 outline-0" : " w-full " }} " />
    @if ($name === 'password')
        <x-heroicon-o-eye class="text-emerald-700 hover:text-emerald-400 w-8 h-8 absolute right-3 top-7 " id="toggleBtn" />
        <x-heroicon-o-eye-slash class=" hidden text-emerald-700 hover:text-emerald-400 w-8 h-8 absolute right-3 top-7 "
            id="toggleBtnSlash" />
    @endif
</div>