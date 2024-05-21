@props([
    'color' => 'bg-gray-200',
    'image' => 'image',
    'size' => 'base',
    'rounded' => 'full',
    'margin' => 'mr-4'
])

@php
    $classes = 'rounded-' . $rounded . ' ' . $color. ' ' . $margin;

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
