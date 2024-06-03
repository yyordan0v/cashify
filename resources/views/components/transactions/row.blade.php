@props([
    'type' => 'expense',
    'title',
    'date',
    'amount',
    'categoryColor' => 'bg-gray-200',
    'categoryIcon' => 'shopping'
])

<a {{ $attributes->merge() }}>
    <li class="relative flex justify-between py-3 xl:px-5 rounded-xl hover:bg-gray-200 dark:hover:bg-gray-700 focus:bg-gray-200 dark:focus:bg-gray-700 transition-colors duration-75">
        <div class="flex items-center">
            {{--        <x-transactions.icon type="{{ $type }}"/>--}}
            <x-category-image color="{{ $categoryColor  }}" image="{{ $categoryIcon }}" size="small"/>


            <div class="flex flex-col">
                <x-transactions.title>{{ $title }}</x-transactions.title>
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
