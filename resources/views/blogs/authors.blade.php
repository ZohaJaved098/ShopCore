<x-layouts.mainLayout>

    <div class="p-10 w-full">

        <x-title>Our Authors</x-title>

        <div class="mt-10 flex flex-col gap-10">

            @forelse($authors as $author)

                <div class="border border-emerald-300 rounded-lg p-5 shadow-md">

                    <div class="flex items-center gap-5">
                        <x-avatar :user="$author" />
                        <div>
                            <h3 class="text-2xl font-bold text-emerald-700">
                                {{ $author->name }}
                            </h3>
                            <p class="text-gray-600">
                                {{ $author->email }}
                            </p>


                            @if($author->bio)
                                <p class="mt-2">
                                    {{ $author->bio }}
                                </p>
                            @endif

                        </div>

                    </div>

                    <x-line :black="true" />


                    <div class="mt-5">

                        <h4 class="font-semibold text-lg mb-3">
                            Blogs
                        </h4>

                        <div class="flex items-start flex-wrap gap-3 mt-3">

                            @forelse($author->blogs as $blog)

                                <div
                                    class=" min-w-60 border border-emerald-200 shadow rounded-md p-5 flex justify-between items-center gap-5">
                                    <h5 class="font-semibold text-emerald-700 capitalize">
                                        {{ $blog->title }}
                                    </h5>
                                    <x-btn type="a" href="blogs/{{ $blog->id }}" title="View">
                                        <x-heroicon-s-eye class="w-5 h-5 text-white" />
                                    </x-btn>
                                </div>
                            @empty
                                <p class="text-red-500">
                                    No blogs yet
                                </p>
                            @endforelse
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-red-500 text-center">
                    No Authors Found
                </p>
            @endforelse

        </div>

    </div>

</x-layouts.mainLayout>