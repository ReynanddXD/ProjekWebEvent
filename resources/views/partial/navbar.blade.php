<nav id="navbar" class="fixed top-0 w-full z-50 transition-all duration-500 ease-in-out bg-transparent text-white">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="flex flex-1 items-center sm:items-stretch sm:justify-start">
                <div class="flex shrink-0 items-center">
                    <img src="{{ asset('img/logo.png') }}" alt="MYREADY Logo" class="h-16 w-auto" />
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    <div class="flex space-x-4">
                        <a href="#" aria-current="page" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-dark-indigo hover:bg-opacity-80 transition-colors duration-300">Beranda</a>
                        <div class="relative group">
                            <a href="#" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-dark-indigo hover:bg-opacity-80 flex items-center transition-colors duration-300">
                                <span>Kategori</span>
                                <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.25 4.25a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                </svg>
                            </a>

                            <!-- Dropdown -->
                            <div class="absolute left-0 mt-2 w-48 origin-top-left rounded-md bg-white shadow-lg z-10 hidden group-hover:block">
                                <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                <a href="#webinar" class="block px-4 py-2 text-sm text-dark-indigo hover:bg-gray-200" role="menuitem">Webinar</a>
                                <a href="#lomba" class="block px-4 py-2 text-sm text-dark-indigo hover:bg-gray-200" role="menuitem">Lomba</a>
                                <a href="#" class="block px-4 py-2 text-sm text-dark-indigo hover:bg-gray-200" role="menuitem">Lainnya</a>
                                </div>
                            </div>
                        </div>
                        <a href="#about" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-dark-indigo hover:bg-opacity-80 transition-colors duration-300">Tentang</a>
                        <a href="#contact" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-dark-indigo hover:bg-opacity-80 transition-colors duration-300">Kontak</a>
                    </div>
                </div>
            </div>

            {{-- logikan autentifikasi --}}
            <div class="flex items-center space-x-3">
                @if (Route::has('login'))
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="bg-amber-400-custom text-dark-indigo hover:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 active:bg-yellow-600 rounded-lg px-5 py-2 text-sm font-medium transition-colors"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="bg-amber-400-custom text-dark-indigo hover:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 active:bg-yellow-600 rounded-lg px-5 py-2 text-sm font-medium transition-colors"
                        >
                            Log In
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="bg-amber-400-custom text-dark-indigo hover:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 active:bg-yellow-600 rounded-lg px-5 py-2 text-sm font-medium transition-colors"
                            >
                                Register
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </div>
</nav>