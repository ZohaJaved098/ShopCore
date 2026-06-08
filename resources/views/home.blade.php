<x-layouts.mainLayout>
    <div class="m-auto w-full mt-5 p-5  ">
        <div class="flex flex-col items-start gap-4">
            <x-title>Featured Blogs</x-title>
            <div class="mt-7 flex flex-wrap gap-10">
                @forelse ($featuredBlog as $blog)
                    <x-blog-card :blog="$blog" :view="true" />
                @empty
                    <p class="text-center text-red-500 font-semibold">No Data Available</p>

                @endforelse

            </div>
            <x-line />
            <x-title>Featured Products</x-title>
            <div class="mt-7 flex flex-wrap gap-10">
                @forelse ($featuredProduct as $product)
                    <x-product-card :product="$product" :view="true" />
                @empty
                    <p class="text-center text-red-500 font-semibold">No Data Available</p>

                @endforelse

            </div>

        </div>

        <x-pagination :data="$featuredBlog">
        </x-pagination>
    </div>
</x-layouts.mainLayout>