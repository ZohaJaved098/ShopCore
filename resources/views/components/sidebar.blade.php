<div class="w-full p-5 flex flex-col border-r-4 border-r-emerald-700 h-screen">
    <h3 class="text-lg font-semibold text-emerald-700 capitalize text-nowrap">
        @foreach(auth()->user()->roles as $role)
            {{ $role->name }}
        @endforeach Dashboard
    </h3>
    <x-line :black="true" />

    <div class="flex flex-col items-start gap-2">

        @if(auth()->user()->hasRole('admin'))
            <x-nav-link href="/dashboard/users">Users</x-nav-link>
            <x-line :black="true" />
        @endif

        @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('manager'))
            <x-nav-link href="/dashboard/products">Products</x-nav-link>
            <x-nav-link href="/products/create">Create Product</x-nav-link>
            <x-line :black="true" />
        @endif

        @if(auth()->user()->hasRole('admin'))
            <x-nav-link href="/dashboard/blogs">Blogs</x-nav-link>
            <x-nav-link href="/blogs/create">Create Blog</x-nav-link>
        @endif

    </div>
    {{-- <div>

    </div> --}}

</div>