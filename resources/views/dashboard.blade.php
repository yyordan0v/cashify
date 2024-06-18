@fragment('dashboard')
    <x-app-layout>
        <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-4 mb-4">

            @foreach($accounts as $account)
                <x-panels.panel padding="p-4">
                    <div class="flex items-start flex-col">

                        <div class="flex items-center justify-between w-full">
                            <x-cards.title class="text-base mt-0 mb-0">{{ $account->name }}</x-cards.title>

                            <div class="block w-4 h-4 rounded-full {{ $account->color_class }}">
                            </div>
                        </div>
                        <x-cards.title class="mt-4 mb-0">
                            {{ Number::currency($account->balance, in: 'BGN', locale: 'bg') }}
                        </x-cards.title>
                        <x-cards.text class="text-gray-950 text-sm">
                            {{  count($account->transactions) }} transactions
                        </x-cards.text>
                    </div>
                </x-panels.panel>
            @endforeach

            <a href="{{ route('accounts.create') }}">
                <x-buttons.card-button padding="p-4">Account</x-buttons.card-button>
            </a>

        </div>

        <div class="grid grid-cols-2 xl:grid-cols-3 gap-4 mb-4">
            <div
                class="col-span-2 xl:col-span-1 grid grid-cols-2 md:grid-cols-3 xl:grid-cols-2 grid-row-2 xl:grid-row-2 gap-4">
                <x-panels.panel class="col-span-2 md:col-span-1 xl:col-span-2">
                    <x-cards.icon>
                        monitoring
                    </x-cards.icon>

                    <x-cards.title>Net Worth</x-cards.title>
                    <x-divider/>
                    <x-cards.text class="text-gray-950">
                        {{ Number::currency($netWorth, in: 'BGN', locale: 'bg') }}
                    </x-cards.text>
                </x-panels.panel>

                <x-panels.panel>
                    <x-icon
                        class="button-text mx-auto flex h-12 w-12 items-center justify-center rounded-xl text-white bg-gradient-to-t from-emerald-600 to-emerald-400">
                        add_box
                    </x-icon>

                    <x-cards.title>Income</x-cards.title>
                    <x-divider/>
                    <x-cards.text class="text-gray-950">
                        {{ Number::currency($totalIncomes, in: 'BGN', locale: 'bg') }}
                    </x-cards.text>
                </x-panels.panel>

                <x-panels.panel>
                    <x-icon
                        class="button-text mx-auto flex h-12 w-12 items-center justify-center rounded-xl text-white bg-gradient-to-t from-red-600 to-red-400">
                        indeterminate_check_box
                    </x-icon>

                    <x-cards.title>Expense</x-cards.title>
                    <x-divider/>
                    <x-cards.text class="text-gray-950">
                        {{ Number::currency($totalExpenses, in: 'BGN', locale: 'bg') }}
                    </x-cards.text>
                </x-panels.panel>
            </div>

            <x-panels.panel class="col-span-2">
                <x-panels.heading>Net Worth</x-panels.heading>

                <x-forms.form-actions class="flex items-center" id="chart-buttons" :divider="false">
                    <x-buttons.action class="bg-transparent" id="one_week">
                        1W
                    </x-buttons.action>
                    <x-buttons.action class="bg-transparent" id="one_month">
                        1M
                    </x-buttons.action>
                    <x-buttons.action class="bg-transparent" id="six_months">
                        6M
                    </x-buttons.action>
                    <x-buttons.action class="bg-transparent" id="one_year">
                        1Y
                    </x-buttons.action>
                    <x-buttons.action class="bg-transparent" id="ytd">
                        YTD
                    </x-buttons.action>
                    <x-buttons.action class="bg-transparent" id="all">
                        ALL
                    </x-buttons.action>
                </x-forms.form-actions>

                <div id="balanceChart"></div>
            </x-panels.panel>
        </div>


        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4">
            <x-panels.panel>
                <x-panels.heading>Spending by Category</x-panels.heading>

                <div id="categories-chart"></div>
            </x-panels.panel>

            <x-panels.panel>
                <x-panels.heading>Latest Transactions</x-panels.heading>

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
                            @foreach ($groupedTransactions as $date => $transactions)
                                <x-transactions.group :heading="$date">
                                    @foreach($transactions as $transaction)
                                        <x-transactions.row
                                            :href="route('transactions.edit', $transaction->id)"
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

                            @unless(count($groupedTransactions) > 0)
                                <x-panels.heading class="text-sm text-center w-full">
                                    No transactions found.
                                </x-panels.heading>
                            @endunless
                        </x-tabs.content>

                        {{--                    Expense--}}
                        <x-tabs.content class="flex-auto space-y-8">
                            @foreach ($groupedExpenses as $date => $transactions)
                                <x-transactions.group :heading="$date">
                                    @foreach($transactions as $transaction)
                                        <x-transactions.row
                                            :href="route('transactions.edit', $transaction->id)"
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

                            @unless(count($groupedExpenses) > 0)
                                <x-panels.heading class="text-sm text-center w-full">
                                    No transactions found.
                                </x-panels.heading>
                            @endunless
                        </x-tabs.content>

                        {{--                    Income--}}
                        <x-tabs.content class="flex-auto space-y-8">
                            @foreach ($groupedIncomes as $date => $transactions)
                                <x-transactions.group :heading="$date">
                                    @foreach($transactions as $transaction)
                                        <x-transactions.row
                                            :href="route('transactions.edit', $transaction->id)"
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

                            @unless(count($groupedIncomes) > 0)
                                <x-panels.heading class="text-sm text-center w-full">
                                    No transactions found.
                                </x-panels.heading>
                            @endunless
                        </x-tabs.content>
                    </x-tabs.content-group>
                </x-tabs.body>
            </x-panels.panel>
        </div>
    </x-app-layout>

    <script>
        window.networthChartData = @json($networthChartData);
        window.dateRanges = @json($dateRanges);
        window.spendingChartData = @json($spendingChartData);
        window.spendingChartLabels = @json($spendingChartLabels);
    </script>
    @vite(['resources/js/networth-chart.js', 'resources/js/spending-chart.js'])
@endfragment
