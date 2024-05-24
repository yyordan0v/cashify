@props(['account'])

<form hx-patch="{{ route('accounts.update', $account) }}">
    @csrf
    <div class="flex flex-col items-start justify-start w-full space-y-6">
        <x-panels.heading>Edit Account</x-panels.heading>

        <div class="w-full">
            <x-forms.label for="name" :value="__('Name')"/>
            <x-forms.input id="name" name="name" type="text" :value="old('name', $account->name)"
                           autofocus autocomplete="name"
                           class="w-full"/>
            <x-forms.error :messages="$errors->get('name')"/>
        </div>

        <div class="w-full">
            <x-forms.label for="name" :value="__('Balance')"/>
            <x-forms.input id="balance" name="balance" type="text" :value="old('balance', $account->balance)"
                           autofocus autocomplete="balance"
                           class="w-full"/>
            <x-forms.error :messages="$errors->get('balance')"/>
        </div>

        {{--        <x-forms.radio.group type="color">--}}
        {{--            <x-forms.radio.color color="bg-gray-300" name="color" id="gray"/>--}}
        {{--            <x-forms.radio.color color="bg-red-300" name="color" id="red"/>--}}
        {{--            <x-forms.radio.color color="bg-orange-300" name="color" id="orange"/>--}}
        {{--            <x-forms.radio.color color="bg-amber-300" name="color" id="amber"/>--}}
        {{--            <x-forms.radio.color color="bg-yellow-300" name="color" id="yellow"/>--}}
        {{--            <x-forms.radio.color color="bg-lime-300" name="color" id="lime"/>--}}
        {{--            <x-forms.radio.color color="bg-green-300" name="color" id="green"/>--}}
        {{--            <x-forms.radio.color color="bg-emerald-300" name="color" id="emerald"/>--}}
        {{--            <x-forms.radio.color color="bg-teal-300" name="color" id="teal"/>--}}
        {{--            <x-forms.radio.color color="bg-cyan-300" name="color" id="cyan"/>--}}
        {{--            <x-forms.radio.color color="bg-sky-300" name="color" id="sky"/>--}}
        {{--            <x-forms.radio.color color="bg-blue-300" name="color" id="blue"/>--}}
        {{--            <x-forms.radio.color color="bg-indigo-300" name="color" id="indigo"/>--}}
        {{--            <x-forms.radio.color color="bg-violet-300" name="color" id="violet"/>--}}
        {{--            <x-forms.radio.color color="bg-purple-300" name="color" id="purple"/>--}}
        {{--            <x-forms.radio.color color="bg-fuchsia-300" name="color" id="fuchsia"/>--}}
        {{--            <x-forms.radio.color color="bg-pink-300" name="color" id="pink"/>--}}
        {{--            <x-forms.radio.color color="bg-rose-300" name="color" id="rose"/>--}}
        {{--        </x-forms.radio.group>--}}

        <x-divider class="my-6 w-full"/>

        <div
            class="flex flex-col md:flex-row items-center justify-end lg:justify-center w-full gap-2 text-gray-600 dark:text-gray-400 text-sm">

            <x-buttons.secondary x-on:click="$dispatch('close')">
                Cancel
            </x-buttons.secondary>

            <x-buttons.form>
                Save
            </x-buttons.form>
        </div>
    </div>
</form>

