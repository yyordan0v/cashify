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
        </x-tabs.content-group>
    </x-tabs.body>
</x-app-layout>
