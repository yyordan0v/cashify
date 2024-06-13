@props(['heading'])

<div>
    <h6 class="mb-3 mt-2 px-5 text-xs font-bold uppercase text-gray-500 dark:text-gray-400">
        {{ $heading }}
    </h6>
    <ul class="flex flex-col">
        {{ $slot }}
    </ul>
</div>
