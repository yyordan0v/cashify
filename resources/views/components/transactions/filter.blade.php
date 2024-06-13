@props([
    'categories', 'minAmount', 'maxAmount'
])

<x-modal name="filter-transactions" maxWidth="6xl">
    <form action="{{ route('transactions.index') }}" method="GET">
        <div class="flex flex-col space-y-6 p-6">

            <div class="flex items-center justify-between">
                <x-panels.heading class="mt-2">
                    {{ __('Filters') }}
                </x-panels.heading>

                {{-- TODO: we get error when date not selected!--}}
                <x-forms.date/>
            </div>


            <x-forms.radio.group type="category">
                @if(count($categories) > 0)
                    @foreach($categories as $category)
                        <x-forms.radio.category :id="$category->id"
                                                name="categories[]"
                                                :color="$category->color_class"
                                                :categoryColor="$category->color"
                                                :image="$category->icon"
                                                :checked="in_array($category->id, request('categories', []))"
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

            <div class="flex flex-col space-y-2 w-full">
                <x-forms.label value="Transaction Type"/>
                <x-forms.radio.group>

                    <x-forms.radio.button type="checkbox" name="types[]" id="expense" value="expense"
                                          :checked="in_array('expense',  request('types', []))">
                        <div class="block">
                            <div class="w-full">Expense</div>
                        </div>
                        <x-icon class="text-red-500 mt-1">
                            arrow_drop_down
                        </x-icon>
                    </x-forms.radio.button>

                    <x-forms.radio.button type="checkbox" name="types[]" id="income" value="income"
                                          :checked="in_array('income',  request('types', []))">
                        <div class="block">
                            <div class="w-full">Income</div>
                        </div>
                        <x-icon class="text-emerald-500 mt-1">
                            arrow_drop_up
                        </x-icon>
                    </x-forms.radio.button>
                </x-forms.radio.group>
            </div>

            <div class="flex flex-col space-y-4 w-full">
                <x-forms.label value="Transaction Amount"/>

                <x-forms.range :min-amount="$minAmount" :max-amount="$maxAmount"/>
            </div>

            <div class="flex flex-col space-y-4 w-full">
                <x-forms.label for="title" value="Title Contains"/>

                <x-forms.input id="title" name="title" type="text" :value="request('title')"
                               class="w-full"/>
            </div>

            <div class="flex flex-col space-y-4 w-full">
                <x-forms.label for="details" value="Details Contain"/>

                <x-forms.input id="details" name="details" type="text" :value="request('details')"
                               class="w-full"/>
            </div>

            <x-forms.form-actions>
                <x-buttons.secondary hx-get="{{ route('transactions.index') }}" hx-target="body" hx-swap="outerHTML"
                                     hx-push-url="true">
                    Reset Filters
                </x-buttons.secondary>
                <x-buttons.form>Apply</x-buttons.form>
            </x-forms.form-actions>
        </div>
    </form>
</x-modal>
