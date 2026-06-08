<x-layouts.mainLayout>
    <div class="m-auto w-4/5 mt-5">
        <x-form formType="create" id="create-form" name="create-form" action="/products" enctype="multipart/form-data">
            <div class="flex justify-between">
                <x-title>
                    Create new Product
                </x-title>
                <x-nav-link href="/products">Cancel</x-nav-link>
            </div>
            <x-line :black="true" />
            <div class="flex flex-col mt-5 gap-5">
                <div class="flex items-center w-full gap-5">
                    <x-label name="name" title="name " />
                    <x-form-input name="name" type="text" />
                    <x-error-msg field="name" />
                </div>
                <div class="flex items-center w-full gap-5">
                    <x-label name="price" title="price" />
                    <x-form-input name="price" type="number" />
                    <x-error-msg field="price" />
                </div>
                <x-label name="short_desc" title="short description" />
                <x-form-input name="short_desc" type="text" />
                <x-error-msg field="short_Desc" />

                <div class="flex items-start justify-between">
                    <div class="flex flex-col ">
                        <x-label name="product_image" title="product Image" />
                        <p class="text-emerald-800 text-md font-light">File must be jpeg/jpg format and mustn't exceed
                            2MB
                        </p>
                        <x-form-input name="product_image" type="file" />
                        <x-error-msg field="product_image" />
                    </div>
                    <div class="flex flex-col  gap-2">
                        <div class=" flex gap-2 items-center">

                            <x-form-input name="featured" type="checkbox" />
                            <x-label name="featured" title="Featured" />
                        </div>
                        <x-error-msg field="featured" />
                    </div>
                </div>

                <x-line :black="true" />
                <x-label name="long_desc" title="long description" />
                <x-error-msg field="long_desc" />
                <textarea name="long_desc" placeholder="Write here" rows="5"
                    class="w-full h-full mt-2 placeholder:text-emerald-800 text-black outline outline-emerald-300 rounded-lg p-3"></textarea>
            </div>
            <x-line :black="true" />
            <x-form-btn>Create</x-form-btn>
        </x-form>
    </div>
</x-layouts.mainLayout>