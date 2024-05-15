<x-app-layout>
    <x-tabs.body class="flex flex-col gap-4">
        <x-tabs.button-group>
            <x-tabs.button>
                Expense
            </x-tabs.button>
            <x-tabs.button>
                Income
            </x-tabs.button>
        </x-tabs.button-group>

        <x-tabs.content-group class="mb-4">

            <!-- Expense -->
            <x-tabs.content class="flex flex-col gap-4">
                {{--                show--}}
                <x-panels.panel class="p-0">
                    <div class="p-4 flex items-center">

                        <x-category-image class="bg-fuchsia-100">
                            shopping
                        </x-category-image>

                        <div class="w-full">
                            <div class="flex items-center justify-between">
                                <x-cards.title class="mt-0">
                        <span class="font-black">
                            Shopping
                        </span>
                                </x-cards.title>

                                <x-dropdown.menu>
                                    <x-dropdown.button>
                                        more_vert
                                    </x-dropdown.button>

                                    <x-dropdown.body>
                                        <x-buttons.action :href="route('categories')">
                                            <x-icon style="font-size: 20px">
                                                edit
                                            </x-icon>
                                            Edit
                                        </x-buttons.action>
                                        <x-buttons.action :href="route('categories')" class="text-red-600">
                                            <x-icon style="font-size: 20px">
                                                delete
                                            </x-icon>
                                            Delete
                                        </x-buttons.action>
                                    </x-dropdown.body>
                                </x-dropdown.menu>

                                <div
                                    class="hidden lg:flex items-center gap-2 text-gray-600 dark:text-gray-400 text-sm">
                                    <x-buttons.action :href="route('categories')">
                                        <x-icon>
                                            edit
                                        </x-icon>
                                        Edit
                                    </x-buttons.action>
                                    <x-buttons.action :href="route('categories')" class="text-red-600">
                                        <x-icon>
                                            delete
                                        </x-icon>
                                        Delete
                                    </x-buttons.action>
                                </div>
                            </div>

                            <div class="flex flex-col items-start">
                                <x-cards.text class="my-0 text-sm">Expense</x-cards.text>
                                <x-cards.text class="my-0 text-xs">4 transactions</x-cards.text>
                            </div>
                        </div>
                    </div>

                </x-panels.panel>

                {{--                edit--}}
                <x-panels.panel class="p-0">

                    <div class="flex flex-col items-start w-full p-4">

                        <div class="flex items-center w-full">
                            <x-category-image class="bg-fuchsia-100">
                                shopping
                            </x-category-image>

                            <div class="flex items-center justify-between w-full">
                                <div class="flex flex-col items-start justify-center w-full">
                                    <x-forms.input class="w-full mt-0" value="Shopping"></x-forms.input>

                                    <x-forms.select>
                                        <option value="1">Expense</option>
                                        <option value="2">Income</option>
                                    </x-forms.select>

                                </div>
                            </div>
                        </div>

                        <x-divider class="my-8 w-full"/>

                        <div
                            class="flex flex-col md:flex-row items-center justify-end w-full gap-2 text-gray-600 dark:text-gray-400 text-sm">
                            <x-buttons.secondary>Cancel</x-buttons.secondary>
                            <x-buttons.primary>Save</x-buttons.primary>
                        </div>

                    </div>
                </x-panels.panel>
            </x-tabs.content>

            <!-- Income -->
            <x-tabs.content class="flex flex-col gap-4">
                <x-panels.panel class="p-0">
                    <div class="p-4 flex items-center">

                        <x-category-image class="bg-fuchsia-100">
                            shopping
                        </x-category-image>

                        <div class="w-full">
                            <div class="flex items-center justify-between">
                                <x-cards.title class="mt-0">
                        <span class="font-black">
                            Shopping
                        </span>
                                </x-cards.title>

                                <x-dropdown.menu>
                                    <x-dropdown.button>
                                        more_vert
                                    </x-dropdown.button>

                                    <x-dropdown.body>
                                        <x-buttons.action :href="route('categories')">
                                            <x-icon style="font-size: 20px">
                                                edit
                                            </x-icon>
                                            Edit
                                        </x-buttons.action>
                                        <x-buttons.action :href="route('categories')" class="text-red-600">
                                            <x-icon style="font-size: 20px">
                                                delete
                                            </x-icon>
                                            Delete
                                        </x-buttons.action>
                                    </x-dropdown.body>
                                </x-dropdown.menu>

                                <div
                                    class="hidden lg:flex items-center gap-2 text-gray-600 dark:text-gray-400 text-sm">
                                    <x-buttons.action :href="route('categories')">
                                        <x-icon>
                                            edit
                                        </x-icon>
                                        Edit
                                    </x-buttons.action>
                                    <x-buttons.action :href="route('categories')" class="text-red-600">
                                        <x-icon>
                                            delete
                                        </x-icon>
                                        Delete
                                    </x-buttons.action>
                                </div>
                            </div>

                            <div class="flex flex-col items-start">
                                <x-cards.text class="my-0 text-sm">Income</x-cards.text>
                                <x-cards.text class="my-0 text-xs">4 transactions</x-cards.text>
                            </div>
                        </div>
                    </div>

                </x-panels.panel>

                <x-panels.panel class="p-0">
                    <div class="p-4 flex items-center">

                        <x-category-image class="bg-cyan-100">
                            dollar-coin
                        </x-category-image>

                        <div class="w-full">
                            <div class="flex items-center justify-between">
                                <x-cards.title class="mt-0">
                                        <span class="font-black">
                                            Salary
                                        </span>
                                </x-cards.title>

                                <x-dropdown.menu>
                                    <x-dropdown.button>
                                        more_vert
                                    </x-dropdown.button>

                                    <x-dropdown.body>
                                        <x-buttons.action :href="route('categories')">
                                            <x-icon style="font-size: 20px">
                                                edit
                                            </x-icon>
                                            Edit
                                        </x-buttons.action>
                                        <x-buttons.action :href="route('categories')" class="text-red-600">
                                            <x-icon style="font-size: 20px">
                                                delete
                                            </x-icon>
                                            Delete
                                        </x-buttons.action>
                                    </x-dropdown.body>
                                </x-dropdown.menu>

                                <div
                                    class="hidden lg:flex items-center gap-2 text-gray-600 dark:text-gray-400 text-sm">
                                    <x-buttons.action :href="route('categories')">
                                        <x-icon>
                                            edit
                                        </x-icon>
                                        Edit
                                    </x-buttons.action>
                                    <x-buttons.action :href="route('categories')" class="text-red-600">
                                        <x-icon>
                                            delete
                                        </x-icon>
                                        Delete
                                    </x-buttons.action>
                                </div>
                            </div>

                            <div class="flex flex-col items-start">
                                <x-cards.text class="my-0 text-sm">Income</x-cards.text>
                                <x-cards.text class="my-0 text-xs">4 transactions</x-cards.text>
                            </div>
                        </div>
                    </div>

                </x-panels.panel>
            </x-tabs.content>
        </x-tabs.content-group>
    </x-tabs.body>

    <a href="#">
        <x-panels.panel
            class="flex z-0 items-center justify-center h-full group transition-colors duration-150 hover:bg-gray-100/80 hover:dark:bg-neutral-700/20 p-0">
            <div class="flex flex-col items-center p-4">
                <x-icon class="opacity-20 text-black dark:text-white" style="font-size: 32px">
                    format_list_bulleted_add
                </x-icon>
                <x-cards.title class="opacity-60">Category</x-cards.title>
            </div>
        </x-panels.panel>
    </a>
</x-app-layout>
