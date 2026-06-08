@props(['data', 'db'])
@php
    $carted = auth()->user()
        ->carts
        ->contains($db, $data);
@endphp

@if ($carted)

    <x-btn extraClass="cursor-no-drop" title="Added" type="button">
        <x-heroicon-s-shopping-cart class="w-5 h-5 text-white" />
    </x-btn>

@else


    <x-btn title="Cart" form="cart-form-{{$data}}" type="button">
        <x-heroicon-o-shopping-cart class="w-5 h-5 text-white " />
    </x-btn>
    <form hidden id="cart-form-{{$data}}" name="cart-form" action="/cart/add/{{ $data }}" method="POST">
        @csrf
    </form>
@endif