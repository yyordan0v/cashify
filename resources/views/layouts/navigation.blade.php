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
            <a href="{{ route('dashboard') }}">
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

            <button
                type="button"
                class="flex mx-3 text-sm bg-gray-500 dark:bg-gray-600 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                id="user-menu-button"
                aria-expanded="false"
                data-dropdown-toggle="dropdown"
            >
                <span class="sr-only">Open user menu</span>
                <svg
                    class="w-8 h-8 text-gray-200 dark:text-gray-300 hover:text-white dark:hover:text-white"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                          d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                          clip-rule="evenodd"/>
                </svg>


            </button>
            <!-- Dropdown menu -->
            <div
                class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 rounded-xl"
                id="dropdown"
            >
                <div class="py-3 px-4">
              <span
                  class="block text-sm font-semibold text-gray-900 dark:text-white"
              >{{  Auth::user()->name  }}</span
              >
                    <span
                        class="block text-xs text-gray-900 mt-1 truncate dark:text-white"
                    >{{  Auth::user()->email }}</span
                    >
                </div>
                <ul
                    class="py-1 text-gray-700 dark:text-gray-300"
                    aria-labelledby="dropdown"
                >
                    <li>
                        <a
                            href="{{ route('profile.edit') }}"
                            class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white"
                        >My profile</a
                        >
                    </li>
                    <li>
                        <a
                            href="#"
                            class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white"
                        >Account settings</a
                        >
                    </li>
                </ul>
                <ul
                    class="py-1 text-gray-700 dark:text-gray-300"
                    aria-labelledby="dropdown"
                >
                    <li>
                        <a
                            href="#"
                            class="flex items-center py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                        >
                            <svg
                                class="mr-2 w-5 h-5 text-gray-400"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                            My likes</a
                        >
                    </li>
                    <li>
                        <a
                            href="#"
                            class="flex items-center py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                        >
                            <svg
                                class="mr-2 w-5 h-5 text-gray-400"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"
                                ></path>
                            </svg>
                            Collections</a
                        >
                    </li>
                    <li>
                        <a
                            href="#"
                            class="flex justify-between items-center py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                        >
                  <span class="flex items-center">
                    <svg
                        aria-hidden="true"
                        class="mr-2 w-5 h-5 text-primary-600 dark:text-primary-500"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                          fill-rule="evenodd"
                          d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"
                          clip-rule="evenodd"
                      ></path>
                    </svg>
                    Pro version
                  </span>
                            <svg
                                aria-hidden="true"
                                class="w-5 h-5 text-gray-400"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                        </a>
                    </li>
                </ul>
                <ul
                    class="py-1 text-gray-700 dark:text-gray-300"
                    aria-labelledby="dropdown"
                >
                    <li>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
