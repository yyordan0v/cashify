@props([
    'color' => 'gray',
    'name' => 'color',
    'id' => 'gray',
    'checked' => false
])

@php
    $colorClasses = [
        'gray' => 'bg-gray-200',
        'orange' => 'bg-orange-200',
        'amber' => 'bg-amber-200',
        'yellow' => 'bg-yellow-200',
        'lime' => 'bg-lime-200',
        'green' => 'bg-green-200',
        'emerald' => 'bg-emerald-200',
        'teal' => 'bg-teal-200',
        'cyan' => 'bg-cyan-200',
        'sky' => 'bg-sky-200',
        'blue' => 'bg-blue-200',
        'indigo' => 'bg-indigo-200',
        'violet' => 'bg-violet-200',
        'purple' => 'bg-purple-200',
        'fuchsia' => 'bg-fuchsia-200',
        'pink' => 'bg-pink-200',
        'rose' => 'bg-rose-200',
     ];

     $bgColor = $colorClasses[$color] ?? 'bg-gray-200';

     $classes = 'snap-center inline-flex items-center justify-center w-full p-6 shadow-sm rounded-full cursor-pointer transition-all duration-200 opacity-90 hover:opacity-100 peer-checked:ring-2 dark:peer-checked:ring-4 peer-checked:ring-black dark:peer-checked:ring-white peer-checked:opacity-100 ' . $bgColor;
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
