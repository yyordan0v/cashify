@props([
    'type' => 'expense',
    'description',
    'date',
    'amount',
    'categoryBackground' => 'bg-gray-200',
    'categoryImage' => 'shopping'
])

<a {{ $attributes->merge() }}>
    <li class="relative flex justify-between py-3 px-5 rounded-xl hover:bg-gray-200 dark:hover:bg-gray-700 focus:bg-gray-200 dark:focus:bg-gray-700 transition-colors duration-75">
        <div class="flex items-center">
            {{--        <x-transactions.icon type="{{ $type }}"/>--}}
            <x-category-image background="{{ $categoryBackground  }}" image="{{ $categoryImage }}" size="small"/>


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
</a>
