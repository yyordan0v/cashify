<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-3 font-medium text-xs rounded-lg text-gray-700 dark:text-gray-200 tracking-widest dark:hover:text-white hover:text-gray-800 hover:bg-gray-200/80 hover:dark:bg-neutral-700/20 focus:outline-none disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
