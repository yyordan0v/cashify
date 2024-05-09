@props(['active'])

@if($active === true)
    <a {{ $attributes->merge(['class' => 'relative inline-block w-full h-full px-4 py-5 mx-2 font-medium leading-tight text-center text-gray-800 dark:text-white md:py-2 group md:w-auto md:px-2 lg:mx-3 md:text-center']) }}>
        <span>{{ $slot }}</span>
        <span
            class="absolute bottom-0 left-0 w-full h-px duration-300 ease-out translate-y-px bg-gradient-to-r dark:md:from-gray-700 dark:md:via-gray-400 dark:md:to-gray-700 dark:from-gray-900 dark:via-gray-600 dark:to-gray-900 md:from-gray-200 md:via-gray-600 md:to-gray-200 from-gray-100 via-gray-400 to-gray-100"></span>
    </a>
@else
    <a {{ $attributes->merge(['class' => 'relative inline-block w-full h-full px-4 py-5 mx-2 font-medium leading-tight text-center duration-300 ease-out md:py-2 group hover:text-gray-800 dark:hover:text-white md:w-auto md:px-2 lg:mx-3 md:text-center']) }}>
        <span>{{ $slot }}</span>
        <span
            class="absolute bottom-0 w-0 h-px duration-300 ease-out translate-y-px group-hover:left-0 left-1/2 group-hover:w-full bg-gradient-to-r dark:md:from-gray-700 dark:md:via-gray-400 dark:md:to-gray-700 dark:from-gray-900 dark:via-gray-600 dark:to-gray-900 md:from-gray-200 md:via-gray-600 md:to-gray-200 from-gray-100 via-gray-400 to-gray-100"></span>
    </a>
@endif




