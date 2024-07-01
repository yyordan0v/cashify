<aside
    class="fixed top-0 left-0 z-40 w-64 h-full md:h-[calc(100vh-7rem)] pt-14 md:pt-4 md:rounded-xl md:m-4 md:mt-24 transition-all duration-200 -translate-x-full bg-white/80 md:bg-white/20 border-r md:border border-neutral-400/50 md:translate-x-0 dark:bg-neutral-900/20 backdrop-blur-lg dark:border-neutral-600/50"
    aria-label="Sidenav"
    :class="{ 'ml-64': sidebarOpen }"
>
    <div class="overflow-y-auto py-4 px-3 h-full bg-white/80 md:bg-transparent dark:bg-neutral-900/20">
        <ul class="space-y-2">
            <x-nav.link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <x-nav.link-icon :active="request()->routeIs('dashboard')">
                    grid_view
                </x-nav.link-icon>
                <span>{{__('Dashboard')}}</span>
            </x-nav.link>
            <x-nav.link :href="route('transactions.index')"
                        :active="request()->routeIs(['transactions.index', 'transactions.create', 'transactions.edit'])">
                <x-nav.link-icon
                    :active="request()->routeIs(['transactions.index', 'transactions.create', 'transactions.edit'])">
                    payments
                </x-nav.link-icon>
                <span>{{__('Transactions')}}</span>
            </x-nav.link>
            <x-nav.link :href="route('goals')" :active="request()->routeIs('goals')">
                <x-nav.link-icon :active="request()->routeIs('goals')">
                    savings
                </x-nav.link-icon>
                <span>{{__('Goals')}}</span>
            </x-nav.link>
            <x-nav.link :href="route('scheduled')" :active="request()->routeIs('scheduled')">
                <x-nav.link-icon :active="request()->routeIs('scheduled')">
                    calendar_clock
                </x-nav.link-icon>
                <span>{{__('Scheduled')}}</span>
            </x-nav.link>
            <x-nav.link :href="route('spending')" :active="request()->routeIs('spending')">
                <x-nav.link-icon :active="request()->routeIs('spending')">
                    receipt_long
                </x-nav.link-icon>
                <span>{{__('All Spending')}}</span>
            </x-nav.link>
        </ul>
        <ul class="pt-5 mt-5 space-y-2 border-t border-neutral-400/50 dark:border-neutral-600/50">
            <x-nav.link :href="route('accounts.index')"
                        :active="request()->routeIs(['accounts.index', 'accounts.edit', 'accounts.create', 'accounts.show'])">
                <x-nav.link-icon
                    :active="request()->routeIs(['accounts.index', 'accounts.edit', 'accounts.create', 'accounts.show'])">
                    wallet
                </x-nav.link-icon>
                <span>{{__('Accounts')}}</span>
            </x-nav.link>
            <x-nav.link :href="route('categories.index')"
                        :active="request()->routeIs(['categories.index', 'categories.edit', 'categories.create'])">
                <x-nav.link-icon
                    :active="request()->routeIs(['categories.index', 'categories.edit', 'categories.create'])">
                    category
                </x-nav.link-icon>
                <span>{{__('Categories')}}</span>
            </x-nav.link>
            <x-nav.link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                <x-nav.link-icon :active="request()->routeIs('profile.edit')">
                    id_card
                </x-nav.link-icon>
                <span>{{__('Profile')}}</span>
            </x-nav.link>
        </ul>
    </div>

    <x-locale-switch/>
</aside>

<div x-show="sidebarOpen" @click="sidebarOpen = !sidebarOpen" class="fixed inset-0 z-30 bg-black opacity-85"></div>

