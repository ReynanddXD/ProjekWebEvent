@extends('layouts.adminLayouts')
@section('content')

{{-- 'container-fluid' (Bootstrap) -> 'px-6 py-4' (Tailwind) --}}
<div class="px-6 py-4">
    {{-- 'h3 mb-4' (BS 1.5rem) -> 'text-2xl font-bold mb-6' (TW 1.5rem) --}}
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Daftar Peserta (Lomba & Webinar)</h1>

    {{-- 'card shadow mb-4' (Bootstrap) -> Styling kartu Tailwind --}}
    <div class="bg-white overflow-hidden shadow-lg rounded-lg mb-6">

       {{-- Card Header dengan Tombol Export di sebelah kanan --}}
<div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
    {{-- Judul --}}
    <h6 class="m-0 font-bold text-blue-600">Semua Peserta</h6>

    {{-- Tombol Export --}}
    <div class="relative inline-block text-left">
        <button id="exportButton"
            class="inline-flex items-center px-4 py-2 bg-purple-600 border border-transparent rounded-md font-semibold text-white hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition ease-in-out duration-150">
            Export Data
            <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        {{-- Dropdown Menu --}}
        <div id="exportMenu"
            class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-10">
            <a href="{{ route('admin-export-allPdf') }}"
                class="block px-4 py-2 text-gray-700 hover:bg-purple-100 hover:text-purple-700 transition">
                PDF
            </a>
            <a href="{{ route('admin-export-allExcel') }}"
                class="block px-4 py-2 text-gray-700 hover:bg-purple-100 hover:text-purple-700 transition">
                Excel
            </a>
            <a href="{{ route('admin-export-allJpg') }}"
                class="block px-4 py-2 text-gray-700 hover:bg-purple-100 hover:text-purple-700 transition">
                JPG
            </a>
        </div>
    </div>
</div>

<script>
    const exportButton = document.getElementById('exportButton');
    const exportMenu = document.getElementById('exportMenu');

    exportButton.addEventListener('click', (e) => {
        e.stopPropagation(); // Supaya klik tombol tidak langsung menutup dropdown
        exportMenu.classList.toggle('hidden');
    });

    window.addEventListener('click', () => {
        exportMenu.classList.add('hidden');
    });
</script>


        <div class="p-6">
            {{-- 'table-responsive' -> 'overflow-x-auto' --}}
            <div class="overflow-x-auto">
                {{-- 'table table-bordered' -> 'w-full border-collapse' --}}
                <div class="flex gap-3 mb-4">
    <a href="{{ route('peserta.exportExcel') }}"
        class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
        Export Excel
    </a>

    <a href="{{ route('peserta.exportPdf') }}"
        class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
        Export PDF
    </a>
</div>

                <table class="w-full text-black border-collapse" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-gray-100">
                        <tr>
                            {{-- Styling <th> standar Tailwind --}}
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border border-gray-300">No.</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border border-gray-300">Nama</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border border-gray-300">Email</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border border-gray-300">No. Hp</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border border-gray-300">Instansi</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border border-gray-300">Pekerjaan</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border border-gray-300">Tipe Kegiatan</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border border-gray-300">Tanggal Daftar</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @forelse($peserta as $index => $item)
                        <tr class="hover:bg-gray-50">
                            {{-- Styling <td> standar Tailwind --}}
                            <td class="px-6 py-4 border border-gray-300">{{ $peserta->firstItem() + $index }}</td>
                            <td class="px-6 py-4 border border-gray-300">{{ $item->nama }}</td>
                            <td class="px-6 py-4 border border-gray-300">{{ $item->email }}</td>
                            <td class="px-6 py-4 border border-gray-300">{{ $item->noHp }}</td>
                            <td class="px-6 py-4 border border-gray-300">{{ $item->instansi }}</td>
                            <td class="px-6 py-4 border border-gray-300">{{ $item->pekerjaan }}</td>
                            <td class="px-6 py-4 border border-gray-300">
                                @if($item->tipe_kegiatan == 'Lomba')
                                    {{-- 'badge badge-info' -> Badge 'info' (biru) Tailwind --}}
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        Lomba
                                    </span>
                                @else
                                    {{-- 'badge badge-warning' -> Badge 'warning' (kuning) Tailwind --}}
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        Webinar
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 border border-gray-300">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y, H:i') }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            {{--
                                'colspan="8"' sudah benar (8 kolom).
                                Menambahkan padding dan border agar konsisten.
                            --}}
                            <td colspan="8" class="px-6 py-4 text-center text-gray-500 border border-gray-300">
                                Belum ada data peserta.
                            </td>
                        </tr>


                    @endforelse
                    </tbody>
                </table>
            </div>

            {{--
                'd-flex justify-content-center' -> 'flex justify-center'
                Menambahkan 'mt-6' (margin-top 1.5rem) untuk memberi jarak
                dari tabel di atasnya.
            --}}
            <div class="mt-6 flex justify-center">
                {{--
                    Laravel 'links()' akan otomatis menggunakan styling Tailwind
                    jika Anda sudah mem-publish pagination views Tailwind.
                --}}
                {{ $peserta->links() }}
            </div>

        </div>
    </div>
</div>
@endsection
