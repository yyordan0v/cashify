@props(['route'])

<div
    class="hidden md:block fixed z-50 max-w-lg rounded-xl bottom-6 right-6 dark:border-neutral-200/50 border dark:bg-white/80 border-neutral-800/50 bg-black/80 backdrop-blur-sm">
    <div class="grid h-full max-w-lg grid-cols-1 mx-auto">
        <a href="{{ $route }}"
           class=" inline-flex flex-col items-center justify-center p-4 rounded-xl transition-colors duration-200
           dark:hover:bg-white hover:bg-black">
            <x-icon class="text-white dark:text-black">
                add
            </x-icon>
            <span class="sr-only">Add</span>
        </a>
    </div>
</div>
