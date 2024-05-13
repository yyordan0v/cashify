@props(['type' => 'expense'])

@php
    $classes = 'text-xs p-3 rounded-full mr-4 flex items-center justify-center border border-solid bg-transparent text-center';
@endphp

@if( $type === 'income')
    @php
        $classes .= '  border-emerald-500 text-emerald-500';
    @endphp

    <div {{ $attributes->merge(['class' => $classes]) }}>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
             class="w-3 h-3">
            <path fill-rule="evenodd"
                  d="M11.47 2.47a.75.75 0 0 1 1.06 0l7.5 7.5a.75.75 0 1 1-1.06 1.06l-6.22-6.22V21a.75.75 0 0 1-1.5 0V4.81l-6.22 6.22a.75.75 0 1 1-1.06-1.06l7.5-7.5Z"
                  clip-rule="evenodd"/>
        </svg>
    </div>

@endif

@if( $type === 'expense')
    @php
        $classes .= ' border-red-600 text-red-600';
    @endphp

    <div {{ $attributes->merge(['class' => $classes]) }}>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
             class="w-3 h-3">
            <path fill-rule="evenodd"
                  d="M12 2.25a.75.75 0 0 1 .75.75v16.19l6.22-6.22a.75.75 0 1 1 1.06 1.06l-7.5 7.5a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 1 1 1.06-1.06l6.22 6.22V3a.75.75 0 0 1 .75-.75Z"
                  clip-rule="evenodd"/>
        </svg>
    </div>

@endif

