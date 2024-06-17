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

    <link rel="apple-touch-icon"
          sizes="180x180"
          href="/apple-touch-icon.png">
    <link rel="icon"
          type="image/png"
          sizes="32x32"
          href="/favicon-32x32.png">
    <link rel="icon"
          type="image/png"
          sizes="16x16"
          href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,1,0"/>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="relative antialiased bg-gray-50" hx-boost="true">

<svg xmlns="http://www.w3.org/2000/svg" version="1.1"
     viewBox="0 0 800 450"
     class="dark:hidden fixed inset-0 bottom-0"
     opacity="0.1"
     style="z-index: -1 !important; width: 100%; height: 100%;"
     preserveAspectRatio="xMidYMid slice"
>
    <defs>
        <filter id="bbblurry-filter" x="-100%" y="-100%" width="400%" height="400%"
                filterUnits="objectBoundingBox" primitiveUnits="userSpaceOnUse"
                color-interpolation-filters="sRGB">
            <feGaussianBlur stdDeviation="40" x="0%" y="0%" width="100%" height="100%" in="SourceGraphic"
                            edgeMode="none" result="blur"></feGaussianBlur>
        </filter>
    </defs>
    <g filter="url(#bbblurry-filter)">
        <ellipse rx="150" ry="150" cx="400.7825428355824" cy="362.4767400568182"
                 fill="hsla(55, 94%, 54%, 1.00)"></ellipse>
        <ellipse rx="150" ry="150" cx="673.6786443536932" cy="445.7059492631392"
                 fill="hsla(290, 87%, 47%, 1.00)"></ellipse>
        <ellipse rx="150" ry="150" cx="567.1489424272015" cy="213.84652709960938"
                 fill="hsla(212, 72%, 59%, 1.00)"></ellipse>
        <ellipse rx="150" ry="150" cx="103.90784523703837" cy="127.27873091264206"
                 fill="hsla(0, 0%, 66%, 1.00)"></ellipse>
    </g>
</svg>

{{ $slot }}

<x-toast-notification/>

<script src="https://unpkg.com/htmx.org@1.9.12"></script>
<script>
    htmx.config.globalViewTransitions = true;
</script>
</body>
</html>
