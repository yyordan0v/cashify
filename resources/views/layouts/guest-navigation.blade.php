<nav :class="{'flex': showMenu, 'hidden md:flex': !showMenu }"
     class="absolute z-50 flex-col items-center justify-center w-full h-auto px-2 text-center text-gray-400 -translate-x-1/2 border-0 border-gray-700 rounded-full md:border md:w-auto md:h-10 left-1/2 md:flex-row md:items-center">

    <x-guest-nav-link :href="route('home')" :active="request()->routeIs('home')">Home</x-guest-nav-link>
    <x-guest-nav-link :href="route('features')" :active="request()->routeIs('features')">Features</x-guest-nav-link>
</nav>
