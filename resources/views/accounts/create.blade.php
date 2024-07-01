<x-app-layout>
    <form action="{{ route('accounts.store') }}"
          method="POST"
          class="col-span-2">
        @csrf

        <x-panels.panel class="flex flex-col items-start justify-start w-full space-y-6">
            <x-panels.heading>{{__('Add Account')}}</x-panels.heading>

            <div class="w-full">
                <x-forms.label for="name" :value="__('Name')"/>
                <x-forms.input id="name" name="name" type="text" :value="old('name')"

                               class="w-full"/>
                <x-forms.error :messages="$errors->get('name')"/>
            </div>

            <div class="w-full">
                <x-forms.label for="name" :value="__('Starting at')"/>
                <x-forms.input id="balance" name="balance" type="text"
                               :value="old('balance')"
                               autocomplete="balance"
                               class="w-full"/>
                <x-forms.error :messages="$errors->get('balance')"/>
            </div>

            <x-forms.radio.group type="color">
                @foreach($availableColors as $color)
                    <x-forms.radio.color
                        name="color"
                        color="{{ $color }}"
                        id="{{ $color }}"
                        :checked="old('color', $selectedColor) === $color"/>
                @endforeach
            </x-forms.radio.group>

            <x-forms.form-actions>
                <a href="{{ route('accounts.index') }}">
                    <x-buttons.secondary>{{__('Cancel')}}</x-buttons.secondary>
                </a>

                <x-buttons.form>
                    {{__('Add Account')}}
                </x-buttons.form>
            </x-forms.form-actions>
        </x-panels.panel>
    </form>
</x-app-layout>
