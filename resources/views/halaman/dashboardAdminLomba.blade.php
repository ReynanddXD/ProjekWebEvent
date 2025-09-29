@extends('layouts.adminLayouts')

@section('content')
<div>
    {{-- pesan suskes --}}
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    {{-- pesan error --}}
    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="flex items-center justify-center min-h-screen bg-gray-100">

        <div class="relative w-full max-w-screen p-8 mx-4 bg-white rounded-lg shadow-lg">

            <div class="grid grid-cols-1 gap-12 md:grid-cols-2">

         <div class="flex flex-col justify-center">
                    <h1 class="text-4xl font-bold text-gray-800">
                       Input Lomba
                    </h1>
                    <p class="mt-4 text-gray-600">
                        Silahkan input lomba pada kolom yang tersedia.
                    </p>
                </div>

<div class="inline-flex">
    <form action="{{ route('lomba.store') }}" method="POST" class="p-3 max-w-lg mx-auto " enctype="multipart/form-data">
  @csrf
        <div class="mb-1">
            {{-- input nama lomba --}}
            <label for="namaLomba" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Lomba</label>
            <input type="text" id="namaLomba" name="lomba" value="{{ old('lomba') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                {{-- waktu lomba --}}
                  {{-- <label for="mulaiLomba" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Pelaksanaan</label>
            <input type="date" id="mulai"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                     <label for="akhir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Pelaksanaan</label>
            <input type="date" id="akhir"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> --}}

                   {{-- tanggal Pelaksanaan --}}
            <label for="tanggalPel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Tanggal
                Pelaksanaan</label>
            <input type="date" id="tanggalPel" name="pelaksanaan" value="{{ old('pelaksanaan') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                {{-- penyelenggara --}}

  <label for="penyelenggara" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Penyelenggara</label>
            <input type="text" id="penyelenggara" name="penyelenggara" value="{{ old('penyelenggara') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                {{-- kategori target lomba --}}
   {{-- Kategori online/offline --}}
            <label for="pilKategoriLomba">Pilih Kategori: </label>
            <select name="kategoriPeserta" id="pilKategoriLomba">
                <option value="umum">Umum</option>
                <option value="pelajar">Pelajar SMA/SMK</option>
                <option value="mahasiswa">Mahasiswa</option>

            </select>

            {{-- harga pendaftaran --}}
            <div class="mt-4">
              <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Biaya</label>
            <input type="number" id="harga" name="harga" value="{{ old('harga', 0) }}" min="0"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <p class="mt-1 text-xs text-gray-500">Isi 0 jika lomba ini gratis.</p>
 @error('harga')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
        </div>
                {{-- Deskripsi lomba --}}
            <label for="descLomba" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Info Lomba</label>
            <textarea name="deskripsi" id="descLomba" rows="4" {{ old('deskripsi') }}"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Masukan Info Webinar.."></textarea>
{{-- Upload foto brosur --}}
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900"" for="brosur">Upload
                file</label>
            <input name="gambar"
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                aria-describedby="user_avatar_help" id="brosur" type="file">
            <div class="mt-1 text-sm text-gray-500 text-gray-500" id="user_avatar_help">Tinggalkan info gambar</div>

            {{-- Upload Guidebook PDF --}}
<div class="mt-4">
    <label class="block mb-2 text-sm font-medium text-gray-900" for="panduan">
        Upload Guidebook (PDF)
    </label>
    <input name="panduan"
           class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
           id="panduan" type="file">
    <div class="mt-1 text-sm text-gray-500">
        Opsional. Ukuran file maksimal 20MB.
    </div>
    @error('panduan')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
            <button type="submit"
                class="px-5 py-3 text-base font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
            </button>

    </form>
</div>
{{-- <div class="mr-5 row max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Daftar data Lomba</h5>
    </a>
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lihat semua data lomba yang sudah masuk ke dalam sistem.</p>
    <a href="{{ route('lomba.index') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Selengkapnya
        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
        </svg>
    </a>
</div> --}}

</div>
</div>
</div>

@endsection
