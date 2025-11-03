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

</div>
