<div x-show="dropdownOpen"
     @click.away="dropdownOpen=false"
     x-transition:enter="ease-out duration-200"
     x-transition:enter-start="-translate-y-2"
     x-transition:enter-end="translate-y-0"
     x-cloak
    {{ $attributes->merge(['class' => 'absolute top-4 w-56 right-14']) }}
>
    <div
        class="p-1 bg-white/95 dark:bg-neutral-900/95 border rounded-lg shadow-md border-neutral-200/50 dark:border-neutral-800/50 text-gray-600 dark:text-gray-400 text-sm backdrop-blur-lg">
        {{ $slot }}
    </div>
</div>
