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

                {{--                edit--}}
                <x-panels.panel padding="4">

                    <div class="flex flex-col items-start w-full"
                         x-data="{ color: '' }" @color-changed.window="color = $event.detail.color">

                        <div class=" flex items-start w-full
                    ">

                            <div x-data="{ slideOverOpen: false }" class="relative z-50 w-auto h-auto mt-2">

                                <x-category-image-change/>

                                <template x-teleport="body">
                                    <div x-show="slideOverOpen" @keydown.window.escape="slideOverOpen=false"
                                         class="relative z-[99]">
                                        <div x-show="slideOverOpen" x-transition.opacity.duration.200ms
                                             @click="slideOverOpen = false"
                                             class="fixed inset-0 bg-black bg-opacity-85"></div>
                                        <div class="fixed inset-0 overflow-hidden">
                                            <div class="absolute inset-0 overflow-hidden">
                                                <div
                                                    class="fixed inset-x-0 bottom-0 flex h-3/4 max-h-3/4">
                                                    <div
                                                        x-show="slideOverOpen"
                                                        @click.away="slideOverOpen = false"
                                                        x-transition:enter="transform transition ease-in duration-200"
                                                        x-transition:enter-start="translate-y-full"
                                                        x-transition:enter-end="translate-y-0"
                                                        x-transition:leave="transform transition ease-in duration-200"
                                                        x-transition:leave-start="translate-y-0"
                                                        x-transition:leave-end="translate-y-full"
                                                        class="w-screen max-h-full h-full">
                                                        <div
                                                            class="flex flex-col h-full py-5 overflow-y-scroll bg-white border-t shadow-lg border-neutral-100/70">
                                                            <div class="px-4 sm:px-5">
                                                                <div class="flex items-start justify-between pb-1">
                                                                    <h2 class="text-base font-semibold leading-6 text-gray-900"
                                                                        id="slide-over-title">Select Icon</h2>
                                                                    <div class="flex items-center h-auto ml-3">
                                                                        <button @click="slideOverOpen=false"
                                                                                class="absolute top-0 right-0 z-30 flex items-center justify-center px-3 py-2 mt-4 mr-5 space-x-1 text-xs font-medium uppercase border rounded-md border-neutral-200 text-neutral-600 hover:bg-neutral-100">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                 fill="none" viewBox="0 0 24 24"
                                                                                 stroke-width="1.5"
                                                                                 stroke="currentColor" class="w-4 h-4">
                                                                                <path stroke-linecap="round"
                                                                                      stroke-linejoin="round"
                                                                                      d="M6 18L18 6M6 6l12 12"></path>
                                                                            </svg>
                                                                            <span>Close</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="relative flex-1 px-4 mt-5 sm:px-5">
                                                                <div class="absolute inset-0 px-4 sm:px-5">
                                                                    <div
                                                                        class="relative grid grid-cols-8 gap-2 h-full border border-dashed border-gray-400 rounded-lg"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>

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
