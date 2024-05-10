<section class="space-y-6">
    <header>
        <x-panels.heading>
            {{ __('Delete Account') }}
        </x-panels.heading>

        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-buttons.danger
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Delete Account') }}</x-buttons.danger>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()">
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <x-panels.heading>
                {{ __('Are you sure you want to delete your account?') }}
            </x-panels.heading>

            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-forms.label for="password" value="{{ __('Password') }}" class="sr-only"/>

                <x-forms.input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-forms.error :messages="$errors->userDeletion->get('password')" class="mt-2"/>
            </div>

            <div class="mt-6 flex justify-end">
                <x-buttons.secondary x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-buttons.secondary>

                <x-buttons.danger class="ms-3">
                    {{ __('Delete Account') }}
                </x-buttons.danger>
            </div>
        </form>
    </x-modal>
</section>
