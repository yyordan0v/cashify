<x-app-layout>
    <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="w-full max-w-xl mx-auto">
            <x-panels.panel padding="p-4" class="space-y-6 mb-4">
                <x-panels.heading class="mb-2">Edit Transaction</x-panels.heading>

                <x-forms.label for="categories" :value="__('Category')"/>
                <x-forms.radio.group type="category" id="categories">
                    @if(count($categories) > 0)
                        @foreach($categories as $category)
                            <x-forms.radio.category :id="$category->id"
                                                    name="category_id"
                                                    :color="$category->color_class"
                                                    :image="$category->icon"
                                                    :checked="old('category', $selectedCategory->id) == $category->id">
                                {{ $category->name }}
                            </x-forms.radio.category>
                        @endforeach
                    @else
                        <x-panels.heading class="text-sm text-center w-full">
                            No expense categories found.
                        </x-panels.heading>
                    @endif
                </x-forms.radio.group>

                <div>
                    <x-forms.label for="name" :value="__('Account')"/>

                    <x-forms.radio.group class="md:grid-cols-3">
                        @if(count($accounts) > 0)
                            @foreach($accounts as $account)
                                <x-forms.radio.button name="account_id" :id="'account-'.$account->id"
                                                      :value="$account->id"
                                                      :checked="old('account', $selectedAccount->id) == $account->id">
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
                    <x-forms.input id="title" name="title" type="text" :value="old('title', $transaction->title)"
                                   class="w-full"/>
                    <x-forms.error :messages="$errors->get('title')"/>
                </div>

                <div>
                    <x-forms.label for="amount" :value="__('Amount')"/>
                    <x-forms.input id="amount" name="amount" type="text"
                                   :value="old('amount', abs($transaction->amount))"
                                   class="w-full"/>
                    <x-forms.error :messages="$errors->get('amount')"/>
                </div>

                <div>
                    <x-forms.label for="details" :value="__('Details')"/>
                    <x-forms.textarea id="details"
                                      name="details">{{ old('details', $transaction->details) }}</x-forms.textarea>
                    <x-forms.error :messages="$errors->get('details')"/>

                </div>

                <x-divider/>

                <div
                    class="flex flex-col md:flex-row items-center justify-end lg:justify-center w-full gap-2 text-gray-600 dark:text-gray-400 text-sm">
                    <a href="{{ route('transactions.index') }}">
                        <x-buttons.secondary>Cancel</x-buttons.secondary>
                    </a>
                    <x-buttons.form>Save</x-buttons.form>
                </div>

            </x-panels.panel>
        </div>
    </form>
</x-app-layout>

