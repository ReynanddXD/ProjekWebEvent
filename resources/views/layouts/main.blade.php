<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard User') - MyReady</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100">

    @include('partial.navbar')

    <main class="py-8">
        @yield('content')
    </main>

    <footer class="text-center py-4 text-gray-500">
       @include('partial.footer')
        {{-- &copy; {{ date('Y') }} MyReady. All Rights Reserved. --}}
    </footer>

</body>
</html>
