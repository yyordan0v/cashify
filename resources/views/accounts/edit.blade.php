@props(['account', 'errors' => null, 'oldInput' => []])


<form hx-patch="{{ route('accounts.update', $account) }}">
    @csrf
    <x-panels.panel class="flex flex-col items-start lg:items-center justify-start lg:justify-center lg:min-h-[255px]"
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

