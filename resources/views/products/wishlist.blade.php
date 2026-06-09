<x-layouts.mainLayout>

    <div class="p-10 w-full">

        <x-title>My Wishlist</x-title>
        <div class="mt-5 flex flex-col gap-5">

            @forelse($items as $item)

                <div class="p-5 border border-emerald-300 rounded-lg shadow-md flex justify-between items-center">
                    <div class="flex items-center space-x-10">

                        @if (
                                $item->product->product_image
                            )
                            <img width="100" height="100" src="{{ asset('storage/' . $item->product->product_image) }}"
                                alt="{{ $item->product->name }}" class="object-center object-contain rounded-md">
                        @endif
                        <div>
                            <h3 class="text-xl text-emerald-700 font-bold">
                                {{ $item->product->name }}
                            </h3>

                            <p>
                                {{ $item->product->short_desc }}
                            </p>
                        </div>
                    </div>
                    <div class="flex items-start gap-2">

                        <x-btn title="View" type="a" href="/products/{{$item->product->id}}">
                            <x-heroicon-s-eye class="w-5 h-5 text-white" />
                        </x-btn>
                        <x-cart-btn :data="$item->product->id" db="product_id" />
                        <x-btn title="Remove" :del="true" form="remove-wishlist-{{ $item->id }}" type="button">
                            <x-heroicon-s-trash class="w-5 h-5 text-white-700" />
                        </x-btn>


                    </div>
                    <form id="remove-wishlist-{{ $item->id }}" method="POST" hidden action="/wishlist/{{ $item->id }}">
                        @csrf
                        @method('DELETE')


                    </form>
                </div>

            @empty
                <p class="text-center text-red-500 font-semibold">Wishlist is Empty</p>
            @endforelse

        </div>

    </div>

</x-layouts.mainLayout>