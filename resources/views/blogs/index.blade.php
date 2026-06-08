<x-layouts.mainLayout>

    <div class="p-10 w-full m-auto">
        <x-title> All Blogs </x-title>
        <div class="flex justify-between items-start mt-5">
            <div class=" flex flex-wrap gap-6 ">
                @forelse ($blogs as $blog)
                    <x-blog-card :view="true" :blog="$blog" />
                @empty
                    <p class="text-center text-red-500 font-semibold">No Data Available</p>

                @endforelse
                <x-pagination :data="$blogs">
                </x-pagination>
            </div>
        </div>
    </div>

</x-layouts.mainLayout>