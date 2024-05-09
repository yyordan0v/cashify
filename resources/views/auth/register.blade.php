<x-guest-layout>
    <section class="w-full px-8 py-16 xl:px-8">
        <div class="max-w-5xl mx-auto">
            <div class="flex flex-col items-center md:flex-row">

                <!-- Text Block -->
                <x-text-block/>

                <div class="w-full mt-16 md:mt-0 md:w-2/5">
                    <x-panel>
                        <x-panel-heading class="mb-6 text-center">
                            Get started in minutes
                        </x-panel-heading>

                        <p class="w-full my-10 text-sm text-center text-gray-500">
                            First, let's create your account. Once your account has been created you can start using
                            Cashify.
                        </p>


                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="space-y-10">

                                <!-- Name -->
                                <div>
                                    <x-input-label for="name" :value="__('Name')"/>
                                    <x-text-input id="name" class="block w-full" type="text" name="name"
                                                  :value="old('name')" required autofocus autocomplete="name"/>
                                    <x-input-error :messages="$errors->get('name')"/>
                                </div>

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
                                                  required autocomplete="new-password"/>

                                    <x-input-error :messages="$errors->get('password')"/>
                                </div>

                                <!-- Confirm Password -->
                                <div class="mt-4">
                                    <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>

                                    <x-text-input id="password_confirmation" class="block w-full"
                                                  type="password"
                                                  name="password_confirmation" required autocomplete="new-password"/>

                                    <x-input-error :messages="$errors->get('password_confirmation')"/>
                                </div>

                                <div
                                    class="flex flex-col items-center justify-between w-full h-full pt-2 md:w-full md:flex-row md:py-0">
                                    <x-primary-button>Register</x-primary-button>

                                    <x-underline-link :href="route('login')">Already registered?</x-underline-link>
                                </div>
                            </div>
                        </form>
                    </x-panel>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
