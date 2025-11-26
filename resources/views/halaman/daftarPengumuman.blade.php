@extends('layouts.adminLayouts')

@section('content')
{{--
    'container-fluid' (Bootstrap) -> 'px-6 py-4' (Tailwind)
    Padding horizontal 1.5rem (px-6) dan padding vertikal 1rem (py-4).
--}}
<div class="px-6 py-4">

    {{-- 'h3' -> 'text-2xl font-bold', 'mb-2' (0.5rem) -> 'mb-2' --}}
    <h1 class="text-2xl font-bold mb-2 text-gray-800">Manajemen Pengumuman</h1>
    {{-- 'mb-4' (BS 1.5rem) -> 'mb-6' (TW 1.5rem). Menambah warna teks. --}}
    <p class="mb-6 text-gray-600">Daftar semua pengumuman yang ada di sistem.</p>

    {{-- 'd-flex justify-content-end mb-3' -> 'flex justify-end mb-4' --}}
    <div class="flex justify-end mb-4">
        {{--
            'btn btn-primary' (Bootstrap) -> Kumpulan kelas utility Tailwind.
            'inline-flex items-center' untuk menyejajarkan ikon dan teks.
        --}}
        <a href="{{ route('pengumuman.create') }}"
           class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition ease-in-out duration-150">

           {{-- 'mr-2' (margin-right) untuk memberi jarak ikon dari teks --}}
            <i class="fas fa-plus mr-2"></i> Buat Pengumuman Baru
        </a>
    </div>

    @if (session('success'))
        {{-- 'alert alert-success' (Bootstrap) -> Styling notifikasi Tailwind --}}
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md mb-4" role="alert">
            {{ session('success') }}
        </div>
    @endif

    {{-- 'card shadow mb-4' (Bootstrap) -> Styling kartu Tailwind --}}
    <div class="bg-white overflow-hidden shadow-lg rounded-lg mb-6">

        {{-- 'card-header py-3' (Bootstrap) -> Styling header kartu Tailwind --}}
        <div class="px-6 py-4 border-b border-gray-200">
            {{-- 'font-weight-bold' -> 'font-bold', 'text-primary' -> 'text-blue-600' --}}
            <h6 class="m-0 font-bold text-blue-600">Data Pengumuman</h6>
        </div>

        {{-- 'card-body' (Bootstrap) -> 'p-6' (Tailwind) --}}
        <div class="p-6">
            {{-- 'table-responsive' (Bootstrap) -> 'overflow-x-auto' (Tailwind) --}}
            <div class="overflow-x-auto">
                {{--
                    'table table-bordered' (Bootstrap) -> 'w-full border-collapse'
                    ID 'dataTable' tetap dipertahankan.
                    Border akan kita terapkan di <th> dan <td>.
                --}}
                <table class="w-full border-collapse" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-gray-100">
                        <tr>
                            {{-- Styling standar <th> Tailwind dengan border --}}
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border border-gray-300">Judul</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border border-gray-300">Status</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border border-gray-300">Kategori</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border border-gray-300">Pinned</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border border-gray-300">Tanggal Dibuat</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border border-gray-300">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @forelse ($daftarPengumuman as $item)
                        {{-- Menambahkan hover effect 'hover:bg-gray-50' --}}
                        <tr class="hover:bg-gray-50">
                            {{-- Styling standar <td> Tailwind dengan border --}}
                            <td class="px-6 py-4 border border-gray-300">{{ $item->judul }}</td>
                            <td class="px-6 py-4 border border-gray-300">
                                @if($item->status == 'published')
                                    {{-- 'badge badge-success' (Bootstrap) -> Styling badge Tailwind --}}
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Published
                                    </span>
                                @else
                                    {{-- 'badge badge-secondary' (Bootstrap) -> Styling badge Tailwind --}}
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                        Draft
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 border border-gray-300">{{ $item->kategori ?? '-' }}</td>
                            <td class="px-6 py-4 border border-gray-300">
                                @if($item->is_pinned)
                                    {{-- 'badge badge-info' (Bootstrap) -> Styling badge Tailwind --}}
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        Ya
                                    </span>
                                @else
                                    {{-- 'badge badge-light' (Bootstrap) -> Styling badge Tailwind --}}
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-50 text-gray-600">
                                        Tidak
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 border border-gray-300">{{ $item->created_at->format('d M Y') }}</td>
                            <td class="px-6 py-4 border border-gray-300">
                                {{--
                                    'btn btn-sm btn-warning' (Bootstrap) -> Tombol ikon 'sm' Tailwind.
                                    'p-2' (0.5rem) adalah padding yang baik untuk tombol ikon.
                                --}}
                                <a href="{{ route('pengumuman.edit', $item->id) }}" class="inline-flex items-center justify-center p-2 text-sm font-medium rounded-md text-white bg-yellow-500 hover:bg-yellow-600">
                                    <i class="fas fa-edit"></i>
                                </a>

                                {{-- 'd-inline' (Bootstrap) -> 'inline-block' (Tailwind) --}}
                                <form action="{{ route('pengumuman.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    {{--
                                        'btn btn-sm btn-danger' (Bootstrap) -> Tombol ikon 'sm' Tailwind.
                                    --}}
                                    <button type="submit" class="inline-flex items-center justify-center p-2 text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            {{-- 'text-center' (Bootstrap) -> 'text-center' (Tailwind) --}}
                            {{-- Menambahkan padding dan border agar konsisten --}}
                            <td colspan="6" class="text-center px-6 py-4 border border-gray-300">
                                Belum ada pengumuman.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{-- Pagination --}}
                <div class="mt-6 flex justify-center">
                    {{ $daftarPengumuman->links() }}
                    </div>
            </div>
        </div>
    </div>

</div>
@endsection
