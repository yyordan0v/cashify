<aside
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 md:pt-4 md:rounded-xl md:m-4 md:mt-24 transition-all duration-200 -translate-x-full bg-white/80 border-r md:border border-neutral-200/50 md:translate-x-0 dark:bg-neutral-900/20 backdrop-blur-lg dark:border-neutral-800/50"
    aria-label="Sidenav"
    :class="{ 'ml-64': sidebarOpen }"
>
    <div class="overflow-y-auto py-4 px-3 h-full bg-white/80 dark:bg-neutral-900/20">
        <ul class="space-y-2">
            <x-nav.link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <x-nav.link-icon :active="request()->routeIs('dashboard')">
                    <path
                        d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                </x-nav.link-icon>
                <span>Dashboard</span>
            </x-nav.link>
        </ul>
        <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700">
            <x-nav.link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                <x-nav.link-icon viewBox="0 0 24 24" :active="request()->routeIs('profile.edit')">
                    <path fill-rule="evenodd"
                          d="M4.5 3.75a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V6.75a3 3 0 0 0-3-3h-15Zm4.125 3a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Zm-3.873 8.703a4.126 4.126 0 0 1 7.746 0 .75.75 0 0 1-.351.92 7.47 7.47 0 0 1-3.522.877 7.47 7.47 0 0 1-3.522-.877.75.75 0 0 1-.351-.92ZM15 8.25a.75.75 0 0 0 0 1.5h3.75a.75.75 0 0 0 0-1.5H15ZM14.25 12a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H15a.75.75 0 0 1-.75-.75Zm.75 2.25a.75.75 0 0 0 0 1.5h3.75a.75.75 0 0 0 0-1.5H15Z"
                          clip-rule="evenodd"/>
                </x-nav.link-icon>
                <span>Profile Settings</span>
            </x-nav.link>
        </ul>
    </div>
</aside>

<div x-show="sidebarOpen" @click="sidebarOpen = !sidebarOpen" class="fixed inset-0 z-30 bg-black opacity-85"></div>

