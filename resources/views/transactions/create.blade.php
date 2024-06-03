<x-app-layout>
    <div class="w-full max-w-xl mx-auto">
        <x-panels.panel padding="p-4" class="space-y-6 mb-4">
            <x-panels.heading class="mb-2">Add Transaction</x-panels.heading>

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
                    <x-tabs.content>
                        <x-forms.radio.group type="category">
                            <x-forms.radio.category id="category_1" color="bg-rose-200">
                                Category Name
                            </x-forms.radio.category>
                            <x-forms.radio.category id="category_2" color="bg-rose-200">
                                Category Name
                            </x-forms.radio.category>
                            <x-forms.radio.category id="category_3" color="bg-rose-200">
                                Category Name
                            </x-forms.radio.category>
                            <x-forms.radio.category id="category_4" color="bg-rose-200">
                                Category Name
                            </x-forms.radio.category>
                            <x-forms.radio.category id="category_5" color="bg-rose-200">
                                Category Name
                            </x-forms.radio.category>
                            <x-forms.radio.category id="category_6" color="bg-rose-200">
                                Category Name
                            </x-forms.radio.category>
                            <x-forms.radio.category id="category_7" color="bg-rose-200">
                                Category Name
                            </x-forms.radio.category>
                            <x-forms.radio.category id="category_8" color="bg-rose-200">
                                Category Name
                            </x-forms.radio.category>
                        </x-forms.radio.group>
                    </x-tabs.content>

                    <x-tabs.content>
                        <x-forms.radio.group type="category">
                            <x-forms.radio.category id="category_10" color="bg-rose-200">
                                Category Name
                            </x-forms.radio.category>
                            <x-forms.radio.category id="category_20" color="bg-rose-200">
                                Category Name
                            </x-forms.radio.category>
                            <x-forms.radio.category id="category_30" color="bg-rose-200">
                                Category Name
                            </x-forms.radio.category>
                            <x-forms.radio.category id="category_40" color="bg-rose-200">
                                Category Name
                            </x-forms.radio.category>
                        </x-forms.radio.group>
                    </x-tabs.content>
                </x-tabs.content-group>
            </x-tabs.body>

            <div>
                <x-forms.label for="name" :value="__('Account')"/>

                <x-forms.radio.group class="md:grid-cols-3">
                    <x-forms.radio.button name="type" id="fi-bank" value="fi-bank">
                        <div class="block">
                            <div class="w-full">Fi Bank</div>
                        </div>
                    </x-forms.radio.button>

                    <x-forms.radio.button name="type" id="pro-credit-bank" value="pro-credit-bank">
                        <div class="block">
                            <div class="w-full">Pro Credit Bank</div>
                        </div>
                    </x-forms.radio.button>

                    <x-forms.radio.button name="type" id="cash" value="cash">
                        <div class="block">
                            <div class="w-full">Cash</div>
                        </div>
                    </x-forms.radio.button>
                </x-forms.radio.group>
            </div>

            <div>
                <x-forms.label for="title" :value="__('Title')"/>
                <x-forms.input class="w-full "></x-forms.input>
            </div>

            <div>
                <x-forms.label for="amount" :value="__('Amount')"/>
                <x-forms.input class="w-full "></x-forms.input>
            </div>

            <div>
                <x-forms.label for="details" :value="__('Details')"/>
                <x-forms.textarea/>
            </div>

            <x-divider/>

            <div
                class="flex flex-col md:flex-row items-center justify-end lg:justify-center w-full gap-2 text-gray-600 dark:text-gray-400 text-sm">
                <x-buttons.secondary>Cancel</x-buttons.secondary>
                <x-buttons.form>Add Transaction</x-buttons.form>
            </div>


        </x-panels.panel>
    </div>
</x-app-layout>

