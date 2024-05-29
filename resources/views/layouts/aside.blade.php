<aside
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 md:pt-4 md:rounded-xl md:m-4 md:mt-24 transition-all duration-200 -translate-x-full bg-white/80 md:bg-white/20 border-r md:border border-neutral-200/50 md:translate-x-0 dark:bg-neutral-900/20 backdrop-blur-lg dark:border-neutral-800/50"
    aria-label="Sidenav"
    :class="{ 'ml-64': sidebarOpen }"
>
    <div class="overflow-y-auto py-4 px-3 h-full bg-white/80 md:bg-transparent dark:bg-neutral-900/20">
        <ul class="space-y-2">
            <x-nav.link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <x-nav.link-icon :active="request()->routeIs('dashboard')">
                    grid_view
                </x-nav.link-icon>
                <span>Dashboard</span>
            </x-nav.link>
            <x-nav.link :href="route('transactions')" :active="request()->routeIs('transactions')">
                <x-nav.link-icon :active="request()->routeIs('transactions')">
                    payments
                </x-nav.link-icon>
                <span>Transactions</span>
            </x-nav.link>
            <x-nav.link :href="route('goals')" :active="request()->routeIs('goals')">
                <x-nav.link-icon :active="request()->routeIs('goals')">
                    savings
                </x-nav.link-icon>
                <span>Goals</span>
            </x-nav.link>
            <x-nav.link :href="route('goals')" :active="request()->routeIs('scheduled')">
                <x-nav.link-icon :active="request()->routeIs('scheduled')">
                    calendar_clock
                </x-nav.link-icon>
                <span>Scheduled</span>
            </x-nav.link>
            <x-nav.link :href="route('goals')" :active="request()->routeIs('spending')">
                <x-nav.link-icon :active="request()->routeIs('spending')">
                    receipt_long
                </x-nav.link-icon>
                <span>All Spending</span>
            </x-nav.link>
        </ul>
        <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700">
            <x-nav.link :href="route('accounts.index')"
                        :active="request()->routeIs(['accounts.index', 'accounts.edit', 'accounts.create'])">
                <x-nav.link-icon :active="request()->routeIs(['accounts.index', 'accounts.edit', 'accounts.create'])">
                    wallet
                </x-nav.link-icon>
                <span>Accounts</span>
            </x-nav.link>
            <x-nav.link :href="route('categories.index')"
                        :active="request()->routeIs(['categories.index', 'categories.edit', 'categories.create'])">
                <x-nav.link-icon
                    :active="request()->routeIs(['categories.index', 'categories.edit', 'categories.create'])">
                    category
                </x-nav.link-icon>
                <span>Categories</span>
            </x-nav.link>
            <x-nav.link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                <x-nav.link-icon :active="request()->routeIs('profile.edit')">
                    id_card
                </x-nav.link-icon>
                <span>Profile</span>
            </x-nav.link>
        </ul>
    </div>
</aside>

<div x-show="sidebarOpen" @click="sidebarOpen = !sidebarOpen" class="fixed inset-0 z-30 bg-black opacity-85"></div>

