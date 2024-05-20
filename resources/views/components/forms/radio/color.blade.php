@props([
    'color' => 'bg-gray-400',
    'name' => 'color',
    'id' => 'gray'
])

@php
    $classes = 'snap-center inline-flex items-center justify-center w-full p-6 shadow-sm border-2 rounded-full cursor-pointer transition-all duration-200 border-transparent peer-checked:border-gray-600 dark:peer-checked:border-gray-50  opacity-90 hover:opacity-100 '.$color;
@endphp

<li>
    <input type="radio" id="{{ $id }}" name="{{ $name }}" value="{{ $id }}" class="hidden peer" required
           @click="$dispatch('color-changed', { color: '{{ $color }}' })"/>
    <label for="{{ $id }}"
        {{ $attributes->merge(['class' => $classes]) }}
    ></label>
</li>
