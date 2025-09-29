@php
    $isLanding = Request::is('/');
@endphp

<nav id="navbar" class="fixed top-0 w-full z-50 transition-all duration-500 ease-in-out bg-indigo-900 text-white">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            
            {{-- Logo --}}
            <div class="flex flex-1 items-center sm:items-stretch sm:justify-start">
                <div class="flex shrink-0 items-center">
                    <img src="{{ asset('img/logo.png') }}" alt="MYREADY Logo" class="h-16 w-auto" />
                </div>

                {{-- Menu Desktop --}}
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    <div class="flex space-x-4">
                        <a href="{{ $isLanding ? '#home' : url('/') . '#home' }}" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-white hover:bg-opacity-20 transition-colors duration-300">
                            Beranda
                        </a>

                        <div class="relative group">
                            <a href="javascript:void(0);" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-white hover:bg-opacity-20 flex items-center transition-colors duration-300">
                                <span>Kategori</span>
                                <svg class="ml-2 h-5 w-5 text-gray-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.25 4.25a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <div class="absolute left-0 mt-2 w-48 origin-top-left rounded-md bg-white shadow-lg z-10 hidden group-hover:block">
                                <div class="py-1" role="menu" aria-orientation="vertical">
                                    <a href="#webinar" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" role="menuitem">Webinar</a>
                                    <a href="#lomba" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" role="menuitem">Lomba</a>
                                    <a href="#home" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" role="menuitem">Lainnya</a>
                                </div>
                            </div>
                        </div>

                        <a href="{{ $isLanding ? '#about' : url('/') . '#about' }}" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-white hover:bg-opacity-20 transition-colors duration-300">
                            Tentang
                        </a>

                        <a href="{{ $isLanding ? '#contact' : url('/') . '#contact' }}" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-white hover:bg-opacity-20 transition-colors duration-300">
                            Kontak
                        </a>
                    </div>
                </div>
            </div>

            {{-- User / Dashboard Dropdown --}}
            <div class="flex items-center space-x-3">
                @if (Route::has('login'))
                    @auth
                        <div class="relative inline-block text-left group">
                            {{-- Tombol Dashboard utama dengan nama user --}}
                            <a href="{{ url('/dashboardUser') }}" 
                            class="bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 active:bg-blue-800 rounded-full px-5 py-2 text-sm font-medium transition-colors shadow-md">
                            Dashboard ({{ ucfirst(Auth::user()->name)  }})
                            </a>

                            {{-- Dropdown Logout --}}
                            <div class="absolute right-0 mt-2 min-w-full rounded-md bg-white ring-1 ring-black ring-opacity-5 hidden group-hover:block z-20">
                                <div class="py-1 w-full">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="block w-full text-left px-5 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 active:bg-blue-800 rounded-full px-5 py-2 text-sm font-medium transition-colors shadow-md">
                            Masuk
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-amber-500 text-white hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 active:bg-amber-700 rounded-full px-5 py-2 text-sm font-medium transition-colors shadow-md">
                            Daftar
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </div>
</nav>
