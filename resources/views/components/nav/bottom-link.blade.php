@props(['active' => false, 'description' => 'button'])
@php
    $classes = 'inline-flex flex-col items-center justify-start mt-1 px-2 transition-colors duration-200 group';

    $iconClasses = 'p-2 group-hover:text-gray-800 dark:group-hover:text-gray-200 transition-colors duration-200 hover:bg-black/10 dark:hover:bg-black/30 dark:focus:bg-black/30 focus:bg-black/10 rounded-lg';

    $descriptionClasses = 'text-black/75 dark:text-white/75 text-2xs';

    if ($active) {
        $descriptionClasses .= ' font-semibold';
        $iconClasses .= ' text-gray-800 dark:text-gray-200 dark:bg-gray-700 bg-gray-200 ';
    }
    else {
        $iconClasses .= ' text-gray-500 dark:text-gray-400';
        $descriptionClasses .= '';
    }
@endphp
<a {{ $attributes->merge(['class' => $classes]) }}>
    <x-icon {{ $attributes->merge(['class' => $iconClasses]) }}>
        {{ $slot }}
    </x-icon>
    <span {{ $attributes->merge(['class' => $descriptionClasses]) }}>{{ $description }}</span>
    <span class="sr-only">{{ $description }}</span>
</a>
