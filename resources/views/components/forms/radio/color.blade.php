@props([
    'color' => 'gray',
    'name' => 'color',
    'id' => 'gray',
    'checked' => false
])

@php
    $bgColor = 'bg-'.$color.'-300';

    $classes = 'snap-center inline-flex items-center justify-center w-full p-6 shadow-sm rounded-full cursor-pointer transition-all duration-200 opacity-90 hover:opacity-100 peer-checked:ring-2 dark:peer-checked:ring-4 peer-checked:ring-black dark:peer-checked:ring-white peer-checked:opacity-100 ' . $bgColor;
@endphp

<li class="my-1">
    <input type="radio" id="{{ $id }}" name="{{ $name }}" value="{{ $id }}"
           {{ $checked ? 'checked' : '' }}
           class="hidden peer" required
           @click="$dispatch('color-changed', { color: '{{ $bgColor }}' })"/>
    <label for="{{ $id }}"
        {{ $attributes->merge(['class' => $classes]) }}
    ></label>
</li>
