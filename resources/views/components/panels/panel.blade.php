@props(['modal' => false, 'padding' => 'p-8'])

@php
    $classes = 'rounded-xl border bg-white/20 border-neutral-400/50 dark:border-neutral-600/50 dark:bg-neutral-900/20 dark:shadow '.$padding;

    if(!$modal) {
        $classes .= ' backdrop-blur-lg';
    }
@endphp


<section {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</section>
