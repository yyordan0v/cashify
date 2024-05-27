<x-app-layout>
    <x-tabs.body class="flex flex-col gap-4">

        <x-buttons.card-button
            hx-get="{{ route('categories.create') }}"
            hx-target="body"
            hx-push-url="true">
            Category
        </x-buttons.card-button>


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

            <x-tabs.content class="flex flex-col gap-4" id="category-list">

                <x-forms.search>
                    <form>
                        @csrf
                        <x-forms.input class="w-full" style="margin-top: 0 !important"
                                       placeholder="Search your categories..."
                                       name="search" autofocus
                                       hx-post="{{ route('categories.searchCategories', 'expense') }}"
                                       hx-trigger="input changed delay:300ms, search"
                                       hx-target="#expense-list"/>
                    </form>
                </x-forms.search>


                @if(count($expenseCategories) > 0)
                    <div id="expense-list" class="flex flex-col gap-4">
                        @foreach($expenseCategories as $expenseCategory)
                            @include('categories.partials.show', ['category' => $expenseCategory])
                        @endforeach
                    </div>
                @else
                    <x-panels.panel padding="4">
                        <x-panels.heading class="text-center w-full">No expense categories found.</x-panels.heading>
                    </x-panels.panel>
                @endif
            </x-tabs.content>

            <x-tabs.content class="flex flex-col gap-4">

                <x-forms.search>
                    <form>
                        @csrf
                        <x-forms.input class="w-full" style="margin-top: 0 !important"
                                       placeholder="Search your categories..."
                                       name="search" autofocus
                                       hx-post="{{ route('categories.searchCategories', 'income') }}"
                                       hx-trigger="input changed delay:300ms, search"
                                       hx-target="#income-list"/>
                    </form>
                </x-forms.search>

                @if(count($incomeCategories) > 0)
                    <div id="income-list" class="flex flex-col gap-4">
                        @foreach($incomeCategories as $incomeCategory)
                            @include('categories.partials.show', ['category' => $incomeCategory])
                        @endforeach
                    </div>
                @else
                    <p class="text-center w-full">No expense categories found.</p>
                @endif
            </x-tabs.content>

        </x-tabs.content-group>
    </x-tabs.body>
</x-app-layout>
