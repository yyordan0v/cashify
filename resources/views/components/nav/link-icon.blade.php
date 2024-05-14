@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white text-gray-900 dark:text-white'
                : 'w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white';
@endphp


<x-icon {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</x-icon>
