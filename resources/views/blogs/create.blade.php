<x-layouts.mainLayout>
    <div class="m-auto w-4/5 mt-5">
        <x-form formType="create" id="create-form" name="create-form" action="/blogs" enctype="multipart/form-data">
            <div class="flex justify-between">
                <x-title>
                    Create new Blog
                </x-title>
                <x-nav-link href="/blogs">Cancel</x-nav-link>
            </div>
            <x-line :black="true" />
            <div class="flex flex-col mt-5 gap-5">
                <div class="flex items-center w-full gap-5">
                    <x-label name="title" title="Title of Blog" />
                    <x-form-input name="title" type="text" />
                </div>
                <x-line :black="true" />
                <div class="flex flex-col items-start justify-start gap-5">
                    <x-label name="tags" title="Tags " />
                    <x-form-tags :tags="$tags" />
                </div>
                <div class="flex items-start justify-between">
                    <div class="flex flex-col ">
                        <x-label name="header_image" title="Header Image" />
                        <p class="text-emerald-800 text-md font-light">File must be jpeg/jpg format and mustn't exceed
                            2MB
                        </p>
                        <x-form-input name="header_image" type="file" />
                    </div>
                    <div class="flex items-center gap-2">
                        <x-form-input name="featured" type="checkbox" />
                        <x-label name="featured" title="Featured" />
                    </div>
                </div>

                <x-line :black="true" />
                <x-label name="content" title="Content of Blog" />
                <textarea name="content" placeholder="Write here" rows="5"
                    class="w-full h-full mt-2 placeholder:text-emerald-800 text-black outline outline-emerald-300 rounded-lg p-3"></textarea>
            </div>
            <x-line :black="true" />
            <x-form-btn>Create</x-form-btn>
        </x-form>
    </div>
</x-layouts.mainLayout>