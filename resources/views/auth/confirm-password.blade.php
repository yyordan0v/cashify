<x-guest-layout>
    <section class="w-full px-8 py-16 xl:px-8">
        <div class="max-w-5xl mx-auto">
            <div class="flex flex-col items-center md:flex-row">

                <!-- Text Block -->
                <x-text-block/>

                <div class="w-full mt-16 md:mt-0 md:w-2/5">
                    <x-panel>
                        <x-panel-heading class="mb-6 text-center">
                            This is a secure area of the application.
                        </x-panel-heading>

                        <p class="w-full my-10 text-sm text-center text-gray-500">
                            Please confirm your password before continuing.
                        </p>

                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf

                            <div class="space-y-10">

                                <!-- Password -->
                                <div>
                                    <x-input-label for="password" :value="__('Password')"/>

                                    <x-text-input id="password" class="block w-full"
                                                  type="password"
                                                  name="password"
                                                  required autocomplete="current-password"/>

                                    <x-input-error :messages="$errors->get('password')"/>
                                </div>


                                <div
                                    class="flex flex-col items-center justify-between w-full h-full pt-2 md:w-full md:flex-row md:py-0">
                                    <x-primary-button>Confirm</x-primary-button>
                                </div>
                            </div>
                        </form>
                    </x-panel>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>


