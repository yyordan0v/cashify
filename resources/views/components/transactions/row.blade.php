@php use Carbon\Carbon; @endphp
@props([
    'type' => 'expense',
    'title',
    'date',
    'amount',
    'categoryColor' => 'bg-gray-200',
    'categoryIcon' => 'shopping',
    'details' => false
])

<a {{ $attributes->merge() }}>
    <li class="relative flex items-center justify-between py-3 xl:px-5 rounded-xl hover:bg-gray-200 dark:hover:bg-gray-700 focus:bg-gray-200 dark:focus:bg-gray-700 transition-colors duration-75">
        <div class="flex items-center space-x-4 flex-grow min-w-0">
            <x-category-image margin="mr-0" color="{{ $categoryColor }}" image="{{ $categoryIcon }}"
                              size="small"/>
            <div class="flex flex-col flex-grow min-w-0">
                <x-transactions.title :title="$title" class="truncate"></x-transactions.title>
                <x-transactions.date
                    class="truncate">{{ Carbon::parse($date)->format('d F Y, \a\t h:i A') }}</x-transactions.date>
            </div>
        </div>
        <div class="flex items-center gap-2 flex-shrink-0">
            @if($details)
                <x-tooltip text="{{ $details }}" position="bottom" ref="content">
                    <x-icon class="text-lg text-gray-500" x-ref="content">
                        description
                    </x-icon>
                </x-tooltip>
            @endif
            <x-transactions.amount type="{{ $type }}">
                {{ $amount }}
            </x-transactions.amount>
        </div>
    </li>
</a>
