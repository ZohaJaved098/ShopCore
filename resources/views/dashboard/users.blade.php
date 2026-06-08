<x-layouts.dashboardLayout>
    <div class="w-full p-5">

        <div class="mb-5">
            <x-title>
                All Users
            </x-title>
        </div>

        <x-line :black="true" />

        <div class="overflow-x-auto mt-5 w-full">
            <table class="w-full text-left border-collapse">

                <thead>
                    <tr class="border-b">
                        <th class="p-3">Name</th>
                        <th class="p-3">Email</th>
                        <th class="p-3">Role</th>
                        <th class="p-3">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($allUsers as $user)
                        <tr class="border-b hover:bg-emerald-50">

                            <td class="p-3 font-semibold">
                                {{ $user->name }}
                            </td>

                            <td class="p-3">
                                {{ $user->email }}
                            </td>

                            <td class="p-3 capitalize">
                                @foreach ($user->roles as $roles)
                                    {{ $roles->name }}
                                @endforeach
                            </td>

                            <td class="p-3 flex gap-2">

                                @if ($user->hasRole('admin'))
                                    No Action for Admin

                                @else
                                    @if($user->hasRole('manager'))
                                        <form method="POST" id="make-user-{{ $user->id }}"
                                            action="/users/{{ $user->id }}/make-user">
                                            @csrf
                                            @method('PATCH')

                                            <x-btn form="make-user-{{ $user->id }}" type="button">
                                                Make User
                                            </x-btn>
                                        </form>
                                    @else
                                        <form method="POST" id="make-manager-{{ $user->id }}"
                                            action="/users/{{ $user->id }}/make-manager">
                                            @csrf
                                            @method('PATCH')

                                            <x-btn form="make-manager-{{ $user->id }}" type="button">
                                                Make Manager
                                            </x-btn>
                                        </form>
                                    @endif

                                @endif

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-5 text-center text-gray-500">
                                No users found
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>
</x-layouts.dashboardLayout>