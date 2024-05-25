<x-app-layout>
    <form method="POST" action="{{ route('accounts.update', $account) }}" class="col-span-2">
        @csrf
        @method('PATCH')

        <x-panels.panel class="flex flex-col items-start justify-start w-full space-y-6">
            <x-panels.heading>Edit Account</x-panels.heading>

            <div class="w-full">
                <x-forms.label for="name" :value="__('Name')"/>
                <x-forms.input id="name" name="name" type="text"
                               :value="old('name', $oldInput['name'] ?? $account->name)"
                               autofocus autocomplete="name"
                               class="w-full"/>
                <x-forms.error :messages="$errors->get('name')"/>
            </div>

            <div class="w-full">
                <x-forms.label for="name" :value="__('Balance')"/>
                <x-forms.input id="balance" name="balance" type="text"
                               :value="old('balance',  $oldInput['balance'] ?? $account->balance)"
                               autofocus autocomplete="balance"
                               class="w-full"/>
                <x-forms.error :messages="$errors->get('balance')"/>
            </div>

            <x-forms.radio.group type="color">
                @foreach($availableColors as $color)
                    <x-forms.radio.color
                        name="color"
                        color="{{ $color }}"
                        id="{{ $color }}"
                        :checked="$color === $selectedColor"/>
                @endforeach
            </x-forms.radio.group>

            <x-divider class="my-6 w-full"/>

            <div
                class="flex flex-col md:flex-row items-center justify-end lg:justify-center w-full gap-2 text-gray-600 dark:text-gray-400 text-sm">

                <x-buttons.secondary
                    hx-get="{{ route('accounts.index') }}"
                    hx-target="body">
                    Cancel
                </x-buttons.secondary>

                <x-buttons.form>
                    Save
                </x-buttons.form>
            </div>
        </x-panels.panel>
    </form>
</x-app-layout>

