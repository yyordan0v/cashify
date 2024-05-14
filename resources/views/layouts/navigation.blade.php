<nav
    class="bg-red/80 border-b md:border border-neutral-200/50 px-4 py-2.5 dark:bg-neutral-900/20 dark:border-neutral-800/50 backdrop-blur-lg fixed md:rounded-xl md:m-4 left-0 right-0 top-0 z-50">
    <div class="flex flex-wrap justify-between items-center">
        <div class="flex justify-start items-center">
            {{--            Hamburger Menu--}}
            <x-hamburger.dashboard/>

            {{--            Logo--}}
            <a href="{{ route('home') }}">
                <x-application-logo class="dark:text-white text-2xl"/>
            </a>
        </div>

        <div class="flex items-center lg:order-2">

            <!-- Switch Theme -->
            <x-theme-switch/>

            <!-- Log Out -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-buttons.secondary :href="route('logout')"
                                     onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                     class="ml-6"
                >
                    {{ __('Log Out') }}
                </x-buttons.secondary>
            </form>
        </div>
    </div>
</nav>
