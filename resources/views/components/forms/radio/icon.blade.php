@props([
    'icon' => 'image',
    'name' => 'icon',
    'id' => 'image',
    'checked' => false
])

@php
    $classes = 'snap-center inline-flex items-center justify-center w-full p-4 shadow-sm rounded-full cursor-pointer transition-all duration-200 dark:hover:bg-gray-700 hover:bg-gray-200 peer-checked:bg-gray-200 dark:peer-checked:bg-gray-700';
@endphp

<li class="my-1">
    <input type="radio" id="{{ $id }}" name="{{ $name }}" value="{{ $id }}"
           {{ $checked ? 'checked' : '' }}
           class="hidden peer" required
    />
    <label for="{{ $id }}"
           {{ $attributes->merge(['class' => $classes]) }}
           x-on:click="$dispatch('close')"
    >
        <img src="{{ Vite::asset('resources/images/categories/' . $icon) }}"
             alt="{{ $id }}" width="40" height="40">
    </label>
</li>
