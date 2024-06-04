<x-guest-layout>
    <section class="w-full px-8 py-14 xl:px-8">
        <div class="max-w-5xl mx-auto">
            <div class="flex flex-col items-start md:flex-row">

                <!-- Text Block -->
                <x-text-block/>

                <div class="w-full mt-16 md:mt-0 md:w-2/5">
                    <x-panels.panel>
                        <x-panels.heading class="mb-6 text-center">
                            Forgot your password? <br>
                            No problem.
                        </x-panels.heading>

                        <p class="w-full my-10 text-sm text-center text-gray-500">
                            Just let us know your email address and we will email you a password reset link that
                            will
                            allow
                            you to choose a new one.
                        </p>


                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')"/>

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="space-y-10">

                                <!-- Email Address -->
                                <div>
                                    <x-forms.label for="email" :value="__('Email')"/>
                                    <x-forms.input id="email" class="block w-full" type="email" name="email"
                                                   :value="old('email')" required
                                                   autofocus/>
                                    <x-forms.error :messages="$errors->get('email')"/>
                                </div>


                                <div
                                    class="flex flex-col items-center justify-between w-full h-full pt-2 md:w-full md:flex-row md:py-0">
                                    <x-buttons.primary>Email Password Reset Link</x-buttons.primary>
                                </div>

                            </div>
                        </form>
                    </x-panels.panel>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>

