<x-guest-layout>
    <section class="w-full px-8 py-14 xl:px-8">
        <div class="max-w-5xl mx-auto">
            <div class="flex flex-col items-start md:flex-row">

                <!-- Text Block -->
                <x-text-block/>

                <div class="w-full mt-16 md:mt-0 md:w-2/5">
                    <x-panels.panel>
                        <x-panels.heading class="mb-6 text-center">
                            Sign in to your Account
                        </x-panels.heading>

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')"/>

                        <x-buttons.socialite-buttons/>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="space-y-6">

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
                                                   required autocomplete="current-password"/>

                                    <x-forms.error :messages="$errors->get('password')"/>
                                </div>

                                <!-- Remember Me -->
                                <x-forms.switch id="remember_me" name="remember">Remember Me</x-forms.switch>

                                <div
                                    class="flex flex-col items-center justify-between w-full h-full pt-2 md:w-full md:flex-row md:py-0">

                                    <x-buttons.primary>Log In</x-buttons.primary>

                                    @if (Route::has('password.request'))
                                        <x-buttons.underline :href="route('password.request')">
                                            Forgot your password?
                                        </x-buttons.underline>
                                    @endif
                                </div>

                            </div>
                        </form>
                    </x-panels.panel>
                    <p class="w-full mt-4 text-sm text-center text-gray-500">
                        Don't have an account?
                        <x-buttons.underline :href="route('register')">Register here</x-buttons.underline>
                    </p>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
