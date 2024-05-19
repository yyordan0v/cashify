@props(['modal' => false, 'padding' => '8'])

@php
    $classes = 'rounded-xl border bg-white/20 border-neutral-300/50 dark:border-neutral-800/50 dark:bg-neutral-900/20 dark:shadow p-'.$padding;

    if(!$modal) {
        $classes .= ' backdrop-blur-lg';
    }
@endphp


<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
