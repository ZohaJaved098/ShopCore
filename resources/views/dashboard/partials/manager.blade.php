{{-- ADDED MANAGER DASHBOARD PARTIAL --}}

<div class="flex flex-col gap-5">

    <x-title>
        Manager Controls
    </x-title>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

        <div class="shadow-md rounded-lg p-5 border border-emerald-300">
            <h3 class="font-bold text-xl text-emerald-700">
                Product Management
            </h3>

            <p class="mt-2 text-gray-600">
                Create and manage products.
            </p>

            <div class="mt-5 flex gap-2">
                <x-btn href="/products/create" type="a">
                    Add Product
                </x-btn>

                <x-btn href="dashboard/products" type="a">
                    Products
                </x-btn>
            </div>
        </div>

        <div class="shadow-md rounded-lg p-5 border border-emerald-300">
            <h3 class="font-bold text-xl text-emerald-700">
                Inventory Overview
            </h3>

            <p class="mt-2 text-gray-600">
                Monitor featured and active products.
            </p>
        </div>

    </div>

</div>