@props([
    'color' => 'gray',
    'shade' => '300',
    'name' => 'color',
    'id' => 'gray',
    'checked' => false
])

@php
    $bgColor = ' bg-'.$color.'-'.$shade;
    $borderColor = 'border-'.$color.'-'.$shade;

    $borderSelected = [
        'gray' => ' peer-checked:border-gray-600',
        'orange' => ' peer-checked:border-orange-600',
        'amber' => ' peer-checked:border-amber-600',
        'yellow' => ' peer-checked:border-yellow-600',
        'lime' => ' peer-checked:border-lime-600',
        'green' => ' peer-checked:border-green-600',
        'emerald' => ' peer-checked:border-emerald-600',
        'teal' => ' peer-checked:border-teal-600',
        'cyan' => ' peer-checked:border-cyan-600',
        'sky' => ' peer-checked:border-sky-600',
        'blue' => ' peer-checked:border-blue-600',
        'indigo' => ' peer-checked:border-indigo-600',
        'violet' => ' peer-checked:border-violet-600',
        'purple' => ' peer-checked:border-purple-600',
        'fuchsia' => ' peer-checked:border-fuchsia-600',
        'pink' => ' peer-checked:border-pink-600',
        'rose' => ' peer-checked:border-rose-600',
    ];

    $classes = 'snap-center inline-flex items-center justify-center w-full p-6 shadow-sm rounded-full cursor-pointer transition-all duration-200 opacity-90 hover:opacity-100 border-2 dark:border-4 peer-checked:opacity-100 ' . $borderColor . $bgColor . $borderSelected[$color];
@endphp

<li class="my-1">
    <input type="radio" id="{{ $id }}" name="{{ $name }}" value="{{ $id }}"
           {{ $checked ? 'checked' : '' }}
           class="hidden peer" required
           @click="$dispatch('color-changed', { color: '{{ $bgColor }}' })"/>
    <label for="{{ $id }}"
        {{ $attributes->merge(['class' => $classes]) }}
    ></label>
</li>
