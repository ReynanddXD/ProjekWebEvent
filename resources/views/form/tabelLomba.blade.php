@extends('layouts.adminLayouts')
@section('content')

<div class="p-5 container">
    <h2 class="text-2xl font-bold">Manajemen Data Lomba</h2>

    <a href="{{ route('lomba.create') }}" class="mt-5 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-[#FACC15] rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-[#d3ac12] dark:hover:bg-[#ee0c0c] dark:focus:ring-blue-800">Tambah Lomba Baru</a>
<div class="mt-5 relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                 <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Lomba
                </th>
                <th scope="col" class="px-6 py-3">
                    Pelaksanaan
                </th>
                <th scope="col" class="px-6 py-3">
                    Penyelenggara
                </th>
                <th scope="col" class="px-6 py-3">
                    Kategori Peserta
                </th>
                  <th scope="col" class="px-6 py-3">
                    Deskripsi
                </th>
                  <th scope="col" class="px-6 py-3">
                    Gambar
                </th>
                {{-- <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th> --}}
            </tr>
        </thead>
        <tbody>
            @forelse ($semuaLomba as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
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
                 <td class="px-6 py-4">
                    {{ $item->deskripsi }}
                </td>
                 <td class="px-6 py-4">
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="Poster Lomba" width="100">
                </td>
                {{-- <td class="px-6 py-4 text-right">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td> --}}
            </tr>
            @empty
  {{-- Pesan jika tidak ada data sama sekali --}}
                <tr>
                    <td colspan="6" class="text-center">Belum ada data lomba.</td>
                </tr>
                @endforelse


        </tbody>
    </table>
</div>
</div>

@endsection
