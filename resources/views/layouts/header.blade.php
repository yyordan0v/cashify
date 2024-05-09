<header class="flex items-center w-full h-24 select-none" x-data="{ showMenu: false }">
    <div
        class="relative flex flex-wrap items-start justify-between w-full mx-auto font-medium md:items-center md:h-24 md:justify-between">
        <a href="/">
            <x-application-logo class="text-2xl text-white"/>
        </a>

        <x-guest-nav>
            <x-guest-nav-link :href="route('home')" :active="request()->routeIs('home')">
                Home
            </x-guest-nav-link>
            <x-guest-nav-link :href="route('features')" :active="request()->routeIs('features')">
                Features
            </x-guest-nav-link>
        </x-guest-nav>

        <div
            class="fixed top-0 left-0 z-40 items-center hidden w-full h-full p-3 text-sm bg-gray-900 bg-opacity-50 md:w-auto md:bg-transparent md:p-0 md:relative md:flex"
            :class="{'flex': showMenu, 'hidden': !showMenu }">
            <div
                class="flex-col items-center w-full h-full p-3 overflow-hidden bg-black bg-opacity-50 rounded-lg select-none md:p-0 backdrop-blur-lg md:h-auto md:bg-transparent md:rounded-none md:relative md:flex md:flex-row md:overflow-auto">
                @if (Route::has('login'))
                    <div
                        class="flex flex-col items-center justify-end w-full h-full pt-2 md:w-full md:flex-row md:py-0">
                        @auth()
                            <a href="{{ url('/dashboard') }}"
                               class="w-full py-5 mr-0 text-center text-gray-200 md:py-3 md:w-auto hover:text-white md:pl-0 md:mr-3 lg:mr-5">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                               class="w-full py-5 mr-0 text-center text-gray-200 md:py-3 md:w-auto hover:text-white md:pl-0 md:mr-3 lg:mr-5">Log
                                In</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                   class="inline-flex items-center justify-center w-full px-4 py-3 md:py-1.5 font-medium leading-6 text-center whitespace-no-wrap transition duration-150 ease-in-out border border-transparent md:mr-1 text-gray-600 md:w-auto bg-white rounded-lg md:rounded-full hover:bg-white focus:outline-none focus:border-gray-700 focus:shadow-outline-gray active:bg-gray-700">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>

        <x-hamburger-menu/>
    </div>
</header>
