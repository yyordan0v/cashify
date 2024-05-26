@props([
    'color' => 'gray',
    'image' => 'image'
])

@php
    $bgColor = 'bg-'.$color.'-300';
    $classes = 'mr-4 p-6 mt-4 rounded-full relative transition-all duration-150 opacity-90 hover:opacity-100';
@endphp

<button>
    <div {{ $attributes->merge(['class' => $classes]) }} :class="color ? {{ $bgColor }} : 'bg-gray-300'">
        <img src="{{ Vite::asset('resources/images/categories/'.$image.'.png') }}"
             class="max-w-8"
             alt="{{ $image }}"
        >

        {{--        <x-icon--}}
        {{--            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 p-2 rounded-full bg-black/60 text-white group-hover:bg-black/40 transition-colors duration-150">--}}
        {{--            add_photo_alternate--}}
        {{--        </x-icon>--}}

        <span class="sr-only">Change Category Image</span>
    </div>
</button>
