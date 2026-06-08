<x-layouts.dashboardLayout>
    <div class=" p-5">
        <div class="mb-5">
            <x-title>
                Welcome Back, {{ auth()->user()->name }}
            </x-title>

            <p class="text-emerald-700 text-lg mt-2 capitalize">
                @foreach(auth()->user()->roles as $role)
                    {{ $role->name }}
                @endforeach
                Dashboard
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-5">

            <x-profile-stat title="Total Products" :count="$products" />
            <x-profile-stat title="Total Blogs" :count="$blogs" />
            <x-profile-stat title="Total Users" :count="$users" />
            <x-profile-stat title="Total Managers" :count="$managers" />
        </div>


        <x-line :black="true" />

        @if(auth()->user()->hasRole('admin'))
            @include('dashboard.partials.admin')
        @endif

        @if(auth()->user()->hasRole('manager'))
            @include('dashboard.partials.manager')
        @endif
    </div>
</x-layouts.dashboardLayout>