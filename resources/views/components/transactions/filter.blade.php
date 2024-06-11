<x-modal name="filter-transactions" :show="$errors->userDeletion->isNotEmpty()">
    <div class="p-6">

        <x-panels.heading>
            {{ __('Filters') }}
        </x-panels.heading>

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

            <x-tabs.content-group class="mt-8">
                {{--                    expense--}}
                <x-tabs.content>
                    <x-forms.radio.group type="category">
                        <div class="space-y-4">
                            <p class="text-sm font-medium text-center text-neutral-500">Select a library below</p>
                            <div class="relative">
                                <input type="checkbox" id="alpine-checkbox" value="" class="hidden peer" required="">
                                <label for="alpine-checkbox"
                                       class="inline-flex items-center justify-between w-full p-5 bg-white border-2 rounded-lg cursor-pointer group border-neutral-200/70 text-neutral-600 peer-checked:border-blue-600 peer-checked:text-neutral-900 peer-checked:bg-blue-50/50 hover:text-neutral-900">
                                    <div class="flex items-center space-x-5">
                                        <svg class="w-16 h-auto" viewBox="0 0 200 92" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M155.556 0 200 44.25l-44.444 44.249-44.445-44.25L155.556 0Z"
                                                  fill="currentColor" class="text-[#77C1D2]"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="m44.444 0 92.139 91.735H47.694L0 44.249 44.444 0Z"
                                                  fill="currentColor" class="text-[#2D3441]"></path>
                                        </svg>
                                        <div class="flex flex-col justify-start">
                                            <div class="w-full text-lg font-semibold">AlpineJS</div>
                                            <div class="w-full text-sm opacity-60">Your new, lightweight, JavaScript
                                                framework.
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="relative">
                                <input type="checkbox" id="tailwind-checkbox" value="" class="hidden peer" required="">
                                <label for="tailwind-checkbox"
                                       class="inline-flex items-center justify-between w-full p-5 bg-white border-2 rounded-lg cursor-pointer group border-neutral-200/70 text-neutral-600 peer-checked:border-blue-600 peer-checked:text-neutral-900 peer-checked:bg-blue-50/50 hover:text-neutral-900">
                                    <div class="flex items-center space-x-5">
                                        <svg class="w-16 h-auto text-[#38BDF8]" viewBox="0 0 200 120" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M100 0C73.333 0 56.667 13.333 50 40c10-13.333 21.667-18.333 35-15 7.607 1.9 13.044 7.422 19.063 13.53C113.867 48.48 125.215 60 150 60c26.667 0 43.333-13.333 50-40-10 13.333-21.667 18.333-35 15-7.607-1.9-13.044-7.422-19.063-13.53C136.133 11.52 124.785 0 100 0ZM50 60C23.333 60 6.667 73.333 0 100c10-13.333 21.667-18.333 35-15 7.607 1.904 13.044 7.422 19.063 13.53C63.867 108.48 75.215 120 100 120c26.667 0 43.333-13.333 50-40-10 13.333-21.667 18.333-35 15-7.607-1.9-13.044-7.422-19.063-13.53C86.133 71.52 74.785 60 50 60Z"
                                                  fill="currentColor" class=""></path>
                                        </svg>
                                        <div class="flex flex-col justify-start">
                                            <div class="w-full text-lg font-semibold">Tailwind CSS</div>
                                            <div class="w-full text-sm opacity-60">The ultimate utility-first CSS
                                                framework
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <x-panels.heading class="text-sm text-center w-full">
                            No expense categories found.
                        </x-panels.heading>
                    </x-forms.radio.group>

                </x-tabs.content>

                {{--                    income--}}
                <x-tabs.content>
                    <x-forms.radio.group type="category">
                        <div class="space-y-4">
                            <p class="text-sm font-medium text-center text-neutral-500">Select a library below</p>
                            <div class="relative">
                                <input type="checkbox" id="alpine-checkbox2" value="" class="hidden peer" required="">
                                <label for="alpine-checkbox2"
                                       class="inline-flex items-center justify-between w-full p-5 bg-white border-2 rounded-lg cursor-pointer group border-neutral-200/70 text-neutral-600 peer-checked:border-blue-600 peer-checked:text-neutral-900 peer-checked:bg-blue-50/50 hover:text-neutral-900">
                                    <div class="flex items-center space-x-5">
                                        <svg class="w-16 h-auto" viewBox="0 0 200 92" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M155.556 0 200 44.25l-44.444 44.249-44.445-44.25L155.556 0Z"
                                                  fill="currentColor" class="text-[#77C1D2]"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="m44.444 0 92.139 91.735H47.694L0 44.249 44.444 0Z"
                                                  fill="currentColor" class="text-[#2D3441]"></path>
                                        </svg>
                                        <div class="flex flex-col justify-start">
                                            <div class="w-full text-lg font-semibold">AlpineJS</div>
                                            <div class="w-full text-sm opacity-60">Your new, lightweight, JavaScript
                                                framework.
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="relative">
                                <input type="checkbox" id="tailwind-checkbox2" value="" class="hidden peer" required="">
                                <label for="tailwind-checkbox2"
                                       class="inline-flex items-center justify-between w-full p-5 bg-white border-2 rounded-lg cursor-pointer group border-neutral-200/70 text-neutral-600 peer-checked:border-blue-600 peer-checked:text-neutral-900 peer-checked:bg-blue-50/50 hover:text-neutral-900">
                                    <div class="flex items-center space-x-5">
                                        <svg class="w-16 h-auto text-[#38BDF8]" viewBox="0 0 200 120" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M100 0C73.333 0 56.667 13.333 50 40c10-13.333 21.667-18.333 35-15 7.607 1.9 13.044 7.422 19.063 13.53C113.867 48.48 125.215 60 150 60c26.667 0 43.333-13.333 50-40-10 13.333-21.667 18.333-35 15-7.607-1.9-13.044-7.422-19.063-13.53C136.133 11.52 124.785 0 100 0ZM50 60C23.333 60 6.667 73.333 0 100c10-13.333 21.667-18.333 35-15 7.607 1.904 13.044 7.422 19.063 13.53C63.867 108.48 75.215 120 100 120c26.667 0 43.333-13.333 50-40-10 13.333-21.667 18.333-35 15-7.607-1.9-13.044-7.422-19.063-13.53C86.133 71.52 74.785 60 50 60Z"
                                                  fill="currentColor" class=""></path>
                                        </svg>
                                        <div class="flex flex-col justify-start">
                                            <div class="w-full text-lg font-semibold">Tailwind CSS</div>
                                            <div class="w-full text-sm opacity-60">The ultimate utility-first CSS
                                                framework
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <x-panels.heading class="text-sm text-center w-full">
                            No income categories found.
                        </x-panels.heading>
                    </x-forms.radio.group>

                </x-tabs.content>
            </x-tabs.content-group>
        </x-tabs.body>

        <x-forms.date/>

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
            <div
                class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"
            ></div>
        </div>

        <div class="flex items-center justify-end gap-2">
            <x-buttons.secondary x-on:click="$dispatch('close')">Cancel</x-buttons.secondary>
            <x-buttons.form>Apply</x-buttons.form>
        </div>

    </div>
</x-modal>
