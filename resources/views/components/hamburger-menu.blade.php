<div @click="showMenu = !showMenu"
     class="absolute right-0 z-50 flex flex-col items-end translate-y-1.5 w-10 h-10 p-2 mr-4 rounded-full cursor-pointer md:hidden hover:bg-gray-200/10 hover:bg-opacity-10"
     :class="{ 'text-gray-100 dark:text-gray-400': showMenu, 'text-gray-800 dark:text-gray-100': !showMenu }">
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
