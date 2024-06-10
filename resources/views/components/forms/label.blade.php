@props(['value'])

@php
    $classes = 'block font-medium text-sm text-gray-500 dark:text-gray-400';
@endphp

<label {{ $attributes->merge(['class' => $classes]) }}>
    {{ $value ?? $slot }}
</label>
