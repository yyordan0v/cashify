@props(['type' => 'button'])

@if($type === 'button')

    <ul {{ $attributes->merge(['class' => 'grid w-full gap-2 md:grid-cols-2 mt-2']) }}>
        {{ $slot }}
    </ul>

@endif


@if($type === 'color')

    <ul {{ $attributes->merge(['class' => 'flex items-center w-full gap-4 mt-8 whitespace-nowrap overflow-auto touch-pan-x no-scrollbar snap-x']) }}>
        {{ $slot }}
    </ul>

@endif
