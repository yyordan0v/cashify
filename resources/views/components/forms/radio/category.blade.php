@props([
    'color' => 'bg-gray-200',
    'image' => 'image',
    'name' => 'category',
    'id' => 'shopping',
])

@php
    $classes = 'cursor-pointer transition-all duration-200 opacity-90 hover:opacity-100 peer-checked:ring-2 dark:peer-checked:ring-4 peer-checked:ring-black dark:peer-checked:ring-white peer-checked:opacity-100';
@endphp

<li>
    <input type="radio" id="{{ $id }}" name="{{ $name }}" value="{{ $id }}" class="hidden peer" required
           @click="$dispatch('color-changed', { color: '{{ $color }}' })"/>

    <x-category-image :is-label="true" margin="mr-0" rounded="rounded-xl" :color="$color" :image="$image"
                      for="{{ $id }}"
        {{ $attributes->merge(['class' => $classes]) }}
    />
    <x-cards.text class="text-2xs mt-1">
        {{ $slot }}
    </x-cards.text>
</li>





