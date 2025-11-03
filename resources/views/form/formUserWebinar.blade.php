@extends('layouts.mainUser')
@section('title', 'Daftar Webinar')
@section('content')
<section id="webinar" class="bg-gray-100 py-12 sm:py-16 min-h-screen">
    <div class="ml-0 sm:ml-64 p-4 sm:p-6 transition-all duration-300">
        {{-- Pesan sukses --}}
            @if (session('success'))
            <div class="mb-6 p-4 rounded-lg bg-green-100 border border-green-400 text-green-800 flex items-center">
                <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
            @endif

            {{-- Pesan error --}}
            @if ($errors->any())
            <div class="mb-6 p-4 rounded-lg bg-red-100 border border-red-400 text-red-800">
                <div class="flex items-center mb-2">
                    <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span class="font-semibold">Terjadi kesalahan:</span>
                </div>
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        <div class="w-full max-w-5xl mx-auto bg-white shadow-xl rounded-2xl p-6 sm:p-10 border border-gray-200">
            <!-- Judul -->
            <h2 class="text-3xl sm:text-4xl font-extrabold text-center mb-10 text-gray-800 relative inline-block w-full">
                <span class="text-indigo-600">Daftar</span> Webinar
                <span class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-24 h-1.5 bg-amber-500 rounded-full"></span>
            </h2>
            @if (empty(auth()->user()->no_hp) || empty(auth()->user()->instansi) || empty(auth()->user()->pekerjaan))
                <div class="mb-4 p-4 rounded-lg bg-yellow-100 border border-yellow-400 text-yellow-800 flex items-start">
                    <svg class="w-6 h-6 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v2m0 4h.01m-.01-10a9 9 0 110 18 9 9 0 010-18z" />
                    </svg>
                    <div>
                        <p class="font-semibold">Lengkapi profil Anda terlebih dahulu.</p>
                        <p>Silakan edit profil untuk mengisi nomor HP, instansi, dan pekerjaan sebelum dapat mendaftar lomba.</p>
                        <a href="{{ route('dashboardUser.edit') }}"
                            class="inline-block mt-2 text-sm font-medium text-blue-600 hover:underline">
                            Edit Profil Sekarang
                        </a>
                    </div>
                </div>
            @endif
            <!-- Form -->
            <form action="{{ route('uwebinar.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nama -->
                    <div>
                        <label for="nama" class="block mb-2 text-sm font-semibold text-gray-800">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" value="{{ auth()->user()->name }}"
                            readonly
                            class="bg-gray-100 border border-gray-300 text-gray-700 text-sm rounded-lg block w-full p-3 shadow-sm cursor-not-allowed">
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block mb-2 text-sm font-semibold text-gray-800">Email</label>
                        <input type="email" id="email" name="email" value="{{ auth()->user()->email }}"
                            readonly
                            class="bg-gray-100 border border-gray-300 text-gray-700 text-sm rounded-lg block w-full p-3 shadow-sm cursor-not-allowed">
                    </div>

                    <!-- No Whatsapp -->
                    <div>
                        <label for="noHP" class="block mb-2 text-sm font-semibold text-gray-800">No. Whatsapp</label>
                        <input type="text" id="noHP" name="noHp" value="{{ auth()->user()->no_hp }}"
                            readonly
                            class="bg-gray-100 border border-gray-300 text-gray-700 text-sm rounded-lg block w-full p-3 shadow-sm cursor-not-allowed">
                    </div>

                    <!-- Instansi -->
                    <div>
                        <label for="instansi" class="block mb-2 text-sm font-semibold text-gray-800">Instansi</label>
                        <input type="text" id="instansi" name="instansi" value="{{ auth()->user()->instansi }}"
                            readonly
                            class="bg-gray-100 border border-gray-300 text-gray-700 text-sm rounded-lg block w-full p-3 shadow-sm cursor-not-allowed">
                    </div>

                    <!-- Pekerjaan -->
                    <div class="md:col-span-2">
                        <label for="pekerjaan" class="block mb-2 text-sm font-semibold text-gray-800">Pekerjaan</label>
                        <select name="pekerjaan" id="pekerjaan" disabled
                            class="bg-gray-100 border border-gray-300 text-gray-700 text-sm rounded-lg block w-full p-3 shadow-sm cursor-not-allowed">
                            <option value="umum" {{ auth()->user()->pekerjaan == 'umum' ? 'selected' : '' }}>Umum</option>
                            <option value="pelajar" {{ auth()->user()->pekerjaan == 'pelajar' ? 'selected' : '' }}>Pelajar SMA/SMK</option>
                            <option value="mahasiswa" {{ auth()->user()->pekerjaan == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                        </select>

                        {{-- Hidden input agar tetap terkirim --}}
                        <input type="hidden" name="pekerjaan" value="{{ auth()->user()->pekerjaan }}">
                    </div>
                </div>

                <!-- Pilih Webinar -->
                <div class="md:col-span-2">
                    <label for="webinar_id" class="block mb-2 text-sm font-semibold text-gray-800">Pilih Webinar</label>
                    <select name="webinar_id" id="webinar_id" required
                        class="bg-white border border-gray-400 text-gray-900 text-base rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-3 shadow-md transition duration-150">
                        <option value="" disabled selected class="text-gray-500">Pilih salah satu webinar</option>
                        @foreach ($kategoriWebinar as $webinar)
                            <option value="{{ $webinar->id }}" class="text-gray-900 {{ old('webinar_id') == $webinar->id ? 'font-semibold bg-indigo-50' : '' }}">
                                {{ $webinar->judul }}
                            </option>
                        @endforeach
                    </select>
                    @error('webinar_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol Submit -->
                <div class="pt-6 text-center">
                    <button type="submit"
                        class="w-full sm:w-auto px-10 py-3 text-base font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 hover:shadow-md transition duration-200">
                        Kirim Pendaftaran
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
