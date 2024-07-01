<x-app-layout>
    <x-tabs.body class="flex flex-col gap-4">
        <x-tabs.button-group>
            <x-tabs.button>
                {{__('Expense')}}
                <x-icon class="text-red-500 mt-1">
                    arrow_drop_down
                </x-icon>
            </x-tabs.button>
            <x-tabs.button>
                {{__('Income')}}
                <x-icon class="text-emerald-500 mt-1">
                    arrow_drop_up
                </x-icon>
            </x-tabs.button>
        </x-tabs.button-group>

        <a href="{{ route('categories.create') }}" class="col-span-2">
            <x-buttons.card-button padding="p-8">
                {{__('Category')}}
            </x-buttons.card-button>
        </a>

        <x-tabs.content-group class="mb-4">

            <x-tabs.content class="flex flex-col gap-4">
                <x-forms.search>
                    @csrf
                    <x-forms.input class="w-full" style="margin-top: 0 !important"
                                   placeholder="{{__('Search your categories...')}}"
                                   name="search"
                                   hx-post="{{ route('categories.searchCategories', 'expense') }}"
                                   hx-trigger="input changed delay:300ms, search"
                                   hx-target="#expense-list"
                                   hx-include="[name='_token']"/>
                </x-forms.search>

                <div id="expense-list" class="flex flex-col gap-4">
                    @if(count($expenseCategories) > 0)
                        @foreach($expenseCategories as $category)
                            @include('categories.partials.show', ['category' => $category])
                        @endforeach
                    @else
                        <x-panels.panel padding="p-4">
                            <x-panels.heading class="text-sm text-center w-full">
                                {{__('No expense categories found.')}}
                            </x-panels.heading>
                        </x-panels.panel>
                    @endif
                </div>
            </x-tabs.content>


            <x-tabs.content class="flex flex-col gap-4">
                <x-forms.search>
                    @csrf
                    <x-forms.input class="w-full" style="margin-top: 0 !important"
                                   placeholder="{{__('Search your categories...')}}"
                                   name="search"
                                   hx-post="{{ route('categories.searchCategories', 'income') }}"
                                   hx-trigger="input changed delay:300ms, search"
                                   hx-target="#income-list"
                                   hx-include="[name='_token']"/>
                </x-forms.search>

                <div id="income-list" class="flex flex-col gap-4">
                    @if(count($incomeCategories) > 0)
                        @foreach($incomeCategories as $category)
                            @include('categories.partials.show', ['category' => $category])
                        @endforeach
                    @else
                        <x-panels.panel padding="p-4">
                            <x-panels.heading class="text-sm text-center w-full">
                                {{__('No income categories found.')}}
                            </x-panels.heading>
                        </x-panels.panel>
                    @endif
                </div>
            </x-tabs.content>

        </x-tabs.content-group>
    </x-tabs.body>
</x-app-layout>
