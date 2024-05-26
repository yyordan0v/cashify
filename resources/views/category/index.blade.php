<x-app-layout>
    <x-tabs.body class="flex flex-col gap-4">

        <a href="{{ route('categories.create') }}">
            <x-buttons.card-button>
                Category
            </x-buttons.card-button>
        </a>

        <x-tabs.button-group>
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

        <x-tabs.content-group class="mb-4">

            <x-tabs.content class="flex flex-col gap-4">
                @if(count($expenseCategories) > 0)
                    @foreach($expenseCategories as $expenseCategory)
                        <x-single.category :category="$expenseCategory"/>
                    @endforeach

                @else
                    <x-panels.panel padding="4">
                        <x-panels.heading class="text-center w-full">No expense categories found.</x-panels.heading>
                    </x-panels.panel>
                @endif
            </x-tabs.content>

            <x-tabs.content class="flex flex-col gap-4">
                @if(count($incomeCategories) > 0)
                    @foreach($incomeCategories as $incomeCategory)
                        <x-single.category :category="$incomeCategory"/>
                    @endforeach
                @else
                    <p class="text-center w-full">No expense categories found.</p>
                @endif
            </x-tabs.content>

        </x-tabs.content-group>
    </x-tabs.body>
</x-app-layout>
