<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <style>
        [x-cloak] {
            display: none
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex items-start justify-center h-full bg-gray-50">
<div
    class="max-w-full w-full px-3 antialiased lg:px-6 min-h-screen bg-[conic-gradient(at_top,_var(--tw-gradient-stops))] from-black via-black/95 to-black">
    <div class="mx-auto max-w-7xl flex flex-col min-h-screen">
        @include('layouts.header')
        <main>
            {{ $slot }}
        </main>
        @include('layouts.footer')
    </div>
</div>
</body>
</html>
