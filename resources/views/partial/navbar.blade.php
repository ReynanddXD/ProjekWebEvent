    <!-- Include this script tag or install `@tailwindplus/elements` via npm: -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script> -->
        <nav class="relative bg-oklch(98.5% 0.001 106.423)">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
            <!-- Bagian kiri: Logo + Menu -->
            <div class="flex flex-1 items-center sm:items-stretch sm:justify-start">
                <div class="flex shrink-0 items-center">
                <img src="{{ asset('img/logo.png') }}" alt="Your Company" class="h-16 w-auto" />
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                <div class="flex space-x-4">
                    <a href="#" aria-current="page" class="rounded-md bg-[oklch(83.3%_0.145_321.434)] px-3 py-2 text-sm font-medium text-[oklch(74.6%_0.16_232.661)]">Beranda</a>
                    <div class="relative group">
                    <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-[oklch(74.6%_0.16_232.661)] hover:bg-white/5 hover:text-[oklch(95.6%_0.045_203.388)] flex items-center">
                        <span>Kategori</span>
                        <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.25 4.25a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <div class="absolute left-0 mt-2 w-48 origin-top-left rounded-md bg-white shadow-lg z-10 hidden group-hover:block">
                        <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                        <a href="#" class="block px-4 py-2 text-sm text-[oklch(83.3%_0.145_321.434)] hover:bg-[oklch(95.6%_0.045_203.388)]" role="menuitem">Teknologi</a>
                        <a href="#" class="block px-4 py-2 text-sm text-[oklch(83.3%_0.145_321.434)] hover:bg-[oklch(95.6%_0.045_203.388)]" role="menuitem">Desain</a>
                        <a href="#" class="block px-4 py-2 text-sm text-[oklch(83.3%_0.145_321.434)] hover:bg-[oklch(95.6%_0.045_203.388)]" role="menuitem">Bisnis</a>
                        </div>
                    </div>
                    </div>
                    <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-[oklch(74.6%_0.16_232.661)] hover:bg-white/5 hover:text-[oklch(95.6%_0.045_203.388)]">Event</a>
                    <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-[oklch(74.6%_0.16_232.661)] hover:bg-white/5 hover:text-[oklch(95.6%_0.045_203.388)]">Lomba</a>
                </div>
                </div>
            </div>

            <!-- Bagian kanan: Login + Register -->
                <div class="flex items-center space-x-3">
                    <button
                        class="bg-[oklch(63.7%_0.237_25.331)] hover:bg-[oklch(70%_0.237_25.331)] focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-offset-2 active:bg-[oklch(58%_0.237_25.331)] text-white rounded-lg px-5 py-2 text-sm font-medium transition-colors">
                        Log In
                    </button>
                    <button
                        class="bg-[oklch(63.7%_0.237_25.331)] hover:bg-[oklch(70%_0.237_25.331)] focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-offset-2 active:bg-[oklch(58%_0.237_25.331)] text-white rounded-lg px-5 py-2 text-sm font-medium transition-colors">
                        Register
                    </button>
                </div>

            </div>
        </div>
        </nav>

    <nav class="bg-white shadow-md">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="relative flex h-20 items-center justify-between">
            <div class="flex items-center">
                <a href="#"><img class="h-10 w-auto" src="https://via.placeholder.com/150x40/000000/FFFFFF?text=MYREADY" alt="Logo Perusahaan"></a>
            </div>

            <div class="hidden sm:flex sm:items-center">
                <div class="flex space-x-2">
                    <a href="#" class="bg-pink-400 text-white rounded-lg px-4 py-2 text-sm font-medium">Beranda</a>
                    <a href="#" class="text-sky-500 hover:text-sky-700 rounded-lg px-4 py-2 text-sm font-medium">Kategori</a>
                    <a href="#" class="text-sky-500 hover:text-sky-700 rounded-lg px-4 py-2 text-sm font-medium">Event</a>
                    <a href="#" class="text-sky-500 hover:text-sky-700 rounded-lg px-4 py-2 text-sm font-medium">Lomba</a>
                </div>
            </div>

            <div class="hidden sm:flex items-center">
                <span class="text-sky-500 text-sm font-medium mr-4">Halo, Lani</span>
                <button class="relative flex rounded-full">
                    <img class="h-10 w-10 rounded-full object-cover" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Foto Profil">
                </button>
            </div>
        </div>
    </div>
</nav>