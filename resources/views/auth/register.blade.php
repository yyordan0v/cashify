<x-guest-layout>
    <section class="w-full py-14 sm:px-8">
        <div class="max-w-5xl mx-auto">
            <div class="flex flex-col items-start md:flex-row">

                <!-- Text Block -->
                <x-text-block/>

                <div class="w-full mt-16 md:mt-0 md:w-2/5">
                    <x-panels.panel>
                        <x-panels.heading class="mb-6 text-center">
                            Get started in minutes
                        </x-panels.heading>

                        <p class="w-full my-6 text-sm text-center text-gray-500">
                            First, let's create your account. Once your account has been created you can start using
                            Cashify.
                        </p>

                        <x-buttons.socialite-buttons/>

                        <form method="POST" action="{{ route('register') }}" id="registration-form">
                            @csrf

                            <div class="space-y-6">

                                <!-- Name -->
                                <div>
                                    <x-forms.label for="name" :value="__('Name')"/>
                                    <x-forms.input id="name" class="block w-full" type="text" name="name"
                                                   :value="old('name')" required autofocus autocomplete="name"/>
                                    <x-forms.error :messages="$errors->get('name')"/>
                                </div>

                                <!-- Email Address -->
                                <div>
                                    <x-forms.label for="email" :value="__('Email')"/>
                                    <x-forms.input id="email" class="block w-full" type="email" name="email"
                                                   :value="old('email')" required autofocus autocomplete="username"/>
                                    <x-forms.error :messages="$errors->get('email')"/>
                                </div>

                                <!-- Password -->
                                <div>
                                    <x-forms.label for="password" :value="__('Password')"/>

                                    <x-forms.input id="password" class="block w-full"
                                                   type="password"
                                                   name="password"
                                                   required autocomplete="new-password"/>

                                    <x-forms.error :messages="$errors->get('password')"/>
                                </div>

                                <!-- Confirm Password -->
                                <div class="mt-4">
                                    <x-forms.label for="password_confirmation" :value="__('Confirm Password')"/>

                                    <x-forms.input id="password_confirmation" class="block w-full"
                                                   type="password"
                                                   name="password_confirmation" required autocomplete="new-password"/>

                                    <x-forms.error :messages="$errors->get('password_confirmation')"/>
                                </div>

                                <!-- Invisible Turnstile Widget -->
                                <div id="cf-turnstile-response"></div>
                                <x-forms.error :messages="$errors->get('cf-turnstile-response')"/>

                                <div
                                    class="flex flex-col items-center justify-between w-full h-full pt-2 md:w-full md:flex-row md:py-0">
                                    <x-buttons.primary id="submit-button">Register</x-buttons.primary>

                                    <x-buttons.underline :href="route('login')">Already registered?
                                    </x-buttons.underline>
                                </div>
                            </div>
                        </form>
                    </x-panels.panel>
                </div>
            </div>
        </div>
    </section>

    <!-- Turnstile Script -->
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js?onload=onloadTurnstileCallback" async
            defer></script>
    <script>
        let turnstileWidget;

        function onloadTurnstileCallback() {
            turnstileWidget = turnstile.render('#cf-turnstile-response', {
                sitekey: '{{ config('services.turnstile.site_key') }}',
                theme: 'light',
                callback: function (token) {
                    document.getElementById('registration-form').submit();
                }
            });
        }

        document.getElementById('submit-button').addEventListener('click', function (e) {
            e.preventDefault();
            turnstile.reset(turnstileWidget);
        });
    </script>
</x-guest-layout>
