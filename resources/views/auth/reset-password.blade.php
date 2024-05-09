<x-guest-layout>
    <section class="w-full px-8 py-16 xl:px-8">
        <div class="max-w-5xl mx-auto">
            <div class="flex flex-col items-center md:flex-row">

                <!-- Text Block -->
                <x-text-block/>

                <div class="w-full mt-16 md:mt-0 md:w-2/5">
                    <x-panel>
                        <x-panel-heading class="mb-6 text-center">
                            Reset your Password
                        </x-panel-heading>


                        <form method="POST" action="{{ route('password.store') }}">
                            @csrf

                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

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
                                    <x-primary-button>Reset Password</x-primary-button>
                                </div>
                            </div>
                        </form>
                    </x-panel>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>

