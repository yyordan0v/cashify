<x-app-layout>
    <div class="grid xl:grid-cols-2 gap-4 mb-4">
        <x-panels.panel class="flex flex-col items-start lg:items-center justify-center">
            <div class="flex items-center justify-between lg:justify-center w-full">
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
            </div>

            <div class="flex flex-col items-start lg:items-center">
                <x-cards.text class="my-0 lg:mt-2">$420</x-cards.text>
                <x-cards.text class="my-0 text-xs">4 transactions</x-cards.text>
            </div>

            <x-divider class="hidden lg:block my-6 w-full"/>

            <div
                class="hidden lg:flex items-center justify-center w-full gap-2 text-gray-600 dark:text-gray-400 text-sm">


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

        </x-panels.panel>

        <x-panels.panel class="flex flex-col items-start lg:items-center justify-start lg:justify-center">
            <div class="flex items-start lg:items-center w-full">
                <x-cards.title class="mt-0 w-full">
                    <span class="font-bold text-xl">
                        <x-forms.input value="Bank" class="mt-0 w-full lg:w-1/2"></x-forms.input>
                    </span>
                </x-cards.title>
            </div>

            <div class="flex flex-col items-start lg:items-center w-full">
                <x-cards.text class="my-0 lg:mt-2 w-full">
                    <x-forms.input value="$420" class="w-full lg:w-1/2"></x-forms.input>
                </x-cards.text>
            </div>

            <x-divider class="my-8 w-full"/>

            <div
                class="flex items-center justify-center w-full gap-2 text-gray-600 dark:text-gray-400 text-sm">

                <x-buttons.secondary>Cancel</x-buttons.secondary>
                <x-buttons.primary>Save</x-buttons.primary>

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

