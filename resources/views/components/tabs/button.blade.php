<button :id="$id(tabId)" @click="tabButtonClicked($el);" type="button"
        :class="{ 'bg-gray-100 dark:bg-gray-700' : tabButtonActive($el) }"
    {{ $attributes->merge(['class' => 'relative z-20 inline-flex items-center justify-center w-full h-8 px-3 text-sm transition-all rounded-md cursor-pointer whitespace-nowrap text-gray-900 dark:text-white']) }}
>
    {{ $slot }}
</button>
