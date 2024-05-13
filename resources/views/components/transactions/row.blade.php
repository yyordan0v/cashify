@props([
    'type' => 'expense',
    'description',
    'date',
    'amount',
])

<li class="relative flex justify-between py-3">
    <div class="flex items-center">
        <x-transactions.icon type="{{ $type }}"/>

        <div class="flex flex-col">
            <x-transactions.description>{{ $description }}</x-transactions.description>
            <x-transactions.date>{{ $date }}</x-transactions.date>
        </div>
    </div>
    <div class="flex flex-col items-center justify-center">
        <x-transactions.amount type="{{ $type }}">
            {{ $amount }}
        </x-transactions.amount>
    </div>
</li>
