<aside
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 md:pt-4 md:rounded-xl md:m-4 md:mt-24 transition-transform -translate-x-full bg-white/80 border-r md:border border-neutral-200/50 md:translate-x-0 dark:bg-neutral-900/20 backdrop-blur-lg dark:border-neutral-800/50"
    aria-label="Sidenav"
    id="drawer-navigation"
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
                          d="M4 4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4Zm10 5a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-8-5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm1.942 4a3 3 0 0 0-2.847 2.051l-.044.133-.004.012c-.042.126-.055.167-.042.195.006.013.02.023.038.039.032.025.08.064.146.155A1 1 0 0 0 6 17h6a1 1 0 0 0 .811-.415.713.713 0 0 1 .146-.155c.019-.016.031-.026.038-.04.014-.027 0-.068-.042-.194l-.004-.012-.044-.133A3 3 0 0 0 10.059 14H7.942Z"
                          clip-rule="evenodd"/>
                </x-nav.link-icon>
                <span>Profile</span>
            </x-nav.link>
        </ul>
    </div>
</aside>
