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
                <x-cards.text class="text-gray-950">$4,000</x-cards.text>
            </x-panels.panel>

            <x-panels.panel>
                <x-icon
                    class="button-text mx-auto flex h-12 w-12 items-center justify-center rounded-xl text-white bg-gradient-to-t from-red-600 to-red-400">
                    indeterminate_check_box
                </x-icon>

                <x-cards.title>Expense</x-cards.title>
                <x-divider/>
                <x-cards.text class="text-gray-950">$4,000</x-cards.text>
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

            <script>
                var options = {
                    series: [
                        {
                            name: "Net Worth",
                            data: @json($networthChartData)
                        }
                    ],
                    chart: {
                        id: 'area-datetime',
                        type: 'area',
                        height: 350,
                        zoom: {
                            autoScaleYaxis: false
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    markers: {
                        size: 0,
                        style: 'hollow',
                    },
                    xaxis: {
                        type: 'datetime',
                        tickAmount: 6,
                    },
                    tooltip: {
                        x: {
                            format: 'dd MMM yyyy'
                        }
                    },
                    colors: ['#808080'],
                    fill: {
                        type: 'gradient',
                        gradient: {
                            type: "vertical",
                            opacityFrom: 0.9,
                            opacityTo: 0,
                            stops: [0, 100]
                        }
                    },
                };

                var chart = new ApexCharts(document.querySelector("#balanceChart"), options);
                chart.render();

                function resetCssClasses(event) {
                    document.querySelector('#chart-buttons').querySelectorAll('button').forEach(button => {
                        button.classList.remove('bg-gray-200/95');
                        button.classList.remove('dark:bg-neutral-700/40');
                        button.classList.add('bg-transparent');
                    });

                    event.target.classList.remove('bg-transparent');
                    event.target.classList.add('bg-gray-200/95');
                    event.target.classList.add('dark:bg-neutral-700/40');
                }


                function parseDate(dateString) {
                    // Convert 'd M Y' to ISO format for reliable parsing
                    const parts = dateString.split(' ');
                    const day = parts[0];
                    const month = parts[1];
                    const year = parts[2];
                    const date = new Date(`${year}-${month}-${day}`);
                    if (isNaN(date.getTime())) {
                        console.error('Invalid date:', dateString);
                        return null;
                    }
                    return date.getTime();
                }

                function zoomChart(range) {
                    const startDate = parseDate(range[0]);
                    const endDate = parseDate(range[1]);
                    if (startDate && endDate) {
                        chart.zoomX(startDate, endDate);
                    } else {
                        console.error('Invalid date range:', range);
                    }
                }

                document.querySelector('#one_week').addEventListener('click', function (e) {
                    resetCssClasses(e);
                    const oneWeekRange = @json($dateRanges['one_week']);
                    zoomChart(oneWeekRange);
                });

                document.querySelector('#one_month').addEventListener('click', function (e) {
                    resetCssClasses(e);
                    const oneMonthRange = @json($dateRanges['one_month']);
                    zoomChart(oneMonthRange);
                });

                document.querySelector('#six_months').addEventListener('click', function (e) {
                    resetCssClasses(e);
                    const sixMonthsRange = @json($dateRanges['six_months']);
                    zoomChart(sixMonthsRange);
                });

                document.querySelector('#one_year').addEventListener('click', function (e) {
                    resetCssClasses(e);
                    const oneYearRange = @json($dateRanges['one_year']);
                    zoomChart(oneYearRange);
                });

                document.querySelector('#ytd').addEventListener('click', function (e) {
                    resetCssClasses(e);
                    const ytdRange = @json($dateRanges['ytd']);
                    zoomChart(ytdRange);
                });

                document.querySelector('#all').addEventListener('click', function (e) {
                    resetCssClasses(e);
                    const allRange = @json($dateRanges['all']);
                    zoomChart(allRange);
                });
            </script>

        </x-panels.panel>
    </div>


    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4">
        <x-panels.panel>
            <x-panels.heading>Spending by Category</x-panels.heading>
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
                        @if(count($groupedTransactions) > 0)
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
