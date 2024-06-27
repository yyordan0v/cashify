<nav
    class="bg-white/80 md:bg-white/20 border-b md:border border-neutral-400/50 px-4 py-2.5 dark:bg-neutral-900/20 dark:border-neutral-600/50 backdrop-blur-lg fixed md:rounded-xl md:m-4 left-0 right-0 top-0 z-50">
    <div class="flex flex-wrap justify-between items-center">
        {{--            Logo--}}
        <a href="{{ route('home') }}">
            <x-application-logo class="dark:text-white text-2xl"/>
        </a>

        <div class="flex items-center lg:order-2">

            <!-- Switch Theme -->
            <x-theme-toggle/>

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
