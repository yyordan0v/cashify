@props(['count' => '2'])

<x-panels.panel x-ref="tabButtons"
    {{ $attributes->merge(['class' => 'relative inline-grid items-center justify-center w-full h-10 grid-cols-'.$count.' p-1 select-none']) }}
>
    {{ $slot }}

    <div x-ref="tabMarker" class="absolute left-0 z-10 w-1/2 h-full duration-300 ease-out" x-cloak>
        <div class="w-full h-full bg-gray-100 dark:bg-gray-700 rounded-md shadow-sm"></div>
    </div>
</x-panels.panel>
