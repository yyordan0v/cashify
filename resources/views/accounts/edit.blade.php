@props(['account', 'errors' => null, 'oldInput' => []])


<form hx-patch="{{ route('accounts.update', $account) }}">
    @csrf
    <x-panels.panel class="flex flex-col items-start lg:items-center justify-start lg:justify-center"
                    hx-target="this"
                    hx-swap="outerHTML">

        <div class="flex items-start lg:items-center w-full">
            <div class="w-full text-center">
                <x-forms.input id="name" name="name" type="text"
                               :value="old('name', $oldInput['name'] ?? $account->name)"
                               autofocus autocomplete="name"
                               class="w-full lg:w-1/2"/>
                <x-forms.error :messages="$errors->get('name')"/>
            </div>
        </div>

        <div class="flex flex-col items-start lg:items-center w-full">
            <div class="w-full text-center">
                <x-forms.input id="balance" name="balance" type="text"
                               :value="old('balance', $oldInput['balance'] ?? $account->balance)"
                               autofocus autocomplete="balance"
                               class="w-full lg:w-1/2"/>
                <x-forms.error :messages="$errors->get('balance')"/>
            </div>
        </div>

        <x-forms.radio.group type="color" class="pl-24">
            <x-forms.radio.color color="bg-gray-300" name="color" id="gray"/>
            <x-forms.radio.color color="bg-red-300" name="color" id="red"/>
            <x-forms.radio.color color="bg-orange-300" name="color" id="orange"/>
            <x-forms.radio.color color="bg-amber-300" name="color" id="amber"/>
            <x-forms.radio.color color="bg-yellow-300" name="color" id="yellow"/>
            <x-forms.radio.color color="bg-lime-300" name="color" id="lime"/>
            <x-forms.radio.color color="bg-green-300" name="color" id="green"/>
            <x-forms.radio.color color="bg-emerald-300" name="color" id="emerald"/>
            <x-forms.radio.color color="bg-teal-300" name="color" id="teal"/>
            <x-forms.radio.color color="bg-cyan-300" name="color" id="cyan"/>
            <x-forms.radio.color color="bg-sky-300" name="color" id="sky"/>
            <x-forms.radio.color color="bg-blue-300" name="color" id="blue"/>
            <x-forms.radio.color color="bg-indigo-300" name="color" id="indigo"/>
            <x-forms.radio.color color="bg-violet-300" name="color" id="violet"/>
            <x-forms.radio.color color="bg-purple-300" name="color" id="purple"/>
            <x-forms.radio.color color="bg-fuchsia-300" name="color" id="fuchsia"/>
            <x-forms.radio.color color="bg-pink-300" name="color" id="pink"/>
            <x-forms.radio.color color="bg-rose-300" name="color" id="rose"/>
        </x-forms.radio.group>

        <x-divider class="my-6 w-full"/>

        <div
            class="flex flex-col md:flex-row items-center justify-end lg:justify-center w-full gap-2 text-gray-600 dark:text-gray-400 text-sm">
            <x-buttons.secondary hx-get="{{ route('accounts.show', $account) }}">
                Cancel
            </x-buttons.secondary>
            <x-buttons.form>
                Save
            </x-buttons.form>
        </div>
    </x-panels.panel>
</form>

