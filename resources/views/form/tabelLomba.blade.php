@extends('layouts.adminLayouts')
@section('content')

    {{--
    DIRAPIKAN:
    Mengganti 'p-5 container' (campuran Bootstrap) dengan 'px-6 py-4'
    agar konsisten dengan halaman admin lainnya.
    --}}
    <div class="px-6 py-4">
        <h2 class="text-2xl font-bold">Manajemen Data Lomba</h2>
        <p class="mb-6 text-gray-600">Daftar semua lomba yang telah di input.</p>

        {{--
        DIRAPIKAN:
        Mengganti tombol kuning 'bg-[#FACC15]' dengan tombol biru standar
        agar konsisten dengan tombol "Tambah" di halaman lain.
        --}}
        <a href="{{ route('lomba.create') }}"
            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition ease-in-out duration-150">
            <i class="fas fa-plus mr-2"></i> Tambah Lomba Baru
        </a>

        {{-- Wrapper tabel sudah bagus, tidak diubah --}}
        <div class="mt-5 relative overflow-x-auto shadow-md sm:rounded-lg">

            <form method="GET" action="{{ route('lomba.index') }}" class="mb-4 flex gap-2">
    <input type="text" name="search" value="{{ request('search') }}"
        class="border rounded-md p-2 w-64"
        placeholder="Cari lomba...">

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
                        <th scope="col" class="px-6 py-3"> <a href="{{ route('lomba.index', [
        'sort' => 'lomba',
        'order' => ($sort == 'lomba' && $order == 'asc') ? 'desc' : 'asc'
    ]) }}">
                                Nama Lomba
                                @if($sort == 'lomba')
                                    @if($order == 'asc')
                                        ▲
                                    @else
                                        ▼
                                    @endif
                                @endif
                            </a></th>
                        <th scope="col" class="px-6 py-3"> <a href="{{ route('lomba.index', [
        'sort' => 'pelaksanaan',
        'order' => ($sort == 'pelaksanaan' && $order == 'asc') ? 'desc' : 'asc'
    ]) }}">
                                Pelaksanaan
                                @if($sort == 'pelaksanaan')
                                    @if($order == 'asc')
                                        ▲
                                    @else
                                        ▼
                                    @endif
                                @endif
                            </a></th>
                        <th scope="col" class="px-6 py-3">
                           <a href="{{ route('lomba.index', [
    'sort' => 'penyelenggara',
    'order' => ($sort == 'penyelenggara' && $order == 'asc') ? 'desc' : 'asc'
]) }}">


                                Penyelenggara
                                @if($sort == 'penyelenggara')
                                    @if($order == 'asc')
                                        ▲
                                    @else
                                        ▼
                                    @endif
                                @endif</a>
                        </th>
                        <th scope="col" class="px-6 py-3">Kategori Peserta</th>
                        <th scope="col" class="px-6 py-3">Deskripsi</th>
                        <th scope="col" class="px-6 py-3">Gambar</th>
                        {{--
                        DITAMBAHKAN:
                        Kolom "Aksi" untuk Edit/Delete, sangat penting
                        untuk halaman manajemen.
                        --}}
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($semuaLomba as $item)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$loop->iteration}}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->lomba }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->pelaksanaan }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->penyelenggara }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->kategoriPeserta }}
                            </td>
                            {{--
                            DIRAPIKAN:
                            Menambahkan 'max-w-xs' dan 'truncate' agar deskripsi panjang
                            tidak merusak layout tabel.
                            --}}
                            <td class="px-6 py-4 max-w-xs truncate">
                                {{ $item->deskripsi }}
                            </td>
                            <td class="px-6 py-4">
                                {{--
                                DIRAPIKAN:
                                Mengganti 'width="100"' dengan kelas Tailwind 'w-24'
                                dan 'h-16' agar ukuran gambar seragam dan rapi.
                                --}}
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="Poster Lomba"
                                    class="w-24 h-16 object-cover rounded-md">
                            </td>
                            {{--
                            DITAMBAHKAN:
                            Tombol Aksi (Edit & Delete) dengan styling
                            yang konsisten dari file 'pengumuman' sebelumnya.
                            --}}
                            <td class="px-6 py-4 whitespace-nowrap">

                                <div class="flex items-center gap-2">
                                    {{-- Ganti '#' dengan route edit yang benar --}}

                                    <a href="{{ route('lomba.edit', $item->id) }}"
                                        class="inline-flex items-center justify-center p-2 text-sm font-medium rounded-md text-white bg-yellow-500 hover:bg-yellow-600">
                                        <i class="fas fa-edit"></i>
                                    </a>



                                    {{-- Ganti '#' dengan route destroy yang benar --}}
                                    <form action="{{ route('lomba.destroy', $item->id) }}" method="POST" class="inline-block"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center justify-center p-2 text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @empty
                        {{--
                        DIPERBAIKI:
                        'colspan="6"' salah. Seharusnya 8 agar sesuai
                        jumlah <th> di <thead> (7 + 1 Aksi).
                                --}}
                                <tr>
                                    <td colspan="8" class="px-6 py-4 text-center text-gray-500">
                                        Belum ada data lomba.
                                    </td>
                                </tr>
                    @endforelse

                </tbody>
            </table>
            {{-- Pagination --}}
            <div class="mt-6 flex justify-center">
                {{ $semuaLomba->appends(request()->all())->links() }}
            </div>
        </div>
@endsection
