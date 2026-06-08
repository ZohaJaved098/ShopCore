@props(['user', 'small' => false])
@php
    if ($small) {
        $extraClass = 'w-10 h-10';
        $width = '80';
    } else {
        $extraClass = 'w-32 h-32 ';
        $width = '100';
    }

@endphp
@if (
        empty($user->profile_pic)
    )
    <img src="https://picsum.photos/seed/50/{{ $width }}" alt="profile-img"
        class="rounded-full border-4 border-emerald-400  {{ $extraClass }} object-center object-contain  ">
@else
    <img src="{{ asset('storage/' . $user->profile_pic) }}" alt="profile-img"
        class="rounded-full border-4 border-emerald-400 {{ $extraClass }} object-center object-contain " />

@endif