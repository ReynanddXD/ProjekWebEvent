@extends('layouts.mainUser')
@section('title', 'Edit Profil')
@section('content')
<section id="profile" class="bg-gray-100 py-12 sm:py-16 min-h-screen">
    <div class="ml-0 sm:ml-64 p-4 sm:p-6 transition-all duration-300">
        <div class="w-full max-w-full bg-white shadow-lg rounded-lg p-6 sm:p-10">

            <!-- Judul -->
            <h2 class="text-3xl sm:text-4xl font-extrabold text-center mb-8 sm:mb-12 text-gray-800 relative inline-block w-full">
                <span class="text-indigo-600">Edit</span> Profile
                <span class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-20 sm:w-24 h-1.5 bg-amber-500 rounded-full"></span>
            </h2>

            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-3 mb-4 rounded border border-green-200">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('dashboardUser.update') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <!-- Nama -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}"
                            class="w-full border border-gray-300 p-2 rounded shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
                            class="w-full border border-gray-300 p-2 rounded shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Nomor WhatsApp -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nomor WhatsApp</label>
                        <input type="text" name="no_hp" value="{{ old('no_hp', $user->no_hp ?? '') }}"
                            placeholder="Contoh: 0857xxxxxxxx"
                            class="w-full border border-gray-300 p-2 rounded shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('no_hp') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Instansi -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Instansi</label>
                        <input type="text" name="instansi" value="{{ old('instansi', $user->instansi ?? '') }}"
                            placeholder="Nama instansi, sekolah, atau universitas"
                            class="w-full border border-gray-300 p-2 rounded shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('instansi') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Pekerjaan -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Pekerjaan</label>
                        <select name="pekerjaan" id="pekerjaan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5">
                            <option value="umum" {{ old('pekerjaan', $user->pekerjaan ?? '') == 'umum' ? 'selected' : '' }}>Umum</option>
                            <option value="pelajar" {{ old('pekerjaan', $user->pekerjaan ?? '') == 'pelajar' ? 'selected' : '' }}>Pelajar SMA/SMK</option>
                            <option value="mahasiswa" {{ old('pekerjaan', $user->pekerjaan ?? '') == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                        </select>
                        @error('pekerjaan') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                </div>

                <button type="submit" class="mt-6 w-full bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
                    Simpan Perubahan
                </button>
            </form>

        </div>
    </div>
</section>
@endsection
