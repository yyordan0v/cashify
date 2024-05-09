<x-guest-layout>
    <section class="w-full px-8 py-16 xl:px-8">
        <div class="max-w-5xl mx-auto">
            <div class="flex flex-col items-center md:flex-row">

                <!-- Text Block -->
                <x-text-block/>

                <div class="w-full mt-16 md:mt-0 md:w-2/5">
                    <x-panel>
                        <h3 class="mb-6 text-2xl font-medium text-center text-white">Sign in to your Account</h3>

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')"/>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="space-y-10">

                                <!-- Email Address -->
                                <div>
                                    <x-input-label for="email" :value="__('Email')"/>
                                    <x-text-input id="email" class="block w-full" type="email" name="email"
                                                  :value="old('email')" required autofocus autocomplete="username"/>
                                    <x-input-error :messages="$errors->get('email')"/>
                                </div>

                                <!-- Password -->
                                <div>
                                    <x-input-label for="password" :value="__('Password')"/>

                                    <x-text-input id="password" class="block w-full"
                                                  type="password"
                                                  name="password"
                                                  required autocomplete="current-password"/>

                                    <x-input-error :messages="$errors->get('password')"/>
                                </div>

                                <!-- Remember Me -->
                                <x-switch id="remember_me" name="remember">Remember Me</x-switch>

                                <div
                                    class="flex flex-col items-center justify-between w-full h-full pt-2 md:w-full md:flex-row md:py-0">

                                    <x-primary-button>Log In</x-primary-button>

                                    @if (Route::has('password.request'))
                                        <x-underline-link :href="route('password.request')">
                                            Forgot your password?
                                        </x-underline-link>
                                    @endif
                                </div>

                            </div>
                        </form>
                    </x-panel>
                    <p class="w-full mt-4 text-sm text-center text-gray-500">
                        Don't have an account?
                        <x-underline-link :href="route('register')">Register here</x-underline-link>
                    </p>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
