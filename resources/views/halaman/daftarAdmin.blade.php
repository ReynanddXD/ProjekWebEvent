@extends('layouts.adminLayouts')

@section('content')

{{--
    Kami mengganti 'container-fluid' (Bootstrap) dengan padding horizontal (px-6)
    dan padding vertikal (py-4) dari Tailwind.
--}}
<div class="px-6 py-4">

    {{--
        'h3' (Bootstrap) -> 'text-2xl font-bold' (Tailwind)
        'mb-2' (Bootstrap 0.5rem) -> 'mb-2' (Tailwind 0.5rem)
        'text-gray-800' sudah valid di Tailwind.
    --}}
    <h1 class="text-2xl font-bold mb-2 text-gray-800">Manajemen Admin</h1>

    {{--
        'mb-4' (Bootstrap 1.5rem) -> 'mb-6' (Tailwind 1.5rem)
        Menambahkan 'text-gray-600' untuk warna teks standar.
    --}}
    <p class="mb-6 text-gray-600">Daftar semua pengguna yang memiliki hak akses admin.</p>

    {{--
        'd-flex' -> 'flex'
        'justify-content-end' -> 'justify-end'
        'mb-3' (Bootstrap 1rem) -> 'mb-4' (Tailwind 1rem)
    --}}
    <div class="flex justify-end mb-4">
        {{--
            'btn btn-primary' (Bootstrap) -> Kumpulan kelas utility Tailwind.
            'inline-flex items-center' digunakan untuk menyejajarkan ikon dan teks.
        --}}
        <a href="{{ route('admin.users.create') }}"
           class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition ease-in-out duration-150">

            {{-- Menambahkan margin kanan 'mr-2' pada ikon --}}
            <i class="fas fa-plus mr-2"></i> Tambah Admin Baru
        </a>
    </div>

    @if (session('success'))
        {{--
            'alert alert-success' (Bootstrap) -> Kumpulan kelas utility Tailwind.
            Ini membuat kotak notifikasi berwarna hijau.
        --}}
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md mb-4" role="alert">
            {{ session('success') }}
        </div>
    @endif

    {{--
        'card shadow mb-4' (Bootstrap) -> Kumpulan kelas utility Tailwind.
        'mb-4' (Bootstrap 1.5rem) -> 'mb-6' (Tailwind 1.5rem)
        'shadow-lg' dan 'rounded-lg' untuk tampilan kartu yang modern.
    --}}
    <div class="bg-white overflow-hidden shadow-lg rounded-lg mb-6">

    {{-- Header Card dengan Judul dan Export Button Sejajar --}}
    <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
        {{-- Judul --}}
        <h6 class="m-0 font-bold text-blue-600 text-lg">Data Admin</h6>

        {{-- Export Data Admin --}}
        <div class="relative inline-block text-left">
            <!-- Button -->
            <button id="exportButton"
                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition ease-in-out duration-150">
                Export Data Admin
                <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <!-- Dropdown Menu -->
            <div id="exportMenu"
                class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-10">
                <a href="{{ route('admin.users.exportPdf') }}"
                    class="block px-4 py-2 text-gray-700 hover:bg-green-100 hover:text-green-700 transition">
                    PDF
                </a>
                <a href="{{ route('admin.users.exportExcel') }}"
                    class="block px-4 py-2 text-gray-700 hover:bg-green-100 hover:text-green-700 transition">
                    Excel
                </a>
                <a href="{{ route('admin.users.exportJpg') }}"
                    class="block px-4 py-2 text-gray-700 hover:bg-green-100 hover:text-green-700 transition">
                    JPG
                </a>
            </div>
        </div>
    </div>

    <script>
        const exportButton = document.getElementById('exportButton');
        const exportMenu = document.getElementById('exportMenu');

        // Toggle dropdown
        exportButton.addEventListener('click', (e) => {
            e.stopPropagation();
            exportMenu.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        window.addEventListener('click', () => exportMenu.classList.add('hidden'));
    </script>



        {{-- 'card-body' (Bootstrap padding 1.25rem) -> 'p-6' (Tailwind 1.5rem) --}}
        <div class="p-6">
            {{-- 'table-responsive' (Bootstrap) -> 'overflow-x-auto' (Tailwind) --}}
            <div class="overflow-x-auto">
                {{--
                    'table' -> 'w-full'
                    'table-bordered' -> 'border-collapse' dan menambahkan kelas 'border' di <th> dan <td>.
                    'text-black' -> 'text-black'
                --}}
                <table class="w-full text-black border-collapse" width="100%" cellspacing="0">
                    <thead class="bg-gray-100">
                        <tr>
                            {{-- Style standar untuk header tabel di Tailwind --}}
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border border-gray-300">Nama</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border border-gray-300">Email</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border border-gray-300">Bergabung Sejak</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border border-gray-300">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($daftarAdmin as $admin)
                        {{-- Menambahkan hover effect 'hover:bg-gray-50' --}}
                        <tr class="hover:bg-gray-50">
                            {{-- Padding 'px-6 py-4' untuk sel data --}}
                            <td class="px-6 py-4 border border-gray-300">{{ $admin->name }}</td>
                            <td class="px-6 py-4 border border-gray-300">{{ $admin->email }}</td>
                            <td class="px-6 py-4 border border-gray-300">{{ $admin->created_at->format('d M Y') }}</td>
                            <td class="px-6 py-4 border border-gray-300">
                                {{--
                                    'btn btn-sm btn-warning' (Bootstrap) -> Kumpulan kelas utility Tailwind.
                                    'px-2.5 py-1.5' untuk ukuran 'sm' dan 'text-sm'.
                                --}}
                                <a href="{{ route('admin.users.edit', $admin->id) }}" class="px-2.5 py-1.5 text-sm font-medium rounded-md text-white bg-yellow-500 hover:bg-yellow-600">Edit</a>
                                     <form action="{{ route('admin.users.destroy', $admin->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    {{--
                                        'btn btn-sm btn-danger' (Bootstrap) -> Tombol ikon 'sm' Tailwind.
                                    --}}
                                    <button type="submit" class="px-2.5 py-1.5 text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700">
                                       Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
