<x-layouts.mainLayout>

    <div class="p-10 w-full">

        <x-title>Favorite Blogs</x-title>

        <div class="mt-7 flex flex-wrap gap-5 ">

            @forelse($favoriteBlogs as $blog)

                <x-blog-card :blog="$blog" :view="true" />

            @empty

                <p class="text-red-500 font-semibold text-center">
                    No favorite blogs yet
                </p>

            @endforelse

        </div>

        <div class="mt-10">
            <x-pagination :data="$favoriteBlogs" />
        </div>

    </div>

</x-layouts.mainLayout>