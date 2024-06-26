<div
    class="hidden md:block fixed z-50 max-w-lg rounded-xl bottom-6 right-6 dark:border-neutral-200/50 border dark:bg-white/80 border-neutral-800/50 bg-black/80 backdrop-blur-sm">
    <x-tooltip text="Add Transaction" ref="content">
        <div class="grid h-full max-w-lg grid-cols-1 mx-auto" x-ref="content">
            <a href="{{ route('transactions.create') }}"
               class="inline-flex flex-col items-center justify-center p-4 rounded-xl transition-colors duration-200 dark:hover:bg-white hover:bg-black">
                <x-icon class="text-white dark:text-black">
                    add
                </x-icon>
                <span class="sr-only">Home</span>
            </a>
        </div>
    </x-tooltip>
</div>


<div
    class="block md:hidden fixed z-50 w-full h-16 -translate-x-1/2 bottom-0 left-1/2 border-neutral-200/50 border-t bg-white/80 dark:border-neutral-800/50 dark:bg-neutral-900/75 backdrop-blur-lg">
    <div class="grid h-full max-w-lg grid-cols-5 mx-auto">
        <x-nav.bottom-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" description="Dashboard">
            grid_view
        </x-nav.bottom-link>
        <x-nav.bottom-link :href="route('transactions.index')"
                           :active="request()->routeIs(['transactions.index', 'transactions.create', 'transactions.edit'])"
                           description="Transactions">
            payments
        </x-nav.bottom-link>

        <div class="flex items-center justify-center">
            <a href="{{ route('transactions.create') }}"
               class="inline-flex items-center justify-center w-14 h-14 rounded-full dark:bg-white/80 bg-black/80 dark:hover:bg-white hover:bg-black dark:focus:bg-white focus:bg-black focus:outline-none group">
                <x-icon class="text-white dark:text-black">
                    add
                </x-icon>
                <span class="sr-only">New item</span>
            </a>
        </div>

        <x-nav.bottom-link href="{{ route('accounts.index') }}"
                           :active="request()->routeIs(['accounts.index', 'accounts.edit', 'accounts.create', 'accounts.show'])"
                           description="Accounts">
            wallet
        </x-nav.bottom-link>
        <button
            @click="sidebarOpen = !sidebarOpen"
            class="inline-flex flex-col items-center justify-center px-5 transition-colors duration-200 group">
            <x-icon
                class="transition-colors duration-200 text-gray-500 dark:text-gray-400">
                more_horiz

            </x-icon>
            <span class="text-black/75 dark:text-white/75 text-2xs mt-1">More</span>
            <span class="sr-only">More</span>
        </button>
    </div>
</div>
