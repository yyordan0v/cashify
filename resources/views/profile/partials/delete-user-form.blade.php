<section class="space-y-6">
    <header>
        <x-panels.heading>
            {{ __('Delete Profile') }}
        </x-panels.heading>

        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            {{ __('Once your profile is deleted, all of its resources and data will be permanently deleted. Before deleting your profile, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-buttons.danger
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Delete Profile') }}</x-buttons.danger>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()">
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <x-panels.heading>
                {{ __('Are you sure you want to delete your profile?') }}
            </x-panels.heading>

            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                {{ __('Once your profile is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your profile.') }}
            </p>

            <div class="mt-6">
                <x-forms.label for="password" value="{{ __('Password') }}" class="sr-only"/>

                <x-forms.input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-full"
                    autofocus
                    placeholder="{{ __('Password') }}"
                />

                <x-forms.error :messages="$errors->userDeletion->get('password')" class="mt-2"/>
            </div>

            <div class="mt-6 flex flex-col md:flex-row items-center justify-end w-full gap-2">
                <x-buttons.secondary x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-buttons.secondary>

                <x-buttons.danger>
                    {{ __('Delete Profile') }}
                </x-buttons.danger>
            </div>
        </form>
    </x-modal>
</section>
