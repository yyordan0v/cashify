<header class="flex items-center w-full h-24 select-none" x-data="{ showMenu: false }">
    <div
        class="relative flex flex-wrap items-start justify-between w-full mx-auto font-medium md:items-center md:h-24 md:justify-between">

        {{--        Logo--}}
        <a href="{{ route('home') }}">
            <x-application-logo class="text-2xl mx-4 sm:mx-6 p-2"/>
        </a>

        {{--        Navigation--}}
        <nav :class="{'flex': showMenu, 'hidden md:flex': !showMenu }"
             class="absolute z-50 flex-col items-center justify-center w-full h-auto px-2 text-center text-gray-400 -translate-x-1/2 border-0 border-gray-300 dark:border-gray-700 rounded-full md:border md:w-auto md:h-10 left-1/2 md:flex-row md:items-center">
            <x-nav.link-home :href="route('home')" :active="request()->routeIs('home')">
                Home
            </x-nav.link-home>
            <x-nav.link-home :href="route('features')" :active="request()->routeIs('features')">
                Features
            </x-nav.link-home>
        </nav>

        {{--        Auth/Dashboard--}}
        <div
            class="fixed top-0 left-0 z-40 items-center hidden w-full h-full p-3 text-sm bg-gray-900 bg-opacity-50 md:w-auto md:bg-transparent md:p-0 md:relative md:flex"
            :class="{'flex': showMenu, 'hidden': !showMenu }">
            <div
                class="flex-col items-center w-full h-full p-3 overflow-hidden bg-black bg-opacity-50 rounded-lg select-none md:p-0 backdrop-blur-lg md:h-auto md:bg-transparent md:rounded-none md:relative md:flex md:flex-row md:overflow-auto">
                @if (Route::has('login'))
                    <div
                        class="flex flex-col items-center justify-end w-full h-full pt-2 md:w-full md:flex-row md:py-0">
                        @auth()
                            {{--dasboard--}}
                            <a href="{{ url('dashboard') }}"
                               class="inline-flex items-center justify-center w-full px-4 py-3 md:py-1.5 font-medium leading-6 text-center whitespace-no-wrap transition duration-150 ease-in-out border border-transparent md:mr-1 text-white dark:text-gray-600 bg-black dark:bg-white md:w-auto rounded-lg md:rounded-full hover:bg-neutral-900 dark:hover:bg-neutral-200 focus:outline-none active:bg-neutral-800 dark:active:bg-gray-300">Dashboard</a>
                        @else
                            {{--log in--}}
                            <a href="{{ route('login') }}"
                               class="w-full py-5 mr-0 text-center text-gray-600 dark:text-gray-200 md:py-3 md:w-auto hover:text-gray-900 dark:hover:text-white md:pl-0 md:mr-3 lg:mr-5"
                               :class="{'text-gray-200': showMenu, 'text-gray-600': !showMenu}"
                            >
                                Log In
                            </a>
                            @if (Route::has('register'))
                                {{--register--}}
                                <a href="{{ route('register') }}"
                                   class="inline-flex items-center justify-center w-full px-4 py-3 md:py-1.5 font-medium leading-6 text-center whitespace-no-wrap transition duration-150 ease-in-out border border-transparent md:mr-1 text-white dark:text-gray-600 bg-black dark:bg-white md:w-auto rounded-lg md:rounded-full hover:bg-neutral-900 dark:hover:bg-neutral-200 focus:outline-none active:bg-neutral-800 dark:active:bg-gray-300">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>

        {{--        Hamburger Menu--}}
        <x-hamburger.home/>
    </div>
</header>
