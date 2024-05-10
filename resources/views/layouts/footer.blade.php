<footer class="mt-auto">
    <div class="container flex flex-col items-center px-8 py-8 mx-auto max-w-7xl sm:flex-row">

        {{--        Logo--}}
        <a href="{{ route('home') }}">
            <x-application-logo class="text-lg"/>
        </a>
        <p class="mt-4 text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l sm:border-gray-600 dark:sm:border-gray-200 sm:mt-0">
            &copy; {{ date("Y") }}
            Cashify - Empowering Your Finances
        </p>

        {{--        Socials--}}
        <x-socials-block/>
    </div>
</footer>
