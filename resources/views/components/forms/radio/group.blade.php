@props(['type' => 'button'])

@if($type === 'button')
    <ul {{ $attributes->merge(['class' => 'grid w-full gap-2 md:grid-cols-2 mt-2']) }}>
        {{ $slot }}
    </ul>
@endif


@if($type === 'color')
    <div x-data="{ isTouch: false }" x-init="isTouch = ('ontouchstart' in window || navigator.maxTouchPoints > 0)"
         class="w-full">
        <ul
            :class="{ '': isTouch, 'flex-wrap': !isTouch }"
            {{ $attributes->merge(['class' => 'flex items-center gap-4 mt-8 px-2 whitespace-nowrap overflow-auto touch-pan-x no-scrollbar snap-x']) }}>
            {{ $slot }}
        </ul>
    </div>
@endif

@if($type === 'category')
    <ul {{ $attributes->merge(['class' => 'flex flex-wrap items-center justify-center gap-8']) }}>
        {{ $slot }}
    </ul>
@endif

@if($type === 'icon')
    <ul
        {{ $attributes->merge(['class' => 'flex flex-wrap items-center gap-4 mt-8 px-2']) }}>
        {{ $slot }}
    </ul>
@endif
