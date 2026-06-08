@props(['data', 'db'])
@php
    $wishlisted = auth()->user()
        ->wishlists
        ->contains($db, $data);
@endphp

@if($wishlisted)
    <x-btn title="Remove from Wishlist" form="wishlist-remove-form-{{$data}}" type="button">
        <x-heroicon-s-heart class="w-5 h-5 text-red-300" />
    </x-btn>
    <form hidden id="wishlist-remove-form-{{$data}}" action="/wishlist/remove/{{ $data }}" method="POST">
        @csrf
        @method('DELETE')

    </form>
@else
    <x-btn title="Add to wishlist" form="wishlist-add-form-{{$data}}" type="button">
        <x-heroicon-o-heart class="w-5 h-5 text-white" />
    </x-btn>
    <form hidden id="wishlist-add-form-{{$data}}" action="/wishlist/add/{{ $data }}" method="POST">
        @csrf
    </form>
@endif