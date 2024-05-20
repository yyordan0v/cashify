<x-app-layout>
    <div class="grid xl:grid-cols-2 gap-4 mb-4">
        {{--        show--}}
        <x-panels.panel class="flex flex-col items-start lg:items-center justify-center">
            <div class="flex items-center justify-between lg:justify-center w-full">
                <x-cards.title class="mb-0 mt-0 lg:mt-4">
                    <span class="font-bold text-xl">
                            Bank
                    </span>
                </x-cards.title>

                <x-dropdown.menu>
                    <x-dropdown.button>
                        more_vert
                    </x-dropdown.button>

                    <x-dropdown.body>
                        <x-buttons.action :href="route('accounts')">
                            <x-icon style="font-size: 20px">
                                compare_arrows
                            </x-icon>
                            Transfer Balance
                        </x-buttons.action>
                        <x-buttons.action :href="route('accounts')">
                            <x-icon style="font-size: 20px">
                                edit
                            </x-icon>
                            Edit
                        </x-buttons.action>
                        <x-buttons.action :href="route('accounts')" class="text-red-600">
                            <x-icon style="font-size: 20px">
                                delete
                            </x-icon>
                            Delete
                        </x-buttons.action>
                    </x-dropdown.body>
                </x-dropdown.menu>
            </div>

            <div class="flex flex-col items-start lg:items-center">
                <x-cards.text class="mt-0 lg:mt-2">$420</x-cards.text>
                <x-cards.text class="my-0 text-xs">4 transactions</x-cards.text>
            </div>

            <x-divider class="hidden lg:block my-6 w-full"/>

            <div
                class="hidden lg:flex items-center justify-center w-full gap-2 text-gray-600 dark:text-gray-400 text-sm">


                <x-buttons.action :href="route('accounts')">
                    <x-icon>
                        compare_arrows
                    </x-icon>
                    Transfer Balance
                </x-buttons.action>
                <x-buttons.action :href="route('accounts')">
                    <x-icon>
                        edit
                    </x-icon>
                    Edit
                </x-buttons.action>
                <x-buttons.action :href="route('accounts')" class="text-red-600">
                    <x-icon>
                        delete
                    </x-icon>
                    Delete
                </x-buttons.action>
            </div>

        </x-panels.panel>

        {{--        edit--}}
        <x-panels.panel class="flex flex-col items-start lg:items-center justify-start lg:justify-center">
            <div class="flex items-start lg:items-center w-full">
                <div class="w-full text-center">
                    <x-forms.input value="Bank" class="w-full lg:w-1/2 mt-0"></x-forms.input>
                </div>
            </div>

            <div class="flex flex-col items-start lg:items-center w-full">
                <div class="w-full text-center">
                    <x-forms.input value="$420" class="w-full lg:w-1/2"></x-forms.input>
                </div>
            </div>

            <x-divider class="my-8 w-full"/>

            <div
                class="flex flex-col md:flex-row items-center justify-end lg:justify-center w-full gap-2 text-gray-600 dark:text-gray-400 text-sm">
                <x-buttons.secondary>Cancel</x-buttons.secondary>
                <x-buttons.form>Save</x-buttons.form>
            </div>

        </x-panels.panel>

        {{--        transfer--}}
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
                <x-forms.label for="notes" :value="__('Notes')"/>
                <x-forms.textarea placeholder="hehehe.."/>
            </div>

            <x-divider class="my-8 w-full"/>

            <div
                class="flex flex-col md:flex-row items-center justify-end lg:justify-center w-full gap-2 text-gray-600 dark:text-gray-400 text-sm">
                <x-buttons.secondary>Cancel</x-buttons.secondary>
                <x-buttons.form>Transfer Amount</x-buttons.form>
            </div>

        </x-panels.panel>

        {{--        add--}}
        <a href="{{ route('accounts') }}">
            <x-buttons.card-button>
                Account
            </x-buttons.card-button>
        </a>
    </div>
</x-app-layout>

