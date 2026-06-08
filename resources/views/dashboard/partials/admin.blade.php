<div class="flex flex-col gap-5 mt-10 w-full">

    <x-title>
        Admin Controls
    </x-title>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

        <div class="shadow-md rounded-lg p-5 border border-emerald-300">
            <h3 class="font-bold text-xl text-emerald-700">
                Manage Users
            </h3>

            <p class="mt-2 text-gray-600">
                View and manage all platform users.
            </p>

            <div class="mt-5">
                <x-btn href="/dashboard/users" type="a">
                    View Users
                </x-btn>
            </div>
        </div>

        <div class="shadow-md rounded-lg p-5 border border-emerald-300">
            <h3 class="font-bold text-xl text-emerald-700">
                Manage Products
            </h3>

            <p class="mt-2 text-gray-600">
                Create, edit and delete products.
            </p>

            <div class="mt-5 flex gap-2">
                <x-btn href="/products/create" type="a">
                    Add Product
                </x-btn>

                <x-btn href="/dasboard/products" type="a">
                    Products
                </x-btn>
            </div>
        </div>

        <div class="shadow-md rounded-lg p-5 border border-emerald-300">
            <h3 class="font-bold text-xl text-emerald-700">
                Manage Blogs
            </h3>

            <p class="mt-2 text-gray-600">
                Access all blog controls.
            </p>

            <div class="mt-5 flex gap-2">
                <x-btn href="/blogs/create" type="a">
                    Add Blog
                </x-btn>

                <x-btn href="/dashboard/blogs" type="a">
                    Blogs
                </x-btn>
            </div>
        </div>

    </div>

</div>