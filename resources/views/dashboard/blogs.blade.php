<x-layouts.dashboardLayout>
    <div class="w-full p-5">

        <div class="mb-5">
            <x-title>
                All Blogs
            </x-title>
        </div>

        <x-line :black="true" />

        <div class="overflow-x-auto mt-5 w-full">
            <table class="w-full text-left border-collapse">

                <thead>
                    <tr class="border-b">
                        <th class="p-3">Title</th>
                        <th class="p-3">Author</th>
                        <th class="p-3">Created</th>
                        <th class="p-3">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($allBlogs as $blog)
                        <tr class="border-b hover:bg-emerald-50">

                            <td class="p-3 font-semibold">
                                {{ $blog->title }}
                            </td>

                            <td class="p-3">
                                {{ $blog->user->name ?? 'Unknown' }}
                            </td>

                            <td class="p-3">
                                {{ $blog->created_at->diffForHumans() }}
                            </td>

                            <td class="p-3 flex gap-2">

                                <x-btn type="a" href="/blogs/{{ $blog->id }}">
                                    View
                                </x-btn>

                                <x-btn type="a" href="/blogs/{{ $blog->id }}/edit">
                                    Edit
                                </x-btn>

                                <x-btn type="button" :del="true" form="delete-blog-{{ $blog->id }}">
                                    Delete
                                </x-btn>

                                <form id="delete-blog-{{ $blog->id }}" method="POST" action="/blogs/{{ $blog->id }}" hidden>
                                    @csrf
                                    @method('DELETE')
                                </form>

                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-5 text-center text-gray-500">
                                No blogs found
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>
</x-layouts.dashboardLayout>