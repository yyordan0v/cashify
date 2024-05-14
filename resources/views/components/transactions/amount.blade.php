@props(['type' => 'expense'])

@php
    $classes = 'relative z-10 inline-block m-0 text-sm font-semibold leading-normal text-transparent bg-gradient-to-tl bg-clip-text';

    if ($type === 'income') {
        $classes .= ' from-emerald-600 to-emerald-400';
        $symbol = '+ ';
    }
    if ($type === 'expense') {
        $classes .= ' from-red-600 to-red-400';
        $symbol = '- ';
    }
@endphp

<p {{ $attributes->merge(['class' => $classes]) }}>
    {{ $symbol . $slot }}
</p>
