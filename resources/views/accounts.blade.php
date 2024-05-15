<x-app-layout>
    <div class="flex flex-col gap-4 mb-4">
        <x-panels.panel class="flex flex-col items-start space-y-4">
            <div class="flex items-center justify-between w-full">
                <x-cards.title class="mt-0">
                        <span class="font-bold text-xl">
                            Bank
                        </span>
                </x-cards.title>

                <div class="lg:hidden"
                     x-data="{ dropdownOpen: false }"
                >

                    <button @click="dropdownOpen=true" class="text-gray-800 dark:text-gray-200">
                        <x-icon>
                            more_vert
                        </x-icon>
                    </button>

                    <div x-show="dropdownOpen"
                         @click.away="dropdownOpen=false"
                         x-transition:enter="ease-out duration-200"
                         x-transition:enter-start="-translate-y-2"
                         x-transition:enter-end="translate-y-0"
                         class="absolute top-10 w-56 right-14"
                         x-cloak>
                        <div
                            class="p-1 mt-1 bg-white/80 dark:bg-neutral-900/20 border rounded-lg shadow-md border-neutral-200/50 dark:border-neutral-800/50 text-gray-600 dark:text-gray-400 text-sm backdrop-blur-lg">
                            <x-buttons.action :href="route('accounts')">
                                <x-icon style="font-size: 20px">
                                    compare_arrows
                                </x-icon>
                                Transfer Balance
                            </x-buttons.action>
                            <x-buttons.action :href="route('accounts')">
                                <x-icon style="font-size: 20px">
                                    edit
                                </x-icon>
                                Edit
                            </x-buttons.action>
                            <x-buttons.action :href="route('accounts')" class="text-red-600">
                                <x-icon style="font-size: 20px">
                                    delete
                                </x-icon>
                                Delete
                            </x-buttons.action>
                        </div>
                    </div>
                </div>


                <div class="hidden lg:flex items-center gap-2 text-gray-600 dark:text-gray-400 text-sm">
                    <x-buttons.action :href="route('accounts')">
                        <x-icon>
                            compare_arrows
                        </x-icon>
                        Transfer Balance
                    </x-buttons.action>
                    <x-buttons.action :href="route('accounts')">
                        <x-icon>
                            edit
                        </x-icon>
                        Edit
                    </x-buttons.action>
                    <x-buttons.action :href="route('accounts')" class="text-red-600">
                        <x-icon>
                            delete
                        </x-icon>
                        Delete
                    </x-buttons.action>
                </div>
            </div>
            <div class="flex flex-col items-start">
                <x-cards.text class="text-gray-950 my-0">$420</x-cards.text>
                <x-cards.text class="my-0 text-xs">4 transactions</x-cards.text>
            </div>
        </x-panels.panel>
        <x-panels.panel class="flex flex-col items-start space-y-4">
            <div class="flex items-center justify-between w-full">
                <x-cards.title class="mt-0">
                        <span class="font-bold text-xl">
                            Bank
                        </span>
                </x-cards.title>

                <x-dropdown.menu>
                    <x-dropdown.button>
                        more_vert
                    </x-dropdown.button>

                    <x-dropdown.body>
                        <x-buttons.action :href="route('accounts')">
                            <x-icon style="font-size: 20px">
                                compare_arrows
                            </x-icon>
                            Transfer Balance
                        </x-buttons.action>
                        <x-buttons.action :href="route('accounts')">
                            <x-icon style="font-size: 20px">
                                edit
                            </x-icon>
                            Edit
                        </x-buttons.action>
                        <x-buttons.action :href="route('accounts')" class="text-red-600">
                            <x-icon style="font-size: 20px">
                                delete
                            </x-icon>
                            Delete
                        </x-buttons.action>
                    </x-dropdown.body>
                </x-dropdown.menu>

                <div class="hidden lg:flex items-center gap-2 text-gray-600 dark:text-gray-400 text-sm">
                    <x-buttons.action :href="route('accounts')">
                        <x-icon>
                            compare_arrows
                        </x-icon>
                        Transfer Balance
                    </x-buttons.action>
                    <x-buttons.action :href="route('accounts')">
                        <x-icon>
                            edit
                        </x-icon>
                        Edit
                    </x-buttons.action>
                    <x-buttons.action :href="route('accounts')" class="text-red-600">
                        <x-icon>
                            delete
                        </x-icon>
                        Delete
                    </x-buttons.action>
                </div>
            </div>
            <div class="flex flex-col items-start">
                <x-cards.text class="text-gray-950 my-0">$420</x-cards.text>
                <x-cards.text class="my-0 text-xs">4 transactions</x-cards.text>
            </div>
        </x-panels.panel>

        <a href="#">
            <x-panels.panel
                class="flex z-0 items-center justify-center h-full group transition-colors duration-150 hover:bg-gray-100/80 hover:dark:bg-neutral-700/20">
                <div class="flex flex-col items-center">
                    <x-icon class="opacity-20 text-black dark:text-white" style="font-size: 32px">
                        format_list_bulleted_add
                    </x-icon>
                    <x-cards.title class="opacity-60">Account</x-cards.title>
                </div>
            </x-panels.panel>
        </a>
    </div>
</x-app-layout>

