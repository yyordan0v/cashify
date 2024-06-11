@props([
'expenseCategories', 'incomeCategories'
])

<x-modal name="filter-transactions" :show="$errors->userDeletion->isNotEmpty()">
    <div class="p-6">

        <x-panels.heading>
            {{ __('Filters') }}
        </x-panels.heading>

        <x-tabs.body class="flex flex-col gap-4">

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

            <x-tabs.content-group class="mt-8">
                {{--                    expense--}}
                <x-tabs.content>
                    <x-forms.radio.group type="category">
                        @if(count($expenseCategories) > 0)
                            @foreach($expenseCategories as $category)
                                <x-forms.radio.category :id="$category->id"
                                                        name="category_id"
                                                        :color="$category->color_class"
                                                        :categoryColor="$category->color"
                                                        :image="$category->icon"
                                                        :checked="old('category_id') == $category->id"
                                                        type="checkbox">
                                    {{ $category->name }}
                                </x-forms.radio.category>
                            @endforeach
                        @else
                            <x-panels.heading class="text-sm text-center w-full">
                                No expense categories found.
                            </x-panels.heading>
                        @endif
                    </x-forms.radio.group>
                </x-tabs.content>

                {{--                    income--}}
                <x-tabs.content>
                    <x-forms.radio.group type="category">
                        @if(count($incomeCategories) > 0)
                            @foreach($incomeCategories as $category)
                                <x-forms.radio.category :id="$category->id"
                                                        name="category_id"
                                                        :color="$category->color_class"
                                                        :categoryColor="$category->color"
                                                        :image="$category->icon"
                                                        :checked="old('category_id') == $category->id"
                                                        type="checkbox">
                                    {{ $category->name }}
                                </x-forms.radio.category>
                            @endforeach
                        @else
                            <x-panels.heading class="text-sm text-center w-full">
                                No income categories found.
                            </x-panels.heading>
                        @endif
                    </x-forms.radio.group>
                </x-tabs.content>
            </x-tabs.content-group>
        </x-tabs.body>

        <x-forms.date/>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div
                class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"
            ></div>
            <div
                class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"
            ></div>

            <div
                class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"
            ></div>
            <div
                class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"
            ></div>
            <div
                class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"
            ></div>
        </div>

        <div class="flex items-center justify-end gap-2">
            <x-buttons.secondary x-on:click="$dispatch('close')">Cancel</x-buttons.secondary>
            <x-buttons.form>Apply</x-buttons.form>
        </div>

    </div>
</x-modal>
