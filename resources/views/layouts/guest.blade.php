<x-document>
    <div
        class="max-w-full w-full px-3 antialiased lg:px-6 min-h-screen bg-[conic-gradient(at_top,_var(--tw-gradient-stops))] dark:from-black dark:via-black/90 dark:to-black from-white via-white/90 to-white">
        <div class="mx-auto max-w-7xl flex flex-col min-h-screen">

            @include('layouts.header')

            <main>
                {{ $slot }}
            </main>

            @include('layouts.footer')

        </div>
    </div>
</x-document>
