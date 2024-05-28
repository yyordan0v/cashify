<x-app-layout>
    <x-tabs.body class="flex flex-col gap-4" type="htmx">
        <x-tabs.button-group>
            <x-tabs.button hx-get="{{ route('categories.loadTab', 'expense') }}" hx-target="#tab-content"
                           hx-swap="innerHTML">
                Expense
                <x-icon class="text-red-500 mt-1">
                    arrow_drop_down
                </x-icon>
            </x-tabs.button>
            <x-tabs.button hx-get="{{ route('categories.loadTab', 'income') }}" hx-target="#tab-content"
                           hx-swap="innerHTML">
                Income
                <x-icon class="text-emerald-500 mt-1">
                    arrow_drop_up
                </x-icon>
            </x-tabs.button>
        </x-tabs.button-group>

        <x-tabs.content-group id="tab-content" class="mb-4" hx-get="{{ route('categories.loadTab', 'expense') }}"
                              hx-target="#tab-content"
                              hx-swap="innerHTML" hx-trigger="load">

            @if(isset($type) && $type == 'expense')
                @fragment('expense')
                    <x-tabs.content class="flex flex-col gap-4" type="htmx">
                        <x-forms.search>
                            <form>
                                @csrf
                                <x-forms.input class="w-full" style="margin-top: 0 !important"
                                               placeholder="Search your categories..."
                                               name="search" autofocus
                                               hx-post="{{ route('categories.searchCategories', 'expense') }}"
                                               hx-trigger="input changed delay:300ms, search"
                                               hx-target="#list"/>
                            </form>
                        </x-forms.search>

                        <div id="list" class="flex flex-col gap-4">
                            @if(count($expenseCategories) > 0)
                                @foreach($expenseCategories as $category)
                                    @include('categories.partials.show', ['category' => $category])
                                @endforeach
                            @else
                                <x-panels.panel padding="4">
                                    <x-panels.heading class="text-sm text-center w-full">
                                        No expense categories found.
                                    </x-panels.heading>
                                </x-panels.panel>
                            @endif
                        </div>
                    </x-tabs.content>

                @endfragment
            @endif

            @if(isset($type) && $type == 'income')
                @fragment('income')
                    <x-tabs.content class="flex flex-col gap-4" type="htmx">
                        <x-forms.search>
                            <form>
                                @csrf
                                <x-forms.input class="w-full" style="margin-top: 0 !important"
                                               placeholder="Search your categories..."
                                               name="search" autofocus
                                               hx-post="{{ route('categories.searchCategories', 'income') }}"
                                               hx-trigger="input changed delay:300ms, search"
                                               hx-target="#list"/>
                            </form>
                        </x-forms.search>

                        <div id="list" class="flex flex-col gap-4">
                            @if(count($incomeCategories) > 0)
                                @foreach($incomeCategories as $category)
                                    @include('categories.partials.show', ['category' => $category])
                                @endforeach
                            @else
                                <x-panels.panel padding="4">
                                    <x-panels.heading class="text-sm text-center w-full">
                                        No income categories found.
                                    </x-panels.heading>
                                </x-panels.panel>
                            @endif
                        </div>
                    </x-tabs.content>
                @endfragment
            @endif
        </x-tabs.content-group>
    </x-tabs.body>
</x-app-layout>
