<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')

    {{-- FontAwesome Icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<<body class="bg-gray-100">

    {{-- NAVBAR --}}
    <nav class="fixed top-0 left-0 w-full z-50 bg-indigo-900 text-white shadow-lg">
        <div class="mx-auto max-w-7xl px-4 py-4 flex items-center justify-between">

            {{-- Logo / Judul Website --}}
            <div class="flex items-center space-x-3">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-10 w-auto">
                <span class="text-xl font-semibold tracking-wide">MyReady</span>
            </div>

            {{-- Hamburger button for mobile --}}
            <button class="sm:hidden text-white text-2xl" id="menu-btn">
                <i class="fa-solid fa-bars"></i>
            </button>

            {{-- User / Dashboard Button --}}
            <div class="hidden sm:flex">
                @if (Route::has('login'))
                    @auth
                        <div class="relative inline-block text-left group">
                            <button class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 transition px-5 py-2 rounded-full shadow-md">
                                <i class="fa-solid fa-user"></i>
                                <span>Dashboard ({{ ucfirst(Auth::user()->name) }})</span>
                                <i class="fa-solid fa-chevron-down text-sm ml-1"></i>
                            </button>
                            <div class="absolute right-0 mt-2 w-40 bg-white rounded-md shadow-xl hidden group-hover:block">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fa-solid fa-right-from-bracket mr-2"></i> Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 text-sm rounded-full shadow-md">Masuk</a>
                        @if(Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-3 bg-amber-500 hover:bg-amber-600 text-white px-5 py-2 text-sm rounded-full shadow-md">Daftar</a>
                        @endif
                    @endauth
                @endif
            </div>

        </div>
    </nav>

    {{-- SIDEBAR --}}
    <!-- Sidebar -->
    <aside id="sidebar" class="fixed top-16 left-0 w-64 h-[calc(100vh-4rem)] bg-white shadow-lg py-8 px-6 flex flex-col
            transform -translate-x-full sm:translate-x-0 transition-transform duration-300 ease-in-out z-40">

        {{-- Menu utama --}}
        <div class="flex-1">
            <h2 class="text-xl font-bold text-indigo-700 mb-6 tracking-wide">Dashboard Menu</h2>
            <nav class="space-y-3">
                <a href="{{ route('dashboardUser') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg transition
                {{ request()->routeIs('dashboardUser') ? 'bg-indigo-100 text-indigo-700' : 'text-gray-700 hover:bg-indigo-100 hover:text-indigo-700' }}">
                <i class="fa-solid fa-house"></i> Beranda
                </a>

                <a href="{{ route('dashboardUser.edit') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg transition
                {{ request()->routeIs('dashboardUser.edit') ? 'bg-indigo-100 text-indigo-700' : 'text-gray-700 hover:bg-indigo-100 hover:text-indigo-700' }}">
                    <i class="fa-solid fa-user-pen"></i> Edit Profil
                </a>

                <a href="{{ route('dashboardUser.pengumuman') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg transition
                {{ request()->routeIs('dashboardUser.pengumuman') ? 'bg-indigo-100 text-indigo-700' : 'text-gray-700 hover:bg-indigo-100 hover:text-indigo-700' }}">
                <i class="fa-solid fa-bullhorn"></i> Pengumuman
                </a>

                <a href="{{ route('dashboardUser.lomba') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg transition
                {{ request()->routeIs('dashboardUser.lomba') ? 'bg-indigo-100 text-indigo-700' : 'text-gray-700 hover:bg-indigo-100 hover:text-indigo-700' }}">
                <i class="fa-solid fa-trophy"></i> Lomba
                </a>

                <a href="{{ route('dashboardUser.seminar') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg transition
                {{ request()->routeIs('dashboardUser.seminar') ? 'bg-indigo-100 text-indigo-700' : 'text-gray-700 hover:bg-indigo-100 hover:text-indigo-700' }}">
                <i class="fa-solid fa-chalkboard-teacher"></i> Seminar
                </a>
            </nav>
        </div>

        {{-- Logout di dasar sidebar --}}
        <div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center gap-2 px-3 py-2 text-gray-700 hover:bg-red-100 rounded-lg">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Script Toggle Sidebar -->
    <script>
        const btn = document.getElementById('menu-btn');
        const sidebar = document.getElementById('sidebar');

        btn.addEventListener('click', () => {
            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
                sidebar.classList.add('translate-x-0');
            } else {
                sidebar.classList.remove('translate-x-0');
                sidebar.classList.add('-translate-x-full');
            }
        });
    </script>
</body>
</html>
