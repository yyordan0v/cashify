@php
    $classes = 'mr-4 p-6 mt-4 rounded-full relative transition-all duration-150 opacity-90 hover:opacity-100';
@endphp

<button>
    <div {{ $attributes->merge(['class' => $classes]) }} :class="color ? color : 'bg-gray-200'">
        <img :src="`{{  asset('images/categoriries').'/' }}${icon}`"
             class="max-w-8" alt="Category Icon Image">
        <span class="sr-only">Change Category Image</span>
    </div>
</button>
