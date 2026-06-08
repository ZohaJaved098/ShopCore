@props(['product', 'view' => false])
<div class="relative flex flex-col w-md shadow-lg shadow-emerald-400 p-5 rounded-lg gap-5 ">
    <div class="flex @if (!$view) flex-col @endif  ">
        @if ($product->product_image)
            <div class="w-40 h-40 rounded-md self-center ">
                <img src="{{ asset('storage/' . $product->product_image) }}"
                    class=" object-center object-contain m-auto h-full aspect-auto rounded-md ">
            </div>
        @endif

        <div class="flex flex-col gap-5 ml-5 mt-6">
            <h3 class="text-xl  font-bold text-emerald-600 tracking-wider capitalize">
                {{ $product->name }}
            </h3>
            <div class="flex flex-col gap-2">
                <h4 class=" font-semibold text-emerald-500 tracking-wider capitalize">
                    Short description:
                </h4>
                <p>
                    {{ $product->short_desc }}
                </p>
            </div>
            @if (!$view)
                <div class="flex flex-col gap-2 items-start">
                    <x-label name="long_desc" title="long description" />
                    <p class="">
                        {{ $product->long_desc }}
                    </p>
                </div>
            @endif
        </div>
    </div>

    @if ($product->featured)
        <span
            class="absolute top-0 right-0 rounded-bl-lg rounded-tr-lg py-2 px-5 font-bold text-white bg-emerald-800 cursor-default ">Featured</span>
    @endif


    <x-line :black="true" />
    <div class="flex justify-end items-end gap-2">
        @auth
            @if ($view)
                <x-btn title="View" type="a" href="/products/{{$product->id}}">
                    <x-heroicon-s-eye class="w-5 h-5 text-white" />
                </x-btn>
            @endif

            <x-wishlist-btn :data="$product->id" db="product_id" />

            <x-cart-btn :data="$product->id" db="product_id" />
        @endauth
        @can('update', $product)
            <x-btn title="Edit" type="a" href="/products/{{$product->id}}/edit">
                <x-heroicon-s-pencil class="w-5 h-5 text-white-700" />
            </x-btn>
        @endcan

        @can('delete', $product)
            <x-del-btn :data="$product->id" />
        @endcan

    </div>
</div>