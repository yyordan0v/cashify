@props([
    'color' => 'bg-gray-200',
    'categoryColor' => 'gray',
    'image' => 'image',
    'name' => 'category',
    'id' => 'shopping',
    'checked' => false
])

@php

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

        $classes = 'cursor-pointer transition-all duration-200 opacity-90 hover:opacity-100 peer-checked:opacity-100 border-2 dark:border-4 border-transparent ' . $borderSelected[$categoryColor];
@endphp

<li>
    <input type="radio" id="{{ $id }}" name="{{ $name }}" value="{{ $id }}" class="hidden peer"
           {{ $checked ? 'checked' : '' }}
           @click="$dispatch('color-changed', { color: '{{ $color }}' })"/>

    <x-category-image :is-label="true" margin="mr-0" rounded="rounded-xl" :color="$color" :image="$image"
                      for="{{ $id }}"
        {{ $attributes->merge(['class' => $classes]) }}
    />
    <x-cards.text class="text-2xs mt-1">
        {{ $slot }}
    </x-cards.text>
</li>
