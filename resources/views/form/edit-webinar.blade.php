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

                <div class="grid grid-cols-1 gap-1 md:grid-cols-2">

                    <div class="flex flex-col justify-center">
                        {{-- PERBAIKAN: Judul diubah agar sesuai --}}
                        <h1 class="text-4xl font-bold text-gray-800">
                            Edit Webinar
                        </h1>
                        <p class="mt-4 text-gray-600">
                            Silahkan perbarui data webinar pada kolom yang tersedia.
                        </p>
                    </div>
                    <form action="{{ route('webinar.update', $webinar->id) }}" method="POST" class="max-w-sm mx-auto"
                        enctype="multipart/form-data">
                        @csrf

                        {{--
                            PERBAIKAN FATAL:
                            Tambahkan @method('PUT') di sini!
                        --}}
                        @method('PUT')

                        {{-- input acara --}}
                        <div class="mb-5">
                            <label for="webinar"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Event
                                Webinar</label>
                            <input type="text" id="webinar" name="webinar"
                                value="{{ old('webinar', $webinar->webinar) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                            {{-- info webinar --}}
                            <label for="infoWebinar"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Info
                                Webinar</label>
                            <textarea id="infoWebinar" rows="4" name="deskripsiWebinar"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Info Webinar..">{{ old('deskripsiWebinar', $webinar->deskripsiWebinar) }}</textarea>

                            {{-- tanggal Pelaksanaan --}}
                            <label for="pelaksanaan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Tanggal
                                Pelaksanaan</label>
                            <input type="date" id="pelaksanaan" name="tanggal"
                                value="{{ old('tanggal', $webinar->tanggal) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                            {{-- Input nama Pemateri --}}
                            <label for="pemateri"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Pemateri</label>
                            <input type="text" id="pemateri" name="pemateri"
                                value="{{ old('pemateri', $webinar->pemateri) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                            {{-- Waktu Pelaksanaan --}}
                            <label for="mulaiWebinar"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Jam
                                Mulai</label>
                            <input type="time" id="mulaiWebinar" name="mulai"
                                value="{{ old('mulai', $webinar->mulai) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                            <label for="akhir"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Selesai </label>
                            <input type="time" id="akhir" name="selesai"
                                value="{{ old('selesai', $webinar->selesai) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                            {{-- Kategori online/offline --}}
                            <label for="pilKategori">Pilih Kategori: </label>
                            <select name="kategoriWebinar" id="pilKategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                                {{-- PERBAIKAN: Logika 'selected' agar nilai lama tampil --}}
                                <option value="online" {{ old('kategoriWebinar', $webinar->kategoriWebinar) == 'online' ? 'selected' : '' }}>Online</option>
                                <option value="offline" {{ old('kategoriWebinar', $webinar->kategoriWebinar) == 'offline' ? 'selected' : '' }}>Offline</option>
                            </select>

                            {{-- tempat Pelaksanaan --}}
                            <label for="tempat"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Tempat</label>
                            <input type="text" id="tempat" name="tempat"
                                value="{{ old('tempat', $webinar->tempat) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                            {{-- upload brosur/gambar --}}
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="gambar">Upload file (Opsional)</label>

                            {{-- PERBAIKAN: Tampilkan gambar yang ada saat ini --}}
                            @if($webinar->gambar)
                                <div class="my-2">
                                    <span class="text-sm text-gray-600">Gambar saat ini:</span>
                                    <img src="{{ asset('storage/' . $webinar->gambar) }}" alt="Gambar Webinar" class="w-32 h-auto rounded mt-1">
                                </div>
                            @endif

                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="gambar" id="gambar" type="file" name="gambar">
                            <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">
                                {{-- PERBAIKAN: Teks helper diubah --}}
                                Kosongkan jika tidak ingin mengganti gambar.
                            </div>

                            <button type="submit"
                                class="mt-4 px-5 py-3 text-base font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                {{-- PERBAIKAN: Teks tombol diubah --}}
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
