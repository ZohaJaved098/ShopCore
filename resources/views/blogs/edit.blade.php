<x-layouts.mainLayout>
    <div class="m-auto w-4/5 mt-5">
        <x-form formType="edit" id="edit-form" name="edit-form" action="/blogs/{{ $blog->id }}"
            enctype="multipart/form-data">
            <div class="flex justify-between">
                <x-title>
                    edit
                </x-title>
                <x-nav-link href="/blogs/{{ $blog->id }}">Cancel</x-nav-link>
            </div>
            <x-line :black="true" />
            <div class="flex flex-col mt-5 gap-5">
                <div class="flex flex-col md:flex-row md:items-center w-full md:gap-5">
                    <x-label name="title" title="Title of Blog" />
                    <x-form-input :value="$blog->title" name="title" type="text" />
                    <x-error-msg field="title" />
                </div>
                <x-line :black="true" />
                <div class="flex flex-col items-start justify-start gap-5">
                    <x-label name="tags" title="Tags " />
                    <x-form-tags :value=" $blog->tags->pluck('name')->implode(', ')" :tags="$tags" />
                </div>
                <div class="flex flex-col md:flex-row items-start justify-between">
                    <div class="flex flex-col ">
                        <x-label name="header_image" title="Header Image" />
                        <x-error-msg field="header_image" />
                        <p class="text-emerald-800 text-md font-light">File must be jpeg/jpg format and mustn't exceed
                            2MB
                        </p>
                        @if ($blog->header_image)
                            <div>
                                <p class="text-base font-semibold capitalize text-emerald-700">Preview:</p>
                                <div class="py-3">
                                    <img src="{{ asset('storage/' . $blog->header_image) }}" width="100" height="100"
                                        class="rounded-md " />
                                </div>
                            </div>
                        @endif
                        <x-form-input name="header_image" type="file" />
                    </div>
                    <div class="flex items-center gap-2">
                        <x-form-input name="featured" type="checkbox" :value="$blog->featured" />
                        <x-label name="featured" title="Featured" />
                    </div>
                </div>

                <x-line :black="true" />
                <x-label name="content" title="Content of Blog" />
                <textarea name="content" placeholder="Write here" rows="5"
                    class="w-full h-full mt-2 placeholder:text-emerald-800 text-black outline outline-emerald-300 rounded-lg p-3">{{ $blog->content }}
                </textarea>
                <x-error-msg field="content" />
            </div>
            <x-line :black="true" />
            <x-form-btn>Save Edit</x-form-btn>
        </x-form>
    </div>
</x-layouts.mainLayout>