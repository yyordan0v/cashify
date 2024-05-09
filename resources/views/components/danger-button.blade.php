<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center w-full px-4 py-3 md:py-1.5 font-medium leading-6 text-center text-sm  whitespace-no-wrap transition duration-150 ease-in-out border border-transparent md:mr-1 text-gray-50 md:w-auto bg-red-600 rounded-lg md:rounded-full hover:bg-red-700 focus:outline-none active:bg-red-900']) }}>
    {{ $slot }}
</button>
