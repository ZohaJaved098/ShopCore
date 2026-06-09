@props(['data', 'db'])
@php
    $carted = auth()->user()
        ->carts
        ->contains($db, $data);
@endphp

@if ($carted)
    <x-btn title="Added" form="remove-from-cart-form-{{$data}}" type="button">
        <x-heroicon-s-shopping-cart class="w-5 h-5 text-white" />
    </x-btn>

    <form hidden id="remove-from-cart-form-{{$data}}" name="remove-cart-form" action="/cart/remove/{{ $data }}"
        method="POST">
        @csrf
    </form>
@else
    <x-btn title="Cart" form="cart-form-{{$data}}" type="button">
        <x-heroicon-o-shopping-cart class="w-5 h-5 text-white " />
    </x-btn>
    <form hidden id="cart-form-{{$data}}" name="cart-form" action="/cart/add/{{ $data }}" method="POST">
        @csrf
    </form>
@endif