@props(['data'])
<x-btn title="Delete" :del="true" form="delete-form-{{$data}}" type="button">
    <x-heroicon-s-trash class="w-5 h-5 text-white-700" />
</x-btn>
<form id="delete-form-{{$data}}" name="delete-form" hidden action="/products/{{$data}}" method="POST"
    onsubmit="return confirm('Are you sure you want to delete this product?')">
    @csrf
    @method('DELETE')
</form>