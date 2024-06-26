<section>
    <header>
        <x-panels.heading>
            {{ __('Update Password') }}
        </x-panels.heading>

        @if($isSocialiteUser)
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                {{ __('You are logged in via social authentication. You can set a password for direct login or manage your account via your social provider.') }}
            </p>
        @else
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                {{ __('Ensure your account is using a long, random password to stay secure.') }}
            </p>
        @endif


    </header>

    @if(! $isSocialiteUser)
        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('put')

            <div>
                <x-forms.label for="update_password_current_password" :value="__('Current Password')"/>
                <x-forms.input id="update_password_current_password" name="current_password" type="password"
                               class="mt-1 block w-full" autocomplete="current-password"/>
                <x-forms.error :messages="$errors->updatePassword->get('current_password')" class="mt-2"/>
            </div>

            <div>
                <x-forms.label for="update_password_password" :value="__('New Password')"/>
                <x-forms.input id="update_password_password" name="password" type="password" class="mt-1 block w-full"
                               autocomplete="new-password"/>
                <x-forms.error :messages="$errors->updatePassword->get('password')" class="mt-2"/>
            </div>

            <div>
                <x-forms.label for="update_password_password_confirmation" :value="__('Confirm Password')"/>
                <x-forms.input id="update_password_password_confirmation" name="password_confirmation" type="password"
                               class="mt-1 block w-full" autocomplete="new-password"/>
                <x-forms.error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2"/>
            </div>

            <div class="flex items-center gap-4">
                <x-buttons.form>{{ __('Save') }}</x-buttons.form>

                @if (session('status') === 'password-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-500 dark:text-gray-400"
                    >{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
    @endif
</section>
