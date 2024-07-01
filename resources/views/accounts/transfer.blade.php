<x-app-layout>
    @fragment('form')
        <form hx-post="{{ route('accounts.storeTransfer', $account->id) }}"
              hx-target="body"
              hx-push-url="{{ route('accounts.index') }}"
              class="col-span-2 xl:col-span-1">
            @csrf
            @method('PATCH')

            <x-panels.panel class="flex flex-col items-start space-y-6">
                <div class="w-full">
                    <x-forms.label :value="__('Transfer to')"/>

                    @php
                        $count = count($userAccounts);
                    @endphp
                    <x-forms.radio.group class="md:grid-cols-{{ $count }}">
                        @foreach($userAccounts as $acc)
                            <x-forms.radio.button name="to_account" id="{{ $acc->id }}" value="{{ $acc->id }}">
                                <div
                                    class="block w-4 h-4 min-w-4 min-h-4 rounded-full mr-2 {{ $acc->color_class }}"></div>

                                <div class="block">
                                    <div class="w-full">{{ $acc->name }}</div>
                                </div>
                            </x-forms.radio.button>
                        @endforeach

                        @unless($userAccounts->count() > 0)
                            <x-panels.heading class="text-sm w-full">
                                {{__('No other accounts found.')}}
                            </x-panels.heading>
                        @endunless
                    </x-forms.radio.group>
                    <x-forms.error :messages="$errors->get('to_account')"/>
                </div>


                <div class="w-full">
                    <x-forms.label for="balance" :value="__('Balance')"/>
                    <x-forms.input id="balance" type="text"
                                   :value="$account->balance"
                                   disabled
                                   class="w-full"/>
                </div>

                <div class="w-full">
                    <x-forms.label for="amount" :value="__('Transfer Amount')"/>
                    <x-forms.input id="amount" name="amount" type="text"
                                   :value="old('amount', $account->amount)"
                                   class="w-full"/>
                    <x-forms.error :messages="$errors->get('amount')"/>
                </div>

                <x-forms.form-actions>
                    <x-buttons.cancel to="accounts" keep :id="$account->id"/>

                    <x-buttons.form>
                        {{__('Transfer')}}
                    </x-buttons.form>
                </x-forms.form-actions>

            </x-panels.panel>
        </form>

    @endfragment
</x-app-layout>
