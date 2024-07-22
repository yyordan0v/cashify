<x-app-layout>
    <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-4 mb-4">

        @foreach($accounts as $account)
            <x-panels.panel padding="p-4">
                <div class="flex items-start justify-between flex-col space-y-4 h-full">
                    <div class="flex items-center justify-between w-full">
                        <x-cards.title class="text-base mt-0 mb-0"
                                       style="text-align: left">{{ $account->name }}</x-cards.title>

                        <div class="block w-4 h-4 rounded-full min-w-4 min-h-4 {{ $account->color_class }}">
                        </div>
                    </div>
                    <div class="flex flex-col items-start">
                        <x-cards.title class="mt-0 mb-0">
                            {{ Number::currency($account->balance, in: 'BGN', locale: 'bg') }}
                        </x-cards.title>
                        <x-cards.text class="text-gray-950 text-sm">
                            {{  count($account->transactions) }} {{ __('transactions') }}
                        </x-cards.text>
                    </div>
                </div>
            </x-panels.panel>
        @endforeach

        <a href="{{ route('accounts.create') }}">
            <x-buttons.card-button padding="p-4">{{  __('Account') }}</x-buttons.card-button>
        </a>

    </div>

    <div class="grid grid-cols-2 xl:grid-cols-3 gap-4 mb-4">
        <div
            class="col-span-2 xl:col-span-1 grid grid-cols-2 md:grid-cols-3 xl:grid-cols-2 grid-row-2 xl:grid-row-2 gap-4">
            <x-panels.panel class="col-span-2 md:col-span-1 xl:col-span-2">
                <x-cards.icon>
                    monitoring
                </x-cards.icon>

                <x-cards.title>{{__('Net Worth')}}</x-cards.title>
                <x-divider/>
                <x-cards.text class="text-gray-950">
                    {{ Number::currency($netWorth, in: 'BGN', locale: 'bg') }}
                </x-cards.text>
            </x-panels.panel>

            <x-panels.panel>
                <x-icon
                    class="button-text mx-auto flex h-12 w-12 items-center justify-center rounded-xl text-white bg-gradient-to-t from-emerald-600 to-emerald-400">
                    trending_up
                </x-icon>

                <x-cards.title>{{__('Income')}}</x-cards.title>
                <x-divider/>
                <x-cards.text class="text-gray-950">
                    {{ Number::currency($totalIncomes, in: 'BGN', locale: 'bg') }}
                </x-cards.text>
            </x-panels.panel>

            <x-panels.panel>
                <x-icon
                    class="button-text mx-auto flex h-12 w-12 items-center justify-center rounded-xl text-white bg-gradient-to-t from-red-600 to-red-400">
                    trending_down
                </x-icon>

                <x-cards.title>{{__('Expense')}}</x-cards.title>
                <x-divider/>
                <x-cards.text class="text-gray-950">
                    {{ Number::currency($totalExpenses, in: 'BGN', locale: 'bg') }}
                </x-cards.text>
            </x-panels.panel>
        </div>

        <x-panels.panel class="col-span-2">
            <x-panels.heading>{{__('Net Worth')}}</x-panels.heading>

            <x-forms.form-actions
                style="flex-direction: row !important; gap: 0; @media (min-width: 640px) { gap: .5rem }"
                class="text-xs sm:text-sm"
                id="chart-buttons" :divider="false">
                <x-buttons.action class="bg-transparent" id="one_week">
                    {{__('1W')}}
                </x-buttons.action>
                <x-buttons.action class="bg-transparent" id="one_month">
                    {{__('1M')}}
                </x-buttons.action>
                <x-buttons.action class="bg-transparent" id="six_months">
                    {{__('6M')}}
                </x-buttons.action>
                <x-buttons.action class="bg-transparent" id="one_year">
                    {{__('1Y')}}
                </x-buttons.action>
                <x-buttons.action class="bg-transparent" id="ytd">
                    {{__('YTD')}}
                </x-buttons.action>
                <x-buttons.action class="bg-transparent" id="all">
                    {{__('ALL')}}
                </x-buttons.action>
            </x-forms.form-actions>

            <div id="balanceChart"></div>
        </x-panels.panel>
    </div>


    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4">
        <x-panels.panel>
            <x-panels.heading>{{__('Spending by Category')}}</x-panels.heading>

            <div id="spendingChart"></div>
        </x-panels.panel>

        <x-panels.panel padding="p-4" class="md:p-8">
            <x-panels.heading>{{__('Latest Transactions')}}</x-panels.heading>

            <x-tabs.body class="flex flex-col gap-4 mt-4">
                <x-tabs.button-group count="3">
                    <x-tabs.button>
                        {{__('All')}}
                    </x-tabs.button>
                    <x-tabs.button>
                        {{__('Expense')}}
                        <x-icon class="text-red-500 mt-1">
                            arrow_drop_down
                        </x-icon>
                    </x-tabs.button>
                    <x-tabs.button>
                        {{__('Income')}}
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
                                {{__('No transactions found.')}}
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
                                        :details="$transaction->details"
                                        :amount="Number::currency($transaction->amount, in: 'BGN', locale: 'bg')"
                                        :category-color="$transaction->category->color_class"
                                        :category-icon="$transaction->category->icon"/>
                                @endforeach
                            </x-transactions.group>
                        @endforeach

                        @unless(count($groupedExpenses) > 0)
                            <x-panels.heading class="text-sm text-center w-full">
                                {{__('No transactions found.')}}
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
                                        :details="$transaction->details"
                                        :amount="Number::currency($transaction->amount, in: 'BGN', locale: 'bg')"
                                        :category-color="$transaction->category->color_class"
                                        :category-icon="$transaction->category->icon"/>
                                @endforeach
                            </x-transactions.group>
                        @endforeach

                        @unless(count($groupedIncomes) > 0)
                            <x-panels.heading class="text-sm text-center w-full">
                                {{__('No transactions found.')}}
                            </x-panels.heading>
                        @endunless
                    </x-tabs.content>
                </x-tabs.content-group>
            </x-tabs.body>
        </x-panels.panel>

        @push('dashboard-charts')
            <script>
                (function () {
                    function initGlobalVariables() {
                        if (typeof window.networthChartData === 'undefined') {
                            window.networthChartData = @json($networthChartData);
                        }

                        if (typeof window.dateRanges === 'undefined') {
                            window.dateRanges = @json($dateRanges);
                        }

                        if (typeof window.spendingChartData === 'undefined') {
                            window.spendingChartData = @json($spendingChartData);
                        }

                        if (typeof window.spendingChartLabels === 'undefined') {
                            window.spendingChartLabels = @json($spendingChartLabels);
                        }

                        if (typeof window.networthChartOptions === 'undefined') {
                            window.networthChartOptions = {
                                series: [
                                    {
                                        name: "{{__('Net Worth')}}",
                                        data: window.networthChartData
                                    }
                                ],
                                chart: {
                                    id: 'area-datetime',
                                    type: 'area',
                                    height: 350,
                                    toolbar: {
                                        show: true,
                                        offsetX: 0,
                                        offsetY: 0,
                                    },
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
                                    labels: {
                                        style: {
                                            colors: '#808080'
                                        }
                                    },
                                },
                                yaxis: {
                                    labels: {
                                        style: {
                                            colors: '#808080'
                                        }
                                    },
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
                        }

                        if (typeof window.spendingChartOptions === 'undefined') {
                            window.spendingChartOptions = {
                                series: [{
                                    name: "{{__('Funds spent')}}",
                                    data: spendingChartData
                                }],
                                chart: {
                                    height: 500,
                                    type: 'bar',
                                    toolbar: {
                                        tools: {
                                            download: false,
                                            reset: false,
                                        }
                                    },
                                },
                                plotOptions: {
                                    bar: {
                                        borderRadius: 5,
                                        columnWidth: '50%',
                                        distributed: true,
                                    }
                                },
                                dataLabels: {
                                    enabled: false
                                },
                                stroke: {
                                    width: 0
                                },
                                xaxis: {
                                    labels: {
                                        rotate: -45,
                                        style: {
                                            colors: '#808080'
                                        }
                                    },
                                    categories: spendingChartLabels,
                                    tickPlacement: 'on'
                                },
                                yaxis: {
                                    labels: {
                                        style: {
                                            colors: '#808080'
                                        }
                                    },
                                },
                                legend: {
                                    show: false
                                },
                                theme: {
                                    mode: 'light',
                                    palette: 'palette1',
                                    monochrome: {
                                        enabled: false,
                                        color: '#6bd1ad',
                                        shadeTo: 'dark',
                                        shadeIntensity: 0.1
                                    },
                                },
                                fill: {
                                    type: 'gradient',
                                    gradient: {
                                        shade: 'light',
                                        type: "horizontal",
                                        shadeIntensity: 0.25,
                                        inverseColors: true,
                                        opacityFrom: .85,
                                        opacityTo: 0.8,
                                        stops: [50, 0, 100],
                                    },
                                }
                            };

                        }
                    }

                    function resetCssClasses(event) {
                        document.querySelectorAll('#chart-buttons button').forEach(button => {
                            button.classList.remove('bg-gray-200/95', 'dark:bg-neutral-700/40', 'bg-transparent');
                            button.classList.add('bg-transparent');
                        });

                        event.target.classList.remove('bg-transparent');
                        event.target.classList.add('bg-gray-200/95', 'dark:bg-neutral-700/40');
                    }

                    function parseDate(dateString) {
                        const [day, month, year] = dateString.split(' ');
                        const date = new Date(`${year}-${month}-${day}`);
                        return isNaN(date.getTime()) ? null : date.getTime();
                    }

                    function zoomChart(range) {
                        const startDate = parseDate(range[0]);
                        const endDate = parseDate(range[1]);
                        if (startDate && endDate) {
                            window.networthChart.zoomX(startDate, endDate);
                        } else {
                            console.error('Invalid date range:', range);
                        }
                    }

                    function handleButtonClick(e) {
                        resetCssClasses(e);
                        const range = window.dateRanges[e.target.id];
                        zoomChart(range);
                    }

                    function initializeNetworthChart() {
                        window.networthChart = new ApexCharts(document.querySelector("#balanceChart"), window.networthChartOptions);
                        window.networthChart.render();

                        document.querySelectorAll('#chart-buttons .bg-transparent').forEach(button => {
                            button.removeEventListener('click', handleButtonClick);
                            button.addEventListener('click', handleButtonClick);
                        });
                    }

                    function initializeSpendingChart() {
                        window.spendingChart = new ApexCharts(document.querySelector("#spendingChart"), window.spendingChartOptions);
                        window.spendingChart.render();
                    }

                    function mainInitialization() {
                        if (window.location.pathname === '/dashboard') {
                            initializeNetworthChart();
                            initializeSpendingChart();
                        }
                    }

                    if (!window.dashboardListenersAdded) {
                        document.addEventListener('DOMContentLoaded', mainInitialization);
                        document.body.addEventListener("htmx:afterSettle", mainInitialization);
                        window.dashboardListenersAdded = true;
                    }

                    initGlobalVariables();
                })();
            </script>
        @endpush
    </div>
</x-app-layout>
