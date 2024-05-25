<x-app-layout>
    <div class="grid xl:grid-cols-2 gap-4 mb-4">

        @foreach($accounts as $account)
            @include('accounts.show', ['account' => $account])
        @endforeach

        {{--        transfer--}}
        @if(false)
            <x-panels.panel class="flex flex-col items-start space-y-6">

                <div class="w-full">
                    <x-forms.label for="name" :value="__('Transfer to')"/>

                    <x-forms.radio.group class="md:grid-cols-3">
                        <x-forms.radio.button name="type" id="fi-bank" value="fi-bank">
                            <div class="block">
                                <div class="w-full">Fi Bank</div>
                            </div>
                        </x-forms.radio.button>

                        <x-forms.radio.button name="type" id="pro-credit-bank" value="pro-credit-bank">
                            <div class="block">
                                <div class="w-full">Pro Credit Bank</div>
                            </div>
                        </x-forms.radio.button>

                        <x-forms.radio.button name="type" id="cash" value="cash">
                            <div class="block">
                                <div class="w-full">Cash</div>
                            </div>
                        </x-forms.radio.button>
                    </x-forms.radio.group>

                </div>

                <div class="w-full">
                    <x-forms.label for="amount" :value="__('Amount')"/>
                    <x-forms.input value="$420" class="w-full "></x-forms.input>
                </div>

                <div class="w-full">
                    <x-forms.label for="details" :value="__('Details')"/>
                    <x-forms.textarea/>
                </div>

                <x-divider/>

                <div
                    class="flex flex-col md:flex-row items-center justify-end lg:justify-center w-full gap-2 text-gray-600 dark:text-gray-400 text-sm">
                    <x-buttons.secondary>Cancel</x-buttons.secondary>
                    <x-buttons.form>Transfer Amount</x-buttons.form>
                </div>

            </x-panels.panel>
        @endif

        {{-- Add Account Button --}}
        <x-buttons.card-button hx-target="this"
                               hx-swap="outerHTML"
                               hx-get="{{ route('accounts.create') }}"
                               class="col-span-2">
            Account
        </x-buttons.card-button>
    </div>
</x-app-layout>

