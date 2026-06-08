<x-layouts.mainLayout>
    <div class="m-auto w-4/5 mt-5">
        <x-form formType="edit" id="edit-form" name="edit-form" action="/products/{{ $product->id }}"
            enctype="multipart/form-data">
            <div class="flex justify-between">
                <x-title>
                    edit
                </x-title>
                <x-nav-link href="/products/{{ $product->id }}">Cancel</x-nav-link>
            </div>
            <x-line :black="true" />
            <div class="flex flex-col mt-5 gap-5">
                <div class="flex flex-col md:flex-row md:items-center w-full md:gap-5">
                    <x-label name="name" title="name" />
                    <x-form-input :value="$product->name" name="name" type="text" />
                    <x-error-msg field="name" />
                </div>
                <div class="flex items-center w-full gap-5">
                    <x-label name="price" title="price" />
                    <x-form-input :value="$product->price" name="price" type="number" />
                    <x-error-msg field="price" />
                </div>
                <x-label name="short_desc" title="short description" />
                <x-form-input :value="$product->short_desc" name="short_desc" type="text" />
                <x-error-msg field="short_Desc" />
                <x-line :black="true" />

                <div class="flex flex-col md:flex-row items-start justify-between">
                    <div class="flex flex-col ">
                        <x-label name="product_image" title="Header Image" />
                        <p class="text-emerald-800 text-md font-light">File must be jpeg/jpg format and mustn't exceed
                            2MB
                        </p>
                        @if ($product->product_image)
                            <div>
                                <p class="text-base font-semibold capitalize text-emerald-700">Preview:</p>
                                <div class="py-3">
                                    <img src="{{ asset('storage/' . $product->product_image) }}" width="100" height="100"
                                        class="rounded-md " />
                                </div>
                            </div>
                        @endif
                        <x-form-input name="product_image" type="file" />
                        <x-error-msg field="product_image" />
                    </div>
                    <div class="flex items-center gap-2">
                        <x-form-input name="featured" type="checkbox" :value="$product->featured" />
                        <x-label name="featured" title="Featured" />
                        <x-error-msg field="featured" />
                    </div>
                </div>

                <x-line :black="true" />
                <x-label name="long_desc" title="long description" />
                <x-error-msg field="long_desc" />
                <textarea name="long_desc" placeholder="Write here" rows="5"
                    class="w-full h-full mt-2 placeholder:text-emerald-800 text-black outline outline-emerald-300 rounded-lg p-3">{{ $product->long_desc }}
                </textarea>
            </div>
            <x-line :black="true" />
            <x-form-btn>Save Edit</x-form-btn>
        </x-form>
    </div>
</x-layouts.mainLayout>