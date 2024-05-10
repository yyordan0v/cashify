@props(['id', 'name'])

<div x-data="{ switchOn: false }" class="flex items-center justify-start">
    <input id="{{ $id }}" name="{{ $name }}" type="checkbox" class="hidden"
           :checked="switchOn">

    <button
        x-ref="switchButton"
        type="button"
        @click="switchOn = ! switchOn"
        :class="switchOn ? 'bg-gray-300 dark:bg-gray-300' : 'bg-gray-200 dark:bg-gray-200'"
        class="relative inline-flex h-6 py-0.5 focus:outline-none rounded-full w-10 mr-2"
        x-cloak>
                                <span :class="switchOn ? 'translate-x-[18px]' : 'translate-x-0.5'"
                                      class="w-5 h-5 duration-200 ease-in-out bg-white dark:bg-black rounded-full shadow-md"></span>
    </button>

    <label @click="$refs.switchButton.click(); $refs.switchButton.focus()"
           :id="$id('switch')"
           :class="{ 'text-black dark:text-white': switchOn, 'text-gray-600 dark:text-gray-400': ! switchOn }"
           class="text-sm select-none"
           x-cloak
           for="{{ $id }}">
        {{ $slot }}
    </label>
</div>
