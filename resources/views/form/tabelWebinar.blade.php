@extends('layouts.adminLayouts')

@section('title', 'Daftar Tabel')
@section('content')

<div class="container">
    <h2>Manajemen Data Lomba</h2>
    <a href="{{ route('webinar.create') }}" class="btn btn-primary mb-3">Tambah Webinar Baru</a>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                 <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Webinar
                </th>
                <th scope="col" class="px-6 py-3">
                    Deskripsi
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal
                </th>
                <th scope="col" class="px-6 py-3">
                   Pemateri
                </th>
                  <th scope="col" class="px-6 py-3">
                   Mulai
                </th>
                  <th scope="col" class="px-6 py-3">
                    Selesai
                </th>
                 <th scope="col" class="px-6 py-3">
                    Kategori Webinar
                </th>
                 <th scope="col" class="px-6 py-3">
                    Tempat
                </th>
                 <th scope="col" class="px-6 py-3">
                    Gambar
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($semuaWebinar as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   {{$loop->iteration}}
                </th>
                <td class="px-6 py-4">
                    {{ $item->webinar }}
                </td>
                <td class="px-6 py-4">
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
                    {{ $item->gambar }}
                </td>
                 <td class="px-6 py-4">
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="Poster Lomba" width="100">
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            @empty
  {{-- Pesan jika tidak ada data sama sekali --}}
                <tr>
                    <td colspan="6" class="text-center">Belum ada data Webinar.</td>
                </tr>
                @endforelse


        </tbody>
    </table>
</div>
</div>

@endsection
