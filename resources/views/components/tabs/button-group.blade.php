@props(['count' => '2'])

@php
    $gridColsMapping = [
        '1' => 'grid-cols-1',
        '2' => 'grid-cols-2',
        '3' => 'grid-cols-3',
        '4' => 'grid-cols-4',
        '5' => 'grid-cols-5',
        '6' => 'grid-cols-6',
        '7' => 'grid-cols-7',
        '8' => 'grid-cols-8',
        '9' => 'grid-cols-9',
    ];

    $gridCols = $gridColsMapping[$count];
@endphp

<div x-ref="tabButtons"
    {{ $attributes->merge(['class' => 'relative inline-grid items-center justify-center w-full h-10 p-1 bg-white/80 border border-neutral-200/50 dark:border-neutral-800/50 dark:bg-neutral-900/20 rounded-lg select-none dark:shadow backdrop-blur-lg ' . $gridCols]) }}
>
    {{ $slot }}

    <div x-ref="tabMarker" class="absolute left-0 z-10 h-full duration-300 ease-out w-1/{{ $count }}" x-cloak>
        <div class="w-full h-full bg-gray-200 dark:bg-gray-700 rounded-lg shadow-sm"></div>
    </div>
</div>
