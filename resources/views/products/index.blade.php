<x-layouts.mainLayout>

    <div class="p-10 w-full m-auto min-h-screen">
        <x-title> All Products </x-title>
        <div class="flex justify-between items-start flex-wrap mt-5">
            <div class="space-x-6 flex ">
                @forelse ($products as $product)
                    <x-product-card :product="$product" :view="true" />
                @empty
                    <p class="text-center text-red-500 font-semibold">No Data Available</p>
                @endforelse
                <x-pagination :data="$products">
                </x-pagination>
            </div>
        </div>
    </div>
</x-layouts.mainLayout>