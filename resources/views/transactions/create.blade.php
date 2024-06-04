<x-app-layout>
    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf

        <div class="w-full max-w-xl mx-auto">
            <x-panels.panel padding="p-4" class="space-y-6 mb-4">
                <x-panels.heading class="mb-2">Add Transaction</x-panels.heading>

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
                                                                :image="$category->icon"
                                                                :checked="old('category') == $category->id">
                                            {{ $category->name }}
                                        </x-forms.radio.category>
                                    @endforeach
                                @else
                                    <x-panels.heading class="text-sm text-center w-full">
                                        No expense categories found.
                                    </x-panels.heading>
                                @endif
                            </x-forms.radio.group>

                            <x-forms.error :messages="$errors->get('category_id')"/>
                        </x-tabs.content>

                        {{--                    income--}}
                        <x-tabs.content>
                            <x-forms.radio.group type="category">
                                @if(count($incomeCategories) > 0)
                                    @foreach($incomeCategories as $category)
                                        <x-forms.radio.category :id="$category->id"
                                                                name="category_id"
                                                                :color="$category->color_class"
                                                                :image="$category->icon"
                                                                :checked="old('category') == $category->id">
                                            {{ $category->name }}
                                        </x-forms.radio.category>
                                    @endforeach
                                @else
                                    <x-panels.heading class="text-sm text-center w-full">
                                        No income categories found.
                                    </x-panels.heading>
                                @endif
                            </x-forms.radio.group>

                            <x-forms.error :messages="$errors->get('category_id')"/>
                        </x-tabs.content>
                    </x-tabs.content-group>
                </x-tabs.body>


                <div>
                    <x-forms.label for="name" :value="__('Account')"/>

                    <x-forms.radio.group class="md:grid-cols-3">
                        @if(count($accounts) > 0)
                            @foreach($accounts as $account)
                                <x-forms.radio.button name="account_id" :id="'account-'.$account->id"
                                                      :value="$account->id"
                                                      :checked="old('account') == $account->id">
                                    <div class="block">
                                        <div class="w-full">{{ $account->name }}</div>
                                    </div>
                                </x-forms.radio.button>
                            @endforeach
                        @else
                            <div class="hidden md:block"></div>
                            <x-panels.heading class="text-sm text-center w-full">
                                No accounts found.
                            </x-panels.heading>
                        @endif
                    </x-forms.radio.group>

                    <x-forms.error :messages="$errors->get('account_id')"/>
                </div>

                <div>
                    <x-forms.label for="title" :value="__('Title')"/>
                    <x-forms.input id="title" name="title" type="text" :value="old('title')"
                                   class="w-full"/>
                    <x-forms.error :messages="$errors->get('title')"/>
                </div>

                <div>
                    <x-forms.label for="amount" :value="__('Amount')"/>
                    <x-forms.input id="amount" name="amount" type="text" :value="old('amount')"
                                   class="w-full"/>
                    <x-forms.error :messages="$errors->get('amount')"/>
                </div>

                <div>
                    <x-forms.label for="details" :value="__('Details')"/>
                    <x-forms.textarea id="details" name="details" :value="old('details')"/>
                    <x-forms.error :messages="$errors->get('details')"/>

                </div>

                <x-divider/>

                <div
                    class="flex flex-col md:flex-row items-center justify-end lg:justify-center w-full gap-2 text-gray-600 dark:text-gray-400 text-sm">
                    <a href="{{ route('transactions.index') }}">
                        <x-buttons.secondary>Cancel</x-buttons.secondary>
                    </a>
                    <x-buttons.form>Add Transaction</x-buttons.form>
                </div>

            </x-panels.panel>
        </div>
    </form>
</x-app-layout>

