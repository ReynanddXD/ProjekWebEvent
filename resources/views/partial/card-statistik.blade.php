{{--
    1. INI ADALAH WRAPPER INDUK (PENGGANTI <div class="row"> di Bootstrap)
    - 'grid': Mengaktifkan CSS Grid.
    - 'grid-cols-1': Default di HP, 1 kolom.
    - 'md:grid-cols-2': Di layar medium (tablet), jadi 2 kolom.
    - 'lg:grid-cols-4': Di layar besar (desktop), jadi 4 kolom.
    - 'gap-6': Memberi jarak 1.5rem (mb-4 Anda) antar SEMUA card.
--}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

    {{--
        2. INI WRAPPER UNTUK EFEK HOVER (TAMBAHAN)
        Saya membungkus card Anda dengan div ini untuk memberi efek
        tanpa mengubah kode 'stats' Anda.
    --}}
    <div class="transition duration-300 ease-in-out hover:scale-105">
        {{-- Card 1 (Kode Anda tidak saya ubah) --}}
        <div class="stats shadow">
            <div class="stat">
                <div class="stat-title">Total Lomba</div>
                <div class="stat-value">{{ $totalLomba ?? 'N/A' }}</div>
                {{-- <div class="stat-desc">21% more than last month</div> --}}
            </div>
        </div>
    </div>

    {{-- Card 2 --}}
    <div class="transition duration-300 ease-in-out hover:scale-105">
        <div class="stats shadow">
            <div class="stat">
                <div class="stat-title">Total Webinar</div>
                <div class="stat-value">{{ $totalWebinar ?? 'N/A' }}</div>
                {{-- <div class="stat-desc">21% more than last month</div> --}}
            </div>
        </div>
    </div>

    {{-- Card 3 --}}
    <div class="transition duration-300 ease-in-out hover:scale-105">
        <div class="stats shadow">
            <div class="stat">
                <div class="stat-title">Total Admin</div>
                <div class="stat-value">{{ $totalAdmin }}</div>
                {{-- <div class="stat-desc">21% more than last month</div> --}}
            </div>
        </div>
    </div>

    {{-- Card 4 --}}
    <div class="transition duration-300 ease-in-out hover:scale-105">
        <div class="stats shadow">
            <div class="stat">
                <div class="stat-title">Total Pendaftar</div>
                <div class="stat-value">{{ $totalPendaftar }}</div>
                {{-- <div class="stat-desc">21% more than last month</div> --}}
            </div>
        </div>
    </div>

    {{-- Export Data Lomba --}}
    <!-- Export Data -->
    <div class="relative inline-block text-left">
        <!-- Button -->
        <button id="exportButton"
            class="inline-flex items-center px-4 py-2 bg-purple-800 border border-transparent rounded-md font-semibold text-white hover:bg-purple-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-400 transition ease-in-out duration-150">
            Export Data Lomba
            <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        <!-- Dropdown Menu -->
        <div id="exportMenu"
            class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-10">
            <a href="{{ route('admin-export-lombaPdf') }}"
                class="block px-4 py-2 text-gray-700 hover:bg-green-100 hover:text-green-700 transition">
                PDF
            </a>
            <a href="{{ route('admin-export-lombaExcel') }}"
                class="block px-4 py-2 text-gray-700 hover:bg-green-100 hover:text-green-700 transition">
                Excel
            </a>
            <a href="{{ route('admin-export-lombaJpg') }}"
                class="block px-4 py-2 text-gray-700 hover:bg-green-100 hover:text-green-700 transition">
                JPG
            </a>
        </div>
    </div>

    <script>
        const exportButton = document.getElementById('exportButton');
        const exportMenu = document.getElementById('exportMenu');

        // Toggle dropdown
        exportButton.addEventListener('click', () => {
            exportMenu.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        window.addEventListener('click', (e) => {
            if (!exportButton.contains(e.target) && !exportMenu.contains(e.target)) {
                exportMenu.classList.add('hidden');
            }
        });
    </script>

    {{-- Export Data Webinar --}}
    <div class="relative inline-block text-left transition duration-300 ease-in-out hover:scale-105">
        <!-- Button -->
        <button id="exportButtonWebinar"
            class="inline-flex items-center px-4 py-2 bg-purple-800 border border-transparent rounded-md font-semibold text-white hover:bg-purple-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-400 transition ease-in-out duration-150">
            Export Data Webinar
            <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        <!-- Dropdown Menu muncul di atas tombol -->
        <div id="exportMenuWebinar"
            class="hidden absolute right-0 bottom-full mb-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-10">
            <a href="{{ route('admin-export-webinarPdf') }}"
                class="block px-4 py-2 text-gray-700 hover:bg-green-100 hover:text-green-700 transition">
                PDF
            </a>
            <a href="{{ route('admin-export-webinarExcel') }}"
                class="block px-4 py-2 text-gray-700 hover:bg-green-100 hover:text-green-700 transition">
                Excel
            </a>
            <a href="{{ route('admin-export-webinarJpg') }}"
                class="block px-4 py-2 text-gray-700 hover:bg-green-100 hover:text-green-700 transition">
                JPG
            </a>
        </div>
    </div>

    <script>
        const exportButtonWebinar = document.getElementById('exportButtonWebinar');
        const exportMenuWebinar = document.getElementById('exportMenuWebinar');

        // Toggle dropdown
        exportButtonWebinar.addEventListener('click', (e) => {
            e.stopPropagation(); // Supaya klik tombol tidak langsung menutup dropdown
            exportMenuWebinar.classList.toggle('hidden');
        });

        // Tutup dropdown ketika klik di luar
        window.addEventListener('click', () => {
            exportMenuWebinar.classList.add('hidden');
        });
    </script>
    
    </div>
