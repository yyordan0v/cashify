@props(['disabled' => false])

@php
    $classes = 'rounded-lg mt-2 border-neutral-400/50 dark:border-neutral-600/50 dark:bg-neutral-900/50 dark:text-white focus:border-gray-500 focus:ring-gray-500';
@endphp

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => $classes]) !!}>
