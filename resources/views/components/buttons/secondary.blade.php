<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 font-medium text-xs text-gray-700 dark:text-gray-200 tracking-widest dark:hover:text-white hover:text-gray-800 focus:outline-none disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
