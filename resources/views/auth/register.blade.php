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

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <input type="hidden" name="recaptcha_token" id="recaptcha_token">

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

                                <div
                                    class="flex flex-col items-center justify-between w-full h-full pt-2 md:w-full md:flex-row md:py-0">
                                    <x-buttons.primary>Register</x-buttons.primary>

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

    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
    <script>
        document.querySelector('form').addEventListener('submit', function (e) {
            e.preventDefault();
            grecaptcha.ready(function () {
                grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {action: 'register'}).then(function (token) {
                    document.getElementById('recaptcha_token').value = token;
                    htmx.trigger('form', 'submit');
                });
            });
        });
    </script>
</x-guest-layout>
