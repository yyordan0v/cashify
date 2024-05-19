<x-app-layout>
    <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-4 mb-4">

        <x-panels.panel>
            <x-cards.icon>
                wallet
            </x-cards.icon>

            <x-cards.title>Bank</x-cards.title>
            <x-divider class="my-6"/>
            <x-cards.text class="text-gray-950">$420</x-cards.text>
        </x-panels.panel>

        <x-panels.panel>
            <x-cards.icon>
                wallet
            </x-cards.icon>

            <x-cards.title>Bank</x-cards.title>
            <x-divider class="my-6"/>
            <x-cards.text class="text-gray-950">$420</x-cards.text>
        </x-panels.panel>

        <x-panels.panel>
            <x-cards.icon>
                wallet
            </x-cards.icon>

            <x-cards.title>Bank</x-cards.title>
            <x-divider class="my-6"/>
            <x-cards.text class="text-gray-950">$420</x-cards.text>
        </x-panels.panel>

        <a href="{{ route('accounts') }}">
            <x-buttons.card-button>
                Accounts
            </x-buttons.card-button>
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
                <x-divider class="my-6"/>
                <x-cards.text class="text-gray-950">$4,000</x-cards.text>
            </x-panels.panel>

            <x-panels.panel>
                <x-icon
                    class="button-text mx-auto flex h-12 w-12 items-center justify-center rounded-xl text-white bg-gradient-to-tl from-emerald-600 to-emerald-400">
                    add_box
                </x-icon>

                <x-cards.title>Income</x-cards.title>
                <x-divider class="my-6"/>
                <x-cards.text class="text-gray-950">$4,000</x-cards.text>
            </x-panels.panel>

            <x-panels.panel>
                <x-icon
                    class="button-text mx-auto flex h-12 w-12 items-center justify-center rounded-xl text-white bg-gradient-to-t from-red-600 to-red-400">
                    indeterminate_check_box
                </x-icon>

                <x-cards.title>Expense</x-cards.title>
                <x-divider class="my-6"/>
                <x-cards.text class="text-gray-950">$4,000</x-cards.text>
            </x-panels.panel>
        </div>

        <x-panels.panel class="col-span-2">
            <x-panels.heading>Net Worth</x-panels.heading>
            {!! $incomeChart->container() !!}
        </x-panels.panel>
    </div>


    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4">
        <x-panels.panel>
            <x-panels.heading>Spending by Category</x-panels.heading>
            {!! $categoryChart->container() !!}
        </x-panels.panel>

        <x-panels.panel>
            <div class="flex flex-wrap items-center justify-between mb-8">
                <x-panels.heading>Latest Transactions</x-panels.heading>
                <div
                    class="flex items-center text-gray-500 dark:text-gray-400">
                    <x-icon class="mr-2 text-gray-600 dark:text-gray-300">
                        calendar_month
                    </x-icon>

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
                    <x-transactions.row type="expense" description="Rent" date="26 March 2020, at 13:45 PM"
                                        amount="$ 1000"/>
                </x-transactions.group>
            </div>
        </x-panels.panel>
    </div>

    <script src="{{ $incomeChart->cdn() }}"></script>
    {{ $categoryChart->script() }}
    {{ $incomeChart->script() }}
</x-app-layout>
