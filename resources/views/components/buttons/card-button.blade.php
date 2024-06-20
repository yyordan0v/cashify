@props(['padding' => '4'])

<x-panels.panel
    {{ $attributes->merge(['class' => 'flex items-center justify-center h-full group transition-colors duration-150 hover:bg-neutral-200/20 hover:dark:bg-neutral-700/20 cursor-pointer']) }} padding="{{ $padding }}">
    <div class="flex flex-col items-center">
        <x-icon class="opacity-20 text-black dark:text-white" style="font-size: 32px">
            format_list_bulleted_add
        </x-icon>
        <x-cards.title class="opacity-60 mb-0">
            {{ $slot }}
        </x-cards.title>
    </div>
</x-panels.panel>

