@extends('layouts.adminLayouts')

@section('title', 'Input Lomba Baru')
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

    <form action="{{ route('lomba.store') }}" method="POST" class="max-w-sm mx-auto" enctype="multipart/form-data">
  @csrf
        <div class="mb-5">
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

                {{-- Deskripsi lomba --}}
            <label for="descLomba" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Info Lomba</label>
            <textarea name="deskripsi" id="descLomba" rows="4" {{ old('deskripsi') }}"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Masukan Info Webinar.."></textarea>
{{-- Upload foto brosur --}}
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="brosur">Upload
                file</label>
            <input name="gambar"
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                aria-describedby="user_avatar_help" id="brosur" type="file">
            <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">Tinggalkan info gambar</div>

            <button type="submit"
                class="px-5 py-3 text-base font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
            </button>

    </form>

</div>

@endsection
