<x-app-layout>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4 mb-4">
        <x-panels.panel class="col-span-1 md:col-span-1">
            <x-cards.icon>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd"
                          d="M12 2.25a.75.75 0 0 1 .75.75v.756a49.106 49.106 0 0 1 9.152 1 .75.75 0 0 1-.152 1.485h-1.918l2.474 10.124a.75.75 0 0 1-.375.84A6.723 6.723 0 0 1 18.75 18a6.723 6.723 0 0 1-3.181-.795.75.75 0 0 1-.375-.84l2.474-10.124H12.75v13.28c1.293.076 2.534.343 3.697.776a.75.75 0 0 1-.262 1.453h-8.37a.75.75 0 0 1-.262-1.453c1.162-.433 2.404-.7 3.697-.775V6.24H6.332l2.474 10.124a.75.75 0 0 1-.375.84A6.723 6.723 0 0 1 5.25 18a6.723 6.723 0 0 1-3.181-.795.75.75 0 0 1-.375-.84L4.168 6.241H2.25a.75.75 0 0 1-.152-1.485 49.105 49.105 0 0 1 9.152-1V3a.75.75 0 0 1 .75-.75Zm4.878 13.543 1.872-7.662 1.872 7.662h-3.744Zm-9.756 0L5.25 8.131l-1.872 7.662h3.744Z"
                          clip-rule="evenodd"/>
                </svg>
            </x-cards.icon>

            <x-cards.title>Balance</x-cards.title>
            <x-divider class="my-6"/>
            <x-cards.text class="text-gray-950">$4,000</x-cards.text>
        </x-panels.panel>

        {{--        <x-panels.panel>--}}
        {{--            <x-cards.icon>--}}
        {{--                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">--}}
        {{--                    <path--}}
        {{--                        d="M2.273 5.625A4.483 4.483 0 0 1 5.25 4.5h13.5c1.141 0 2.183.425 2.977 1.125A3 3 0 0 0 18.75 3H5.25a3 3 0 0 0-2.977 2.625ZM2.273 8.625A4.483 4.483 0 0 1 5.25 7.5h13.5c1.141 0 2.183.425 2.977 1.125A3 3 0 0 0 18.75 6H5.25a3 3 0 0 0-2.977 2.625ZM5.25 9a3 3 0 0 0-3 3v6a3 3 0 0 0 3 3h13.5a3 3 0 0 0 3-3v-6a3 3 0 0 0-3-3H15a.75.75 0 0 0-.75.75 2.25 2.25 0 0 1-4.5 0A.75.75 0 0 0 9 9H5.25Z"/>--}}
        {{--                </svg>--}}
        {{--            </x-cards.icon>--}}

        {{--            <x-cards.title>Bank Account</x-cards.title>--}}
        {{--            <x-divider class="my-6"/>--}}
        {{--            <x-cards.text>$4,000</x-cards.text>--}}
        {{--        </x-panels.panel>--}}

        <x-panels.panel class="md:col-span-3">
            <x-panels.heading>Balance</x-panels.heading>
            {!! $chart->container() !!}
        </x-panels.panel>
        <x-panels.panel class="md:col-span-2">
            <x-panels.heading>Spending by Category</x-panels.heading>
            {!! $categoryChart->container() !!}
        </x-panels.panel>
    </div>


    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4">
        <x-panels.panel/>
        <x-panels.panel>
            <div class="flex flex-wrap items-center justify-between mb-8">
                <x-panels.heading>Latest Transactions</x-panels.heading>
                <div
                    class="flex items-center text-gray-500 dark:text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                         class="w-5 h-5 mr-2 mb-1 text-gray-700 dark:text-gray-200">
                        <path
                            d="M12.75 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM7.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM8.25 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM9.75 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM10.5 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM12.75 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM14.25 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 13.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"/>
                        <path fill-rule="evenodd"
                              d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z"
                              clip-rule="evenodd"/>
                    </svg>

                    <small>23 - 30 March 2020</small>
                </div>
            </div>

            <div class="flex-auto space-y-8">
                <x-transactions.group heading="Today">
                    <x-transactions.row type="income" description="Salary" date="26 March 2020, at 13:45 PM"
                                        amount="$ 2,500"/>
                    <x-transactions.row type="income" description="Gift" date="26 March 2020, at 13:45 PM"
                                        amount="$ 500"/>
                    <x-transactions.row type="expense" description="New iPhone" date="26 March 2020, at 13:45 PM"
                                        amount="$ 2,500"/>
                    <x-transactions.row type="expense" description="Rent" date="26 March 2020, at 13:45 PM"
                                        amount="$ 1000"/>
                </x-transactions.group>

                <x-transactions.group heading="Yesterday">
                    <x-transactions.row type="income" description="Salary" date="26 March 2020, at 13:45 PM"
                                        amount="$ 2,500"/>
                    <x-transactions.row type="income" description="Gift" date="26 March 2020, at 13:45 PM"
                                        amount="$ 500"/>
                    <x-transactions.row type="expense" description="New iPhone" date="26 March 2020, at 13:45 PM"
                                        amount="$ 2,500"/>
                    <x-transactions.row type="expense" description="Rent" date="26 March 2020, at 13:45 PM"
                                        amount="$ 1000"/>
                </x-transactions.group>
            </div>
        </x-panels.panel>
    </div>

    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}
    {{ $categoryChart->script() }}
</x-app-layout>
