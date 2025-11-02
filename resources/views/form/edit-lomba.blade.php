@extends('layouts.adminLayouts')

@section('content')

{{--
  PERBAIKAN 1:
  - method="POST" (wajib)
  - action="..." (mengarahkan ke route update)
  - enctype (wajib untuk upload file/gambar)
--}}
<form action="{{ route('lomba.update', $lomba->id) }}" method="POST" enctype="multipart/form-data" class="max-w-lg mx-auto p-8 bg-white shadow-lg rounded-lg">

    {{-- PERBAIKAN 2: Tambahkan @csrf dan @method('PUT') --}}
    @csrf
    @method('PUT')

    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Lomba: {{ $lomba->lomba }}</h1>

    {{-- Tampilkan error validasi jika ada --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md mb-6" role="alert">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{--
      PERBAIKAN 3, 4, 5, 7:
      - Tambahkan 'name'
      - Tambahkan 'value' untuk data lama
      - Ganti 'id' agar unik
      - Lengkapi semua field
    --}}

    <div class="mb-5">
        <label for="lomba" class="block mb-2 text-sm font-medium text-gray-900">Nama Lomba</label>
        <input type="text" id="lomba" name="lomba" value="{{ old('lomba', $lomba->lomba) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
    </div>

    <div class="mb-5">
        <label for="pelaksanaan" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Pelaksanaan</label>
        <input type="date" id="pelaksanaan" name="pelaksanaan" value="{{ old('pelaksanaan', $lomba->pelaksanaan) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
    </div>

    <div class="mb-5">
        <label for="penyelenggara" class="block mb-2 text-sm font-medium text-gray-900">Penyelenggara</label>
        <input type="text" id="penyelenggara" name="penyelenggara" value="{{ old('penyelenggara', $lomba->penyelenggara) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
    </div>

    <div class="mb-5">
        <label for="kategoriPeserta" class="block mb-2 text-sm font-medium text-gray-900">Kategori Peserta</label>
        <input type="text" id="kategoriPeserta" name="kategoriPeserta" value="{{ old('kategoriPeserta', $lomba->kategoriPeserta) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: Mahasiswa, Umum" required>
    </div>

    <div class="mb-5">
        <label for="harga" class="block mb-2 text-sm font-medium text-gray-900">Harga (Rp)</label>
        <input type="number" id="harga" name="harga" value="{{ old('harga', $lomba->harga) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
    </div>

    <div class="mb-5">
        <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi Lomba</label>
        <textarea id="deskripsi" name="deskripsi" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{ old('deskripsi', $lomba->deskripsi) }}</textarea>
    </div>

    <div class="mb-5">
        <label class="block mb-2 text-sm font-medium text-gray-900" for="gambar">Upload Gambar Baru (Opsional)</label>
        @if($lomba->gambar)
            <div class="my-2">
                <span class="text-sm text-gray-600">Gambar saat ini:</span>
                <img src="{{ Storage::url($lomba->gambar) }}" alt="Gambar Lomba" class="w-32 h-auto rounded mt-1">
            </div>
        @endif
        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="gambar" name="gambar" type="file">
        <p class="mt-1 text-sm text-gray-500">Kosongkan jika tidak ingin mengganti gambar.</p>
    </div>

    <div class="mb-5">
        <label class="block mb-2 text-sm font-medium text-gray-900" for="panduan">Upload Panduan Baru (Opsional)</label>
        @if($lomba->panduan)
             <p class="mt-1 text-sm text-gray-500">Panduan saat ini: <a href="{{ Storage::url($lomba->panduan) }}" target="_blank" class="text-blue-600 hover:underline">Lihat PDF</a></p>
        @endif
        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="panduan" name="panduan" type="file">
        <p class="mt-1 text-sm text-gray-500">Kosongkan jika tidak ingin mengganti panduan (PDF).</p>
    </div>

    {{-- PERBAIKAN 6: Ganti type="button" menjadi type="submit" --}}
    <button type="submit" class="px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
        Simpan Perubahan
    </button>

    <a href="{{ route('lomba.index', $lomba->id) }}" class="px-5 py-3 ml-2 text-base font-medium text-center text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-100">
        Batal
    </a>

</form>

@endsection
{{--

@extends('layouts.adminLayouts')

@section('content')

<form class="max-w-sm mx-auto">

  <div class="mb-5">
      <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Lomba</label>
      <input type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

<label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Tanggal Pelaksanaan</label>
      <input type="date" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">



       <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Info Lomba</label>
  <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Info Webinar.."></textarea>

<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload file</label>
  <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
  <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">Tinggalkan info gambar</div>

</button>
<button type="button" class="px-5 py-3 text-base font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
<svg class="w-4 h-4 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
<path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
<path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
</svg>
</form>

@endsection --}}
