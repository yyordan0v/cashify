@props([
    'anchor' => false,
    'size' => 'base'
])


@php
    $classes = 'inline-flex items-center justify-center w-full font-medium leading-6 text-center whitespace-no-wrap transition duration-150 ease-in-out border border-transparent md:mr-1 text-white dark:text-gray-600 md:w-auto bg-black dark:bg-white rounded-lg md:rounded-full hover:bg-neutral-900 dark:hover:bg-neutral-200 focus:outline-none active:bg-neutral-800 dark:active:bg-gray-300';

    if ($size === 'base') {
        $classes .= ' px-4 py-3 md:py-1.5 text-sm';
    }

    if ($size === 'lg') {
        $classes .= ' px-8 py-4 text-base';
    }
@endphp


@if(! $anchor)
    <button {{ $attributes->merge(['type' => 'submit', 'class' => $classes]) }}>
        {{ $slot }}
    </button>
@else
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@endif
