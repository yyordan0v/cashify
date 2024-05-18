@props(['modal' => false, 'padding' => '8'])

@php
    $classes = 'rounded-xl border bg-white/80 border-neutral-200/50 dark:border-neutral-800/50 dark:bg-neutral-900/20 dark:shadow p-'.$padding;

    if(!$modal) {
        $classes .= ' backdrop-blur-lg';
    }
@endphp


<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
