@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white text-gray-900 dark:text-white'
                : 'w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white';
@endphp


<svg {{ $attributes->merge(['class' => $classes, 'viewBox' => '0 0 20 20']) }}
     fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    {{ $slot }}
</svg>
