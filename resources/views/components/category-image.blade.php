@props([
    'background' => 'bg-gray-200',
    'currentImage' => 'shopping'
])

<div {{ $attributes->merge(['class' => 'mr-4 p-6 rounded-full '.$background]) }}>
    <img src="{{ Vite::asset('resources/images/categories/'.$currentImage.'.png') }}" alt="{{ $currentImage }}"
         class="max-w-8">
    <span class="sr-only">{{ $currentImage }}</span>
</div>
