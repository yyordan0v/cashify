<x-app-layout>
    <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="w-full max-w-xl mx-auto">
            <x-panels.panel padding="p-4" class="space-y-6 mb-4">
                <x-panels.heading class="mb-2">{{__('Edit Transaction')}}</x-panels.heading>

                <x-forms.label for="categories" :value="__('Category')"/>
                <x-forms.radio.group type="category" id="categories">
                    @if(count($categories) > 0)
                        @foreach($categories as $category)
                            <x-forms.radio.category :id="$category->id"
                                                    name="category_id"
                                                    :color="$category->color_class"
                                                    :categoryColor="$category->color"
                                                    :image="$category->icon"
                                                    :checked="old('category', $selectedCategory->id) == $category->id">
                                {{ $category->name }}
                            </x-forms.radio.category>
                        @endforeach
                    @else
                        <x-panels.heading class="text-sm text-center w-full">
                            {{__('No categories found.')}}
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
                                {{__('No accounts found.')}}
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
                    <x-forms.label for="details" :value="__('Details (optional)')"/>
                    <x-forms.textarea id="details"
                                      name="details">{{ old('details', $transaction->details) }}</x-forms.textarea>
                    <x-forms.error :messages="$errors->get('details')"/>

                </div>

                <x-divider/>

                <div
                    class="flex flex-col md:flex-row items-center justify-end lg:justify-center w-full gap-2 text-gray-600 dark:text-gray-400 text-sm">
                    <a href="{{ route('transactions.index') }}">
                        <x-buttons.secondary>{{__('Cancel')}}</x-buttons.secondary>
                    </a>

                    <x-buttons.danger x-data=""
                                      x-on:click.prevent="$dispatch('open-modal', 'confirm-transaction-{{ $transaction->id }}-deletion')">
                        {{__('Delete')}}
                    </x-buttons.danger>

                    <x-buttons.form>{{__('Save')}}</x-buttons.form>
                </div>
            </x-panels.panel>
        </div>
    </form>

    <x-modal name="confirm-transaction-{{ $transaction->id }}-deletion">
        <form action="{{ route('transactions.destroy', $transaction->id) }}"
              method="POST"
              class="p-6">
            @csrf
            @method('DELETE')

            <x-panels.heading>
                {{ __('Are you sure you want to delete this transaction?') }}
            </x-panels.heading>

            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                {{ __('Once your transaction is deleted, all of its resources and data will be permanently deleted.') }}
            </p>

            <div class="mt-6 flex flex-col md:flex-row items-center justify-end w-full gap-2">
                <x-buttons.secondary x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-buttons.secondary>

                <x-buttons.danger x-on:click="$dispatch('close')">
                    {{ __('Delete Transaction') }}
                </x-buttons.danger>
            </div>
        </form>
    </x-modal>
</x-app-layout>

