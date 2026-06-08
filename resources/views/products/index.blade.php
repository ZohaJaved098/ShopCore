<x-layouts.mainLayout>

    <div class="p-10 w-full m-auto min-h-screen">
        <x-title> All Products </x-title>
        <div class="flex flex-col mt-5">
            <div class=" flex flex-wrap items-start gap-10 ">
                @forelse ($products as $product)
                    <x-product-card :product="$product" :view="true" />
                @empty
                    <p class="text-center text-red-500 font-semibold">No Data Available</p>
                @endforelse
            </div>
            <x-pagination :data="$products">
            </x-pagination>
        </div>
    </div>
</x-layouts.mainLayout>