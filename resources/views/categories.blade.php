<x-app-layout>
    <x-tabs.body class="flex flex-col gap-4">
        <x-tabs.button-group>
            <x-tabs.button>
                Expense
                <x-icon class="text-red-500 mt-1">
                    arrow_drop_down
                </x-icon>
            </x-tabs.button>
            <x-tabs.button>
                Income
                <x-icon class="text-emerald-500 mt-1">
                    arrow_drop_up
                </x-icon>
            </x-tabs.button>
        </x-tabs.button-group>

        <x-tabs.content-group class="mb-4">

            <!-- Expense -->
            <x-tabs.content class="flex flex-col gap-4">
                {{--                show--}}
                <x-panels.panel padding="4">
                    <div class="flex items-center">

                        <x-category-image image="shopping" color="bg-fuchsia-200"/>

                        <div class="w-full pb-2">
                            <div class="flex items-center justify-between">
                                <x-cards.title class="mt-0 mb-0">
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

                <x-modal name="category-image-change" :show="$errors->userDeletion->isNotEmpty()">
                    <div class="p-6">

                        <x-panels.heading>
                            {{ __('Change Image Modal') }}
                        </x-panels.heading>

                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                            Make sure to select the right image for your category.
                        </p>

                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div
                                class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"
                            ></div>
                            <div
                                class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"
                            ></div>
                            <div
                                class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"
                            ></div>
                            <div
                                class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"
                            ></div>
                        </div>

                        <div class="flex items-center justify-end ">
                            <x-buttons.secondary x-on:click="$dispatch('close')">Cancel
                            </x-buttons.secondary>
                            <x-buttons.form>Apply</x-buttons.form>
                        </div>

                    </div>
                </x-modal>

                {{--                edit--}}
                <x-panels.panel padding="4">

                    <div class="flex flex-col items-start w-full"
                         x-data="{ color: '' }" @color-changed.window="color = $event.detail.color">

                        <div class=" flex items-start w-full
                    ">

                            <x-category-image-change x-data=""
                                                     x-on:click.prevent="$dispatch('open-modal', 'category-image-change')"
                            />


                            <div class="flex items-center justify-between w-full">
                                <div class="flex flex-col items-start justify-center w-full">
                                    <x-forms.input class="w-full mt-0" value="Shopping"></x-forms.input>

                                    <x-forms.radio.group>
                                        <x-forms.radio.button name="type" id="expense" value="expense">
                                            <div class="block">
                                                <div class="w-full">Expense</div>
                                            </div>
                                            <x-icon class="text-red-500 mt-1">
                                                arrow_drop_down
                                            </x-icon>
                                        </x-forms.radio.button>

                                        <x-forms.radio.button name="type" id="income" value="income">
                                            <div class="block">
                                                <div class="w-full">Income</div>
                                            </div>
                                            <x-icon class="text-emerald-500 mt-1">
                                                arrow_drop_up
                                            </x-icon>
                                        </x-forms.radio.button>
                                    </x-forms.radio.group>
                                </div>
                            </div>
                        </div>

                        <x-forms.radio.group type="color" class="pl-24">
                            <x-forms.radio.color color="bg-gray-300" name="color" id="gray"/>
                            <x-forms.radio.color color="bg-red-300" name="color" id="red"/>
                            <x-forms.radio.color color="bg-orange-300" name="color" id="orange"/>
                            <x-forms.radio.color color="bg-amber-300" name="color" id="amber"/>
                            <x-forms.radio.color color="bg-yellow-300" name="color" id="yellow"/>
                            <x-forms.radio.color color="bg-lime-300" name="color" id="lime"/>
                            <x-forms.radio.color color="bg-green-300" name="color" id="green"/>
                            <x-forms.radio.color color="bg-emerald-300" name="color" id="emerald"/>
                            <x-forms.radio.color color="bg-teal-300" name="color" id="teal"/>
                            <x-forms.radio.color color="bg-cyan-300" name="color" id="cyan"/>
                            <x-forms.radio.color color="bg-sky-300" name="color" id="sky"/>
                            <x-forms.radio.color color="bg-blue-300" name="color" id="blue"/>
                            <x-forms.radio.color color="bg-indigo-300" name="color" id="indigo"/>
                            <x-forms.radio.color color="bg-violet-300" name="color" id="violet"/>
                            <x-forms.radio.color color="bg-purple-300" name="color" id="purple"/>
                            <x-forms.radio.color color="bg-fuchsia-300" name="color" id="fuchsia"/>
                            <x-forms.radio.color color="bg-pink-300" name="color" id="pink"/>
                            <x-forms.radio.color color="bg-rose-300" name="color" id="rose"/>
                        </x-forms.radio.group>

                        <x-divider class="my-8 w-full"/>

                        <div
                            class="flex flex-col md:flex-row items-center justify-end w-full gap-2 text-gray-600 dark:text-gray-400 text-sm">
                            <x-buttons.secondary>Cancel</x-buttons.secondary>
                            <x-buttons.form>Save</x-buttons.form>
                        </div>

                    </div>
                </x-panels.panel>
            </x-tabs.content>

            <!-- Income -->
            <x-tabs.content class="flex flex-col gap-4">
                <x-panels.panel padding="4">
                    <div class="flex items-center">

                        <x-category-image color="bg-amber-200" image="gift"/>

                        <div class="w-full pb-2">
                            <div class="flex items-center justify-between">
                                <x-cards.title class="mt-0 mb-0">
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

                <x-panels.panel padding="4">
                    <div class="flex items-center">

                        <x-category-image color="bg-lime-200" current-image="dollar-coin"/>

                        <div class="w-full pb-2">
                            <div class="flex items-center justify-between">
                                <x-cards.title class="mt-0 mb-0">
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

    <a href="{{ route('categories') }}">
        <x-buttons.card-button>
            Category
        </x-buttons.card-button>
    </a>
</x-app-layout>
