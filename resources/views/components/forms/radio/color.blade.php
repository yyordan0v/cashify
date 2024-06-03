@props([
    'color' => 'gray',
    'shade' => '300',
    'name' => 'color',
    'id' => 'gray',
    'checked' => false
])

@php
    $colorClasses = [
        'gray' => 'bg-gray-'.$shade,
        'orange' => 'bg-orange-'.$shade,
        'amber' => 'bg-amber-'.$shade,
        'yellow' => 'bg-yellow-'.$shade,
        'lime' => 'bg-lime-'.$shade,
        'green' => 'bg-green-'.$shade,
        'emerald' => 'bg-emerald-'.$shade,
        'teal' => 'bg-teal-'.$shade,
        'cyan' => 'bg-cyan-'.$shade,
        'sky' => 'bg-sky-'.$shade,
        'blue' => 'bg-blue-'.$shade,
        'indigo' => 'bg-indigo-'.$shade,
        'violet' => 'bg-violet-'.$shade,
        'purple' => 'bg-purple-'.$shade,
        'fuchsia' => 'bg-fuchsia-'.$shade,
        'pink' => 'bg-pink-'.$shade,
        'rose' => 'bg-rose-'.$shade,
     ];

     $bgColor = $colorClasses[$color] ?? 'bg-gray-'.$shade;

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
