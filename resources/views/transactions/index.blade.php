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

        </x-panels.panel>
    </div>
</x-app-layout>

