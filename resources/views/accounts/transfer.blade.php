<x-app-layout>
    @fragment('form')
        <form hx-post="{{ route('accounts.storeTransfer', $account->id) }}"
              hx-target="body"
              hx-push-url="{{ route('accounts.index') }}"
              class="col-span-2 xl:col-span-1">
            @csrf
            @method('PATCH')

            <x-panels.panel class=" flex flex-col items-start space-y-4" padding="p-4">
                <div class="w-full">
                    <x-forms.label :value="__('Transfer to')"/>

                    <x-forms.radio.group class="md:grid-cols-3">
                        @foreach($userAccounts as $acc)
                            <x-forms.radio.button name="to_account" id="{{ $acc->id }}" value="{{ $acc->id }}">
                                <div class="block w-4 h-4 rounded-full mr-2 {{ $acc->color_class }}"></div>

                                <div class="block">
                                    <div class="w-full">{{ $acc->name }}</div>
                                </div>
                            </x-forms.radio.button>
                        @endforeach


                    </x-forms.radio.group>

                </div>

                <div class="w-full">
                    <x-forms.label for="amount" :value="__('Amount')"/>
                    <x-forms.input id="amount" name="amount" type="text"
                                   :value="old('amount', $account->amount)"
                                   class="w-full"/>
                    <x-forms.error :messages="$errors->get('amount')"/>
                </div>

                <div
                    class="flex flex-col md:flex-row items-center justify-end lg:justify-center w-full gap-2 text-gray-600 dark:text-gray-400 text-sm">
                    <x-buttons.cancel to="accounts" keep :id="$account->id"/>
                    <x-buttons.form>Transfer</x-buttons.form>
                </div>

            </x-panels.panel>
        </form>

    @endfragment
</x-app-layout>
