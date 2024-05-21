<x-app-layout>
    <div class="grid grid-cols-1 xl:grid-cols-2 justify-center gap-4 mb-4 w-full">

        <x-modal name="filter-transactions" :show="$errors->userDeletion->isNotEmpty()">
            <div class="p-6">

                <x-panels.heading>
                    {{ __('Filter Modal') }}
                </x-panels.heading>

                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Make sure to select the right filters for your needs.
                </p>

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <x-forms.date/>

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
                    <x-buttons.secondary x-on:click="$dispatch('close')">Cancel</x-buttons.secondary>
                    <x-buttons.form>Apply</x-buttons.form>
                </div>

            </div>
        </x-modal>

        <x-panels.panel padding="4" class="space-y-6">
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

            <x-divider class="my-8"/>

            <div
                class="flex flex-col md:flex-row items-center justify-end lg:justify-center w-full gap-2 text-gray-600 dark:text-gray-400 text-sm">
                <x-buttons.secondary>Cancel</x-buttons.secondary>
                <x-buttons.form>Add Transaction</x-buttons.form>
            </div>


        </x-panels.panel>

        <x-panels.panel padding="4">
            <div class="flex flex-wrap items-center justify-between mb-8">
                <x-panels.heading>Latest Transactions</x-panels.heading>
                <div
                    class="flex items-center text-gray-500 dark:text-gray-400">

                    <x-buttons.icon x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'filter-transactions')">
                        filter_alt
                    </x-buttons.icon>

                </div>
            </div>

            <x-tabs.body class="flex flex-col gap-4 mt-4">
                <x-tabs.button-group count="3">
                    <x-tabs.button>
                        All
                    </x-tabs.button>
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

                <x-tabs.content-group>

                    {{--                    All--}}
                    <x-tabs.content class="flex-auto space-y-8">
                        <x-transactions.group heading="Today, May 21">
                            <x-transactions.row :href="route('transactions')" type="income" description="Salary"
                                                date="26 March 2020, at 13:45 PM"
                                                amount="2,500 лв." category-background="bg-rose-200"
                                                category-image="dollar-coin"/>
                            <x-transactions.row :href="route('transactions')" type="income" description="Gift"
                                                date="26 March 2020, at 13:45 PM"
                                                amount="500 лв." category-background="bg-lime-200"
                                                category-image="gift"/>
                            <x-transactions.row :href="route('transactions')" type="expense" description="New iPhone"
                                                date="26 March 2020, at 13:45 PM"
                                                amount="2,500 лв." category-background="bg-rose-200"
                                                category-image="dollar-coin"/>
                            <x-transactions.row :href="route('transactions')" type="expense" description="Rent"
                                                date="26 March 2020, at 13:45 PM"
                                                amount="1000 лв." category-background="bg-rose-200"
                                                category-image="dollar-coin"/>
                        </x-transactions.group>

                        <x-transactions.group heading="Yesterday, May 20">
                            <x-transactions.row :href="route('transactions')" type="income" description="Salary"
                                                date="26 March 2020, at 13:45 PM"
                                                amount="2,500 лв." category-background="bg-rose-200"
                                                category-image="dollar-coin"/>
                            <x-transactions.row :href="route('transactions')" type="expense" description="Rent"
                                                date="26 March 2020, at 13:45 PM"
                                                amount="1000 лв." category-background="bg-rose-200"
                                                category-image="dollar-coin"/>
                        </x-transactions.group>
                    </x-tabs.content>

                    {{--                    Expense--}}
                    <x-tabs.content class="flex-auto space-y-8">
                        <x-transactions.group heading="Today, May 21">
                            <x-transactions.row :href="route('transactions')" type="expense" description="New iPhone"
                                                date="26 March 2020, at 13:45 PM"
                                                amount="2,500 лв." category-background="bg-rose-200"
                                                category-image="dollar-coin"/>
                            <x-transactions.row :href="route('transactions')" type="expense" description="Rent"
                                                date="26 March 2020, at 13:45 PM"
                                                amount="1000 лв." category-background="bg-rose-200"
                                                category-image="dollar-coin"/>
                        </x-transactions.group>

                        <x-transactions.group heading="Yesterday, May 20">
                            <x-transactions.row :href="route('transactions')" type="expense" description="Rent"
                                                date="26 March 2020, at 13:45 PM"
                                                amount="1000 лв." category-background="bg-rose-200"
                                                category-image="dollar-coin"/>
                        </x-transactions.group>
                    </x-tabs.content>

                    {{--                    Income--}}
                    <x-tabs.content class="flex-auto space-y-8">
                        <x-transactions.group heading="Today, May 21">
                            <x-transactions.row :href="route('transactions')" type="income" description="Salary"
                                                date="26 March 2020, at 13:45 PM"
                                                amount="2,500 лв." category-background="bg-rose-200"
                                                category-image="dollar-coin"/>
                            <x-transactions.row :href="route('transactions')" type="income" description="Gift"
                                                date="26 March 2020, at 13:45 PM"
                                                amount="500 лв." category-background="bg-lime-200"
                                                category-image="gift"/>
                        </x-transactions.group>

                        <x-transactions.group heading="Yesterday, May 20">
                            <x-transactions.row :href="route('transactions')" type="income" description="Salary"
                                                date="26 March 2020, at 13:45 PM"
                                                amount="2,500 лв." category-background="bg-rose-200"
                                                category-image="dollar-coin"/>
                        </x-transactions.group>
                    </x-tabs.content>
                </x-tabs.content-group>

            </x-tabs.body>
        </x-panels.panel>
    </div>
</x-app-layout>

