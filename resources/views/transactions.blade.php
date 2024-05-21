<x-app-layout>
    <div class="grid grid-cols-1 justify-center gap-4 mb-4 w-full">

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

        <x-panels.panel>
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

            <x-tabs.body class="flex flex-col gap-4 mt-4 items-center">
                <x-tabs.button-group count="12">
                    @foreach (['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $month)
                        <x-tabs.button>
                            {{ $month }}
                        </x-tabs.button>
                    @endforeach
                </x-tabs.button-group>

                <x-tabs.content-group class="max-w-3xl self-center">

                    @for($i = 0; $i < 5; $i++)
                        {{--                    All--}}
                        <x-tabs.content class="flex-auto space-y-8">
                            <x-transactions.group heading="Today">
                                <x-transactions.row :href="route('transactions')" type="income" description="Salary"
                                                    date="26 March 2020, at 13:45 PM"
                                                    amount="2,500 лв." category-background="bg-rose-200"
                                                    category-image="dollar-coin"/>
                                <x-transactions.row :href="route('transactions')" type="income" description="Gift"
                                                    date="26 March 2020, at 13:45 PM"
                                                    amount="500 лв." category-background="bg-lime-200"
                                                    category-image="gift"/>
                                <x-transactions.row :href="route('transactions')" type="expense"
                                                    description="New iPhone"
                                                    date="26 March 2020, at 13:45 PM"
                                                    amount="2,500 лв." category-background="bg-rose-200"
                                                    category-image="dollar-coin"/>
                                <x-transactions.row :href="route('transactions')" type="expense" description="Rent"
                                                    date="26 March 2020, at 13:45 PM"
                                                    amount="1000 лв." category-background="bg-rose-200"
                                                    category-image="dollar-coin"/>
                            </x-transactions.group>

                            <x-transactions.group heading="Yesterday">
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
                            <x-transactions.group heading="Today">
                                <x-transactions.row :href="route('transactions')" type="expense"
                                                    description="New iPhone"
                                                    date="26 March 2020, at 13:45 PM"
                                                    amount="2,500 лв." category-background="bg-rose-200"
                                                    category-image="dollar-coin"/>
                                <x-transactions.row :href="route('transactions')" type="expense" description="Rent"
                                                    date="26 March 2020, at 13:45 PM"
                                                    amount="1000 лв." category-background="bg-rose-200"
                                                    category-image="dollar-coin"/>
                            </x-transactions.group>

                            <x-transactions.group heading="Yesterday">
                                <x-transactions.row :href="route('transactions')" type="expense" description="Rent"
                                                    date="26 March 2020, at 13:45 PM"
                                                    amount="1000 лв." category-background="bg-rose-200"
                                                    category-image="dollar-coin"/>
                            </x-transactions.group>
                        </x-tabs.content>

                        {{--                    Income--}}
                        <x-tabs.content class="flex-auto space-y-8">
                            <x-transactions.group heading="Today">
                                <x-transactions.row :href="route('transactions')" type="income" description="Salary"
                                                    date="26 March 2020, at 13:45 PM"
                                                    amount="2,500 лв." category-background="bg-rose-200"
                                                    category-image="dollar-coin"/>
                                <x-transactions.row :href="route('transactions')" type="income" description="Gift"
                                                    date="26 March 2020, at 13:45 PM"
                                                    amount="500 лв." category-background="bg-lime-200"
                                                    category-image="gift"/>
                            </x-transactions.group>

                            <x-transactions.group heading="Yesterday">
                                <x-transactions.row :href="route('transactions')" type="income" description="Salary"
                                                    date="26 March 2020, at 13:45 PM"
                                                    amount="2,500 лв." category-background="bg-rose-200"
                                                    category-image="dollar-coin"/>
                            </x-transactions.group>
                        </x-tabs.content>
                    @endfor
                </x-tabs.content-group>
            </x-tabs.body>
        </x-panels.panel>
    </div>
</x-app-layout>

