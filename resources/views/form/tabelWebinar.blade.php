@extends('layouts.adminLayouts')
@section('content')


<div class="px-6 py-4">
    <h2 class="text-2xl font-bold">Manajemen Data Webinar</h2>
    <p class="mb-6 text-gray-600">Daftar semua Webinar yang telah di input.</p>

    <a href="{{ route('webinar.create') }}"
       class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition ease-in-out duration-150">
        <i class="fas fa-plus mr-2"></i> Tambah Webinar Baru
    </a>

    {{-- Export Data Webinar --}}
    <div class="relative inline-block text-left transition duration-300 ease-in-out hover:scale-105">
        <!-- Button -->
        <button id="exportButtonWebinar"
            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition ease-in-out duration-150">
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

    <div class="mt-5 relative overflow-x-auto shadow-md sm:rounded-lg">
        <form method="GET" action="{{ route('webinar.index') }}" class="mb-4 flex gap-2">
            <input type="text" name="search" value="{{ request('search') }}"
                class="border rounded-md p-2 w-64"
                placeholder="Cari webinar...">

            <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                Cari
            </button>
        </form>
        @if(request('search'))
        <p class="mb-2 text-sm text-gray-500">
            Menampilkan hasil untuk: "<strong>{{ request('search') }}</strong>"
        </p>
        @endif
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3"><a href="{{ route('webinar.index', [
                    'sort'=>'webinar',
                    'order'=>($sort == 'webinar' && $order == 'asc')  ? 'desc' : 'asc'
    ]) }}">

                       Webinar
                         @if($sort == 'webinar')
                                    @if($order == 'asc')
                                        ▲
                                    @else
                                        ▼
                                    @endif
                                @endif
                    </a> </th>
                    <th scope="col" class="px-6 py-3">Deskripsi</th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('webinar.index', [
        'sort' => 'tanggal',
        'order' => ($sort == 'tanggal' && $order == 'asc') ? 'desc' : 'asc'
    ]) }}">
                        Tanggal
                        @if($sort == 'tanggal')
                                    @if($order == 'asc')
                                        ▲
                                    @else
                                        ▼
                                    @endif
                                @endif
                    </a>
                </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('webinar.index', [
        'sort' => 'pemateri',
        'order' => ($sort == 'pemateri' && $order == 'asc') ? 'desc' : 'asc'
    ]) }}">Pemateri

   @if($sort == 'pemateri')
                                    @if($order == 'asc')
                                        ▲
                                    @else
                                        ▼
                                    @endif
                                @endif</a></th>
                    <th scope="col" class="px-6 py-3">Mulai</th>
                    <th scope="col" class="px-6 py-3">Selesai</th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('webinar.index', [
        'sort' => 'kategoriWebinar',
        'order' => ($sort == 'kategoriWebinar' && $order == 'asc') ? 'desc' : 'asc'
    ]) }}">
                        Kategori
                        @if($sort == 'kategoriWebinar')
                                    @if($order == 'asc')
                                        ▲
                                    @else
                                        ▼
                                    @endif
                                @endif
                    </a>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('webinar.index', [
        'sort' => 'tempat',
        'order' => ($sort == 'tempat' && $order == 'asc') ? 'desc' : 'asc'
    ]) }}">
                        Tempat
                      @if($sort == 'tempat')
                                    @if($order == 'asc')
                                        ▲
                                    @else
                                        ▼
                                    @endif
                                @endif
                    </a></th>
                    <th scope="col" class="px-6 py-3">Gambar</th>

                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Aksi</span>
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($semuaWebinar as $item)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$loop->iteration}}
                    </th>
                    <td class="px-6 py-4">
                        {{ $item->webinar }}
                    </td>

                    <td class="px-6 py-4 max-w-xs truncate">
                        {{ $item->deskripsiWebinar }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->tanggal }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->pemateri }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->mulai }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->selesai }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->kategoriWebinar }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->tempat }}
                    </td>
                    <td class="px-6 py-4">

                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="Poster Webinar"
                             class="w-24 h-16 object-cover rounded-md">
                    </td>





                    <td class="px-6 py-4 whitespace-nowrap">

                        <div class="flex items-center gap-2">
                            {{-- Ganti '#' dengan route edit yang benar --}}

                            <a href="{{ route('webinar.edit', $item->id) }}" class="inline-flex items-center justify-center p-2 text-sm font-medium rounded-md text-white bg-yellow-500 hover:bg-yellow-600">
                                <i class="fas fa-edit"></i>
                            </a>

                            {{-- Ganti '#' dengan route destroy yang benar --}}
                            <form action="{{ route('webinar.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center justify-center p-2 text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>

                    </td>

                </tr>
                @empty
                {{--
                    DIPERBAIKI:
                    'colspan' harus sesuai dengan jumlah <th> di <thead>.
                    Sekarang ada 11 kolom (termasuk Aksi).
                --}}
                <tr>
                    <td colspan="11" class="px-6 py-4 text-center text-gray-500">
                        Belum ada data Webinar.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{-- Pagination --}}
        <div class="mt-6 flex justify-center">
            {{ $semuaWebinar->appends(request()->all())->links() }}
        </div>
    </div>
</div>
@endsection
