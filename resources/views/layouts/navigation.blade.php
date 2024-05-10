<nav
    class="bg-white/80 border-b md:border border-neutral-200/50 px-4 py-2.5 dark:bg-neutral-900/20 dark:border-neutral-800/50 backdrop-blur-sm fixed md:rounded-xl md:m-4 left-0 right-0 top-0 z-50">
    <div class="flex flex-wrap justify-between items-center">
        <div class="flex justify-start items-center">
            {{--            Hamburger Menu--}}
            <button
                data-drawer-target="drawer-navigation"
                data-drawer-toggle="drawer-navigation"
                aria-controls="drawer-navigation"
                class="p-2 mr-2 text-gray-600 rounded-lg cursor-pointer md:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
            >
                <svg
                    aria-hidden="true"
                    class="w-6 h-6"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"
                    ></path>
                </svg>
                <svg
                    aria-hidden="true"
                    class="hidden w-6 h-6"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"
                    ></path>
                </svg>
                <span class="sr-only">Toggle sidebar</span>
            </button>

            {{--            Logo--}}
            <a href="{{ route('home') }}">
                <x-application-logo class="dark:text-white text-2xl"/>
            </a>

            {{--            breadcrumb--}}
            <div class="md:flex hidden justify-between ml-10">
                <ol class="inline-flex items-center mb-3 space-x-3 text-sm text-neutral-500 [&_.active-breadcrumb]:text-neutral-500/80 sm:mb-0">
                    <li class="flex items-center h-full"><a href="#_" class="py-1 hover:text-neutral-900">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                 fill="currentColor">
                                <path
                                    d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z"/>
                                <path
                                    d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z"/>
                            </svg>
                        </a></li>
                    <span class="mx-2 text-gray-400">/</span>
                    <li><a href="#_"
                           class="inline-flex items-center py-1 font-normal hover:text-neutral-900 focus:outline-none">Projects</a>
                    </li>
                    <span class="mx-2 text-gray-400">/</span>
                    <li>
                        <a class="inline-flex items-center py-1 font-normal rounded cursor-default active-breadcrumb focus:outline-none">Pines</a>
                    </li>
                </ol>
            </div>
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
