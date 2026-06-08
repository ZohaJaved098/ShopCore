@props(['data'])
@if(auth()->user()->favoriteBlogs->contains($data))
    <form hidden id="remove-fav-{{ $data }}" action="/favorite-blogs/{{$data}}" method="POST">
        @csrf
        @method('DELETE')

    </form>
    <x-btn type="button" title="Remove from Favorites" form="remove-fav-{{ $data }}">
        <x-heroicon-s-heart class="w-5 h-5 text-red-300" />
    </x-btn>

@else

    <x-btn type="button" title="Add to Favorites" form="add-fav-{{ $data }}">
        <x-heroicon-o-heart class="w-5 h-5 text-white" />
    </x-btn>
    <form hidden id="add-fav-{{ $data }}" action="/favorite-blogs/{{$data}}" method="POST">
        @csrf
    </form>

@endif