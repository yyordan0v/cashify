<x-guest-layout>
    <section>
        <div class="container px-6 py-32 mx-auto md:text-center md:px-4">
            <x-typing-heading/>
            <p class="mx-auto mt-6 text-sm text-left text-gray-800 dark:text-gray-200 md:text-center md:mt-12 sm:text-base md:max-w-xl md:text-lg xl:text-xl">
                “Gold comes gladly and in increasing quantity to any man who will put by not less than one-tenth of
                his earnings to create an estate for his future and that of his family.”</p>
            <div
                class="flex flex-col items-center justify-center mt-20 space-y-4 text-center sm:flex-row sm:space-y-0 sm:space-x-4">
                    <span class="relative inline-flex w-full md:w-auto">
                    <x-buttons.primary :anchor="true" size="lg" href="{{ route('login') }}">
                        Get Started
                    </x-buttons.primary>
                </span>
            </div>
        </div>
    </section>
</x-guest-layout>
