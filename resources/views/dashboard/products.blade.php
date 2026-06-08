<x-layouts.dashboardLayout>
    <div class="w-full p-5">

        <div class="mb-5">
            <x-title>
                All Products
            </x-title>
        </div>

        <x-line :black="true" />

        <div class="overflow-x-auto mt-5 w-full">
            <table class="w-full text-left border-collapse">

                <thead>
                    <tr class="border-b">
                        <th class="p-3">Header Image</th>
                        <th class="p-3">Name</th>
                        <th class="p-3 text-wrap">Short Description</th>
                        <th class="p-3">Price</th>
                        <th class="p-3">Featured</th>
                        <th class="p-3">Created</th>
                        <th class="p-3">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($allProducts as $product)
                        <tr class="border-b hover:bg-emerald-50">

                            <td class="p-3 font-semibold">
                                <img src="{{ asset('storage/' . $product->product_image) }}"
                                    class=" object-center object-contain m-auto h-10 w-10 aspect-auto rounded-md ">
                            </td>

                            <td class="p-3">
                                {{ $product->name }}
                            </td>
                            <td class="p-3">
                                {{ $product->short_desc }}
                            </td>
                            <td class="p-3">
                                {{ $product->price }}
                            </td>
                            <td class="p-3">
                                {{ $product->featured ? 'True' : "False" }}
                            </td>

                            <td class="p-3">
                                {{ $product->created_at->diffForHumans() }}
                            </td>

                            <td class="p-3 flex gap-2">

                                <x-btn type="a" href="/products/{{ $product->id }}">
                                    View
                                </x-btn>

                                <x-btn type="a" href="/products/{{ $product->id }}/edit">
                                    Edit
                                </x-btn>

                                <x-btn type="button" :del="true" form="delete-product-{{ $product->id }}">
                                    Delete
                                </x-btn>

                                <form id="delete-product-{{ $product->id }}" method="POST"
                                    action="/products/{{ $product->id }}" hidden>
                                    @csrf
                                    @method('DELETE')
                                </form>

                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-5 text-center text-gray-500">
                                No products found
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>
</x-layouts.dashboardLayout>