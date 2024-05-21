@props([
    'color' => 'bg-gray-400',
    'name' => 'color',
    'id' => 'gray'
])

@php
    $classes = 'snap-center inline-flex items-center justify-center w-full p-6 shadow-sm rounded-full cursor-pointer transition-all duration-200 opacity-90 hover:opacity-100 peer-checked:ring-2 dark:peer-checked:ring-4 peer-checked:ring-black dark:peer-checked:ring-white peer-checked:opacity-100 ' . $color;
@endphp

<li class="my-1">
    <input type="radio" id="{{ $id }}" name="{{ $name }}" value="{{ $id }}" class="hidden peer" required
           @click="$dispatch('color-changed', { color: '{{ $color }}' })"/>
    <label for="{{ $id }}"
        {{ $attributes->merge(['class' => $classes]) }}
    ></label>
</li>
