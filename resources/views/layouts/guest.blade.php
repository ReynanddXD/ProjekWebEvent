<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <style>
        .bg-custom-image {
            background-image: url('/img/bg1.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .logo-white svg path {
            fill: #ffffff !important;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">

    <div class="min-h-screen flex items-center justify-center bg-custom-image relative">

        <!-- 🔙 Tombol Back -->
        <a href="/" class="absolute top-6 left-6 text-white hover:text-gray-300 transition">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
        </a>

        <!-- Card -->
        <div class="w-full max-w-xl sm:max-w-md md:max-w-lg mx-4 px-8 py-6 
                    bg-white/30 backdrop-blur-md rounded-2xl 
                    border border-white/30 shadow-2xl">
            
            <!-- Logo di dalam card -->
            <div class="mb-6 flex justify-center">
                <a href="/">
                    <x-application-logo class="w-20 h-20 logo-white" />
                </a>
            </div>

            <!-- Slot konten -->
            {{ $slot }}
        </div>
    </div>

</body>
</html>
