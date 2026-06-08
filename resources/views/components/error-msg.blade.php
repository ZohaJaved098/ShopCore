@props(['field'])
@if ($field == 'password' && $errors->first($field))
    <p class="text-red-700 font-semibold py-3 ">
        @if($errors->first($field) == 'The password field confirmation does not match.')
            Password doesn't match!
        @else
            Password must be atleast 8 characters and have number, letter and special symbol.
        @endif
    </p>
@else
    @foreach ($errors->get($field) as $message)
        <p class="text-red-700 font-semibold py-3 ">
            {{ $message }}
        </p>
    @endforeach
@endif