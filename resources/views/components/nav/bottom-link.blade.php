@props(['active' => false, 'description' => 'button'])
@php
    $classes = 'inline-flex flex-col items-center justify-center px-5 hover:bg-black/10 dark:hover:bg-black/30 dark:focus:bg-black/30 focus:bg-black/10 transition-colors duration-200 group';
    $iconClasses = 'group-hover:text-gray-800 dark:group-hover:text-gray-200 transition-colors duration-200';

    if ($active) {
        $classes .= ' dark:bg-black/30 bg-black/10';
        $iconClasses .= ' text-gray-800 dark:text-gray-200';
    }
    else {
        $classes .= '';
        $iconClasses .= ' text-gray-500 dark:text-gray-400';
    }
@endphp
<a {{ $attributes->merge(['class' => $classes]) }}>
    <x-icon {{ $attributes->merge(['class' => $iconClasses]) }}>
        {{ $slot }}
    </x-icon>
    <span class="text-black/75 dark:text-white/75 text-xs mt-1">{{ $description }}</span>
    <span class="sr-only">{{ $description }}</span>
</a>
