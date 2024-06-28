<x-document>
    <div class="min-h-screen" x-data="{ sidebarOpen: false }">
        @include('layouts.navigation')
        @include('layouts.aside')

        <!-- Page Content -->
        <div
            class="antialiased min-h-screen bg-[conic-gradient(at_top,_var(--tw-gradient-stops))] dark:from-black dark:via-black/90 dark:to-black">
            <main class="p-4 md:ml-68 h-auto pt-20 md:pt-24 pb-20 md:pb-0">
                {{ $slot }}
            </main>
        </div>
        @include('layouts.bottom-nav')
    </div>
</x-document>
