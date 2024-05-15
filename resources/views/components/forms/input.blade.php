@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'rounded-lg shadow-sm mt-2 border-gray-300 dark:border-gray-700 dark:bg-transparent dark:text-white focus:border-gray-500 focus:ring-gray-500'
    ]) !!}>
