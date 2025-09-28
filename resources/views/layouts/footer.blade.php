<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        {{-- ... isi head Anda ... --}}
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            
            {{-- Memuat Navbar --}}
            @include('layouts.navigation')

            {{-- Konten Utama Halaman --}}
            <main>
                @yield('content')
            </main>

        </div>

        @include('partial.footer')

    </body>
</html>