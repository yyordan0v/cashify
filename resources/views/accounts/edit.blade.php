<x-app-layout>
    @fragment('form')
        <form hx-post="{{ route('accounts.update', $account->id) }}"
              class="col-span-2">
            @csrf
            @method('PATCH')

            <x-panels.panel class="flex flex-col items-start justify-start w-full space-y-6">
                <x-panels.heading>{{__('Edit Account')}}</x-panels.heading>

                <div class="w-full">
                    <x-forms.label for="name" :value="__('Name')"/>
                    <x-forms.input id="name" name="name" type="text"
                                   :value="old('name', $account->name)"
                                   autofocus
                                   class="w-full"/>
                    <x-forms.error :messages="$errors->get('name')"/>
                </div>

                <div class="w-full">
                    <x-forms.label for="balance" :value="__('Balance')"/>
                    <x-forms.input id="balance" name="balance" type="text"
                                   :value="old('balance', $account->balance)"
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

                <x-forms.form-actions>
                    <x-buttons.cancel to="accounts" keep :id="$account->id"/>

                    <x-buttons.form>
                        {{__('Save')}}
                    </x-buttons.form>
                </x-forms.form-actions>
            </x-panels.panel>
        </form>
    @endfragment
</x-app-layout>

