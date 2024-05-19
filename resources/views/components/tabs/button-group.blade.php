@props(['count' => '2'])

<div x-ref="tabButtons"
    {{ $attributes->merge(['class' => 'relative inline-grid items-center justify-center w-full h-10 grid-cols-'.$count.' p-1 bg-white/80 border border-neutral-200/50 dark:border-neutral-800/50 dark:bg-neutral-900/20 rounded-lg select-none dark:shadow backdrop-blur-lg']) }}
>
    {{ $slot }}

    <div x-ref="tabMarker" class="absolute left-0 z-10 w-1/2 h-full duration-300 ease-out" x-cloak>
        <div class="w-full h-full bg-gray-200 dark:bg-gray-700 rounded-lg shadow-sm"></div>
    </div>
</div>
