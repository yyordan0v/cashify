@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white bg-gray-100 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 group space-x-3'
                : 'flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group space-x-3';
@endphp


<li>
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
</li>
