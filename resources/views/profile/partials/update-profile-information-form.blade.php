@php use Illuminate\Contracts\Auth\MustVerifyEmail; @endphp
<section>
    <header>
        <x-panels.heading>
            {{ __('Profile Information') }}
        </x-panels.heading>

        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            {{ __("Update your profile's information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-forms.label for="name" :value="__('Name')"/>
            <x-forms.input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                           required autocomplete="name"/>
            <x-forms.error class="mt-2" :messages="$errors->get('name')"/>
        </div>

        <div>
            <x-forms.label for="email" :value="__('Email')"/>
            <x-forms.input id="email" name="email" type="email" class="mt-1 block w-full"
                           :value="old('email', $user->email)" required autocomplete="username"/>
            <x-forms.error class="mt-2" :messages="$errors->get('email')"/>

            @if ($user instanceof MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                                class="underline text-sm text-gray-500 dark:text-gray-400 hover:text-white dark:text-black rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-buttons.form>{{ __('Save') }}</x-buttons.form>

            @if (session('status') === 'profile-updated')
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
</section>
