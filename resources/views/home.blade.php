<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pines UI</title>
    <style>[x-cloak] {
            display: none
        }</style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex items-start justify-center h-full bg-gray-50">
<div
    class="flex flex-col justify-between max-w-full w-full px-3 antialiased bg-gradient-to-br from-gray-950 via-black to-gray-900 lg:px-6 min-h-screen">
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
            <div class="container px-6 py-32 mx-auto md:text-center md:px-4">
                <div
                    x-data="{
        text: '',
        textArray : ['Wealth, like a tree, grows from a tiny seed.', 'A part of all you earn is yours to keep.'],
        textIndex: 0,
        charIndex: 0,
        typeSpeed: 110,
        cursorSpeed: 550,
        pauseEnd: 1500,
        pauseStart: 20,
        direction: 'forward',
    }"
                    x-init="$nextTick(() => {
        let typingInterval = setInterval(startTyping, $data.typeSpeed);

        function startTyping(){
            let current = $data.textArray[ $data.textIndex ];

            // check to see if we hit the end of the string
            if($data.charIndex > current.length){
                    $data.direction = 'backward';
                    clearInterval(typingInterval);

                    setTimeout(function(){
                        typingInterval = setInterval(startTyping, $data.typeSpeed);
                    }, $data.pauseEnd);
            }

            $data.text = current.substring(0, $data.charIndex);

            if($data.direction == 'forward')
            {
                $data.charIndex += 1;
            }
            else
            {
                if($data.charIndex == 0)
                {
                    $data.direction = 'forward';
                    clearInterval(typingInterval);
                    setTimeout(function(){
                        $data.textIndex += 1;
                        if($data.textIndex >= $data.textArray.length)
                        {
                            $data.textIndex = 0;
                        }
                        typingInterval = setInterval(startTyping, $data.typeSpeed);
                    }, $data.pauseStart);
                }
                $data.charIndex -= 1;
            }
        }

        setInterval(function(){
            if($refs.cursor.classList.contains('hidden'))
            {
                $refs.cursor.classList.remove('hidden');
            }
            else
            {
                $refs.cursor.classList.add('hidden');
            }
        }, $data.cursorSpeed);

    })"
                    class="flex items-center justify-center mx-auto text-center max-w-7xl">
                    <div class="relative hidden xl:flex items-center justify-center h-auto">
                        <h1 class="text-5xl font-black text-white leading-tight" x-text="text"
                            x-show="text !== ''"></h1>
                        <p class="text-5xl font-black text-white leading-tight invisible" x-show="text === ''">'</p>
                        <span class="absolute right-0 w-5 -mr-5 bg-white h-3/4" x-ref="cursor"></span>
                    </div>
                    <div class="relative flex xl:hidden items-center justify-center h-auto">
                        <h1 class="text-5xl font-black text-white leading-tight">
                            Wealth, like a tree, grows from a tiny seed.
                        </h1>
                    </div>
                </div>
                <p class="mx-auto mt-6 text-sm text-left text-gray-200 md:text-center md:mt-12 sm:text-base md:max-w-xl md:text-lg xl:text-xl">
                    “Gold cometh gladly and in increasing quantity to any man who will put by not less than one-tenth of
                    his earnings to create an estate for his future and that of his family.”</p>
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
