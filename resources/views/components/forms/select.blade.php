@props(['name', 'id'])

<select name="{{ $name }}" id="{{ $id }}"
    {{ $attributes->merge(['class' => 'rounded-lg shadow-sm mt-2 border-gray-300 dark:border-gray-500 dark:bg-neutral-900/50 dark:text-white focus:border-gray-500 focus:ring-gray-500']) }}>
    {{ $slot }}
</select>
