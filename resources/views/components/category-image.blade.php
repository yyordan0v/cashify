@props([
    'color' => 'bg-gray-200',
    'image' => 'shopping',
    'size' => 'base'
])

@php
    $classes = 'mr-4 rounded-full ' . $color;

    if ($size === 'base') {
        $classes .= ' p-6';
    }

    if ($size === 'small') {
        $classes .= ' p-3';
    }

@endphp
<div {{ $attributes->merge(['class' => $classes]) }}>
    <img src="{{ Vite::asset('resources/images/categories/'.$image.'.png') }}" alt="{{ $image }}"
         class="max-w-8">
    <span class="sr-only">{{ $image }}</span>
</div>
