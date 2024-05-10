<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      x-data="{
      darkMode: localStorage.getItem('darkMode')
      || localStorage.setItem('darkMode', 'system')}"
      x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))"
      x-bind:class="{'dark': darkMode === 'dark' || (darkMode === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)}"
>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen">
    <div x-data="{ sidebarOpen: false }">
        @include('layouts.navigation')
        @include('layouts.aside')
    </div>

    <!-- Page Content -->
    <div
        class="antialiased min-h-screen bg-[conic-gradient(at_top,_var(--tw-gradient-stops))] dark:from-black dark:via-black/90 dark:to-black bg-gray-50">
        <main class="p-4 md:ml-68 h-auto pt-20 md:pt-24">
            {{ $slot }}
        </main>
    </div>
</div>
</body>
</html>
