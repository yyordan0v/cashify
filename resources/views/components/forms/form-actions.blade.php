<x-divider/>

<div {{ $attributes->merge(['class' => 'flex flex-col md:flex-row items-center justify-end w-full gap-2 text-gray-600 dark:text-gray-400 text-sm']) }}>

    {{ $slot }}

</div>
