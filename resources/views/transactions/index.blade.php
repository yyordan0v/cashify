<x-app-layout>
    <div class="w-full max-w-xl mx-auto">
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

                <div class="flex items-center justify-end gap-2">
                    <x-buttons.secondary x-on:click="$dispatch('close')">Cancel</x-buttons.secondary>
                    <x-buttons.form>Apply</x-buttons.form>
                </div>

            </div>
        </x-modal>

        <x-panels.panel padding="p-4">
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
                        @if(count($groupedTransactions) > 0)
                            @foreach ($groupedTransactions as $date => $transactions)
                                <x-transactions.group :heading="$date">
                                    @foreach($transactions as $transaction)
                                        <x-transactions.row :href="route('transactions.index')"
                                                            :type="$transaction->category->type"
                                                            :title="$transaction->title"
                                                            :date="$transaction->created_at"
                                                            :details="$transaction->details"
                                                            :amount="Number::currency($transaction->amount, in: 'BGN', locale: 'bg')"
                                                            :category-color="$transaction->category->color_class"
                                                            :category-icon="$transaction->category->icon"/>
                                    @endforeach
                                </x-transactions.group>
                            @endforeach
                        @else
                            <x-panels.heading class="text-sm text-center w-full">
                                No transactions found.
                            </x-panels.heading>
                        @endif
                    </x-tabs.content>

                    {{--                    Expense--}}
                    <x-tabs.content class="flex-auto space-y-8">
                        @if(count($groupedExpenses) > 0)
                            @foreach ($groupedExpenses as $date => $transactions)
                                <x-transactions.group :heading="$date">
                                    @foreach($transactions as $transaction)
                                        <x-transactions.row :href="route('transactions.index')"
                                                            :type="$transaction->category->type"
                                                            :title="$transaction->title"
                                                            :date="$transaction->created_at"
                                                            :description="$transaction->description"
                                                            :amount="Number::currency($transaction->amount, in: 'BGN', locale: 'bg')"
                                                            :category-color="$transaction->category->color_class"
                                                            :category-icon="$transaction->category->icon"/>
                                    @endforeach
                                </x-transactions.group>
                            @endforeach
                        @else
                            <x-panels.heading class="text-sm text-center w-full">
                                No transactions found.
                            </x-panels.heading>
                        @endif
                    </x-tabs.content>

                    {{--                    Income--}}
                    <x-tabs.content class="flex-auto space-y-8">
                        @if(count($groupedIncomes) > 0)
                            @foreach ($groupedIncomes as $date => $transactions)
                                <x-transactions.group :heading="$date">
                                    @foreach($transactions as $transaction)
                                        <x-transactions.row :href="route('transactions.index')"
                                                            :type="$transaction->category->type"
                                                            :title="$transaction->title"
                                                            :date="$transaction->created_at"
                                                            :description="$transaction->description"
                                                            :amount="Number::currency($transaction->amount, in: 'BGN', locale: 'bg')"
                                                            :category-color="$transaction->category->color_class"
                                                            :category-icon="$transaction->category->icon"/>
                                    @endforeach
                                </x-transactions.group>
                            @endforeach
                        @else
                            <x-panels.heading class="text-sm text-center w-full">
                                No transactions found.
                            </x-panels.heading>
                        @endif
                    </x-tabs.content>
                </x-tabs.content-group>
            </x-tabs.body>
        </x-panels.panel>
    </div>
</x-app-layout>

