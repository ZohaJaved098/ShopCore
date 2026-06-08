<x-layouts.mainLayout>
    <div class="p-10 min-h-screen max-h-full w-full mt-3 flex flex-col gap-5">
        <x-title>Order History</x-title>

        @forelse($orders as $order)

            <div class="border rounded-lg p-5 shadow-md">

                <div class="flex justify-between items-center">

                    <h3 class="text-xl font-bold text-emerald-700">
                        Order #{{ $order->id }}
                    </h3>

                    <p>
                        {{ $order->created_at->format('d M Y') }}
                    </p>

                </div>

                <div class="mt-5 flex flex-col gap-3">

                    @foreach($order->items as $item)

                        <div class="flex justify-between border-b pb-2">

                            <p>
                                {{ $item->product->name }} x {{ $item->quantity }}
                            </p>

                            <p>
                                {{ $item->price * $item->quantity }}
                            </p>

                        </div>

                    @endforeach

                </div>

                <div class="mt-5 text-right font-bold text-xl text-emerald-700">
                    Total: {{ $order->total_price }}/- PKR
                </div>

            </div>

        @empty

            <p>No orders yet</p>

        @endforelse

    </div>


    </div>
</x-layouts.mainLayout>