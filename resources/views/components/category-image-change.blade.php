@props([
    'background' => 'bg-gray-200',
    'currentImage' => 'shopping'
])

<button @click="slideOverOpen=true">
    <div
        class="mr-4 p-6 rounded-full relative group {{ $background }}">
        <img src="{{ Vite::asset('resources/images/categories/'.$currentImage.'.png') }}"
             class="max-w-8"
             alt="{{ $currentImage }}"
        >

        <x-icon
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 p-2 rounded-full bg-black/60 text-white group-hover:bg-black/40 transition-colors duration-150">
            add_photo_alternate
        </x-icon>

        <span class="sr-only">Change Category Image</span>
    </div>
</button>
