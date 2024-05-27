@props([
    'position' => 'top-2'
])

<div {{ $attributes->merge(['class' => 'relative w-full']) }}>
    <div class="absolute inset-y-2 end-2 flex items-center pointer-events-none {{ $position }}">
        <x-icon class="text-gray-500 dark:text-gray-400">
            search
        </x-icon>
    </div>

    {{ $slot }}
</div>
