<div class="p-10 w-4/5 m-auto h-screen">

    <x-title>
        {{ $title }}
    </x-title>

    <x-line :black="true" />

    <div class="mt-5 text-lg leading-8 text-gray-700">
        {{ $slot }}
    </div>

</div>