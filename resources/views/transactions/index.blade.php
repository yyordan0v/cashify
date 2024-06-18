<x-app-layout>
    <div class="w-full max-w-xl mx-auto">

        <x-transactions.filter :categories="$categories" :min-amount="$minAmount" :max-amount="$maxAmount"/>

        <x-panels.panel padding="p-4">
            <div class="flex flex-wrap items-center justify-between mb-8">
                <x-panels.heading>Transactions</x-panels.heading>
                <div
                    class="flex items-center text-gray-500 dark:text-gray-400">

                    <x-buttons.icon x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'filter-transactions')">
                        filter_alt
                    </x-buttons.icon>

                </div>
            </div>

            <div id="transactions">
                @foreach ($transactions as $date => $groupedTransaction)
                    <x-transactions.group :heading="$date">
                        @foreach($groupedTransaction as $transaction)
                            @include('transactions.partials.show', ['transaction' => $transaction])
                        @endforeach

                        @if ($loop->last)
                            <div
                                @if ($transactions->hasMorePages())
                                    hx-get="{{ $transactions->nextPageUrl() }}"
                                @endif
                                hx-target="#transactions"
                                hx-swap="beforeend"
                                hx-indicator="#spinner"
                                hx-trigger="revealed"
                                hx-select=".transactions-group">
                        @endif
                    </x-transactions.group>
                @endforeach
            </div>

            <x-spinner/>

            @unless($transactions->count() > 0)
                <x-panels.heading class="text-sm text-center w-full">
                    No transactions found.
                </x-panels.heading>
            @endunless

        </x-panels.panel>
    </div>
</x-app-layout>

