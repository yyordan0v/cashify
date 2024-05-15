<div {{ $attributes->merge(['class' => 'mr-4 p-6 rounded-full']) }}>
    <img src="{{ Vite::asset('resources/images/categories/'.$slot.'.png') }}" alt="{{ $slot }}"
         class="max-w-8">
    <span class="sr-only">{{ $slot }}</span>
</div>
