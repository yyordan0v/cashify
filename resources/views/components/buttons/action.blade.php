<button {{ $attributes->merge(['class' => 'flex items-center gap-2 py-2 px-4 rounded-lg hover:bg-gray-200/80 hover:dark:bg-neutral-700/20 transition-colors duration-150']) }}>
    {{ $slot }}
</button>
