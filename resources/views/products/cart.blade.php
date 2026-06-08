<x-layouts.mainLayout>
    <div x-data="{ open: false }" class="p-10 w-full">
        <x-title>My Cart</x-title>
        <div class="mt-5 flex flex-col gap-5">
            @forelse($cartItems as $item)
                <div class="p-5 border border-emerald-300 rounded-lg shadow-md flex justify-between items-center">
                    <div class="flex items-center space-x-10">
                        @if (
                                $item->product->product_image
                            )
                            <img width="100" height="100" src="{{ asset('storage/' . $item->product->product_image) }}"
                                alt="{{ $item->product->name }}" class="object-center object-contain rounded-md">
                        @endif
                        <div>
                            <h3 class="text-xl font-bold">
                                {{ $item->product->name }}
                            </h3>
                            <p class="text-emerald-600">
                                <span class="font-bold ">
                                    Price:</span> {{ $item->product->price }}/- PKR
                            </p>

                        </div>
                    </div>

                    <div class="flex flex-col items-end gap-5">
                        <div class="flex items-start gap-2">

                            <x-btn title="View" type="a" href="/products/{{$item->product->id}}">
                                <x-heroicon-s-eye class="w-5 h-5 text-white" />
                            </x-btn>
                            <x-btn title="Remove" :del="true" form="remove-form-{{$item->id}}" type="button">
                                <x-heroicon-s-trash class="w-5 h-5 text-white-700" />
                            </x-btn>

                            <form method="POST" id="remove-form-{{$item->id}}" name="remove-form" hidden
                                action="/cart/remove/{{ $item->id }}">
                                @csrf
                            </form>
                        </div>
                        <div class="flex flex-col items-center justify-center gap-4 mt-3">
                            <div class="flex items-center gap-2">
                                <x-btn type="button" form="plus-form-{{$item->id}}">
                                    <x-heroicon-o-plus-circle class="w-5 h-5 text-white " />
                                </x-btn>
                                <form hidden id="plus-form-{{$item->id}}" method="POST"
                                    action="/cart/{{ $item->id }}/quantity">
                                    @csrf
                                    @method('PATCH')
                                    <input hidden name="quantity" value="{{ $item->quantity + 1 }}">
                                </form>

                                <p class=" px-5 py-1.5 border border-emerald-800 rounded-md">
                                    {{ $item->quantity }}
                                </p>
                                @if ($item->quantity <= 1)

                                    <x-btn disabled type="button">
                                        <x-heroicon-o-minus-circle class="w-5 h-5 text-white " />
                                    </x-btn>
                                @else

                                    <x-btn type="button" form="minus-form-{{$item->id}}">
                                        <x-heroicon-o-minus-circle class="w-5 h-5 text-white " />
                                    </x-btn>
                                @endif
                                <form hidden id="minus-form-{{$item->id}}" method="POST"
                                    action="/cart/{{ $item->id }}/quantity">
                                    @csrf
                                    @method('PATCH')

                                    <input hidden name="quantity" value="{{  max(1, $item->quantity - 1) }}">

                                </form>
                            </div>
                            <div class="flex gap-2 items-center text-lg text-emerald-600 font-semibold">
                                Total:
                                <p>
                                    {{ $item->product->price * $item->quantity }}/- PKR
                                </p>
                            </div>
                        </div>


                    </div>
                </div>
            @empty
                <p class="text-center text-red-500 font-semibold">
                    Cart is Empty
                </p>
            @endforelse

        </div>


        @if(count($cartItems))
            <div class="mt-10 flex items-center justify-end gap-5">
                @php
                    $total = 0;
                    foreach ($cartItems as $item)
                        $total += $item->product->price * $item->quantity;

                @endphp
                <div class="flex gap-2 items-center text-emerald-600 font-bold">
                    Total:
                    <p>
                        {{ $total }}/- PKR
                    </p>
                </div>


                <button type="button" @click="open = true"
                    class="bg-emerald-600 text-white px-5 py-3 rounded-lg font-semibold hover:bg-emerald-700 transition">

                    Order Now

                </button>

            </div>
        @endif


        {{-- ADDED SIMPLE CHECKOUT MODAL --}}
        <div x-show="open" x-cloak class="fixed inset-0 bg-black/50 flex justify-center items-center z-50">

            <div class="bg-white p-10 rounded-lg w-11/12 md:w-1/2">

                <h3 class="text-2xl font-bold text-emerald-700">
                    Confirm Order
                </h3>

                <div class="mt-5 flex flex-col gap-3">

                    @php $total = 0; @endphp

                    @foreach($cartItems as $item)

                        @php
                            $subtotal = $item->product->price * $item->quantity;
                            $total += $subtotal;
                        @endphp

                        <div class="flex justify-between border-b pb-2">

                            <p>
                                {{ $item->product->name }} x {{ $item->quantity }}
                            </p>

                            <p>
                                {{ $subtotal }}
                            </p>

                        </div>

                    @endforeach

                    <div class="flex justify-between font-bold text-xl mt-5">

                        <p>Total</p>

                        <p>{{ $total }}</p>

                    </div>

                </div>

                <div class="flex justify-end gap-3 mt-10 h-10">


                    <x-btn type="button" @click="open = false" :del="true">
                        Cancel
                    </x-btn>
                    <x-btn form="checkout" type="button">
                        Confirm Order
                    </x-btn>

                    <form hidden id="checkout" action="/checkout" method="POST">
                        @csrf


                    </form>

                </div>

            </div>

        </div>

    </div>

</x-layouts.mainLayout>