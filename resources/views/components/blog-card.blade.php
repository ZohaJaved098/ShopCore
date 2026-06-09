@props(['blog', 'view' => false])
<div class=" relative flex flex-col max-w-md shadow-lg border border-emerald-300 p-5 rounded-lg gap-5 ">
    @if ($blog->header_image)
        <div class="w-60 h-60 p-5 rounded-md self-center ">
            <img src="{{ asset('storage/' . $blog->header_image) }}"
                class=" object-center object-contain m-auto h-full aspect-auto rounded-md ">
        </div>
    @endif
    <div class="flex gap-2 items-start justify-between mt-10 ">
        <div class="flex flex-col gap-4">
            <h3 class="text-xl font-bold text-emerald-600 tracking-wider capitalize">
                {{ $blog->title }}
            </h3>
            <p>
                By {{ $blog->author->name }}
            </p>
        </div>
        @if ($blog->featured)
            <span
                class="absolute top-0 left-0 rounded-br-lg rounded-tl-lg  py-2 px-5 font-bold text-white bg-emerald-800 cursor-default ">Featured</span>
        @endif
    </div>
    <x-line :black="true" />
    @if ($view)
        <p class="line-clamp-1">
            {{ $blog->content }}
        </p>
    @else
        <p class="text-pretty">
            {{ $blog->content }}
        </p>
    @endif

    <x-line :black="true" />

    @if (!empty($blog->tags))
        <div class="flex flex-wrap gap-2 text-sm items-center ">
            @foreach ($blog->tags as $tag)
                <span
                    class="capitalize rounded-lg py-2 px-4 bg-emerald-800 text-white font-semibold shadow-md shadow-white/60 ">
                    {{$tag->name}}
                </span>
            @endforeach
        </div>
        <x-line :black="true" />

    @endif
    <div class="flex justify-end items-end flex-wrap gap-2 ">

        @auth
            @if ($view)
                <x-btn title="View" type="a" href="/blogs/{{$blog->id}}">
                    <x-heroicon-s-eye class="w-5 h-5 text-white" />
                </x-btn>
            @endif
            <x-favblog-btn :data="$blog->id" />
        @endauth

        @can('update', $blog)
            <x-btn title="Edit" type="a" href="/blogs/{{$blog->id}}/edit">
                <x-heroicon-s-pencil class="w-5 h-5 text-white-700" />
            </x-btn>
        @endcan

        @can('delete', $blog)
            <x-btn title="Delete" :del="true" form="delete-form-{{$blog->id}}" type="button">
                <x-heroicon-s-trash class="w-5 h-5 text-white-700" />
            </x-btn>
        @endcan
    </div>


    <form id="delete-form-{{$blog->id}}" name="delete-form" hidden action="/blogs/{{$blog->id}}" method="POST"
        onsubmit="return confirm('Are you sure you want to delete this blog?')">
        @csrf
        @method('DELETE')
    </form>

</div>