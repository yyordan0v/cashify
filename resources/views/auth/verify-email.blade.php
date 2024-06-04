<x-guest-layout>
    <section class="w-full px-8 py-14 xl:px-8">
        <div class="max-w-5xl mx-auto">
            <div class="flex flex-col items-start md:flex-row">

                <!-- Text Block -->
                <x-text-block/>

                <div class="w-full mt-16 md:mt-0 md:w-2/5">
                    <x-panels.panel>
                        <x-panels.heading class="mb-6 text-center">
                            Thanks for signing up!
                        </x-panels.heading>

                        <p class="w-full my-10 text-sm text-center text-gray-500">
                            Before getting started, could you verify your email address by
                            clicking on the link we just emailed to you? If you didn't receive the email, we will
                            gladly send you another.
                        </p>


                        @if (session('status') == 'verification-link-sent')
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                            </div>
                        @endif

                        <div
                            class="flex flex-col items-center justify-between w-full h-full pt-2 md:w-full lg:flex-row md:py-0">

                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf

                                <div class="space-y-10">
                                    <div
                                        class="flex flex-col items-center justify-between w-full h-full pt-2 md:w-full md:flex-row md:py-0">
                                        <x-buttons.primary>Resend Verification Email</x-buttons.primary>
                                    </div>

                                </div>
                            </form>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-buttons.secondary>
                                    {{ __('Log Out') }}
                                </x-buttons.secondary>
                            </form>
                        </div>
                    </x-panels.panel>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>


