<a {{ $attributes->merge(['class' => 'flex items-center gap-2 py-2 px-4 rounded-lg hover:bg-gray-100/80 hover:dark:bg-neutral-700/200 transition-colors duration-150']) }}>
    {{ $slot }}
</a>
