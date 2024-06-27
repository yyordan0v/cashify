@props([
    'color' => 'bg-gray-200',
    'image' => 'image',
    'size' => 'base',
    'rounded' => 'rounded-full',
    'margin' => 'mr-4',
    'isLabel' => false
])

@php
    $classes = 'block ' . $rounded . ' ' . $color. ' ' . $margin;

    if ($size === 'base') {
        $classes .= ' p-6';
    }

    if ($size === 'small') {
        $classes .= ' p-3';
    }

@endphp

@if($isLabel)
    <label {{ $attributes->merge(['class' => $classes]) }}>
        <img src="{{ asset('images/categories/'.$image.'.png') }}" alt="{{ $image }}"
             class="max-w-8" loading="lazy">
    </label>
@else
    <div {{ $attributes->merge(['class' => $classes]) }}>
        <img src="{{  asset('images/categoriries/'.$image.'.png') }}" alt="{{ $image }}"
             class="max-w-8" loading="lazy">
        <span class="sr-only">{{ $image }}</span>
    </div>
@endif
