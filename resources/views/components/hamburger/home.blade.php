<div @click="showMenu = !showMenu"
     class="absolute right-0 z-50 flex flex-col items-end w-10 h-10 p-2 mr-4 sm:mr-6 rounded-full cursor-pointer md:hidden hover:bg-gray-200/10 hover:bg-opacity-10"
     :class="{ 'text-gray-100 dark:text-gray-400': showMenu, 'text-gray-800 dark:text-gray-100': !showMenu }">

    <svg
        aria-hidden="true"
        class="w-6 h-6"
        x-show="!showMenu"
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
        class="w-6 h-6"
        x-show="showMenu"
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

    <span class="sr-only">Toggle Menu</span>
</div>
