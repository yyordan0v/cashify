<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cashify | Features</title>
    <style>[x-cloak] {
            display: none
        }</style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex items-start justify-center h-full bg-gray-50">
<div
    class="flex flex-col justify-between max-w-full w-full px-3 antialiased lg:px-6 min-h-screen bg-[conic-gradient(at_top,_var(--tw-gradient-stops))] from-black via-black/95 to-black">
    <section>
        <div class="mx-auto max-w-7xl">
            <nav class="flex items-center w-full h-24 select-none" x-data="{ showMenu: false }">
                <div
                    class="relative flex flex-wrap items-start justify-between w-full mx-auto font-medium md:items-center md:h-24 md:justify-between">
                    <a href="#">
                        <x-application-logo class="text-2xl text-white"/>
                    </a>

                    @include('layouts.guest-navigation')

                    <div
                        class="fixed top-0 left-0 z-40 items-center hidden w-full h-full p-3 text-sm bg-gray-900 bg-opacity-50 md:w-auto md:bg-transparent md:p-0 md:relative md:flex"
                        :class="{'flex': showMenu, 'hidden': !showMenu }">
                        <div
                            class="flex-col items-center w-full h-full p-3 overflow-hidden bg-black bg-opacity-50 rounded-lg select-none md:p-0 backdrop-blur-lg md:h-auto md:bg-transparent md:rounded-none md:relative md:flex md:flex-row md:overflow-auto">
                            <div
                                class="flex flex-col items-center justify-end w-full h-full pt-2 md:w-full md:flex-row md:py-0">
                                <a href="#_"
                                   class="w-full py-5 mr-0 text-center text-gray-200 md:py-3 md:w-auto hover:text-white md:pl-0 md:mr-3 lg:mr-5">Sign
                                    In</a>
                                <a href="#_"
                                   class="inline-flex items-center justify-center w-full px-4 py-3 md:py-1.5 font-medium leading-6 text-center whitespace-no-wrap transition duration-150 ease-in-out border border-transparent md:mr-1 text-gray-600 md:w-auto bg-white rounded-lg md:rounded-full hover:bg-white focus:outline-none focus:border-gray-700 focus:shadow-outline-gray active:bg-gray-700">Sign
                                    Up</a>
                            </div>
                        </div>
                    </div>
                    <div @click="showMenu = !showMenu"
                         class="absolute right-0 z-50 flex flex-col items-end translate-y-1.5 w-10 h-10 p-2 mr-4 rounded-full cursor-pointer md:hidden hover:bg-gray-200/10 hover:bg-opacity-10"
                         :class="{ 'text-gray-400': showMenu, 'text-gray-100': !showMenu }">
                        <svg class="w-6 h-6" x-show="!showMenu" fill="none" stroke-linecap="round"
                             stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" x-cloak>
                            <path d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <svg class="w-6 h-6" x-show="showMenu" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg" x-cloak>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                </div>
            </nav>
            <div>

                <div id="features"
                     class="relative block px-6 py-10 md:py-20 md:px-10">


                    <div class="relative mx-auto max-w-5xl text-center">
            <span class="text-gray-400 my-3 flex items-center justify-center font-medium uppercase tracking-wider">
            Why Cashify?
            </span>
                        <h2
                            class="block w-full text-white font-black text-5xl sm:text-4xl">
                            A simple app that meets your needs.
                        </h2>
                        <p
                            class="mx-auto my-4 w-full max-w-xl bg-transparent text-center font-medium leading-relaxed tracking-wide text-gray-400">
                            No technical skills required – Cashify is an intuitive tool designed to get the job done
                            easily.
                        </p>
                    </div>


                    <div
                        class="relative mx-auto max-w-7xl z-10 grid grid-cols-1 gap-10 pt-14 sm:grid-cols-2 lg:grid-cols-3">
                        <div class="rounded-md border border-neutral-800/10 bg-neutral-900/10 p-8 text-center shadow">
                            <div
                                class="button-text mx-auto flex h-12 w-12 items-center justify-center rounded-md border bg-gradient-to-b from-white to-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="icon icon-tabler icon-tabler-color-swatch" width="24"
                                     height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M19 3h-4a2 2 0 0 0 -2 2v12a4 4 0 0 0 8 0v-12a2 2 0 0 0 -2 -2"></path>
                                    <path
                                        d="M13 7.35l-2 -2a2 2 0 0 0 -2.828 0l-2.828 2.828a2 2 0 0 0 0 2.828l9 9"></path>
                                    <path d="M7.3 13h-2.3a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h12"></path>
                                    <line x1="17" y1="17" x2="17" y2="17.01"></line>
                                </svg>
                            </div>
                            <h3 class="mt-6 text-gray-400">Customizable</h3>
                            <p class="my-4 mb-0 font-normal leading-relaxed tracking-wide text-gray-400">
                                Crafted to fit your unique style, make it yours with a personal touch.
                            </p>
                        </div>


                        <div class="rounded-md border border-neutral-800/10 bg-neutral-900/10 p-8 text-center shadow">
                            <div
                                class="button-text mx-auto flex h-12 w-12 items-center justify-center rounded-md border bg-gradient-to-b from-white to-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bolt"
                                     width="24"
                                     height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="13 3 13 10 19 10 11 21 11 14 5 14 13 3"></polyline>
                                </svg>
                            </div>
                            <h3 class="mt-6 text-gray-400">Blazingly Fast</h3>
                            <p class="my-4 mb-0 font-normal leading-relaxed tracking-wide text-gray-400">
                                Engineered for swift execution in today's fast-paced world.
                            </p>
                        </div>


                        <div class="rounded-md border border-neutral-800/10 bg-neutral-900/10 p-8 text-center shadow">
                            <div
                                class="button-text mx-auto flex h-12 w-12 items-center justify-center rounded-md border bg-gradient-to-b from-white to-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tools"
                                     width="24"
                                     height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M3 21h4l13 -13a1.5 1.5 0 0 0 -4 -4l-13 13v4"></path>
                                    <line x1="14.5" y1="5.5" x2="18.5" y2="9.5"></line>
                                    <polyline points="12 8 7 3 3 7 8 12"></polyline>
                                    <line x1="7" y1="8" x2="5.5" y2="9.5"></line>
                                    <polyline points="16 12 21 17 17 21 12 16"></polyline>
                                    <line x1="16" y1="17" x2="14.5" y2="18.5"></line>
                                </svg>
                            </div>
                            <h3 class="mt-6 text-gray-400">Fully Featured</h3>
                            <p class="my-4 mb-0 font-normal leading-relaxed tracking-wide text-gray-400">
                                Everything you need to track your finances, right out of the box.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container flex flex-col items-center px-8 py-8 mx-auto max-w-7xl sm:flex-row">
            <a href="#">
                <x-application-logo class="text-white text-lg"/>
            </a>
            <p class="mt-4 text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l sm:border-gray-200 sm:mt-0">
                &copy; {{ date("Y") }}
                Cashify - Empowering Your Finances
            </p>
            <span class="inline-flex justify-center mt-4 space-x-5 sm:ml-auto sm:mt-0 sm:justify-start">

            <a href="#" class="text-gray-400 hover:text-gray-500">
                <span class="sr-only">Twitter</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path
                        d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                </svg>
            </a>

            <a href="#" class="text-gray-400 hover:text-gray-500">
                <span class="sr-only">GitHub</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path fill-rule="evenodd"
                          d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                          clip-rule="evenodd"/>
                </svg>
            </a>
        </span>
        </div>
    </footer>
</div>
</body>
</html>
